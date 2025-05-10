<?php

$this->load->helper('file');

// *** CONFIGURATION ***

$base_url = "https://repositorioutlvte.org/Repositorio/";
$sica_url = "5.161.176.197/sica/index.php/";
$default_image = "https://repositorioutlvte.org/Repositorio/eventos/sinimagen.png";
$profile_image_path = "https://repositorioutlvte.org/Repositorio/fotos/";
$area_image_path = "https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/";
$qr_image_path = "https://repositorioutlvte.org/Repositorio/qr/";
$aula_image_path = "https://repositorioutlvte.org/Repositorio/aulas/";

$colors_by_level = [
    1 => "#f0f8ff",   // AliceBlue
    2 => "#faebd7",   // AntiqueWhite
    3 => "#fff0f5",   // LavenderBlush
    4 => "#f5f5dc",   // Beige
    5 => "#e0ffff",   // LightCyan
    6 => "#f0fff0",   // Honeydew
    7 => "#fffaf0",   // FloralWhite
    8 => "#f8f8ff",   // GhostWhite
    9 => "#f0ffff",   // Azure
    10 => "#f5fffa",  // MintCream
];

// *** END CONFIGURATION ***

// Function to safely get a file header
function get_remote_file_headers($url) {
    if (!$url) return false;
    $headers = @get_headers($url);
    return ($headers && is_array($headers)) ? $headers : false;
}

// Function to check if a remote file exists
function remote_file_exists($url) {
    $headers = get_remote_file_headers($url);
    return $headers && strpos($headers[0], '200 OK') !== false;
}

// Function to generate a PDF link
function generate_pdf_link($url, $text, $condition) {
    $base_url = "https://repositorioutlvte.org/Repositorio/";
    $disable_style = 'style="pointer-events:none; cursor:default; color: #888;"';
    $link_style = 'style="color: #007bff;"';

    $full_url = $base_url . $url;
    $exists = !empty($url);

    return sprintf(
        '[<a href="%s" %s><i class="fas fa-file-pdf" style="font-size:24px;"></i> <span style="color: %s">%s</span></a>] - ',
        $exists ? $full_url : '#',
        $exists ? $link_style : $disable_style,
        $exists ? '#007bff' : '#888',
        htmlspecialchars($text)
    );
}

// *** DATA PROCESSING ***

$idareaconocimiento = 0;
$elperiodoacademico = "";
$inicio = 1;
$total_courses = 0;
$total_parallels = 0;

$report_data = [
    'silabos' => 0,
    'seguimientosilabo' => 0,
    'planessemestrales' => 0,
    'reactivos1' => 0,
    'calificaciones1p' => 0,
    'calificaciones2p' => 0,
    'total' => 0,
];

$output_html = '';

foreach ($asignaturadocentes as $row) {
    $total_courses++;
    $total_parallels++;

    // Start a new section for each area
    if ($row->idareaconocimiento != $idareaconocimiento && $inicio == 0) {
        $output_html .= generate_report_section_end($report_data);
        $file = generate_filename($elperiodoacademico, $idareaconocimiento, $ordenrpt);
        write_html_to_file($file, $output_html);
        $inicio = 1;
    }

    if ($row->idareaconocimiento != $idareaconocimiento && $inicio == 1) {
        $idareaconocimiento = $row->idareaconocimiento;
        $elperiodoacademico = $row->elperiodoacademico;
        $output_html = generate_report_section_start($malla, $row, $ordenrpt);
        $inicio = 0;
    }

    $output_html .= generate_course_card($row, $jornadadocente, $colors_by_level);
    update_report_data($report_data, $row);
}

// Complete the last section
$output_html .= generate_report_section_end($report_data);
$file = generate_filename($elperiodoacademico, $idareaconocimiento, $ordenrpt);
write_html_to_file($file, $output_html);

// *** HELPER FUNCTIONS ***

function generate_filename($period, $area_id, $order_rpt) {
    $filename = "application/views/web/distributivo{$period}-{$area_id}";
    if ($order_rpt != 0) {
        $filename .= "-{$order_rpt}";
    }
    $filename .= ".php";
    return $filename;
}

function write_html_to_file($filename, $html) {
    if (!write_file($filename, $html)) {
        echo "Error writing to file: {$filename}\n";
    } else {
        echo "File written successfully: {$filename}\n";
    }
}

