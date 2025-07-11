<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . ' | UTLVT Tecnología de la Información' : 'UTLVT Tecnología de la Información'; ?></title>

    <link href="<?php echo base_url('images/favicon.ico'); ?>" rel="shortcut icon" type="image/x-icon">

    <meta property="og:locale" content="es_EC">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Universidad Técnica Luis Vargas Torres de Esmeraldas">
    <meta property="og:description" content="Centro de Educación Continua">
    <meta property="og:url" content="https://www.educaysoft.org/">
    <meta property="og:site_name" content="EDUCAYSOFT">
    <meta property="article:modified_time" content="2021-12-14T21:51:01+00:00">
    <meta property="og:image" content="https://educaysoft.org/images/CentroEducacionContinua.png">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="600">
    <meta name="author" content="Stalin Francis">
    <meta name="copyright" content="educaysoft">
    <meta name="description" content="Desarrollamos soluciones de software para la gestión académica, administrativa y de investigación.">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4SsQ4Cbl8SglMTtHvFuBVGmQ+jLge7Fiab+xlWiC5NWFy1QeLAG+fb6G/oB5FcMZeFgYsVkPekCPZkd1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZQL/MVP6ubffg0lP5tQbdlHM2ddjU/msMgrtgQYcPu4kw3FqE2yaCEvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</head>
<body>
    <?php if (isset($this->session->userdata['logged_in'])) : ?>
        <header class="main-header">
            <div class="logo-container">
                <a href="<?php echo base_url('index.php/mti'); ?>">
                    <img src="<?php echo base_url('images/logo-cti.png'); ?>" alt="Logo CTI" class="logo">
                </a>
            </div>
            <button class="menu-toggle" id="abrir" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
            </button>
            <button class="menu-toggle close-btn" id="cerrar" aria-label="Cerrar menú">
                <i class="fas fa-times"></i>
            </button>
        </header>

        <aside class="sidebar" id="sidebar">
            <nav class="main-nav">
                <ul class="menu-list">
                    <?php
                    // Ensure $acceso is available for menu generation
                    $acceso_data = $this->session->userdata['acceso'] ?? [];
                    if (!empty($acceso_data)) :
                        foreach ($acceso_data as $row) :
                            $id = $row["modulo"]["id"] ?? '';
                            $nombre = $row["modulo"]["nombre"] ?? 'N/A';
                            $icono = $row["modulo"]["icono"] ?? 'default'; // Use a default icon name if missing
                            $modulo_url = $row["modulo"]["modulo"] ?? '#';
                            $iconUrl = base_url('assets/iconos/' . $icono . '.png'); // Assuming you still use images for icons
                    ?>
                            <li class="menu-item" id="<?php echo $id; ?>">
                                <a href="<?php echo base_url('index.php/' . $modulo_url); ?>" class="menu-link">
                                    <img src="<?php echo $iconUrl; ?>" alt="<?php echo $nombre; ?>" class="menu-icon">
                                    <span class="menu-text"><?php echo $nombre; ?></span>
                                </a>
                            </li>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </nav>
        </aside>

        <div class="main-content-wrapper" id="eys-principal">
            <main class="content-area">

    <?php else : ?>
        <header class="public-header">
            <div class="logo-container">
                <a href="<?php echo base_url('index.php/mti'); ?>">
                    <img src="<?php echo base_url('images/logo-cti.png'); ?>" alt="Logo de la carrera CTI" class="logo">
                </a>
            </div>
            <nav class="public-nav">
                <ul>
                    <li>
                        <a href="http://congresoutlvte.org/informatica" class="nav-link" aria-label="Ir a nuestra carrera">Nuestra carrera</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/login/user_registration_show'); ?>" class="nav-link" aria-label="Registrar nuevo usuario">Registrar</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/login"); ?>" class="nav-link" aria-label="Inicia sesión en la plataforma">Inicia sesión</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="public-content">
            <div class="album py-5 bg-light public-hero-section">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                                <a href='http://congresoutlvte.org/informatica/PeriodoAcademico.php'>
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><image href="<?php echo base_url(); ?>/images/PeriodoAcademico.jpg" height="100%" width="100%"/>  </svg>
                                </a>
                                <div class="card-body">
                                    <p class="card-text"><font color="blue">Periodos Académicos .</font><br><b>"Carrera en Tecnología de la Información".</b></p>
                                    <p>Director de carrera:<a href="http://www.utelvt.edu.ec/sitioweb/index.php/decano-ingenieria-y-tecnologias">  Ing. Stalin Francis.</a></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
    <?php endif; ?>
    <div id="eys-contenido-g" class="content-wrapper">
