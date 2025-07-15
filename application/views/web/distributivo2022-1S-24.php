
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">  
    <meta name="description" content="">
    <meta name="author" content="Stalin Francis Quinde">
    <meta name="generator" content="Hugo 0.101.0">
        <meta property="og:site_name" content="Carrera en Tecnología de la Información" />
        <meta property="og:image" content="https://repositorioutlvte.org/Repositorio/logos/logocti.png" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="400" />
    <title> Carrera en Tecnología de la Información - UTLVTE - Periodo 2022-1S  Area:T.I.C. </title>

    <link rel="educaysoft" href="https://congresoutlvte.org/faci/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" />

    <style>
    body {
        background-color: #f5f8fa;
        color: #212529;
        font-family: Arial, sans-serif;
    }

    .img-contenedor img {
        transition: all 0.9s ease;
        width: 100%;
    }

    .img-contenedor:hover img {
        transform: scale(1.25);
    }

    .img-contenedor {
        overflow: hidden;
    }

    .texto-transversal {
        background-color: rgba(0, 0, 0, 0.7);
        padding: 20px;
        color: #ffffff;
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    }

    .texto-transversal h2 {
        font-size: 24px;
        text-transform: uppercase;
    }

    .texto-transversal p {
        font-size: 18px;
    }

    .chart-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .chart-box {
        width: 15%;
        margin: 3px;
    }

    canvas {
        width: 100% !important;
        height: auto !important;
    }

    @media (max-width: 768px) {
        .chart-box {
            width: 70%;
        }
    }

    .contenido, .contenidoinfo {
        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 10px;
        background-color: #ffffff;
    }

    .contenidoinfo {
        display: none;
    }

    .toggle-btn {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
    }

    .toggle-btn:hover {
        background-color: #0056b3;
    }

    header .navbar {
        background-color: #343a40;
    }

    header .navbar-brand img {
        height: 45px;
    }

    header h4, header a, header p {
        color: white !important;
    }

    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.1);
    }
    </style>   


  </head>

 <body>


<header>
  <div class="collapse bg-secondary" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white"> <a href="https://repositorioutlvte.org/Repositorio/eventos/2023-11-29.jpeg" class="text-white">Acerca del Proyecto de Aula de Ingenieria de Software</a></h4>
          <p class="text-light"> El proyecto de aula en Ingeniería de Software  implico la planificación, desarrollo y evaluación colaborativa de soluciones informáticas, fomentando el trabajo en equipo, la resolución de problemas y la aplicación práctica de conceptos técnicos. .</p>

        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contactanos</h4>
          <ul class="list-unstyled">
            <li><a href="5.161.176.197/sica/index.php/sica/evento/participantes/356" class="text-white">5to-A Ingenieria de Software I</a></li>
            <li><a href="5.161.176.197/sica/index.php/sica/evento/participantes/357" class="text-white">5to-B Ingenieria de Softare I</a></li>
            <li><a href="5.161.176.197/sica/index.php/sica/evento/participantes/350" class="text-white">4to-B Base de Datos I</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-light bg-light shadow-sm" aria-label="Light offcanvas navbar">
    <div class="container">

<a class="navbar-brand" href="https://www.utelvt.edu.ec/site/" target="_blank">
      <img src="https://congresoutlvte.org/images/logoutlvte.png" alt="..." height="45">
    </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5" style="display:flex;  align-items:center; justify-content: center;" >
<div>
        <h1 class="fw-light">Ingenieria en Tecnología de la Información</h1>  
        <p class="lead text-muted">Cursos regulares</p>
        <p class="lead text-muted">Área:T.I.C.   -  Periodo:2022-1S ::  ordenado por nivel.</p>
      </div>
<div style=" flex-basis: 40%"  >
<img src="https://repositorioutlvte.org/Repositorio/qr/2022-1S-24.png" height="150px">
</div>
      <div >
 <p class="lead text-muted"> <a href="https://repositorioutlvte.org/Repositorio/aulas/aulas2022-1S.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> Ubicación del las aulas </a></p>
      </div>
    </div>
  </section>



<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Estadística de cumplimiento.
<div class="contenido" id="contenedor1">
<div class="col">
     <div class="card shadow-sm">
    <div class="chart-container">
        <div class="chart-box">
            <canvas id="silabosChart"></canvas>
        </div>
        <div class="chart-box">
            <canvas id="seguimientosilaboChart"></canvas>
        </div>
        <div class="chart-box">
            <canvas id="planessemestralesChart"></canvas>
        </div>
        <div class="chart-box">
            <canvas id="calificaciones1pChart"></canvas>
        </div>
        <div class="chart-box">
            <canvas id="calificaciones2pChart"></canvas>
        </div>
    </div>
   	</div>
</div>
 </div><br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Primero.
<div class="contenido">
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

<div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/26">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1104.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Francis Quinde  Stalin Adalberto</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801560517.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F68081"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1104 </span>
</div>
<div  id="FundamentosdeProgramación-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span> Fundamentos de Programación  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Primero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="FrancisQuindeStalinAdalberto-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Francis Quinde  Stalin Adalberto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>stalin.francis@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en Ciencias de la Computación </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Generalidades de la programación. Estructuras de control. Estructuras de
selección. Estructuras de repetición. Arreglos.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Analiza definiciones, eliminando conceptos erróneos para dar una perspectiva real.- Analiza y considerar lo necesario, lo importan te, lo redundante, lo posible para implementar un buen diseño de programación. .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-02-01.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-07-29.</span></p><b>Miercoles: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:red">TERMINADO.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=26'" disabled >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/784">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1101.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Medina Preciado  Gissela Cruz</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802250506.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F68081"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1101 </span>
</div>
<div  id="AnálisisMatemático-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Análisis Matemático </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Primero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MedinaPreciadoGisselaCruz-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Medina Preciado  Gissela Cruz </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>gissella.medina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN COMPUTACION E INFORMATICA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN INGENIERIA MATEMATICA Y COMPUTACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Ecuaciones. Inecuaciones. Matrices.
Sucesiones y progresiones.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>RA1. Resuelve problemas cotidianos aplicando ecuaciones de primer grado con una incógnita.
RA2. Soluciona problemas de punto de equilibrio aplicando sistemas de ecuaciones.
RA3. Resulve ejercicios y problemas de desigualdades: lineales, cuadráticas y con valor absoluto.
RA4. Identifica las diferentes propiedades para resolución de matrices.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Jueves: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=784'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/785">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1101.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Medina Preciado  Gissela Cruz</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802250506.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F68081"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1101 </span>
</div>
<div  id="AnálisisMatemático-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Análisis Matemático </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Primero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MedinaPreciadoGisselaCruz-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Medina Preciado  Gissela Cruz </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>gissella.medina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN COMPUTACION E INFORMATICA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN INGENIERIA MATEMATICA Y COMPUTACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Ecuaciones. Inecuaciones. Matrices.
Sucesiones y progresiones.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>RA1. Resuelve problemas cotidianos aplicando ecuaciones de primer grado con una incógnita.
RA2. Soluciona problemas de punto de equilibrio aplicando sistemas de ecuaciones.
RA3. Resulve ejercicios y problemas de desigualdades: lineales, cuadráticas y con valor absoluto.
RA4. Identifica las diferentes propiedades para resolución de matrices.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Jueves: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=785'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/45">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1102.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Valdez Requene  Mizael</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0800678518.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F68081"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1102 </span>
</div>
<div  id="Física-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Física </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Primero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ValdezRequeneMizael-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Valdez Requene  Mizael </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>sin@correo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Carga electrica y ley de coulomb.
Campo eléctrico. Ley de Gauss.
Energía y potencial eléctrico.
Capacitancia .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>RA1: Conoce y aplica la cinemática de la
partícula en una y dos dimensiones.
6RA2: Conoce y aplica Las leyes del
movimiento. Trabajo y energía. Impulso y
cantidad de movimiento.
RA3: Conoce y aplica dinámica .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">0000-00-00.</span><br>
	      <b>Finaliza : </b><span style="color:red">0000-00-00.</span></p><b>Jueves: </b><span style="color:red">14:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">16:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:red">TERMINADO.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=45'" disabled >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/719">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1102.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Leyva Mendez  Alan Eduardo</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F68081"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1102 </span>
</div>
<div  id="Física-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Física </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Primero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="LeyvaMendezAlanEduardo-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Leyva Mendez  Alan Eduardo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>alanleyvamendez@gmail.com </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN SISTEMAS DE INFORMACION MENCIÓN EN GES </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Carga electrica y ley de coulomb.
Campo eléctrico. Ley de Gauss.
Energía y potencial eléctrico.
Capacitancia .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>RA1: Conoce y aplica la cinemática de la
partícula en una y dos dimensiones.
6RA2: Conoce y aplica Las leyes del
movimiento. Trabajo y energía. Impulso y
cantidad de movimiento.
RA3: Conoce y aplica dinámica .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=719'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/683">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1303.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Romero Morales  Abraham Tiverio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0800903197.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F68081"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1303 </span>
</div>
<div  id="EpistemologiaymetodologiadelaInvestigaciónCientífica-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Epistemologia y metodologia de la Investigación Científica </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Primero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RomeroMoralesAbrahamTiverio-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Romero Morales  Abraham Tiverio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>abraham.romero@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>LICENCIADO EN CIENCIAS DE LA EDUCACION MENCION HISTORIA Y GEOGRAFIA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN DOCENCIA MENCION GESTION EN DESARROLLO DEL CURRICULO </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Investigación científica.
Conocimiento cientifico.
Metodologia de la investigación
cientifica. Proyecto tesis gradotrabajo investigación..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprede los diferentes modelos de la
investigación científica.- Plantea problemas
científicos.- Plantera Hipótesis.-Aplica el
modelo Hipotético-Deductivo..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">10:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=683'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/684">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1507.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Romero Morales  Abraham Tiverio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0800903197.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F68081"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1507 </span>
</div>
<div  id="ExpresiónOralyescrita-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Expresión Oral y escrita </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Primero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RomeroMoralesAbrahamTiverio-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Romero Morales  Abraham Tiverio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>abraham.romero@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>LICENCIADO EN CIENCIAS DE LA EDUCACION MENCION HISTORIA Y GEOGRAFIA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN DOCENCIA MENCION GESTION EN DESARROLLO DEL CURRICULO </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Fundamento de la comuncación y el
aprendizaje. Los actos del
habla.Técnicas de expresión oral.
Técnicas basicas de expresión
escrita. Técnicas básicas de
preparación de trabajos escritos.
Defensa de monografías.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Identifica las generalidades de la
comunicación oral y escrita dentro de un
contexto social.
Aplicareglas ortográficas, signos de
puntuación y fenómenos semánticos en todo
texto académico, social y oficial; para
facilitar la comunicación.- Desarrolla la
habilidad de expresarse verbalmente en
situaciones de comunicación frente a frente,
grupal y en público.-
Interpreta los textos literarios como
elementos para articular el desarrollo de las
habilidades comunicativas.. .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=684'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/775">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1303.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Romero Morales  Abraham Tiverio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0800903197.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F68081"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1303 </span>
</div>
<div  id="EpistemologiaymetodologiadelaInvestigaciónCientífica-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Epistemologia y metodologia de la Investigación Científica </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Primero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RomeroMoralesAbrahamTiverio-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Romero Morales  Abraham Tiverio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>abraham.romero@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>LICENCIADO EN CIENCIAS DE LA EDUCACION MENCION HISTORIA Y GEOGRAFIA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN DOCENCIA MENCION GESTION EN DESARROLLO DEL CURRICULO </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Investigación científica.
Conocimiento cientifico.
Metodologia de la investigación
cientifica. Proyecto tesis gradotrabajo investigación..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprede los diferentes modelos de la
investigación científica.- Plantea problemas
científicos.- Plantera Hipótesis.-Aplica el
modelo Hipotético-Deductivo..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=775'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/776">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1507.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Romero Morales  Abraham Tiverio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0800903197.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F68081"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1507 </span>
</div>
<div  id="ExpresiónOralyescrita-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Expresión Oral y escrita </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Primero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RomeroMoralesAbrahamTiverio-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Romero Morales  Abraham Tiverio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>abraham.romero@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>LICENCIADO EN CIENCIAS DE LA EDUCACION MENCION HISTORIA Y GEOGRAFIA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN DOCENCIA MENCION GESTION EN DESARROLLO DEL CURRICULO </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Fundamento de la comuncación y el
aprendizaje. Los actos del
habla.Técnicas de expresión oral.
Técnicas basicas de expresión
escrita. Técnicas básicas de
preparación de trabajos escritos.
Defensa de monografías.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Identifica las generalidades de la
comunicación oral y escrita dentro de un
contexto social.
Aplicareglas ortográficas, signos de
puntuación y fenómenos semánticos en todo
texto académico, social y oficial; para
facilitar la comunicación.- Desarrolla la
habilidad de expresarse verbalmente en
situaciones de comunicación frente a frente,
grupal y en público.-
Interpreta los textos literarios como
elementos para articular el desarrollo de las
habilidades comunicativas.. .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=776'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        </div></div></div></div><br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Segundo.
    <div class="contenido">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"><div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/705">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1109.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Sanchez Rodriguez   Alma Delia</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801875196.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1109 </span>
