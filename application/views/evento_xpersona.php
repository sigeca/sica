<?php
// No direct access prevention is usually done in the controller or a common entry point
// defined('BASEPATH') OR exit('No direct script access allowed');

// The $title and $persona data should be passed from the controller (e.g., Evento controller)
// just like in Persona.php for persona_record.php.
// Ensure $idpersona is available, possibly passed from the controller or extracted from $persona array.    
//
//

        print_r($persona);
        die();

$idpersona = isset($persona['idpersona']) ? $persona['idpersona'] : 'unknown';
$person_name = isset($persona['nombres']) && isset($persona['apellidos']) ? $persona['nombres'] . ' ' . $persona['apellidos'] : 'Persona Desconocida';
?>

<div class="content-wrapper">
    <div class="header-section">
        <h1 class="page-title">
            <?php echo isset($title) ? $title : 'Eventos por Persona'; ?>
            <span class="person-id">(ID: <span id="filtro"><?php echo $idpersona; ?></span>)</span>
        </h1>
        <p class="person-name">Persona: <?php echo $person_name; ?></p>
        <?php
        // This access check should ideally be done in the controller before loading the view
        // Keeping it for now but recommending controller-level access control.
        $permitir_acceso_modulo = 0; // Flag to check if 'evento' module access exists
        $numero = -1; // Initialize with an invalid index
        if (isset($this->session->userdata['acceso'])) {
            $j = 0;
            foreach ($this->session->userdata['acceso'] as $row) {
                if (isset($row["modulo"]["modulo"]) && "evento" == $row["modulo"]["modulo"]) {
                    $numero = $j;
                    $permitir_acceso_modulo = 1;
                    break; // Found the module, no need to continue loop
                }
                $j = $j + 1;
            }
            if ($permitir_acceso_modulo == 0) {
                // If module access not found, redirect (or handle gracefully)
                // This logic might be better placed in a central authentication helper/controller
                // redirect('login/logout'); // Uncomment if you want strict redirection
            }
        }
        ?>
    </div>

    <div class="navigation-links">
        <?php
        // Check if access for 'navegar' is set before trying to use it
        $can_navigate = $permitir_acceso_modulo && $numero !== -1 && isset($this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']) && $this->session->userdata['acceso'][$numero]['nivelacceso']['navegar'];
        if ($can_navigate) {
        ?>
            <ul class="nav-list">
                <li><?php echo anchor('evento/elprimero/', 'Primero'); ?></li>
                <li><?php echo anchor('evento/siguiente/' . $idpersona, 'Siguiente'); ?></li>
                <li><?php echo anchor('evento/anterior/' . $idpersona, 'Anterior'); ?></li>
                <li><?php echo anchor('evento/elultimo/', 'Último'); ?></li>
            </ul>
        <?php } ?>
    </div>

    <div class="main-content-section">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Eventos de la Persona</h6>
            </div>
            <div class="card-body">
                <?php
                // Check if access for 'add' is set before trying to use it
                $can_add = $permitir_acceso_modulo && $numero !== -1 && isset($this->session->userdata['acceso'][$numero]['nivelacceso']['add']) && $this->session->userdata['acceso'][$numero]['nivelacceso']['add'];
                if ($can_add) {
                ?>
                    <a href="<?php echo site_url('evento/add'); ?>" class="btn btn-primary mb-3">Agregar Evento</a>
                <?php } ?>

                <div class="table-responsive">
                    <table class="table table-bordered" id="mydatac" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Evento</th>
                                <th>Nombre Evento</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Evento</th>
                                <th>Nombre Evento</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="idperiodoacademico" class="col-md-2 col-form-label">Periodo Académico:</label>
                    <div class="col-md-4">
                        <select id="idperiodoacademico" name="idperiodoacademico" class="form-control" onchange="filtra_periodo()">
                            <option value="">Seleccione un Periodo</option>
                            <?php
                            // Assuming $periodos_academicos is passed from the controller
                            if (isset($periodos_academicos) && !empty($periodos_academicos)) {
                                foreach ($periodos_academicos as $periodo) {
                                    echo '<option value="' . htmlspecialchars($periodo->idperiodoacademico) . '">' . htmlspecialchars($periodo->nombre) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-info" onclick="filtra_evento()">Aplicar Filtro Eventos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Detalles del Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="eys-modalbody">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    // Make BASE_URL available if not already globally defined in scripts.js
    const BASE_URL = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        // Initialize DataTables
        var mydatac = $('#mydatac').DataTable({
            "processing": true,
            "serverSide": true, // If using server-side processing for large datasets
            "ajax": {
                url: '<?php echo site_url('evento/persona_data'); ?>',
                type: 'GET',
                data: function(d) {
                    d.idpersona = $('#filtro').text(); // Pass person ID
                    // Add other filter parameters if needed, e.g., d.idperiodoacademico = idperiodoacademico;
                    d.idperiodoacademico = $('#idperiodoacademico').val(); // Pass selected period ID
                }
            },
            "columns": [
                { "data": "idevento" },
                { "data": "nombre_evento" }, // Example field, adjust to actual column names
                { "data": "fecha_inicio" },
                { "data": "fecha_fin" },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        let actions = '';
                        // Access control should ideally be handled on the server-side as well for robustness
                        // Using JS condition based on PHP flags passed or re-checking (less secure for preventing actions)
                        // It's better to render these buttons conditionally in PHP directly if possible,
                        // or pass granular access flags to JS
                        const canView = <?php echo $permitir_acceso_modulo && $numero !== -1 && isset($this->session->userdata['acceso'][$numero]['nivelacceso']['ver']) && $this->session->userdata['acceso'][$numero]['nivelacceso']['ver'] ? 'true' : 'false'; ?>;
                        const canEdit = <?php echo $permitir_acceso_modulo && $numero !== -1 && isset($this->session->userdata['acceso'][$numero]['nivelacceso']['edit']) && $this->session->userdata['acceso'][$numero]['nivelacceso']['edit'] ? 'true' : 'false'; ?>;
                        const canDelete = <?php echo $permitir_acceso_modulo && $numero !== -1 && isset($this->session->userdata['acceso'][$numero]['nivelacceso']['delete']) && $this->session->userdata['acceso'][$numero]['nivelacceso']['delete'] ? 'true' : 'false'; ?>;

                        if (canView) {
                            actions += '<button class="btn btn-info btn-sm item_ver" data-idevento="' + row.idevento + '" data-bs-toggle="modal" data-bs-target="#myModal">Ver</button> ';
                        }
                        if (canEdit) {
                            actions += '<a href="<?php echo site_url('evento/edit/'); ?>' + row.idevento + '" class="btn btn-warning btn-sm">Editar</a> ';
                        }
                        if (canDelete) {
                            actions += '<a href="<?php echo site_url('evento/quitar/'); ?>' + row.idevento + '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Está seguro de eliminar este evento?\')">Eliminar</a>';
                        }
                        return actions;
                    }
                }
            ],
            // Language configuration for DataTables
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            }
        });

        // Event listener for "Ver" button to open modal and load content
        $('#mydatac tbody').on('click', '.item_ver', function() {
            var idevento = $(this).data('idevento');
            $.ajax({
                url: '<?php echo site_url('evento/get_detalle_evento_ajax'); ?>', // Controller method for AJAX detail fetch
                type: 'GET',
                data: { idevento: idevento },
                success: function(response) {
                    $('#eys-modalbody').html(response); // Load HTML content into modal body
                    $('#myModal').modal('show'); // Show the Bootstrap modal
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching event details:", error);
                    $('#eys-modalbody').html('<p class="text-danger">Error al cargar los detalles del evento.</p>');
                    $('#myModal').modal('show');
                }
            });
        });

        // Functions for filtering DataTables
        window.filtra_evento = function() {
            mydatac.ajax.reload(); // Reloads the DataTables with current filters
        };

        window.filtra_periodo = function() {
            // This will trigger the DataTables reload with the updated filter value from the select box
            mydatac.ajax.reload();
        };

        // Note: The old specific click handlers (like docu_ver) were commented out in the previous revision.
        // If they are for other DataTables instances, they should be located within their respective views.
    });
</script>