function generate_report_section_start($malla, $row, $order_rpt) {
    global $qr_image_path, $aula_image_path;

    $order_text = [
        0 => "ordenado por nivel",
        1 => "ordenado por docente",
        2 => "ordenado por asignatura",
    ];

    $order_suffix = ($order_rpt != 0) ? "-{$order_rpt}" : '';
    $qr_code_url = $qr_image_path . $row->elperiodoacademico . '-' . $row->idareaconocimiento . $order_suffix . '.png';
    $aula_image_url = $aula_image_path . 'aulas' . $row->elperiodoacademico . '.jpg';

    return <<<HTML
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$malla[0]->eldepartamento} - {$row->area} - {$row->elperiodoacademico}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://congresoutlvte.org/assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> </head>
<body>
    <header class="header">
        <div class="header-content">
            <a href="https://www.utelvt.edu.ec/site/" target="_blank">
                <img src="https://congresoutlvte.org/images/logoutlvte.png" alt="UTLVTE" class="header-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse bg-secondary" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white"><a href="https://repositorioutlvte.org/Repositorio/eventos/2023-11-29.jpeg" class="text-white">Acerca del Proyecto de Aula</a></h4>
                        <p class="text-light">Proyecto de aula en Ingeniería de Software.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contacto</h4>
                        <ul class="list-unstyled">
                            <li><a href="5.161.176.197/sica/index.php/sica/evento/participantes/356" class="text-white">5to-A Ing. Software I</a></li>
                            <li><a href="5.161.176.197/sica/index.php/sica/evento/participantes/357" class="text-white">5to-B Ing. Software I</a></li>
                            <li><a href="5.161.176.197/sica/index.php/sica/evento/participantes/350" class="text-white">4to-B Base de Datos I</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <section class="page-header">
            <div class="header-container">
                <div>
                    <h1 class="main-title">{$malla[0]->eldepartamento}</h1>
                    <p class="sub-title">Cursos regulares - Área: {$row->area} - Periodo: {$row->elperiodoacademico} :: {$order_text[$order_rpt]}.</p>
                </div>
                <div class="header-aside">
                    <img src="{$qr_code_url}" alt="QR Code" class="qr-code">
                    <p class="aula-link">
                        <a href="{$aula_image_url}">
                            <i class="fas fa-map-marker-alt"></i> Ubicación aulas
                        </a>
                    </p>
                </div>
            </div>
        </section>

        <section class="statistics-section">
            <button class="toggle-btn" onclick="toggleSection(this, 'statistics')">
                <i class="fas fa-chart-bar"></i> Estadísticas
            </button>
            <div id="statistics" class="statistics-container hidden">
                <div class="chart-container">
                    <div class="chart-box"><canvas id="silabosChart"></canvas></div>
                    <div class="chart-box"><canvas id="seguimientosilaboChart"></canvas></div>
                    <div class="chart-box"><canvas id="planessemestralesChart"></canvas></div>
                    <div class="chart-box"><canvas id="calificaciones1pChart"></canvas></div>
                    <div class="chart-box"><canvas id="calificaciones2pChart"></canvas></div>
                </div>
            </div>
        </section>

        <section class="level-section">
            <button class="toggle-btn" onclick="toggleSection(this, 'level-{$row->numeronivelacademico}')">
                Nivel {$row->nivel}
            </button>
            <div id="level-{$row->numeronivelacademico}" class="level-container hidden">
                <div class="card-grid">
HTML;
}

function generate_report_section_end($report_data) {
    return <<<HTML
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <p class="footer-text">
                Este sitio web presenta <b>{$report_data['total']} cursos</b> y es parte del
                <b>PROYECTO DE AULA</b> titulado
                <a href="https://repositorioutlvte.org/Repositorio/2024-01-15-FQSA-01627.pdf">
                    "Diseño y Desarrollo de una plataforma web para la Gestión de la información Académica"
                </a>.
            </p>
            <p class="footer-credits">
                Proyecto realizado por 4-B Base de Datos I, 5to-A y 5to-B Ingeniería de Software I (2023-1S)
                con el Ing. Stalin Francis Msc.
            </p>
            <a href="#" class="back-to-top">Volver arriba</a>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
    <script src="https://congresoutlvte.org/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="scripts.js"></script> </body>
</html>
HTML;
}

function generate_course_card($row, $jornadadocente, $colors_by_level) {
    global $profile_image_path, $area_image_path, $sica_url, $default_image;

    $level_color = isset($colors_by_level[$row->numeronivelacademico]) ? $colors_by_level[$row->numeronivelacademico] : '#ffffff'; // Default to white

    $teacher_image_url = $profile_image_path . trim($row->cedula) . '.jpg';
    $teacher_image = remote_file_exists($teacher_image_url) ? $teacher_image_url : "https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg";

    $area_image_url = $area_image_path . trim($row->idareaconocimiento) . '.jpg';
    $area_image = remote_file_exists($area_image_url) ? $area_image_url : $default_image;

    $inscription_disabled = strpos($row->estadoevento, "INSCRIPCION") === false ? 'disabled' : '';
    $course_ended = strpos($row->estadoevento, "TERMINADO") !== false || strpos($row->estadoevento, "PRÓXIMO A INICIAR") !== false;

    $schedule_info = '';
    foreach ($jornadadocente as $schedule) {
        if (isset($schedule[$row->idasignaturadocente]['idasignaturadocente'])) {
            $schedule_item = $schedule[$row->idasignaturadocente];
            $schedule_info .= sprintf(
                '<b>%s:</b> %s (%s), aula: <a href="https://repositorioutlvte.org/Repositorio/aulas/aula%s.jpg"><i class="fas fa-map-marker-alt"></i> %s</a><br>',
                htmlspecialchars($schedule_item['nombre']),
                $schedule_item['horainicio'],
                $schedule_item['duracionminutos'],
                $schedule_item['idaula'],
                htmlspecialchars($schedule_item['elaula'])
            );
        }
    }

    return <<<HTML
    <div class="course-card">
        <a href="{$sica_url}sica/evento/detalle/{$row->idevento}">
            <img src="{$area_image}" alt="{$row->area}" class="course-image">
        </a>
        <div class="card-details" style="background-color: {$level_color}">
            <div class="teacher-profile">
                <img src="{$teacher_image}" alt="{$row->eldocente}" class="teacher-image">
                <span class="teacher-name">{$row->eldocente}</span>
            </div>
            <div class="course-info">
                <p><strong>Código:</strong> {$row->codigo}</p>
                <p><strong>Asignatura:</strong> {$row->laasignatura}</p>
                <p><strong>Nivel:</strong> {$row->nivel}</p>
                <p><strong>Paralelo:</strong> {$row->paralelo}</p>
                <p><strong>Área:</strong> {$row->area}</p