</div>
<div  id="Redesdedatos-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Redes de datos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="SanchezRodriguezAlmaDelia-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Sanchez Rodriguez   Alma Delia </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>alma.sanchez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN COMPUTACION E INFORMATICA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN INFORMATICA EMPRESARIAL </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a las redes. Protocolos y
arquitectura de redes. Capa de
aplicación.
Capa de transmisión. Conmutación
de paquetes. Enlace de datos. Teoría
de colas. Medios de transmisión
alámbricos e inalámbricos..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende las historia de las Redes.- Aprende
los modelos TCP/IP y OSI.-Aplica
algoritmos para la conmutación de
paquetes.- Conoce la Teoría de Colas.-
Aplica la simulación de enlaces de
transmisión de datos. .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">11:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=705'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/783">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1108.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Medina Preciado  Gissela Cruz</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802250506.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1108 </span>
</div>
<div  id="AlgebraLineal-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Algebra Lineal </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MedinaPreciadoGisselaCruz-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Medina Preciado  Gissela Cruz </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>gissella.medina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN COMPUTACION E INFORMATICA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN INGENIERIA MATEMATICA Y COMPUTACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Geometría Analítica. Matrices y
SEL. Espacios Vectoriales.
Aplicaciones Lineales.
Diagonalización de endomorfismos.
Formas Cuadráticas. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende a desarrollar el pensamiento lógico
y algorítmico, calculando áreas y volúmenes
de diferentes cuerpos.- Aplica las matrices,
los determinantes
y los sistemas de ecuaciones lineales.-
Aplica las matrices, los determinantes y los
sistemas de ecuaciones lineales.- Utiliza las
transformaciones ortogonales..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=783'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/730">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1212.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Caicedo Goyes  Fabián Lizardo </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802123794.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1212 </span>
</div>
<div  id="ProgramaciónI-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación I </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CaicedoGoyesFabiánLizardo-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Caicedo Goyes  Fabián Lizardo  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>fabian.caicedo.goyes@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Conceptos básicos del paradigma orientado a objetos. Temas complementarios para el desarrollo
de aplicaciones informáticas. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aplica la lógica matemática en el contexto de las Ciencias de la computación.-
Desarrolla programas informáticos a fin de resolver problemas de diversa naturaleza.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Miercoles: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=730'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/731">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1212.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Caicedo Goyes  Fabián Lizardo </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802123794.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1212 </span>
</div>
<div  id="ProgramaciónI-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación I </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CaicedoGoyesFabiánLizardo-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Caicedo Goyes  Fabián Lizardo  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>fabian.caicedo.goyes@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Conceptos básicos del paradigma orientado a objetos. Temas complementarios para el desarrollo
de aplicaciones informáticas. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aplica la lógica matemática en el contexto de las Ciencias de la computación.-
Desarrolla programas informáticos a fin de resolver problemas de diversa naturaleza.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=731'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/786">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1110.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Montaño Estacio  Nelson Eli </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801663725.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1110 </span>
</div>
<div  id="ContabilidadGeneral-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Contabilidad General </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MontañoEstacioNelsonEli-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Montaño Estacio  Nelson Eli  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Principios de contabilidad. Asiento contable. Libro diario. Mayorizacion. Estados financieros..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Desarrolla el proceso contable de una empresa.- Realiza el registro de las transacciones en el libro diario y elaborar el
mayor general.- Elabora estados financieros aplicando principios éticos.- Aprende las reglas básicas del registro contable y la lógica del cargo y abono .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=786'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/787">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1110.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Montaño Estacio  Nelson Eli </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801663725.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1110 </span>
</div>
<div  id="ContabilidadGeneral-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Contabilidad General </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MontañoEstacioNelsonEli-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Montaño Estacio  Nelson Eli  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Principios de contabilidad. Asiento contable. Libro diario. Mayorizacion. Estados financieros..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Desarrolla el proceso contable de una empresa.- Realiza el registro de las transacciones en el libro diario y elaborar el
mayor general.- Elabora estados financieros aplicando principios éticos.- Aprende las reglas básicas del registro contable y la lógica del cargo y abono .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=787'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/713">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1109.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Aparicio Izurieta  Viviana Vanessa</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802771535.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1109 </span>
</div>
<div  id="Redesdedatos-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Redes de datos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="AparicioIzurietaVivianaVanessa-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Aparicio Izurieta  Viviana Vanessa </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>viviana.aparicio@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniera en Sistemas Administrativos Computarizados </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN INFORMATICA EMPRESARIAL </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a las redes. Protocolos y
arquitectura de redes. Capa de
aplicación.
Capa de transmisión. Conmutación
de paquetes. Enlace de datos. Teoría
de colas. Medios de transmisión
alámbricos e inalámbricos..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende las historia de las Redes.- Aprende
los modelos TCP/IP y OSI.-Aplica
algoritmos para la conmutación de
paquetes.- Conoce la Teoría de Colas.-
Aplica la simulación de enlaces de
transmisión de datos. .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Miercoles: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">11:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:red">TERMINADO.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=713'" disabled >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/789">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1413.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Olmedo Ponce  Jose David</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801887027.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1413 </span>
</div>
<div  id="EcologiayMedioAmbiente-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Ecologia y Medio Ambiente </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="OlmedoPonceJoseDavid-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Olmedo Ponce  Jose David </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Ecologia general. Conferencias de la
organización de las naciones unidas
sobre el medio ambiente. Ley de
gestión ambiental. Estudio de casos
críticos sobre medio ambiente..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Reconoce los principales sistemas
ambientales y las relaciones entre
organismos vivos y no vivos. Investiga la
función que desarrollan los seres bióticos y
abióticos en las cadenas, redes y pirámides
tróficas. Aplica sus conocimientos
ecológicos a la realidad nacional,
identificando de manera crítica las mejores
soluciones relacionadas. Promueve que el
ambiente y los recursos naturales constituyan
patrimonio de la nación y que la protección
ambiental y la conservación de la diversidad
natural sean de interés social con el uso
sostenible de los recursos naturales y
eliminando impactos ambientales negativos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=789'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/790">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1413.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Olmedo Ponce  Jose David</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801887027.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1413 </span>
</div>
<div  id="EcologiayMedioAmbiente-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Ecologia y Medio Ambiente </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="OlmedoPonceJoseDavid-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Olmedo Ponce  Jose David </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Ecologia general. Conferencias de la
organización de las naciones unidas
sobre el medio ambiente. Ley de
gestión ambiental. Estudio de casos
críticos sobre medio ambiente..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Reconoce los principales sistemas
ambientales y las relaciones entre
organismos vivos y no vivos. Investiga la
función que desarrollan los seres bióticos y
abióticos en las cadenas, redes y pirámides
tróficas. Aplica sus conocimientos
ecológicos a la realidad nacional,
identificando de manera crítica las mejores
soluciones relacionadas. Promueve que el
ambiente y los recursos naturales constituyan
patrimonio de la nación y que la protección
ambiental y la conservación de la diversidad
natural sean de interés social con el uso
sostenible de los recursos naturales y
eliminando impactos ambientales negativos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=790'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/720">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI1108.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Leyva Mendez  Alan Eduardo</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5DA81"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI1108 </span>
</div>
<div  id="AlgebraLineal-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Algebra Lineal </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Segundo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="LeyvaMendezAlanEduardo-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Leyva Mendez  Alan Eduardo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>alanleyvamendez@gmail.com </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN SISTEMAS DE INFORMACION MENCIÓN EN GES </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Geometría Analítica. Matrices y
SEL. Espacios Vectoriales.
Aplicaciones Lineales.
Diagonalización de endomorfismos.
Formas Cuadráticas. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende a desarrollar el pensamiento lógico
y algorítmico, calculando áreas y volúmenes
de diferentes cuerpos.- Aplica las matrices,
los determinantes
y los sistemas de ecuaciones lineales.-
Aplica las matrices, los determinantes y los
sistemas de ecuaciones lineales.- Utiliza las
transformaciones ortogonales..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=720'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        </div></div></div></div><br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Tercero.
    <div class="contenido">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"><div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/791">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1115.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cifuentes del Castillo  Luis Henry</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1115 </span>
