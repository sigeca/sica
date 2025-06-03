<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $evento['titulo']; ?> - Detalles del Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f8f9fa;
        }

        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("http://educaysoft.org/sica/campus2.jpg");
            height: 40vh; /* Shorter hero image for better initial visibility */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 2.8rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .hero-text .btn {
            margin: 0.5rem;
            padding: 0.8rem 1.8rem;
            font-size: 1.1rem;
            border-radius: 0.3rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .hero-text .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .section-padding {
            padding: 3rem 0;
        }

        .card {
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        .table-responsive {
            margin-top: 1.5rem;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table .fa-solid {
            font-size: 1.2rem;
            margin-right: 0.3rem;
        }

        .table .text-success { color: #28a745 !important; }
        .table .text-danger { color: #dc3545 !important; }
        .table .text-warning { color: #ffc107 !important; }
        .table .text-info { color: #17a2b8 !important; }
        .table .text-secondary { color: #6c757d !important; }

        .sticky-footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: #dc3545; /* Red background for emphasis */
            color: white;
            padding: 15px 0;
            font-size: 1.5rem;
            z-index: 1000; /* Ensure it stays on top */
            box-shadow: 0 -2px 10px rgba(0,0,0,0.2);
        }

        .sticky-footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .sticky-footer a:hover {
            color: #f8d7da; /* Lighter red on hover */
        }
    </style>
</head>
<body>

<?php
    // PHP arrays for data processing
    $miasistencia = array();
    foreach ($asistencia as $row){
        $miasistencia[$row->fecha] = $row->idtipoasistencia;
    }
    $miparticipacion = array();
    $miayuda = array();
    foreach ($participacion as $row){
        $miparticipacion[$row->fecha] = $row->porcentaje;
        $miayuda[$row->fecha] = $row->ayuda;
    }

    $fecha_sesion = array();
    foreach ($sesioneventos as $row){
        $fecha_sesion[$row->numerosesion] = $row->fecha;
    }

    $mipago = array();
    foreach ($pagoevento as $row){
        $mipago[$row->fecha] = $row->valor;
    }
?>

<header class="hero-image">
    <div class="hero-text">

     <?php if(isset($this->session->userdata['logged_in']['cedula'])) { ?>

     <img src="'<?php echo 'https://repositorioutlvte.org/Repositorio/fotos/'.$this->session->userdata['logged_in']['cedula']; ?>.jpg' class="img-fluid mb-3" style="max-width: 250px;" alt="Logo Educaysoft">
    <?php }else{ ?>
        <img src="http://repositorioutlvte.org/sica/images/LogoEducCont.png" class="img-fluid mb-3" style="max-width: 250px;" alt="Logo Educaysoft">
    <?php } ?>


        <h1 class="display-4"><?php echo $evento['titulo']; ?></h1>
        <div class="d-flex justify-content-center flex-wrap">
            <a href="<?php echo 'https://repositorioutlvte.org/Repositorio/'.$silabo['archivopdf']; ?>" class="btn btn-outline-light mx-2 mb-2">
                <i class="fa-solid fa-book me-2"></i>Sílabo
            </a>
            <a href="<?php echo 'https://repositorioutlvte.org/Repositorio/'.$silabo['elplandeclasepdf']; ?>" class="btn btn-outline-light mx-2 mb-2">
                <i class="fa-solid fa-calendar-alt me-2"></i>Plan de Clase
            </a>
        </div>
    </div>
</header>

<main class="container section-padding">
    <section class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white text-center py-3">
            <h2 class="h4 mb-0">Resultados de Aprendizaje</h2>
        </div>
        <div class="card-body">
            <p class="lead text-justify px-4"><?php echo $asignatura["resultadosaprendizaje"];?></p>
        </div>
    </section>

    <section class="card shadow-sm mb-5">
        <div class="card-header bg-success text-white text-center py-3">
            <h2 class="h4 mb-0">Detalles del Evento</h2>
        </div>
        <div class="card-body">
            <div class="row align-items-center py-2 border-bottom">
                <div class="col-md-4 text-md-end">
                    <i class="fa-regular fa-calendar-check text-info me-2"></i><strong class="text-secondary">Fecha de inicio:</strong>
                </div>
                <div class="col-md-8">
                    <span><?php echo $evento['fechainicia']; ?></span>
                </div>
            </div>
            <div class="row align-items-center py-2 border-bottom">
                <div class="col-md-4 text-md-end">
                    <i class="fa-regular fa-calendar-xmark text-danger me-2"></i><strong class="text-secondary">Fecha de finalización:</strong>
                </div>
                <div class="col-md-8">
                    <span><?php echo $evento['fechafinaliza']; ?></span>
                </div>
            </div>
            <div class="row align-items-center py-2 border-bottom">
                <div class="col-md-4 text-md-end">
                    <i class="fa-solid fa-hourglass-half text-warning me-2"></i><strong class="text-secondary">Duración:</strong>
                </div>
                <div class="col-md-8">
                    <span><?php echo $evento['duracion']; ?></span>
                </div>
            </div>
            <div class="row align-items-center py-2">
                <div class="col-md-4 text-md-end">
                    <i class="fa-solid fa-dollar-sign text-success me-2"></i><strong class="text-secondary">Costo:</strong>
                </div>
                <div class="col-md-8">
                    <span><?php echo $evento['costo']; ?></span>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center py-2">
                <div class="col-md-4 text-md-end">
                    <i class="fa-solid fa-user-circle text-primary me-2"></i><strong class="text-secondary">Participante:</strong>
                </div>
                <div class="col-md-8">
                    <?php if(isset($this->session->userdata['logged_in']['idpersona'])) { ?>
                        <span><?php echo $this->session->userdata['logged_in']['elusuario'] ." -- (". $this->session->userdata['logged_in']['email'].")";?></span>
                    <?php } else { ?>
                        <span>Anónimo -- (Sin correo)</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="card shadow-sm">
        <div class="card-header bg-dark text-white py-3">
            <h2 class="h4 mb-0 text-center">Progreso por Sesión</h2>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Tema (Sesión)</th>
                            <th scope="col" class="text-center">Tarea</th>
                            <th scope="col" class="text-center">Fecha</th>
                            <th scope="col" class="text-center"><i class="fa-solid fa-user-check"></i></th>
                            <th scope="col" class="text-center"><i class="fa-solid fa-chart-pie"></i></th>
                            <th scope="col" class="text-center"><i class="fa-solid fa-handshake-angle"></i></th>
                            <th scope="col" class="text-center"><i class="fa-solid fa-dollar-sign"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($temas as $row) { ?>
                            <tr class="<?php echo ($row->idmodoevaluacion == 1) ? 'table-warning' : 'table-light'; ?>">
                                <td class="text-center">
                                    <?php if($row->idvideotutorial > 0 && isset($this->session->userdata['logged_in']['idpersona'])) { ?>
                                        <a href="<?php echo base_url(); ?>curso/evaluar?idpersona=<?php echo $this->session->userdata['logged_in']['idpersona']; ?>&idsilabo=<?php echo $evento['idsilabo']; ?>&idevento=<?php echo $evento['idevento']; ?>&idtema=<?php echo $row->idtema; ?><?php echo isset($fecha_sesion[$row->numerosesion]) ? '&fecha='.$fecha_sesion[$row->numerosesion] : ''; ?>" title="Evaluar Sesión">
                                            <i class="fa-solid fa-video text-primary"></i>
                                        </a>
                                    <?php } else { ?>
                                        <i class="fa-solid fa-folder-open text-secondary"></i>
                                    <?php } ?>
                                    <span class="ms-2"><?php echo $row->numerosesion; ?></span>
                                </td>
                                <td>
                                    <?php if(trim($row->linkpresentacion) != '') { ?>
                                        <a href="<?php echo $row->linkpresentacion; ?>" target="_blank" class="text-decoration-none">
                                            <?php echo $row->nombrelargo; ?> <i class="fa-solid fa-external-link-alt fa-xs"></i>
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $row->nombrelargo; ?>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($row->aprendizajeautonomo)) { ?>
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#taskModal<?php echo $row->numerosesion; ?>">
                                            Tarea
                                        </button>
                                        <div class="modal fade" id="taskModal<?php echo $row->numerosesion; ?>" tabindex="-1" aria-labelledby="taskModalLabel<?php echo $row->numerosesion; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-white">
                                                        <h5 class="modal-title" id="taskModalLabel<?php echo $row->numerosesion; ?>">Tarea para aprendizaje autónomo - Sesión <?php echo $row->numerosesion; ?></h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?php echo $row->aprendizajeautonomo; ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <span></span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php echo isset($fecha_sesion[$row->numerosesion]) ? $fecha_sesion[$row->numerosesion] : ''; ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                        if (isset($fecha_sesion[$row->numerosesion]) && !empty($miasistencia[$fecha_sesion[$row->numerosesion]])) {
                                            $attendance_type = $miasistencia[$fecha_sesion[$row->numerosesion]];
                                            switch ($attendance_type) {
                                                case 1: // Puntual
                                                    echo '<i class="fa-solid fa-user-check text-success" title="Asistencia Puntual"></i>';
                                                    break;
                                                case 2: // Atraso
                                                    echo '<i class="fa-solid fa-user-clock text-warning" title="Asistencia con Atraso"></i>';
                                                    break;
                                                case 3: // Falta justificada
                                                    echo '<i class="fa-solid fa-user-tag text-info" title="Falta Justificada"></i>';
                                                    break;
                                                case 4: // Falta injustificada
                                                    echo '<i class="fa-solid fa-user-times text-danger" title="Falta Injustificada"></i>';
                                                    break;
                                                default:
                                                    echo '<span></span>';
                                                    break;
                                            }
                                        } else {
                                            echo '<span></span>';
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php echo (isset($fecha_sesion[$row->numerosesion]) && isset($miparticipacion[$fecha_sesion[$row->numerosesion]])) ? $miparticipacion[$fecha_sesion[$row->numerosesion]] : ''; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo (isset($fecha_sesion[$row->numerosesion]) && isset($miayuda[$fecha_sesion[$row->numerosesion]])) ? $miayuda[$fecha_sesion[$row->numerosesion]] : ''; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo (isset($fecha_sesion[$row->numerosesion]) && isset($mipago[$fecha_sesion[$row->numerosesion]])) ? $mipago[$fecha_sesion[$row->numerosesion]] : ''; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot class="table-dark">
                        <tr>
                            <td colspan="2"></td>
                            <th class="text-end">TOTALES</th>
                            <td class="text-center"></td>
                            <td class="text-center">Clases</td>
                            <td class="text-center">Calificación</td>
                            <td class="text-center">Ayuda</td>
                            <td class="text-center">Pago</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</main>

<footer class="sticky-footer">
    <a href="#">Evaluar e imprimir certificado</a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
