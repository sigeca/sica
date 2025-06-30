<?php
// No direct access prevention is usually done in the controller or a common entry point
// defined('BASEPATH') OR exit('No direct script access allowed');

// The $title and $persona data should be passed from the controller (e.g., Evento controller)
// just like in Persona.php for persona_record.php.
// Ensure $idpersona is available, possibly passed from the controller or extracted from $persona array.
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
        if (isset($this->session->userdata['acceso'])) {
            $permitir = 0;
            $j = 0;
            $numero = $j;
            foreach ($this->session->userdata['acceso'] as $row) {
                if ("evento" == $row["modulo"]["modulo"]) { // Assuming "evento" is the module name
                    $numero = $j;
                    $permitir = 1;
                }
                $j = $j + 1;
            }
            if ($permitir == 0) {
                redirect('login/logout');
            }
        }
        ?>
    </div>

    <div class="navigation-links">
        <?php if (isset($this->session->userdata['acceso']) && isset($numero) && $this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']) { ?>
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
                <?php if (isset($this->session->userdata['acceso']) && isset($numero) && $this->session->userdata['acceso'][$numero]['nivelacceso']['add']) { ?>
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
                                    echo '<option value="' . $periodo->idperiodoacademico . '">' . $periodo->nombre . '</option>';
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
                        // Assuming you have 'ver' and 'editar' actions
                        let actions = '';
                        // Access control should ideally be handled on the server-side as well for robustness
                        // but for client-side visibility:
                        <?php if (isset($this->session->userdata['acceso']) && isset($numero) && $this->session->userdata['acceso'][$numero]['nivelacceso']['ver']) { ?>
                            actions += '<button class="btn btn-info btn-sm item_ver" data-idevento="' + row.idevento + '" data-retorno="<?php echo site_url('evento/detalle'); ?>" data-bs-toggle="modal" data-bs-target="#myModal">Ver</button> ';
                        <?php } ?>
                        <?php if (isset($this->session->userdata['acceso']) && isset($numero) && $this->session->userdata['acceso'][$numero]['nivelacceso']['edit']) { ?>
                            actions += '<a href="<?php echo site_url('evento/edit/'); ?>' + row.idevento + '" class="btn btn-warning btn-sm">Editar</a> ';
                        <?php } ?>
                        <?php if (isset($this->session->userdata['acceso']) && isset($numero) && $this->session->userdata['acceso'][$numero]['nivelacceso']['delete']) { ?>
                            actions += '<a href="<?php echo site_url('evento/quitar/'); ?>' + row.idevento + '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Está seguro de eliminar este evento?\')">Eliminar</a>';
                        <?php } ?>
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
            // Assuming you have an AJAX endpoint to fetch event details
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
            // This function should ideally update a parameter for mydatac reload
            // Or trigger a separate DataTables instance if it's for another table
            var idperiodoacademico = $('#idperiodoacademico').val();
            // Assuming mydatac is the table for events, you would pass this as a parameter in the ajax.data function
            // For now, if you have a separate table or need to update mydatac based on this filter:
            mydatac.ajax.url('<?php echo site_url('evento/persona_data'); ?>?idpersona=' + $('#filtro').text() + '&idperiodoacademico=' + idperiodoacademico).load();
        };

        // Old specific click handlers (if still needed, integrate with DataTables row click or 'Ver' button)
        // These are redundant if DataTables handles actions through the "Acciones" column
        /*
        $('#show_datap').on('click','.docu_ver',function(){
            var ordenador = "https://"+$(this).data('ordenador');
            var ubicacion=$(this).data('ubicacion');
            if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
                ubicacion = ordenador+"/"+ubicacion;
            }else{
                ubicacion = ordenador+ubicacion;
            }
            var archivo = $(this).data('archivo');
            var certi= ubicacion.trim()+archivo.trim();
            window.location.href = certi;
        });
        */
        // Note: The above `docu_ver` and other `item_ver` handlers for