</div>
<div  id="CálculoDiferencial-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Cálculo Diferencial </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CifuentesdelCastilloLuisHenry-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cifuentes del Castillo  Luis Henry </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>luisci_60@hotmail.com </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN PLANIFICACION Y DIRECCION ESTRATEGICA	 </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>unciones de una variable. Coordenadas polares. LÌmites.
Continuidad de funciones de una variable. La derivada.
Aplicaciones de la derivada.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Reconoce las funciones, sus gr·ficas, comportamiento,
propiedades y aplicaciones.- Identifica las propiedades de
la derivada a partir de sus interpretaciones fÌsica y
geomÈtrica.- Calcula la derivada por medio
de las derivadas sucesivas de
una funciÛn, el estudio de los
puntos crÌticos de una
funciÛn, las relaciones entre
los signos de la primera y la
segunda derivadas y las
caracterÌsticas de la funciÛn, y
el trazado de gr·ficas en la
soluciÛn de problemas muy
diversos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=791'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/792">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1115.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cifuentes del Castillo  Luis Henry</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1115 </span>
</div>
<div  id="CálculoDiferencial-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Cálculo Diferencial </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CifuentesdelCastilloLuisHenry-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cifuentes del Castillo  Luis Henry </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>luisci_60@hotmail.com </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN PLANIFICACION Y DIRECCION ESTRATEGICA	 </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>unciones de una variable. Coordenadas polares. LÌmites.
Continuidad de funciones de una variable. La derivada.
Aplicaciones de la derivada.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Reconoce las funciones, sus gr·ficas, comportamiento,
propiedades y aplicaciones.- Identifica las propiedades de
la derivada a partir de sus interpretaciones fÌsica y
geomÈtrica.- Calcula la derivada por medio
de las derivadas sucesivas de
una funciÛn, el estudio de los
puntos crÌticos de una
funciÛn, las relaciones entre
los signos de la primera y la
segunda derivadas y las
caracterÌsticas de la funciÛn, y
el trazado de gr·ficas en la
soluciÛn de problemas muy
diversos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=792'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/771">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1119.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Renteria Macias  Henrry Javier</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802276725.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1119 </span>
</div>
<div  id="ArquitecturadelComputador-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Arquitectura del Computador </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RenteriaMaciasHenrryJavier-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Renteria Macias  Henrry Javier </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>henry.renteria@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN GESTION AMBIENTAL </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a la arquitectura de computadoras. La placa
base y componentes. La ram y el cmos. Los sistemas de bus. Los procesadores. Los componentes del computador..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Comprende los principios básicos del funcionamiento del computador.- Identifica los componentes que conforman los
computadores.- Comprende el funcionamiento y la relación que existe entre los diferentes componentes del Computado.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=771'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/772">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1119.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Renteria Macias  Henrry Javier</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802276725.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1119 </span>
</div>
<div  id="ArquitecturadelComputador-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Arquitectura del Computador </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RenteriaMaciasHenrryJavier-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Renteria Macias  Henrry Javier </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>henry.renteria@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN GESTION AMBIENTAL </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a la arquitectura de computadoras. La placa
base y componentes. La ram y el cmos. Los sistemas de bus. Los procesadores. Los componentes del computador..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Comprende los principios básicos del funcionamiento del computador.- Identifica los componentes que conforman los
computadores.- Comprende el funcionamiento y la relación que existe entre los diferentes componentes del Computado.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=772'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/732">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1218.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Caicedo Goyes  Fabián Lizardo </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802123794.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1218 </span>
</div>
<div  id="ProgramaciónII-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación II </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CaicedoGoyesFabiánLizardo-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Caicedo Goyes  Fabián Lizardo  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>fabian.caicedo.goyes@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción al Análisis de Algoritmos. Estructuras de Datos
Lineales. arboles..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aplica relaciones de herencia en el diseño de aplicaciones.-
Utiliza colecciones para la representaciÛn de estructuras
de datos.- Aplica la serializaciÛn de objetos en
java.- Utiliza las Estructuras de Datos Lineales. ¡rboles..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=732'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/596">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1117.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Aparicio Izurieta  Viviana Vanessa</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802771535.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1117 </span>
</div>
<div  id="Digitales-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Digitales </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="AparicioIzurietaVivianaVanessa-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Aparicio Izurieta  Viviana Vanessa </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>viviana.aparicio@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniera en Sistemas Administrativos Computarizados </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN INFORMATICA EMPRESARIAL </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Fundamentos de sistemas digitales. Mapa
de karnaugh, circuitos combinacionales.
Circuitos secuenciales.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende los conceptos b·scos
que engloban los sistemas
inform·ticos, su historia y el
manejo.- Aprende los
sistemas digitales en general,
sistemas de numeraciÛn,
algebra booleana,
compuertas lÛgicas y como
manejar un protoboard.-
Desarrolla problemas con
mapas de karnaugh y circuitos
combinacionales.-
Desarrollar problemas con
circuitos secuenciales. Conoce
que es y la importancia de los
PLCS.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:red">TERMINADO.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=596'" disabled >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/712">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1117.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Aparicio Izurieta  Viviana Vanessa</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802771535.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1117 </span>
</div>
<div  id="Digitales-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Digitales </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="AparicioIzurietaVivianaVanessa-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Aparicio Izurieta  Viviana Vanessa </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>viviana.aparicio@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniera en Sistemas Administrativos Computarizados </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN INFORMATICA EMPRESARIAL </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Fundamentos de sistemas digitales. Mapa
de karnaugh, circuitos combinacionales.
Circuitos secuenciales.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende los conceptos b·scos
que engloban los sistemas
inform·ticos, su historia y el
manejo.- Aprende los
sistemas digitales en general,
sistemas de numeraciÛn,
algebra booleana,
compuertas lÛgicas y como
manejar un protoboard.-
Desarrolla problemas con
mapas de karnaugh y circuitos
combinacionales.-
Desarrollar problemas con
circuitos secuenciales. Conoce
que es y la importancia de los
PLCS.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:red">TERMINADO.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=712'" disabled >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/727">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1116.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Quiñonez Quintero  Jhonny Maximiliano</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801901695.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1116 </span>
</div>
<div  id="ProbabilidadyEstadística-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Probabilidad y Estadística </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="QuiñonezQuinteroJhonnyMaximiliano-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Quiñonez Quintero  Jhonny Maximiliano </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>sin@correo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero de sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en seguridad telematica </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a la TeorÌa de las Probabilidades. EstadÌstica descriptiva. Introducción a la teorÌa de Muestreo (Aleatorio Simple y Estratificado) y estimación puntual y por intervalos. Pruebas de
hipÛtesis paramÈtricas para una y dos poblaciones. An·lisis de
CorrelaciÛn y Regresión. Regresión lineal Simple..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Comprende el concepto de probabilidad.- Conoce sus
propiedades.- Aplica los teoremas fundamentales del
c·lculo de probabilidades.- Comprender los conceptos de
variable aleatoria y distribuciÛn de probabilidad asociada.-
Calcula probabilidades y momentos de variables
aleatorias discretas.- Aplica los modelos binomial,
geomÈtrica y de Poisson. Calcula probabilidades y
momentos de variables aleatorias continuas. Conocer
y aplicar los modelos uniforme, normal y exponencial.-
Comprende los conceptos de variable aleatoria
multidimensional y distribuciÛn de probabilidad
asociada.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=727'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/728">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1116.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Quiñonez Quintero  Jhonny Maximiliano</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801901695.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1116 </span>
</div>
<div  id="ProbabilidadyEstadística-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Probabilidad y Estadística </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="QuiñonezQuinteroJhonnyMaximiliano-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Quiñonez Quintero  Jhonny Maximiliano </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>sin@correo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero de sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en seguridad telematica </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a la TeorÌa de las Probabilidades. EstadÌstica descriptiva. Introducción a la teorÌa de Muestreo (Aleatorio Simple y Estratificado) y estimación puntual y por intervalos. Pruebas de
hipÛtesis paramÈtricas para una y dos poblaciones. An·lisis de
CorrelaciÛn y Regresión. Regresión lineal Simple..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Comprende el concepto de probabilidad.- Conoce sus
propiedades.- Aplica los teoremas fundamentales del
c·lculo de probabilidades.- Comprender los conceptos de
variable aleatoria y distribuciÛn de probabilidad asociada.-
Calcula probabilidades y momentos de variables
aleatorias discretas.- Aplica los modelos binomial,
geomÈtrica y de Poisson. Calcula probabilidades y
momentos de variables aleatorias continuas. Conocer
y aplicar los modelos uniforme, normal y exponencial.-
Comprende los conceptos de variable aleatoria
multidimensional y distribuciÛn de probabilidad
asociada.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=728'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/729">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITIC1218.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Quiñonez Quintero  Jhonny Maximiliano</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801901695.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F5A9"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITIC1218 </span>
</div>
<div  id="ProgramaciónII-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación II </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Tercero </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="QuiñonezQuinteroJhonnyMaximiliano-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Quiñonez Quintero  Jhonny Maximiliano </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>sin@correo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero de sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en seguridad telematica </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción al Análisis de Algoritmos. Estructuras de Datos
Lineales. arboles..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aplica relaciones de herencia en el diseño de aplicaciones.-
Utiliza colecciones para la representaciÛn de estructuras
de datos.- Aplica la serializaciÛn de objetos en
java.- Utiliza las Estructuras de Datos Lineales. ¡rboles..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=729'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        </div></div></div></div><br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Cuarto.
    <div class="contenido">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"><div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/706">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2122.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Sanchez Rodriguez   Alma Delia</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801875196.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F4F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2122 </span>
</div>
<div  id="SistemasOperativos-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Sistemas Operativos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Cuarto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="SanchezRodriguezAlmaDelia-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Sanchez Rodriguez   Alma Delia </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>alma.sanchez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN COMPUTACION E INFORMATICA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN INFORMATICA EMPRESARIAL </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Arquitectura y gestión de procesos. Gestión de memoria.
Gestión de la entrada/salida.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Reconoce los procesos y sus diferentes estados y operaciones.- Comprende sobre la correcta administración de la memoria.-
Reconoce a los diferentes dispositivos de entrada y salida.- Aprende sobre el manejo de archivos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=706'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/793">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2121.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cifuentes del Castillo  Luis Henry</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F4F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2121 </span>
</div>
<div  id="CálculoIntegral-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Cálculo Integral </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Cuarto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CifuentesdelCastilloLuisHenry-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cifuentes del Castillo  Luis Henry </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>luisci_60@hotmail.com </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN PLANIFICACION Y DIRECCION ESTRATEGICA	 </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Derivadas de funciones transcendentes. Aplicaciones a la derivada. La antiderivada. MÈtodos de integraciÛn. La integral definida. Aplicaciones de la integral.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Calcula la derivada de las
siguientes funciones.- Aplica
la antiderivada para ejercicios
propuestos.- Aplica el c·lculo
integral dando soluciÛn a
problemas muy diversos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=793'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/794">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2121.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cifuentes del Castillo  Luis Henry</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F4F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2121 </span>
</div>
<div  id="CálculoIntegral-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Cálculo Integral </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Cuarto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CifuentesdelCastilloLuisHenry-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cifuentes del Castillo  Luis Henry </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>luisci_60@hotmail.com </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN PLANIFICACION Y DIRECCION ESTRATEGICA	 </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Derivadas de funciones transcendentes. Aplicaciones a la derivada. La antiderivada. MÈtodos de integraciÛn. La integral definida. Aplicaciones de la integral.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Calcula la derivada de las
siguientes funciones.- Aplica
la antiderivada para ejercicios
propuestos.- Aplica el c·lculo
integral dando soluciÛn a
problemas muy diversos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=794'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/714">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2225.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Mina Quiñonez  Teresa Isabel</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801901075.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F4F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2225 </span>
</div>
<div  id="ProgramaciónIII-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación III </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Cuarto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MinaQuiñonezTeresaIsabel-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Mina Quiñonez  Teresa Isabel </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>teresa.mina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN SISTEMAS INFORMATICOS Y DE COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAESTRIA EN DIRECCION ESTRATEGICA ESPECIALIDAD EN TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Grafos. Colas de prioridades. Ordenación
y búsqueda. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce la teorÌa de Grafos.- Aplica los algoritmos de
búsqueda.- Aplica los algoritmos de Ordenación..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=714'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/715">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2225.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Mina Quiñonez  Teresa Isabel</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801901075.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F4F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2225 </span>
</div>
<div  id="ProgramaciónIII-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación III </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Cuarto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MinaQuiñonezTeresaIsabel-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Mina Quiñonez  Teresa Isabel </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>teresa.mina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN SISTEMAS INFORMATICOS Y DE COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAESTRIA EN DIRECCION ESTRATEGICA ESPECIALIDAD EN TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Grafos. Colas de prioridades. Ordenación
y búsqueda. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce la teorÌa de Grafos.- Aplica los algoritmos de
búsqueda.- Aplica los algoritmos de Ordenación..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=715'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/754">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2224.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Jurado Calero   Romulo Sandino </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802797811.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F4F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2224 </span>
</div>
<div  id="BasedeDatosI-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Base de Datos I </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Cuarto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="JuradoCaleroRomuloSandino-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Jurado Calero   Romulo Sandino  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>romulo.jurado.calero@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en Sistemas Informáticos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en Tecnologías de la Información </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a la base de datos.
Sistema gestor de base de datos.
Modelo entidad relación. Modelo
relacional. Introducción SQL ,DDL.
Seguridad base de datos..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Diseña Bases de Datos Relacionales.-
Implementa Bases de Dato.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">09:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=754'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/755">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2123.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Jurado Calero   Romulo Sandino </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802797811.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F4F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2123 </span>
</div>
<div  id="MétodosNuméricos-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Métodos Numéricos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Cuarto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="JuradoCaleroRomuloSandino-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Jurado Calero   Romulo Sandino  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>romulo.jurado.calero@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en Sistemas Informáticos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en Tecnologías de la Información </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción al método numérico y teorÌa de errores. Ecuaciones de un variable. Solución de sistemas de ecuaciones lineales.
Interpolación, derivación, e integración numérica. Solución
numérica de ecuaciones en derivadas parciales.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Identifica los errores absolutos y relativos, además con cuantas cifras significativas se puede realizar mejor un problema.-
Resuelve ecuaciones de una variable que en niveles anteriores eran difÌciles con cualquiera de los mÈtodos numÈricos que nos permiten
llegar a la soluciÛn.- Resuelve
sistemas de ecuaciones
lineales que en niveles
anteriores complejas.-
Resuelve integraciÛn,
interpolaciÛn y diferenciaciÛn
utilizando mÈtodos
numÈricos.- Soluciona la
ecuaciÛn de calor y de ondas
mediante derivadas
parciales.- Modela, simula
procesos y sistemas de
ingenierÌa..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=755'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/756">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2123.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Jurado Calero   Romulo Sandino </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802797811.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F4F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2123 </span>
</div>
<div  id="MétodosNuméricos-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Métodos Numéricos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Cuarto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="JuradoCaleroRomuloSandino-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Jurado Calero   Romulo Sandino  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>romulo.jurado.calero@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en Sistemas Informáticos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en Tecnologías de la Información </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción al método numérico y teorÌa de errores. Ecuaciones de un variable. Solución de sistemas de ecuaciones lineales.
Interpolación, derivación, e integración numérica. Solución
numérica de ecuaciones en derivadas parciales.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Identifica los errores absolutos y relativos, además con cuantas cifras significativas se puede realizar mejor un problema.-
Resuelve ecuaciones de una variable que en niveles anteriores eran difÌciles con cualquiera de los mÈtodos numÈricos que nos permiten
llegar a la soluciÛn.- Resuelve
sistemas de ecuaciones
lineales que en niveles
anteriores complejas.-
Resuelve integraciÛn,
interpolaciÛn y diferenciaciÛn
utilizando mÈtodos
numÈricos.- Soluciona la
ecuaciÛn de calor y de ondas
mediante derivadas
parciales.- Modela, simula
procesos y sistemas de
ingenierÌa..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=756'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/733">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2224.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Macias Lara  Richard Alejandro</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0803487453.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#A9F4F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2224 </span>
</div>
<div  id="BasedeDatosI-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Base de Datos I </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Cuarto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MaciasLaraRichardAlejandro-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Macias Lara  Richard Alejandro </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>alejandro.macias@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a la base de datos.
Sistema gestor de base de datos.
Modelo entidad relación. Modelo
relacional. Introducción SQL ,DDL.
Seguridad base de datos..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Diseña Bases de Datos Relacionales.-
Implementa Bases de Dato.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">07:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">11:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=733'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        </div></div></div></div><br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Quinto.
    <div class="contenido">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"><div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/689">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI054872.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cedeño Rodriguez  Guillermo Augusto</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802010959.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI054872 </span>
