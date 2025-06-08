<?php
// Assuming $this->load->helper('file'); is handled by your framework,
// and site_url() / base_url() are available for generating URLs.
// If you are NOT using a framework like CodeIgniter, you'll need to define
// base_url() and site_url() or replace them with static paths.
// Example:
// function base_url($path = '') { return 'http://localhost/your_project/' . $path; }
// function site_url($path = '') { return 'http://localhost/your_project/' . $path; }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distributivo Académico</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <h1>Distributivo Académico</h1>
            <nav class="main-nav">
                <ul>
                    <li><?php echo anchor('distributivodocente', 'Inicio'); ?></li>
                    </ul>
            </nav>
        </div>
    </header>

    <main class="container content-area">
        <section class="distributivo-list">
            <h2>Lista de Docentes y Asignaturas</h2>

            <div class="card-grid" id="distributivo-cards">
                <p class="loading-message">Cargando información del distributivo...</p>
            </div>

            <div class="modal fade" id="Modal_pdf" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pdfModalLabel">Visualizar Documento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <iframe id="pdfViewer" style="width: 100%; height: 600px; border: none;"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Distributivo Académico. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">

/**
 * Verifica si una URL de imagen existe intentando cargarla.
 * @param {string} url La URL de la imagen a verificar.
 * @returns {Promise<boolean>} Una promesa que resuelve a `true` si la imagen existe, `false` en caso contrario.
 */
function checkIfImageExists(url) {
    return new Promise((resolve) => {
        const img = new Image(); // Crea un nuevo elemento Image en memoria
        img.onload = () => resolve(true); // Si la imagen se carga, existe
        img.onerror = () => resolve(false); // Si hay un error al cargar, no existe
        img.src = url; // Asigna la URL para iniciar la carga
    });
}

            // Function to fetch and display data
     async       function loadDistributivoData() {
                $.ajax({
                    url: '<?php echo site_url('distributivodocente/dist/25'); ?>', // Your AJAX endpoint
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        // Show a loading message
                        $('#distributivo-cards').html('<p class="loading-message">Cargando información del distributivo...</p>');
                    },
                    success: async function(response) {
                        let html = '';
                        if (response.data && response.data.length > 0) {
                            $.each(response.data, function(index, item) {
                                // Default photo if not provided or empty
                          //      const docentePhoto = item.docente_photo && item.docente_photo !== ''
                            //        ? item.docente_photo
                              //      : '<?php echo base_url("assets/images/default_avatar.png"); ?>'; // Make sure this path is correct

// Remote file url
const docentePhoto = "https://repositorioutlvte.org/Repositorio/fotos/"+item.cedula+".jpg";


 const docentePhotoExists = await checkIfImageExists(docentePhoto);
    if (!docentePhotoExists) {

     const docentePhoto =   "https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" ;

}







                                // PDF URL handling
                                const pdfUrl = item.archivopdf && item.archivopdf !== '' ? item.archivopdf : '#';
                                const pdfButtonClass = (pdfUrl === '#') ? 'btn-secondary disabled' : 'btn-primary';
                                const pdfButtonText = (pdfUrl === '#') ? 'Sin PDF' : 'Ver PDF';

                                html += `
                                    <div class="distributivo-card">
                                        <div class="docente-info">
                                            <div class="docente-photo-container">
                                                <img src="${docentePhoto}" alt="Foto de ${item.eldocentee}" class="docente-photo">
                                            </div>
                                            <h3>${item.eldocente}</h3>
                                            ${item.id ? `<p class="docente-id">ID: ${item.iddocente}</p>` : ''}
                                        </div>
                                        <div class="asignaturas-list">
                                            <h4>Asignaturas:</h4>
                                            <ul>`;
                                if (item.asignaturas && item.asignaturas.length > 0) {
                                    $.each(item.asignaturas, function(i, asignatura) {
                                        html += `<li>${asignatura.laasignatura} ${asignatura.codigo ? `(${asignatura.codigo})` : ''}</li>`;
                                    });
                                } else {
                                    html += `<li>No hay asignaturas asignadas.</li>`;
                                }
                                html += `
                                            </ul>
                                        </div>
                                        <div class="card-actions">
                                            <a href="javascript:void(0);" class="btn ${pdfButtonClass} btn-view-pdf" data-pdf-url="${pdfUrl}" ${pdfUrl === '#' ? 'aria-disabled="true"' : ''}>${pdfButtonText}</a>
                                            </div>
                                    </div>
                                `;
                            });
                        } else {
                            html = '<p class="info-message">No se encontró información de distributivos.</p>';
                        }
                        $('#distributivo-cards').html(html);

                        // Attach PDF viewing functionality to newly created buttons
                        $('.btn-view-pdf').on('click', function() {
                            const currentPdfUrl = $(this).data('pdf-url');
                            if (currentPdfUrl && currentPdfUrl !== '#') {
                                $('#pdfViewer').attr('src', currentPdfUrl);
                                $('#Modal_pdf').modal('show');
                            } else {
                                // Optionally, show a toast or alert if the button is not disabled
                                if (!$(this).hasClass('disabled')) {
                                    alert('No hay un PDF disponible para este docente.');
                                }
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al cargar los datos:", status, error);
                        $('#distributivo-cards').html('<p class="error-message">Error al cargar la información. Por favor, intente de nuevo más tarde.</p>');
                    }
                });
            }
$(document).ready(function() {
            // Initial load of data when the page is ready
            loadDistributivoData();
        });
    </script>
</body>
</html>