</div>
<div  id="Teleinformática-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Teleinformática </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CedeñoRodriguezGuillermoAugusto-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cedeño Rodriguez  Guillermo Augusto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>guillermo.cedeno@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN SISTEMAS INTELIGENTES Y APLICACIONES NUMERICAS EN INGENIERIA </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción la capa de Red de la arquitectura
TCP-IP. Introducción a los protocolos de aplicación..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce las cunciones y algoritmos usados en la capa
de Red de la arquitectura TCP-IP. RA2: Conoce los
protocolos de aplicación presentes en los modelos
TCP/IP y OSI.- Realiza simulaciones de las capa de
red y la capa de aplicaciÛn.- Realiza capturas de tramas.-
Analiza las tramas y los protocolos presentes en cada
una de las capturas..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=689'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/716">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0589373.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Mina Quiñonez  Teresa Isabel</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801901075.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0589373 </span>
</div>
<div  id="ProgramaciónIV-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación IV </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MinaQuiñonezTeresaIsabel-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Mina Quiñonez  Teresa Isabel </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>teresa.mina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN SISTEMAS INFORMATICOS Y DE COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAESTRIA EN DIRECCION ESTRATEGICA ESPECIALIDAD EN TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a las técnicas de compilación. Laboratorio de
compilación. Analisis y diseño de algoritmos..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce el concepto de
compliladores.- Diseña
compiladores.-Utiliza algoritmos para la solución de
problemas..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">17:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=716'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/717">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0589373.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Mina Quiñonez  Teresa Isabel</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801901075.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0589373 </span>
</div>
<div  id="ProgramaciónIV-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación IV </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MinaQuiñonezTeresaIsabel-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Mina Quiñonez  Teresa Isabel </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>teresa.mina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN SISTEMAS INFORMATICOS Y DE COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAESTRIA EN DIRECCION ESTRATEGICA ESPECIALIDAD EN TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a las técnicas de compilación. Laboratorio de
compilación. Analisis y diseño de algoritmos..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce el concepto de
compliladores.- Diseña
compiladores.-Utiliza algoritmos para la solución de
problemas..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">18:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=717'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/735">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0593837.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Macias Lara  Richard Alejandro</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0803487453.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0593837 </span>
</div>
<div  id="BasededatosII-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Base de datos II </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MaciasLaraRichardAlejandro-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Macias Lara  Richard Alejandro </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>alejandro.macias@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Implementación y optimización de Bases de Datos. Temas Avanzados de Bases de Datos..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Optimiza Bases de Datos.- Sincrononiza Bases de Datos.-
DiseÒa Bases de Datos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Miercoles: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">15:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=735'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/736">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0593837.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Macias Lara  Richard Alejandro</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0803487453.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0593837 </span>
</div>
<div  id="BasededatosII-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Base de datos II </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MaciasLaraRichardAlejandro-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Macias Lara  Richard Alejandro </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>alejandro.macias@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Implementación y optimización de Bases de Datos. Temas Avanzados de Bases de Datos..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Optimiza Bases de Datos.- Sincrononiza Bases de Datos.-
DiseÒa Bases de Datos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">16:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=736'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/796">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI05983.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Sanchez Rodriguez   Diana Carolina</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI05983 </span>
</div>
<div  id="Auditoríainformática-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Auditoría informática </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="SanchezRodriguezDianaCarolina-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Sanchez Rodriguez   Diana Carolina </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>carolina_sanc23@hotmail.com </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Conceptos generales de la auditorÌa inform·tica.
Planificación y coordinación de la revisiÛn tecnológica.
AuditorÌa de sistemas. Procesos principales por dominio.
Comunicación de resultado de la evaluación tecnológica.
Seguimiento de auditorÌas anteriores.
Software ACL.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce los conceptos básicos y la clasificaciÛn de la
auditorÌa informática.- Describe el proceso AuditorÌa
Inform·tica.- Ejemplifica el plan de auditorÌa de
sistemas.- Elabora informe para sustentar los hallazgos
de la auditorÌa de sistemas haciendo constar los
atributos.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=796'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/726">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI059383.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Quiñonez Quintero  Jhonny Maximiliano</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801901695.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI059383 </span>
</div>
<div  id="IngenieriadesoftwareI-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Ingenieria de software I </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="QuiñonezQuinteroJhonnyMaximiliano-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Quiñonez Quintero  Jhonny Maximiliano </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>sin@correo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero de sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en seguridad telematica </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>El software y la ingeniería del software. Gestión de proyectos de software. Análisis de requisitos del
sistema y del software.
Dimensionamiento de software..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Comprende el concepto de proceso de
software.
Realiza la Ingeniería de Requisitos.-
Planifica el desarrollo de un software.-
Realiza el análisis y el modelado de un
proceso de desarrollo de software. .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=726'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/699">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI05983.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Argandoña Moreira   Jose Gilberto</span><img src="https://repositorioutlvte.org/Repositorio/fotos/1313537142.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI05983 </span>
</div>
<div  id="Auditoríainformática-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Auditoría informática </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ArgandoñaMoreiraJoseGilberto-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Argandoña Moreira   Jose Gilberto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jose.argandona@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN AUDITORIA DE TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Conceptos generales de la auditorÌa inform·tica.
Planificación y coordinación de la revisiÛn tecnológica.
AuditorÌa de sistemas. Procesos principales por dominio.
Comunicación de resultado de la evaluación tecnológica.
Seguimiento de auditorÌas anteriores.
Software ACL.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce los conceptos básicos y la clasificaciÛn de la
auditorÌa informática.- Describe el proceso AuditorÌa
Inform·tica.- Ejemplifica el plan de auditorÌa de
sistemas.- Elabora informe para sustentar los hallazgos
de la auditorÌa de sistemas haciendo constar los
atributos.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=699'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/702">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI054872.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Argandoña Moreira   Jose Gilberto</span><img src="https://repositorioutlvte.org/Repositorio/fotos/1313537142.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI054872 </span>
</div>
<div  id="Teleinformática-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Teleinformática </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ArgandoñaMoreiraJoseGilberto-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Argandoña Moreira   Jose Gilberto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jose.argandona@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN AUDITORIA DE TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción la capa de Red de la arquitectura
TCP-IP. Introducción a los protocolos de aplicación..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce las cunciones y algoritmos usados en la capa
de Red de la arquitectura TCP-IP. RA2: Conoce los
protocolos de aplicación presentes en los modelos
TCP/IP y OSI.- Realiza simulaciones de las capa de
red y la capa de aplicaciÛn.- Realiza capturas de tramas.-
Analiza las tramas y los protocolos presentes en cada
una de las capturas..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Miercoles: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=702'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/685">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0513837.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Subiaga Delgado  Rosa Isabel</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#CFCEF7"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0513837 </span>
</div>
<div  id="Investigaciónoperativa-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Investigación operativa </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Quinto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="SubiagaDelgadoRosaIsabel-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Subiaga Delgado  Rosa Isabel </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>rosasubiaga@hotmail.com </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Enfoque sistematico para las empresas. Herramientas para la
toma de decisiones Sistemas o modelos de lÌneas de espera.
Sistemas o modelos de inventarios. Métodos para la planificaciÛn de red. Programación en manufacturas.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>naliza el enfoque
sistem·tico para las
empresas.- Aprende las
herramientas para la toma de
deciciones.- Conoce los
sistemas o modelos de lÌneas
de espera.- Comprende los
sistemas o modelos de
inventarios.- Analiza los
mÈtodos para la planificaciÛn
de red y las programaciÛn en
manufacturas.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">13:09:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=685'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        </div></div></div></div><br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Sexto.
    <div class="contenido">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"><div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/737">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0619272.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Ramirez Marquez   Jimmy Fernando </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801504705.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0619272 </span>
</div>
<div  id="IngenieríadelsoftwareII-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Ingeniería del software II </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RamirezMarquezJimmyFernando-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Ramirez Marquez   Jimmy Fernando  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jimmy.ramirez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN SEGURIDAD TELEMATICA	 </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Arquitectura y diseño de software. Verificación y
validación de software. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Realiza la arquitectura y el diseÒo de software.-
Realiza la verificación y la validación de un software
implementado..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=737'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/738">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0619272.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Ramirez Marquez   Jimmy Fernando </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801504705.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0619272 </span>
</div>
<div  id="IngenieríadelsoftwareII-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Ingeniería del software II </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RamirezMarquezJimmyFernando-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Ramirez Marquez   Jimmy Fernando  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jimmy.ramirez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN SEGURIDAD TELEMATICA	 </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Arquitectura y diseño de software. Verificación y
validación de software. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Realiza la arquitectura y el diseÒo de software.-
Realiza la verificación y la validación de un software
implementado..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=738'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/774">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/TIC068.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Renteria Macias  Henrry Javier</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802276725.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>TIC068 </span>
</div>
<div  id="ProyectoEmpresarial-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Proyecto Empresarial </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RenteriaMaciasHenrryJavier-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Renteria Macias  Henrry Javier </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>henry.renteria@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN GESTION AMBIENTAL </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Aspectos organizacionales e impacto del proyecto.
ElaboraciÛn y an·lisis de los principales estados
financieros. valuación financiera para la factibilidad de un
proyecto de inversión. Análisis de riesgo..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Identifica los aspectos organizacionales e impacto de
proyectos.- Elabora estados financieros.- Analiza estados
financieros.- Evalua la factibilidad de un proyecto de
inversión..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=774'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/703">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI069272.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Estupiñan Ortiz  Basterly</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801908781.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI069272 </span>
</div>
<div  id="Elementosdelhardware-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Elementos del hardware </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="EstupiñanOrtizBasterly-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Estupiñan Ortiz  Basterly </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>baster.estupinan@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAESTRIA EN EDUCACION DIGITAL E-LEARNING Y REDES SOCIALES </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Circuitos Lógicos. Componentes de
hardware que integran una computadora..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce todo lo relacionado a circuitos lÛgicos.- Aprende
todos los elementos que integran la computadora.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">16:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=703'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/704">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI069272.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Estupiñan Ortiz  Basterly</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801908781.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI069272 </span>
</div>
<div  id="Elementosdelhardware-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Elementos del hardware </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="EstupiñanOrtizBasterly-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Estupiñan Ortiz  Basterly </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>baster.estupinan@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAESTRIA EN EDUCACION DIGITAL E-LEARNING Y REDES SOCIALES </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Circuitos Lógicos. Componentes de
hardware que integran una computadora..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce todo lo relacionado a circuitos lÛgicos.- Aprende
todos los elementos que integran la computadora.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">14:00:00(180),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=704'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/696">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0634145.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cardenas Ruperti  Jonathan Patricio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802371567.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0634145 </span>
</div>
<div  id="ProgramaciónV-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación V </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CardenasRupertiJonathanPatricio-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cardenas Ruperti  Jonathan Patricio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jonathan.cardenas.ruperti@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN GERENCIA DE SISTEMAS Y TECNOLOGIAS DE INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Programación en el cliente. Programación
del lado del servidor. Temas avanzados..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce el origen de la programación y desarrollo
web.- Conoce las claves b·sicas para la realizaciÛn de
un sitio web.- Aprende el concepto del correcto uso de
los nodos de un sitio.- Identifica la gama de colores
a utilizar para un diseÒo web.-
Desarrolla destrezas en el diseÒo web mediante la
adquisiciÛn de conocimientos sobre el uso del javascript y
sus est·ndares.- Conoce la estructura b·sica de un
sistema WEB en ASP.Net.- Desarrolla destrezas en la
creaciÛn y diseÒo de p·ginas web con acceso a bases de
datos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">14:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=696'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/697">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0634145.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cardenas Ruperti  Jonathan Patricio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802371567.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0634145 </span>
</div>
<div  id="ProgramaciónV-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Programación V </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CardenasRupertiJonathanPatricio-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cardenas Ruperti  Jonathan Patricio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jonathan.cardenas.ruperti@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN GERENCIA DE SISTEMAS Y TECNOLOGIAS DE INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Programación en el cliente. Programación
del lado del servidor. Temas avanzados..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce el origen de la programación y desarrollo
web.- Conoce las claves b·sicas para la realizaciÛn de
un sitio web.- Aprende el concepto del correcto uso de
los nodos de un sitio.- Identifica la gama de colores
a utilizar para un diseÒo web.-
Desarrolla destrezas en el diseÒo web mediante la
adquisiciÛn de conocimientos sobre el uso del javascript y
sus est·ndares.- Conoce la estructura b·sica de un
sistema WEB en ASP.Net.- Desarrolla destrezas en la
creaciÛn y diseÒo de p·ginas web con acceso a bases de
datos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">16:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=697'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/718">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/TIC068.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Valdez Requene  Mizael</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0800678518.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>TIC068 </span>
</div>
<div  id="ProyectoEmpresarial-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Proyecto Empresarial </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ValdezRequeneMizael-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Valdez Requene  Mizael </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>sin@correo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Aspectos organizacionales e impacto del proyecto.
ElaboraciÛn y an·lisis de los principales estados
financieros. valuación financiera para la factibilidad de un
proyecto de inversión. Análisis de riesgo..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Identifica los aspectos organizacionales e impacto de
proyectos.- Elabora estados financieros.- Analiza estados
financieros.- Evalua la factibilidad de un proyecto de
inversión..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=718'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/708">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI069754.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Rojas Rosado  Junior Manfredo </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802119008.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI069754 </span>
</div>
<div  id="RedesI-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Redes I </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RojasRosadoJuniorManfredo-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Rojas Rosado  Junior Manfredo  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>junior.rojas.rosado@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN SEGURIDAD INFORMATICA </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Aspectos básicos de networking. Arquitectura
de redes. Cableado estructurado.
Protocolos de red. Seguridad en red..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende los aspectos básicos del Networking.- Aplica las
normas y estandares internacionales para el diseño
y arquitectura de una red.- Identifica los servicios claves
que debe soportar una red de datos.- Conoce los conceptos
b·sicos de la seguridad en las redes..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">17:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=708'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/709">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI069754.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Rojas Rosado  Junior Manfredo </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802119008.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI069754 </span>
</div>
<div  id="RedesI-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Redes I </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RojasRosadoJuniorManfredo-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Rojas Rosado  Junior Manfredo  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>junior.rojas.rosado@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN SEGURIDAD INFORMATICA </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Aspectos básicos de networking. Arquitectura
de redes. Cableado estructurado.
Protocolos de red. Seguridad en red..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende los aspectos básicos del Networking.- Aplica las
normas y estandares internacionales para el diseño
y arquitectura de una red.- Identifica los servicios claves
que debe soportar una red de datos.- Conoce los conceptos
b·sicos de la seguridad en las redes..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Miercoles: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">18:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=709'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/797">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI063737.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Sanchez Rodriguez   Diana Carolina</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI063737 </span>
</div>
<div  id="Emprendimientoeinnovación-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Emprendimiento e innovación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="SanchezRodriguezDianaCarolina-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Sanchez Rodriguez   Diana Carolina </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>carolina_sanc23@hotmail.com </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Habilidades de emprendimiento. Factores que motivan a
formar futuros emprendedores y las habilidades para la
creaciÛn de empresas viables y perdurables. La planificación estratÈgica de una empresa, la relaciÛn de la gestión de
las nuevas tecnologÌas en las empresas. Las herramientas para la gestiÛn de las estrategias empresariales. El proceso de innovaciÛn y la creatividad para el desarrollo de nuevas
ideas de negocios. El plan de negocios en su campo de estudio..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Desarrolla de las habilidades de emprendimiento.- Fomenta las habilidades para la creación de empresas viables y perdurables.- Realiza planificaciÛn estratÈgica de una empresa, la relaciÛn de la gestiÛn de las nuevas tecnologÌas en las empresas.- Conoce las herramientas para
la gestiÛn de las estrategias
empresariales.- Conoce sobre
proceso de innovaciÛn y la
creatividad para el desarrollo
de nuevas ideas de negocios.-
Realiza plan de negocios en
su campo de estudio..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=797'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/721">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI061465.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Quiñonez Rugina  Elidea</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801201765.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI061465 </span>
</div>
<div  id="ActividaEconómica-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Activida Económica </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="QuiñonezRuginaElidea-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Quiñonez Rugina  Elidea </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>rugina.quinonez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN ADMINISTRACION PUBLICA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN ADMINISTRACION DE EMPRESAS </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Comportamiento de las variables micro y macroeconÛmicas y sus
efectos sobre la toma de decisiones empresariales.
IdentificaciÛn de las fuerzas econÛmicas que rigen la actividad de las empresas y que condicionan su funcionamiento.
Factores que condicionan la situación econÛmica mundial
actual..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce el comportamiento de las variables micro y macroeconómicas y sus efectos sobre la toma de
decisiones empresariales.- Identifica los factores que
condicionan la situación econÛmica mundial actual..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=721'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/722">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI063737.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Quiñonez Rugina  Elidea</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801201765.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI063737 </span>
</div>
<div  id="Emprendimientoeinnovación-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Emprendimiento e innovación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="QuiñonezRuginaElidea-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Quiñonez Rugina  Elidea </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>rugina.quinonez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN ADMINISTRACION PUBLICA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN ADMINISTRACION DE EMPRESAS </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Habilidades de emprendimiento. Factores que motivan a
formar futuros emprendedores y las habilidades para la
creaciÛn de empresas viables y perdurables. La planificación estratÈgica de una empresa, la relaciÛn de la gestión de
las nuevas tecnologÌas en las empresas. Las herramientas para la gestiÛn de las estrategias empresariales. El proceso de innovaciÛn y la creatividad para el desarrollo de nuevas
ideas de negocios. El plan de negocios en su campo de estudio..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Desarrolla de las habilidades de emprendimiento.- Fomenta las habilidades para la creación de empresas viables y perdurables.- Realiza planificaciÛn estratÈgica de una empresa, la relaciÛn de la gestiÛn de las nuevas tecnologÌas en las empresas.- Conoce las herramientas para
la gestiÛn de las estrategias
empresariales.- Conoce sobre
proceso de innovaciÛn y la
creatividad para el desarrollo
de nuevas ideas de negocios.-
Realiza plan de negocios en
su campo de estudio..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=722'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/795">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI061465.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Suquitana Segura  Marcos Willian</span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#D1A9F4"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI061465 </span>
</div>
<div  id="ActividaEconómica-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Activida Económica </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Sexto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="SuquitanaSeguraMarcosWillian-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Suquitana Segura  Marcos Willian </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Comportamiento de las variables micro y macroeconÛmicas y sus
efectos sobre la toma de decisiones empresariales.
IdentificaciÛn de las fuerzas econÛmicas que rigen la actividad de las empresas y que condicionan su funcionamiento.
Factores que condicionan la situación econÛmica mundial
actual..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce el comportamiento de las variables micro y macroeconómicas y sus efectos sobre la toma de
decisiones empresariales.- Identifica los factores que
condicionan la situación econÛmica mundial actual..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=795'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        </div></div></div></div><br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Septimo.
    <div class="contenido">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"><div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/773">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI087649.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Renteria Macias  Henrry Javier</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802276725.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5A8F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI087649 </span>
</div>
<div  id="Gestiónempresarialyambiental-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Gestión empresarial y ambiental </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Septimo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RenteriaMaciasHenrryJavier-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Renteria Macias  Henrry Javier </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>henry.renteria@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN GESTION AMBIENTAL </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Contaminación producida por los desechos sÛlidos,
lÌquidos y gaseosos. Problemas de actualidad
y desastres ambientales. Principios de gestión
ambiental. Eco-eficiencia. La gestión realizada por la empresa
para el cuidado del medio ambiente..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Realiza el diagnÛstico
ambiental de la organizaciÛn
seg˙n la actividad econÛmica
de la organizaciÛn y la
normatividad vigente.-
Desarrolla procesos
comunicativos eficaces y
asertivos dentro de criterios
de racionalidad que
posibiliten la convivencia, el
establecimiento de acuerdos,
la construcciÛn colectiva del
conocimiento y la resoluciÛn
de problemas de car·cter
productivo y social.- Participa
en los contextos Productivos
y Sociales en funciÛn de los
Principios y Valores
Universales..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=773'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/757">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0709373.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Jurado Calero   Romulo Sandino </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802797811.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5A8F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0709373 </span>
</div>
<div  id="Prácticaspreprof.Vinculaciónconlasocieda-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Prácticas preprof. Vinculación con la socieda </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Septimo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="JuradoCaleroRomuloSandino-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Jurado Calero   Romulo Sandino  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>romulo.jurado.calero@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en Sistemas Informáticos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en Tecnologías de la Información </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Buenas pr·cticas de desarrollo de software en benefisio de la
comunidad.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>omprense sobre la
integraciÛn de los contenidos
presentes en los n˙cleos
b·sicos de la carrera para
resolver problemas reales..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=757'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/758">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0709373.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Jurado Calero   Romulo Sandino </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802797811.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5A8F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0709373 </span>
</div>
<div  id="Prácticaspreprof.Vinculaciónconlasocieda-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Prácticas preprof. Vinculación con la socieda </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Septimo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="JuradoCaleroRomuloSandino-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Jurado Calero   Romulo Sandino  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>romulo.jurado.calero@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en Sistemas Informáticos </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en Tecnologías de la Información </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Buenas pr·cticas de desarrollo de software en benefisio de la
comunidad.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>omprense sobre la
integraciÛn de los contenidos
presentes en los n˙cleos
b·sicos de la carrera para
resolver problemas reales..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=758'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/698">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0793830.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cardenas Ruperti  Jonathan Patricio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802371567.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5A8F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0793830 </span>
</div>
<div  id="Softcomputingparatomadedecisiones-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Soft computing para toma de decisiones </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Septimo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CardenasRupertiJonathanPatricio-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cardenas Ruperti  Jonathan Patricio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jonathan.cardenas.ruperti@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN GERENCIA DE SISTEMAS Y TECNOLOGIAS DE INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción al softcomputing y a la ComputaciÛn Granular.
TeorÌa de los conjuntos borrosos y sistemas de
inferencia borrosos. Aprendizaje. Computación con
palabras en la toma de decisiones. Sumarización linguÌstica de datos..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce los conceptos basicos del softcomputing y a la
ComputaciÛn Granular.- Aplica la teorÌa de conjuntos
borrosos y sistemas de inferencias borrosos.- Identifica los elementos necesarios para aplicar la computaciÛn con palabras.-
Conoce los conceptos b·sicos de SumarizaciÛn y linguÌstica
de datos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=698'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/707">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI079372.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Rojas Rosado  Junior Manfredo </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802119008.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5A8F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI079372 </span>
</div>
<div  id="Gráficasymultimedia-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Gráficas y multimedia </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Septimo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RojasRosadoJuniorManfredo-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Rojas Rosado  Junior Manfredo  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>junior.rojas.rosado@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN SEGURIDAD INFORMATICA </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Sincronización. Multimedia y los sistemas operativos.
Multimedia y redes de computadores.
Teleservicios.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce los conceptos de
streaming y la sincronizaciÛn
de audio y video, tambiÈn los
modelos referenciales para la
sincronizaciÛn multimedia.-
Comprende la calidad de
servicio, administraciÛn de
recursos, modelo de procesos
de llegada lineal, sistemas de
archivo multimedia y manejo
de buffer.- Fomenta sobre las
redes de comunicaciones
multimedia, esquemas de
reservaciÛn de ancho de
banda, manejo de control y
error de protocolos de
transporte multimedia.-
Aplica los servicios
conversacionales, las
soluciones de video
conferencia, servicios de
mensajerÌa multimedia y
servicios de recuperaciÛn de
video..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=707'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/800">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI089754.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Reina Tello   Marcelo Enrique </span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5A8F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI089754 </span>
</div>
<div  id="Liderazgoyhabilidadesgerenciales-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Liderazgo y habilidades gerenciales </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Septimo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ReinaTelloMarceloEnrique-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Reina Tello   Marcelo Enrique  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>marcelo.reina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>El Liderazgo y la Función Directiva. El LÌder y la ComunicaciÛn.
Liderazgo, Motivación y Creatividad..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Desrrolla las habilidades de liderazgo.- Desarrolla las
habilidades directivas.- Fomenta la motivaciÛn y la
creatividad.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=800'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/798">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0816373.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Reina Tello   Marcelo Enrique </span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5A8F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0816373 </span>
</div>
<div  id="Eticaprofesional-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Etica profesional </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Septimo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ReinaTelloMarceloEnrique-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Reina Tello   Marcelo Enrique  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>marcelo.reina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Etica como disciplina filosófica. El profesional y su ética. Etica, ciencia, tecnologÌa y responsabilidad. Principios Èticos y morales de la actividad profesional en Ecuador: retos y desafÌos.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Compara los sistemas Ètico-morales m·s representativos
y presentes en el contexto contempor·neo, a la luz de
una …tica civil dialÛgica.- Fundamenta los elementos
antropolÛgicos: dignidad humana, libertad con responsabilidad, conciencia moral Ìntegra, derechos humanos y valoraciÛn Ètica
de la conducta humana, dentro de un contexto de
formaciÛn de un sujeto moral autÛnomo.-
Identifica los desafÌos, categorÌas y principios Ètico
sociales, que configuran la dimensiÛn Ètica de las
profesiones, en el contexto
de relaciones e instituciones
justas locales e
internacionales.-
Resuelve dilemas y problemas
Èticos profesionales, teniendo
en cuenta: el objetivo de la
profesiÛn, sus principios de
gestiÛn Ètica profesional y los
cÛdigos de Ètica pertinentes..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=798'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/701">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITICI2243.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Argandoña Moreira   Jose Gilberto</span><img src="https://repositorioutlvte.org/Repositorio/fotos/1313537142.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#F5A8F3"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITICI2243 </span>
</div>
<div  id="RedesII-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Redes II </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Septimo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ArgandoñaMoreiraJoseGilberto-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Argandoña Moreira   Jose Gilberto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jose.argandona@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN AUDITORIA DE TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Tecnologías de Acceso al Medio. Internet. Control
de congestiÛn y asignación de recursos.
Diseño de redes. Administración de redes..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Logra el conocimiento de las redes de Networking y sus
componentes internos, de qué manera se realiza el
proceso de enviÛ de informaciÛn a través de la red.- Identifica las diferentes
tecnologÌas de acceso de
redes o al medio.- Conoce los
diferentes niveles de
enrutamiento, redes y
subredes que existen,
conocer el multicasting y su
funcionalidad.- Determina
cuando se cumple el proceso
de congestiÛn en la red y
cu·les son las formas de
evitarlo.- Conoce como
realizar un buen diseÒo de la
red teniendo como referencia
el tamaÒo de una red y el tipo
de aplicaciones que maneja
para su administraciÛn.-
Conoce como realizar un
buen diseÒo de la red
teniendo como referencia el
tamaÒo de una red y el tipo
de aplicaciones que maneja
para su administraciÛn.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">13:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=701'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        </div></div></div></div><br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Octavo.
    <div class="contenido">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"><div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/739">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI08625.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Ramirez Marquez   Jimmy Fernando </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801504705.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI08625 </span>
</div>
<div  id="SeguridadenSistemas-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Seguridad en Sistemas </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RamirezMarquezJimmyFernando-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Ramirez Marquez   Jimmy Fernando  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jimmy.ramirez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN SEGURIDAD TELEMATICA	 </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a la Seguridad en Sistemas. Fundamentos b·sicos de
la criptografÌa. Seguridad en el software. Sistema de GestiÛn de
Seguridad de la Información. Mecanismos de detección de intrusos.
Mecanismos de salvas y recuperación de datos. Plan de Contingencia. Copias de respaldo y recuperación de la información ante desastres. Instalación y configuración de herramientas de hacking
y an·lisis forense..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce los elementos
fundamentales de la
seguridad inform·tica.-
Conoce los mecanismos de
detecciÛn de intrusos.-
Analiza planes de
contingencia.- Conoce los
aspectos fundamentales del
hacking Ètico.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=739'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/740">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI08625.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Ramirez Marquez   Jimmy Fernando </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801504705.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI08625 </span>
</div>
<div  id="SeguridadenSistemas-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Seguridad en Sistemas </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RamirezMarquezJimmyFernando-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Ramirez Marquez   Jimmy Fernando  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jimmy.ramirez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN SEGURIDAD TELEMATICA	 </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción a la Seguridad en Sistemas. Fundamentos b·sicos de
la criptografÌa. Seguridad en el software. Sistema de GestiÛn de
Seguridad de la Información. Mecanismos de detección de intrusos.
Mecanismos de salvas y recuperación de datos. Plan de Contingencia. Copias de respaldo y recuperación de la información ante desastres. Instalación y configuración de herramientas de hacking
y an·lisis forense..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce los elementos
fundamentales de la
seguridad inform·tica.-
Conoce los mecanismos de
detecciÛn de intrusos.-
Analiza planes de
contingencia.- Conoce los
aspectos fundamentales del
hacking Ètico.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=740'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/686">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI08544.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cedeño Rodriguez  Guillermo Augusto</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802010959.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI08544 </span>
</div>
<div  id="InteligenciaartificialI-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Inteligencia artificial I </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CedeñoRodriguezGuillermoAugusto-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cedeño Rodriguez  Guillermo Augusto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>guillermo.cedeno@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN SISTEMAS INTELIGENTES Y APLICACIONES NUMERICAS EN INGENIERIA </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Elementos Fundamentales del PROLOG. MÈtodos de
solución de problemas..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Fundamentales de PROLOG.- Aplica métodos de solución
de problemas.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">15:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=686'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/687">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI08544.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cedeño Rodriguez  Guillermo Augusto</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802010959.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI08544 </span>
</div>
<div  id="InteligenciaartificialI-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Inteligencia artificial I </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CedeñoRodriguezGuillermoAugusto-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cedeño Rodriguez  Guillermo Augusto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>guillermo.cedeno@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN SISTEMAS INTELIGENTES Y APLICACIONES NUMERICAS EN INGENIERIA </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Elementos Fundamentales del PROLOG. MÈtodos de
solución de problemas..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Fundamentales de PROLOG.- Aplica métodos de solución
de problemas.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Martes: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">15:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=687'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/777">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0857144.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Hurtado Sotalin  Diego Mauricio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801633504.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0857144 </span>
</div>
<div  id="Legislacióninformática-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Legislación informática </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="HurtadoSotalinDiegoMauricio-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Hurtado Sotalin  Diego Mauricio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>diego.hurtado@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>ABOGADO DE LOS TRIBUNALES Y JUZGADOS DE LA REPUBLICA DEL ECUADOR </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN DOCENCIA Y DESARROLLO DEL CURRICULO </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>ProtecciÛn de licencias y software. Certificación
de información y servicios. Marco regulatorio de las
telecomunicaciones. Calidad del servicio..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce acerca de la proteccipon de licencias y
software.- Aprende la certificaciÛn de información y
servicios.- Conoce todo lo relacionado al marco
regulatorio de las telecomunicaciones.- Aprende la calidad de servicio.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=777'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/778">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0857144.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Hurtado Sotalin  Diego Mauricio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801633504.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0857144 </span>
</div>
<div  id="Legislacióninformática-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Legislación informática </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="HurtadoSotalinDiegoMauricio-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Hurtado Sotalin  Diego Mauricio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>diego.hurtado@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>ABOGADO DE LOS TRIBUNALES Y JUZGADOS DE LA REPUBLICA DEL ECUADOR </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN DOCENCIA Y DESARROLLO DEL CURRICULO </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>ProtecciÛn de licencias y software. Certificación
de información y servicios. Marco regulatorio de las
telecomunicaciones. Calidad del servicio..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce acerca de la proteccipon de licencias y
software.- Aprende la certificaciÛn de información y
servicios.- Conoce todo lo relacionado al marco
regulatorio de las telecomunicaciones.- Aprende la calidad de servicio.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=778'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/694">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI086362.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cardenas Ruperti  Jonathan Patricio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802371567.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI086362 </span>
</div>
<div  id="Gestióndelsoftware-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Gestión del software </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CardenasRupertiJonathanPatricio-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cardenas Ruperti  Jonathan Patricio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jonathan.cardenas.ruperti@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN GERENCIA DE SISTEMAS Y TECNOLOGIAS DE INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Arquitectura de negocio.
Arquitectura de Datos.
Arquitectura de
Aplicaciones y
TecnologÌa. Arquitectura
Empresarial. DiseÒo del
programa de
informatizaciÛn de la
Empresa. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce las arquitecturas de
negocio.- Conoce la
arquitecturas de Datos,
Aplicaciones y TecnologÌa.-
DiseÒa programas
inform·ticos.- Conoce las
metologÌas de gestiÛn de
software.- Aplica las
metodologÌas de gestiÛn de
software. .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Jueves: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">17:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=694'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/695">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI086362.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cardenas Ruperti  Jonathan Patricio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802371567.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI086362 </span>
</div>
<div  id="Gestióndelsoftware-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Gestión del software </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CardenasRupertiJonathanPatricio-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cardenas Ruperti  Jonathan Patricio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jonathan.cardenas.ruperti@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero en sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN GERENCIA DE SISTEMAS Y TECNOLOGIAS DE INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Arquitectura de negocio.
Arquitectura de Datos.
Arquitectura de
Aplicaciones y
TecnologÌa. Arquitectura
Empresarial. DiseÒo del
programa de
informatizaciÛn de la
Empresa. .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce las arquitecturas de
negocio.- Conoce la
arquitecturas de Datos,
Aplicaciones y TecnologÌa.-
DiseÒa programas
inform·ticos.- Conoce las
metologÌas de gestiÛn de
software.- Aplica las
metodologÌas de gestiÛn de
software. .</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Lunes: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">18:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=695'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/710">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI085643.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Rojas Rosado  Junior Manfredo </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802119008.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI085643 </span>
</div>
<div  id="Sistemasdeautomatización-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Sistemas de automatización </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RojasRosadoJuniorManfredo-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Rojas Rosado  Junior Manfredo  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>junior.rojas.rosado@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN SEGURIDAD INFORMATICA </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción de los PLC. Tipos de PLCS. Tipos de programación de PLCS. Actuadores y Sensores.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende sobre PLCS. -Conoce todos los tipos de PLCs.-
Comprende los tipos de programaciÛn de PLCS.-
Distingue la diferencia entre sensores y actuadores.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">18:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=710'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/711">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI085643.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Rojas Rosado  Junior Manfredo </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802119008.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI085643 </span>
</div>
<div  id="Sistemasdeautomatización-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Sistemas de automatización </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="RojasRosadoJuniorManfredo-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Rojas Rosado  Junior Manfredo  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>junior.rojas.rosado@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN SEGURIDAD INFORMATICA </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Introducción de los PLC. Tipos de PLCS. Tipos de programación de PLCS. Actuadores y Sensores.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aprende sobre PLCS. -Conoce todos los tipos de PLCs.-
Comprende los tipos de programaciÛn de PLCS.-
Distingue la diferencia entre sensores y actuadores.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">15:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=711'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/725">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI086262.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Quiñonez Quintero  Jhonny Maximiliano</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801901695.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI086262 </span>
</div>
<div  id="Administracióncentrodecómputo-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Administración centro de cómputo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="QuiñonezQuinteroJhonnyMaximiliano-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Quiñonez Quintero  Jhonny Maximiliano </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>sin@correo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>Ingeniero de sistemas y computación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>Magister en seguridad telematica </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Fundamentos de administración. El centro de computo. Aspectos
legales y fomento a la cultura empresarial .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce los fundamentos de administración- Identifica los
requerimientos para la administración de un centro
de cómputo. - Elabora plan de polÌticas para la
administración de un centro de cómputo..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=725'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/723">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI08644.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Quiñonez Rugina  Elidea</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801201765.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI08644 </span>
</div>
<div  id="Planificaciónestratégica-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Planificación estratégica </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="QuiñonezRuginaElidea-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Quiñonez Rugina  Elidea </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>rugina.quinonez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN ADMINISTRACION PUBLICA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN ADMINISTRACION DE EMPRESAS </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>laneamiento Estratégico. Concepto de
Prospectiva Misión. Visión, Análisis del
Entorno ( PEST) Analisis de la industria, el cuadro
F. O. D. A..El análisis  FODA cuantitativo, Otras
herramientas de PlaneaciÛn . Objetivos,
Estrategias. Tipos de Estrategias Organización
de la Empresa para el logro de los objetivos.
Planes de Acción y Presupuestos .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Desarrolla las habilidades de planeamiento.- Conoce el
concepto de prospective.- Realiza el an·lisis del entorno
empresarial. Aplica el mÈtodo FODA.- Identifica los tipos de
organizaciÛn de empresas.- Desarrolla planes de accÛn y
presupuestos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=723'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/799">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0816342.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Reina Tello   Marcelo Enrique </span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0816342 </span>
</div>
<div  id="Gestiónderiesgo-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Gestión de riesgo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ReinaTelloMarceloEnrique-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Reina Tello   Marcelo Enrique  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>marcelo.reina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Conceptos generales para la gestión de riesgos, planeación de
los riesgos e identificación de los riesgos. Análisis de Riesgos. Planeación de la respuesta a los riesgos, control y seguimiento.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce los conceptos generales para la gestiÛn de
riesgos.- Identifica los riesgos y realizar una planeaciÛn para
mitigarlos.- Realiza el an·lisis de Riesgos, la planeaciÛn de la respuesta a los riesgos, control y seguimiento.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=799'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/801">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI08644.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Reina Tello   Marcelo Enrique </span><img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI08644 </span>
</div>
<div  id="Planificaciónestratégica-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Planificación estratégica </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ReinaTelloMarceloEnrique-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Reina Tello   Marcelo Enrique  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>marcelo.reina@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>laneamiento Estratégico. Concepto de
Prospectiva Misión. Visión, Análisis del
Entorno ( PEST) Analisis de la industria, el cuadro
F. O. D. A..El análisis  FODA cuantitativo, Otras
herramientas de PlaneaciÛn . Objetivos,
Estrategias. Tipos de Estrategias Organización
de la Empresa para el logro de los objetivos.
Planes de Acción y Presupuestos .</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Desarrolla las habilidades de planeamiento.- Conoce el
concepto de prospective.- Realiza el an·lisis del entorno
empresarial. Aplica el mÈtodo FODA.- Identifica los tipos de
organizaciÛn de empresas.- Desarrolla planes de accÛn y
presupuestos..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=801'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/802">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI0816342.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Mera Mosquera   Alvez Romel</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801720012.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#80DBF5"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI0816342 </span>
</div>
<div  id="Gestiónderiesgo-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Gestión de riesgo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Octavo </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>B </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MeraMosqueraAlvezRomel-B"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Mera Mosquera   Alvez Romel </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Conceptos generales para la gestión de riesgos, planeación de
los riesgos e identificación de los riesgos. Análisis de Riesgos. Planeación de la respuesta a los riesgos, control y seguimiento.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Conoce los conceptos generales para la gestiÛn de
riesgos.- Identifica los riesgos y realizar una planeaciÛn para
mitigarlos.- Realiza el an·lisis de Riesgos, la planeaciÛn de la respuesta a los riesgos, control y seguimiento.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=802'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        </div></div></div></div><br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Noveno.
    <div class="contenido">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"><div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/688">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI09655.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Cedeño Rodriguez  Guillermo Augusto</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0802010959.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#9BFE2F"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI09655 </span>
</div>
<div  id="InteligenciaArtificialII-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Inteligencia Artificial II </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Noveno </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="CedeñoRodriguezGuillermoAugusto-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Cedeño Rodriguez  Guillermo Augusto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>guillermo.cedeno@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO DE SISTEMAS Y COMPUTACION </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MASTER UNIVERSITARIO EN SISTEMAS INTELIGENTES Y APLICACIONES NUMERICAS EN INGENIERIA </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Sistemas Basados en el Conocimiento.
Aprendizaje Automático..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aplica las técnicas de expertos.- Implementa
sistemas con aprendizaje autónomo..</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Martes: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Miercoles: </b><span style="color:red">13:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">14:00:00(60),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=688'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/779">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI097362.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Hurtado Sotalin  Diego Mauricio</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801633504.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#9BFE2F"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI097362 </span>
</div>
<div  id="Trab.Integ.Curric.Investigación-C"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Trab. Integ. Curric. Investigación </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Noveno </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>C </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="HurtadoSotalinDiegoMauricio-C"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Hurtado Sotalin  Diego Mauricio </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>diego.hurtado@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>ABOGADO DE LOS TRIBUNALES Y JUZGADOS DE LA REPUBLICA DEL ECUADOR </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN DOCENCIA Y DESARROLLO DEL CURRICULO </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=779'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/788">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI094732.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Montaño Estacio  Nelson Eli </span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801663725.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#9BFE2F"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI094732 </span>
</div>
<div  id="Trab.Integ.Curric.Estadística-C"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Trab. Integ. Curric. Estadística </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Noveno </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>C </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="MontañoEstacioNelsonEli-C"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Montaño Estacio  Nelson Eli  </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span> </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span> </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=788'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/724">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI09654.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Quiñonez Rugina  Elidea</span><img src="https://repositorioutlvte.org/Repositorio/fotos/0801201765.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#9BFE2F"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI09654 </span>
</div>
<div  id="Trab.Integ.Curric.Etica-C"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Trab. Integ. Curric. Etica </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Noveno </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>C </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="QuiñonezRuginaElidea-C"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Quiñonez Rugina  Elidea </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>rugina.quinonez@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERA EN ADMINISTRACION PUBLICA </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN ADMINISTRACION DE EMPRESAS </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>.</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=724'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        <div class="col">
          <div class="card shadow-sm">
          <a href="5.161.176.197/sica/index.php/sica/evento/detalle/700">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/><image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/ITI093736.jpg" alt="Revisar la programación"  height="100%" width="100%"/> </svg></a><div class="profile-container" style="position:absolute; top:10px; right:10px; display:flex; flex-direction:column; align-items:flex-end;"><span style="font-size:18px; color:#ffffff; font-weight:bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">Argandoña Moreira   Jose Gilberto</span><img src="https://repositorioutlvte.org/Repositorio/fotos/1313537142.jpg" width="100px" height="100px" style="border: 2px solid green; border-radius: 50%;"></div>
	    <div class="card-body" style="background-color:#9BFE2F"  >
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">código:</span>
    <span>ITI093736 </span>
</div>
<div  id="PrácticasPreprofesionales-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Asignatura:</span>
    <span>Prácticas Preprofesionales </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Nivel:</span>
    <span>Noveno </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Paralelo:</span>
    <span>A </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red; margin-right: 5px; width: 100px; display: inline-block;">Área:</span>
    <span>T.I.C. </span>
</div>

<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Docente-Instructor.
<div class="contenidoinfo">
 
<div  id="ArgandoñaMoreiraJoseGilberto-A"   style="display: flex; align-items: flex-start;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Instructor:</span>
    <span>Argandoña Moreira   Jose Gilberto </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">correo:</span>
    <span>jose.argandona@utelvt.edu.ec </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">pregrado:</span>
    <span>INGENIERO EN SISTEMAS INFORMATICOS </span>
</div>
<div style="display: flex; align-items: center;  font-weight: bold; color: #333; margin-top: 10px;">
    <span style="color:red;  margin-right: 5px;">Maestría:</span>
    <span>MAGISTER EN AUDITORIA DE TECNOLOGIAS DE LA INFORMACION </span>
</div>
</div>



<br><button class="toggle-btn" onclick="toggleContenido(this)">+</button>Contenidos mínimos.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Contenidos minimos</h2>
      <p>Actividad Pr·ctica sobre desarrollo de software..</p>
    </div>
  </div>
<br>
<button class="toggle-btn" onclick="toggleContenido(this)">+</button>Resultados de aprendizaje.
<div class="contenidoinfo">
    <div class="texto-transversal">
      <h2>Resultado de aprendizaje</h2>
      <p>Aplica los conceptos básicos de integración y despliegue
de sistemas.- Evalua el performance de las aplicaciones desplegadas.</p>
    </div>
  </div><br><br><p><br><p></p> <p><b>Inicia : </b><span style="color:red">2022-08-08.</span><br>
	      <b>Finaliza : </b><span style="color:red">2022-11-08.</span></p><b>Miercoles: </b><span style="color:red">15:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Jueves: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><b>Viernes: </b><span style="color:red">17:00:00(120),</span> - aula:<a href="https://repositorioutlvte.org/Repositorio/aulas/aula1.jpg"> <i class="fas fa-map-marker-alt" style="font-size:24px" ></i> EDIF-1-01</a><br><br> <p><b>ESTADO : </b><span style="color:green">INSCRIPCION.</span></p><div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login/validarcorreo?idevento=700'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://5.161.176.197/sica/index.php/login'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
              </div>
              </div>
              </div>

        </div>

<div id="fsaludo" style="border-top: 2px solid green; background-color:white;   width: 100%; margin:0px auto; display: flex; flex-direction:column ; ">
<div   style="margin-left:10px; margin-top:10px;  padding: 10px; height: 100%;">
<div style="float:left; width: 100%; font-size: 0.5wv;padding:0%">

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="bootstrap" viewBox="0 0 118 94">
    <title>Bootstrap</title>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  </symbol>
  <symbol id="home" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
  </symbol>
  <symbol id="speedometer2" viewBox="0 0 16 16">
    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
    <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
  </symbol>
  <symbol id="table" viewBox="0 0 16 16">
    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
  </symbol>
  <symbol id="people-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
  <symbol id="grid" viewBox="0 0 16 16">
    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
  </symbol>
  <symbol id="collection" viewBox="0 0 16 16">
    <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
  </symbol>
  <symbol id="calendar3" viewBox="0 0 16 16">
    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
  </symbol>
  <symbol id="chat-quote-fill" viewBox="0 0 16 16">
    <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM7.194 6.766a1.688 1.688 0 0 0-.227-.272 1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 6C4.776 6 4 6.746 4 7.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 9.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4 1.686 1.686 0 0 0-.227-.273 1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 6c-.957 0-1.734.746-1.734 1.667 0 .92.777 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/>
  </symbol>
  <symbol id="cpu-fill" viewBox="0 0 16 16">
    <path d="M6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
    <path d="M5.5.5a.5.5 0 0 0-1 0V2A2.5 2.5 0 0 0 2 4.5H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2A2.5 2.5 0 0 0 4.5 14v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14a2.5 2.5 0 0 0 2.5-2.5h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14A2.5 2.5 0 0 0 11.5 2V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5zm1 4.5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3A1.5 1.5 0 0 1 6.5 5z"/>
  </symbol>
  <symbol id="gear-fill" viewBox="0 0 16 16">
    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
  </symbol>
  <symbol id="speedometer" viewBox="0 0 16 16">
    <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
    <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
  </symbol>
  <symbol id="toggles2" viewBox="0 0 16 16">
    <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z"/>
    <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z"/>
    <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
  </symbol>
  <symbol id="tools" viewBox="0 0 16 16">
    <path d="M1 0L0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
  </symbol>
  <symbol id="chevron-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  </symbol>
  <symbol id="geo-fill" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
  </symbol>
</svg>


  <main>

  <div class="album py-5 bg-light">
    <div class="container">

 	<div class="row py-lg-5 text-center container">
      		<div class="col-lg-6 col-md-8 mx-auto">
        		<h1 class="fw-light">Datos Importantes </h1>
      		</div>
    	</div>

  <div class="container px-4 py-5" id="icon-grid">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
      <div class="col d-flex align-items-start">
        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#calendar3"/></svg>
     <!---   <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#bootstrap"/></svg> -->
        <div>
          <h4 class="fw-bold mb-0">Número de paralelos</h4>
          <p>90.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#calendar3"/></svg>
        <!-- <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#cpu-fill"/></svg> -->
        <div>
          <h4 class="fw-bold mb-0">Número de estudiantes matriculados</h4>
          <p>0.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#calendar3"/></svg>
        <div>
          <h4 class="fw-bold mb-0">Número de asignaturas</h4>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#home"/></svg>
        <div>
          <h4 class="fw-bold mb-0">Numero de horas</h4>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#toggles2"/></svg>
        <div>
          <h4 class="fw-bold mb-0">Número de docentes titulares a tiempo completo</h4>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#calendar3"/></svg>
        <div>
          <h4 class="fw-bold mb-0">Número de docentes titulares a medio tiempo</h4>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#geo-fill"/></svg>
        <div>
          <h4 class="fw-bold mb-0">Número de docentes ocacionales a tiempo completo </h4>
        </div>
      </div>
      <div class="col d-flex align-items-start">
	<svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#speedometer2"/></svg> 
	<!--- <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#tools"/></svg> -->

        <div>
          <h4 class="fw-bold mb-0">Número de docente ocacionales a medio tiempo</h4>
        </div>
      </div>
    </div>
  </div>

     </div>
  </div>

  
  </main>
</div>
</div>
</div>

</div>
    </div>
  </div>

<?php
$silabos = 0; // Ejemplo de porcentaje de distributivos entregados
$seguimientosilabo = 0; // Ejemplo de porcentaje de distributivos entregados
$total = 90; // Ejemplo de total de elementos
$planessemestrales = 0; // Ejemplo de porcentaje de informes finales entregados
$reactivos1 = 0; // Ejemplo de porcentaje de informes finales entregados
$calificaciones1p = 0; // Ejemplo de porcentaje de informes finales entregados
$calificaciones2p = 0; // Ejemplo de porcentaje de informes finales entregados
?>







</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
     <p class="mb-1">Este sitio web que presenta<b> 0/90 cursos, con 215 horas/semana  </b> es parte del producto del <b>PROYECTO DE AULA</b> titulado <a href="https://repositorioutlvte.org/Repositorio/2024-01-15-FQSA-01627.pdf"> <b> "Diseño y Desarrollo de una plataforma web para la Gestión de la información Académica"</b></a> </p>
    <p class="mb-0">El proyecto fue realizado con la participación de <a href="5.161.176.197/sica/index.php/sica/evento/participantes/350"> 4-B Base de Datos I</a> ,<a href="5.161.176.197/sica/index.php/sica/evento/participantes/356"> 5to-A</a> y <a href="5.161.176.197/sica/index.php/sica/evento/participantes/357">5to-B</a>  Ingenieria de Software I en el periodo 2023-1S, cuyo tutor fue el Ing. Stalin Francis Msc., Docente de las Asignaturas.</p>
  </div>
</footer>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"
></script>





</script>
    <script src="https://congresoutlvte.org/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
        // Datos de ejemplo
        const silabosEntregados = <?php echo $silabos; ?>; // Porcentaje de distributivos entregados
        const silabosPendientes = <?php echo $total; ?> - silabosEntregados;

        const seguimientosilaboEntregados = <?php echo $seguimientosilabo; ?>; // Porcentaje de distributivos entregados
        const seguimientosilaboPendientes = <?php echo $total; ?> - seguimientosilaboEntregados;




        const planessemestralesEntregado =  <?php echo $planessemestrales; ?> // Porcentaje de informes finales entregados
        const planessemestralesPendiente =  <?php echo $total; ?>- planessemestralesEntregado;

        const calificaciones1pEntregado = <?php echo $calificaciones1p; ?>; // Porcentaje de  calificaciones primer parcial
        const calificaciones1pPendiente = <?php echo $total; ?> - calificaciones1pEntregado;


        const calificaciones2pEntregado = <?php echo $calificaciones2p; ?>; // Porcentaje de  calificaciones segundo parcial
        const calificaciones2pPendiente = <?php echo $total; ?> - calificaciones2pEntregado;




        // Configuración del gráfico de Distributivos
        const ctxDistributivo = document.getElementById("silabosChart").getContext("2d");
        const silabosChart = new Chart(ctxDistributivo, {
            type: "pie",
            data: {
                labels: ["Entregados", "Pendientes"],
                datasets: [{
                    data: [silabosEntregados, silabosPendientes],
                    backgroundColor: ["#36A2EB", "#FF6384"]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "SÍLABOS"
                    }
                }
            }
        });



        // Configuración del gráfico de Distributivos
        const ctxseguimientosilabo = document.getElementById("seguimientosilaboChart").getContext("2d");
        const seguimientosilaboChart = new Chart(ctxseguimientosilabo, {
            type: "pie",
            data: {
                labels: ["Entregados", "Pendientes"],
                datasets: [{
                    data: [seguimientosilaboEntregados, seguimientosilaboPendientes],
                    backgroundColor: ["#36A2EB", "#FF6384"]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "SEGUIMIENTO SÍLABO"
                    }
                }
            }
        });















        // Configuración del gráfico de Informes Finales
        const ctxInformeFinal = document.getElementById("planessemestralesChart").getContext("2d");
        const planessemestralesChart = new Chart(ctxInformeFinal, {
            type: "pie",
            data: {
                labels: ["Entregados", "Pendientes"],
                datasets: [{
                    data: [planessemestralesEntregado, planessemestralesPendiente],
                    backgroundColor: ["#36A2EB", "#FF6384"]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "Planes semestrales"
                    }
                }
            }
        });


       // Configuración del gráfico de Primer parcial
        const ctxCalificaciones1p = document.getElementById("calificaciones1pChart").getContext("2d");
        const calificaciones1pChart = new Chart(ctxCalificaciones1p, {
            type: "pie",
            data: {
                labels: ["Entregados", "Pendientes"],
                datasets: [{
                    data: [calificaciones1pEntregado, calificaciones1pPendiente],
                    backgroundColor: ["#36A2EB", "#FF6384"]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "Calificaciones 1er Parcial"
                    }
                }
            }
        });
 

   
     // Configuración del gráfico de Primer parcial
        const ctxCalificaciones2p = document.getElementById("calificaciones2pChart").getContext("2d");
        const calificaciones2pChart = new Chart(ctxCalificaciones2p, {
            type: "pie",
            data: {
                labels: ["Entregados", "Pendientes"],
                datasets: [{
                    data: [calificaciones2pEntregado, calificaciones2pPendiente],
                    backgroundColor: ["#36A2EB", "#FF6384"]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "Calificaciones 2do Parcial"
                    }
                }
            }
        });
 






























// Función para mostrar/ocultar el contenido asociado al botón
        function toggleContenido(button) {
            // Obtener el siguiente elemento hermano del botón (el div con clase "contenido")
            const contenido = button.nextElementSibling;

            // Verificar el estado actual y alternar entre mostrar y ocultar
            if (contenido.style.display === "none" || contenido.style.display === "") {
                contenido.style.display = "block";
            } else {
                contenido.style.display = "none";
            }
        }



   </script>




  </body>
</html>
                                   
