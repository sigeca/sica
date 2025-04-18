<!DOCTYPE html>

<html lang="es">

<?php
if (isset($this->session->userdata['logged_in'])) {
//header("location: http://localhost/CodeIgniter2/index.php/user_authentication/user_login_process");
}
?>
<head>
	<title>Utlvte Tecnología de la Informción</title>
	<link href="<?php echo base_url(); ?>images/favicon.ico" rel="shortcut icon" type="image/x-icon">


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
	<!-- / Yoast SEO plugin. -->


	<meta name="author" content="Stalin Francis">
	<meta name="copyright" content="educaysoft" >
	<meta name="description" content="División de Tecnología en apoyo a los procesos tecnológicos de la UTLVTE">
	<meta name="keywords" content="utlvte  tic   Esmeraldas Ecuador">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<!--- Para manejar el datatable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.css">
 
<script  src="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link   type="text/css" href="<?php echo base_url(); ?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
margin:0;
background-color: #fafafa;
height:100%;
margin-bottom:0;
padding-top:0;
padding-bottom:0;
display:flex;
flex-direction:column;
}



#eys-footer{
height: 200px;
width:100%;
/*background-color: lightgray;
bottom:0;  */
margin-bottom:0px;
padding:20px 0;
display: flex;
flex-direction:row;
}


 footer { min-height: 130px; }

    @media (min-height: 480px) {
      footer {
        position: -webkit-sticky;
        position: sticky;
        bottom: 0;
      }
    }

    @media (min-device-width: 576px) and (max-device-width: 1024px) and (orientation: landscape)  {
      footer {
        position: static;
      }
    }


/* para el menu principal de tipo responsive */
 

.menu-container {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding: 10px;
    background-color: #f5f5f5

}

.logo-container img.logo {
    height: 50px;
}


.logo-container, .title-container, .menu-items {
    padding: 10px;
}

@media only screen and (max-width: 768px) {
    .menu-container {
        flex-direction: column;
    }
}


.menu-items .menu-link {
    text-decoration: none;
    padding: 10px 15px;
    color: #333;
    display: inline-block;
}

.menu-link:hover {
    background-color: #e0e0e0;
}






/* Set a background color */
.mytime {
  font-family: Helvetica, sans-serif;
  margin:3px;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 50%;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: #8d8d8d;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 5px 5px;
  position: relative;
  background-color: inherit;
  width: 100%;
}

/* The circles on the timeline */
.container::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -33px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 18px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: -55%;
}

/* Place the container to the right */
.right {
  left:55%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 7px;
  border: medium solid #8d8d8d;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent #8d8d8d;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 5px;
  border: medium solid #d8d8d8;
  border-width: 10px 10px 10px 0;
  border-color: transparent #8d8d8d transparent transparent;
}


/* Fix the circle for containers on the right side */
.right::after {
  left: -33px;
}

/* The actual content */
.content {
  padding: 5px 5px;
  background-color: white;
  position: relative;
  border-radius: 6px;
  border: 1px solid #d8d8d8;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 100px) {
/* Place the timelime to the left */
  .timeline::after {
    left: 10px;
  }

/* Full-width containers */
  .container {
    width: 100%;
    padding-left: 20px;
    padding-right: 25px;
  }

/* Make sure that all arrows are pointing leftwards */
  .container::before {
    left: 30px;
    border: medium solid #8d8d8d;
    border-width: 5px 5px 5px 0;
    border-color:  #8d8d8d ;
  }

/* Make sure all circles are at the same spot */
  .left::after, .right::after {
    left: 15px;
  }

/* Make all right containers behave like the left ones */
  .right {
    left: 0%;
  }
}

.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

#menu {
    width: 550px;
    height: 35px;
    font-size: 16px;
    font-family: Tahoma, Geneva, sans-serif;
    font-weight: bold;
    text-align: right;
    text-shadow: 3px 2px 3px #333333;
    border-radius: 8px;
}


#menu ul {
    height: auto;
    padding: 8px 0px;
    margin: 0px;
}

#menu li {
display: inline;
padding: 20px;
}



#menu a {
    text-decoration: none;
    color: #00F;
    padding: 8px 8px 8px 8px;
}



menu a:hover {
    color: #F90;
    background-color: #FFF;
}



.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
}



</style>


<!--- Para el menu de las materias como acordion -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>





<script>

function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace("w3-green", "w3-red");
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace("w3-red", "w3-green");
  }
}
</script>






<script  src="<?php echo base_url(); ?>assets/jquery.js"></script>
<script  src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
<script  src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/tinymce.min.js"></script> 



<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-3.4.1-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-3.4.1-dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-3.4.1-dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-3.4.1-dist/css/bootstrap-theme.css">


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/eys.css" >   

<script   src="<?php echo base_url(); ?>assets/bootstrap-3.4.1-dist/js/bootstrap.js" ></script>
<script   src="<?php echo base_url(); ?>assets/bootstrap-3.4.1-dist/js/bootstrap.min.js" ></script>




<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables-1.10.21/css/dataTables.bootstrap4.min.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables-1.10.21/css/dataTables.bootstrap4.css" >


<script  src="<?php echo base_url(); ?>assets/DataTables-1.10.21/js/jquery.dataTables.min.js" ></script>
<script  src="<?php echo base_url(); ?>assets/DataTables-1.10.21/js/jquery.dataTables.js" ></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables-1.10.21/css/jquery.dataTables.min.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables-1.10.21/css/jquery.dataTables.css" >


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stylechat.css" >

<!---para cargar pdf---->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.228/pdf.min.js"></script>

<style type="text/css">


 .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }



/* ===============================*/
/*
.sidebar{
	position: fixed;
	height: 100%;
	width:5%;
	top:  0;
	left:0;
	z-index: 1; 
	background-color: rgba(0,255, 0, 0.3);
	overflow-x:hidden;
	transition: 0.4s;
	padding: 0.5rem 0;
	box-sizing: border-box;
}

*/


.sidebar {
    background-color: #f4f4f4;
    padding: 15px;
    width: 100px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    overflow-y: auto;
}

boton-cerrar {
    background: none;
    border: none;
    font-size: 24px;
    color: #333;
    cursor: pointer;
}


.menu {
    list-style: none;
    padding: 0;
}

.menu li {
    margin: 5px 0;
}

.menu-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: orange;
    font-size: 80%;
}

.menu-icon {
    width: 50px;
    height: 50px;
    margin-right: 4px;
    vertical-align: middle; /* Asegura la alineación adecuada */
}

.menu-text {
    font-size: 12px; /* Tamaño de texto ajustable */
    margin: 0; /* Eliminar márgenes adicionales */
}


.sidebar .boton-cerrar{
	position: absolute;
	top: 0.5rem;
	right: 1rem;
	font-size: 2rem;
	display: block;
	padding: 0;
	line-height: 1.5rem;
	margin: 0;
	height: 32px;
	width: 32px;
	text-align: center;
}

.sidebar ul, .sidebar li{
	margin:0;
	padding:0;
	list-style:none inside;
}

.sidebar ul {
    margin: 8rem auto;
    display: block;
    width: 80%;
    min-width:200px;
}

.sidebar a {
    display: block;
    font-size: 100%;
    text-decoration: none;
    padding: 4px;
}

.sidebar a:hover{
color: Blue;
  border-bottom: 3px solid Blue;
}

h1 {
    color:#f90;
    font-size:180%;
    font-weight:normal;
}


.eys-simple-sidebar a:hover{

color: Blue;
  border-bottom: 3px solid Blue;

}



.abrir-cerrar{
	color: #2E88C7;
	font-size:1rem;

}

#cerrar{
	display:none;
}

#show-pdf-button {
	width: 150px;
	display: block;
	margin: 20px auto;
}

#file-to-upload {
	display: none;
}

#pdf-main-container {
	width: 500px;
	margin: 20px auto;
}

#pdf-loader {
	display: none;
	text-align: center;
	color: #999999;
	font-size: 13px;
	line-height: 100px;
	height: 100px;
}

#pdf-contents {
  display: none;
}


#pdf-meta {
	overflow: hidden;
	margin: 0 0 20px 0;
}

#pdf-buttons {
	float: left;
}

#page-count-container {
	float: right;
}

#pdf-current-page {
	display: inline;
}

#pdf-total-pages {
	display: inline;
}

#pdf-canvas {
	border: 1px solid rgba(0,0,0,0.2);
	box-sizing: border-box;
}

#page-loader {
	height: 100px;
	line-height: 100px;
	text-align: center;
	display: none;
	color: #999999;
	font-size: 13px;

}

button:hover {
  color: #fff;
}
.button:hover:before {
  width: 100%;
}

/* optional reset for presentation */
* {
  font-family: Arial;
  text-decoration: none;
  font-size: 20px;
}

.container {
  padding-top: 50px;
  margin: 0 auto;
  width: 100%;
  text-align: center;
}

h1 {
  text-transform: uppercase;
  font-size: 0.8rem;
  margin-bottom: 2rem;
  color: #777;
}

span {
  display: block;
  margin-top: 2rem;
  font-size: 0.7rem;
  color: #777;
}
span a {
  font-size: 0.7rem;
  color: #999;
  text-decoration: underline;
}


.button {
  display: inline-block;
  padding: 0.75rem 1.25rem;
  border-radius: 10rem;
  color: #fff;
  text-transform: uppercase;
  font-size: 1rem;
  letter-spacing: 0.15rem;
  transition: all 0.3s;
  position: relative;
  overflow: hidden;
  z-index: 1;
}
.button:after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #0cf;
  border-radius: 10rem;
  z-index: -2;
}
.button:before {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0%;
  height: 100%;
  background-color: #008fb3;
  transition: all 0.3s;
  border-radius: 10rem;
  z-index: -1;
}
.button:hover {
  color: #fff;
}
.button:hover:before {
  width: 100%;
}

/* optional reset for presentation */
* {
  font-family: Arial;
  text-decoration: none;
  font-size: 20px;
}

.container {
  padding-top: 50px;
  margin: 0 auto;
  width: 100%;
  text-align: center;
}

h1 {
  text-transform: uppercase;
  font-size: 0.8rem;
  margin-bottom: 2rem;
  color: #777;
}

span {
  display: block;
  margin-top: 2rem;
  font-size: 0.7rem;
  color: #777;
}
span a {
  font-size: 0.7rem;
  color: #999;
  text-decoration: underline;
}



.fixed-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #f5f5f5;
    border-bottom: 2px solid green;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0;
    z-index: 9999;
}

.header-left, .header-right {
    display: flex;
    align-items: center;
}

.menu-toggle {
    display: flex;
    align-items: center;
}

.menu-toggle img {
    height: 50px;
}

.logo img {
    height: 50px;
}

.institution p {
    font-size: 1em;
    line-height: 20px;
    margin: 0;
}

.user-info p {
    margin: 0;
    font-size: 0.9em;
}

.user-actions {
    display: flex;
    align-items: center;
}

.profile-button .avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}



.user-profile {
    display: flex;
    align-items: center;
    background-color: #f5f5f5; /* Fondo suave */
    padding: 10px 20px;
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    gap: 15px;
}

.profile-avatar {
    flex-shrink: 0;
}

.avatar {
    width: 50px; /* Tamaño ajustable */
    height: 50px;
    border-radius: 50%; /* Forma circular */
    border: 2px solid #4CAF50; /* Borde color principal */
}

.profile-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.user-name {
    font-size: 16px;
    font-weight: bold;
    margin: 0;
    color: #333;
}

.user-email {
    font-size: 14px;
    margin: 0;
    color: #666;
}

.profile-actions {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.action-button {
    background-color: #4CAF50; /* Color verde */
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
}

.action-button:hover {
    background-color: #45a049; /* Color más oscuro al pasar el ratón */
}

.logout {
    background-color: #e53935; /* Color rojo para salir */
}

.logout:hover {
    background-color: #d32f2f;
}















</style>

</head>
<body >
<?php
//echo "despues"; 
//print_r($this->session->userdata());
//die();
?>

  <?php if (!empty($this->session->userdata('logged_in'))){  ?>
    


<header class="fixed-header">
        <div class="header-left">  
            <div class="logo">
                <a href="<?= base_url('index.php/mti') ?>">
                    <img src="<?= base_url('images/logo-cti.png') ?>" alt="Logo CTI">
                </a>
            </div>
            
            <div class="institution">
                <p><?= $this->session->userdata['logged_in']['institucion'] ?></p>
            </div>
        </div>

           <div class="header-right">
            

<div class="user-profile">
    <div class="profile-avatar">
        <img 
            id="foto" 
            src="<?= 'https://repositorioutlvte.org/Repositorio/' . $this->session->userdata['logged_in']['foto'] ?>" 
            alt="Foto de perfil" 
            class="avatar"
            onerror="this.onerror=null; this.src='<?= base_url('fotos/perfil.jpg') ?>';">
    </div>
    <div class="profile-info">
        <p class="user-name"><?= $this->session->userdata['logged_in']['elusuario'] ?></p>
        <p class="user-email"><?= $this->session->userdata['logged_in']['email'] ?></p>
    </div>
    <div class="profile-actions">
        <button class="action-button" onclick="window.location.href='<?= base_url('index.php/upfoto') ?>'">Subir foto</button>
        <button class="action-button logout" onclick="window.location.href='<?= base_url('index.php/login/logout') ?>'">Salir</button>
    </div>
</div>








            
   	</div>

 </header>

  <div   style="margin-top: 5vh; display:flex; flex-direction: row; justify-content:flex-end;  padding:0;">
    <div id="sidebar" class="sidebar">
    <!----    <a href="#" class="boton-cerrar" onclick="ocultar()">&times;</a> -->
    <button class="boton-cerrar" onclick="ocultar()" aria-label="Cerrar menú">&times;</button>

 <ul class="menu" >
   <?php if(isset($this->session->userdata['acceso'])): ?>

   <?php foreach($this->session->userdata['acceso'] as $row):
	    
		$id= htmlspecialchars( $row["modulo"]["id"]);
		$nombre= htmlspecialchars($row["modulo"]["nombre"]);
		$icono=htmlspecialchars($row["modulo"]["icono"]);
		$modulo=htmlspecialchars($row["modulo"]["modulo"]);
		$funcion=htmlspecialchars($row["modulo"]["funcion"]);

        $url = base_url("index.php/{$modulo}/" . (!empty($funcion) ? $funcion . $this->session->userdata['logged_in']['idpersona'] : ''));
        $iconUrl = base_url("assets/iconos/{$icono}.png");
        ?>
         <li>
                    <a id="<?= $id ?>" href="<?= $url ?>" class="menu-link">
                        <img src="<?= $iconUrl ?>" alt="<?= $nombre ?>" class="menu-icon">
                        <span class="menu-text"><?= $nombre ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
  </ul>


 <?php }else { ?>

<header class="menu-container">
    <div class="logo-container media-left">
        <a href="<?= base_url('index.php/mti'); ?>">
            <img src="<?=  base_url('images/logo-cti.png');  ?>" alt="Logo de la carrera CTI" class="logo">
        </a>
    </div>

    <nav class="menu-items pull-right">
        <div class="w3-bar">
            <a href="http://congresoutlvte.org/informatica" 
                class="menu-link w3-bar-item w3-border-green w3-border-right"
                aria-label="Ir a nuestra carrera">Nuestra carrera</a>
           <a href="<?= base_url('index.php/login/user_registration_show'); ?>"  
                class="menu-link w3-bar-item w3-border-green w3-border-right"
                aria-label="Registrar nuevo usuario">Registrar</a>
           <a href="<?= base_url("index.php/login"); ?>" 
            class="menu-link w3-bar-item"
            aria-label="Inicia sesión en la plataforma">Inicia sesión</a>
        </div>
    </nav>
</header>

	<?php }  ?>


 	</div>
<main>
 <div id="eys-contenido-g"  style="margin-top: 5vh; ">
   
<div id="eys-principal"  style="height:100%; width:90%;   vertical-align:top; padding-bottom:2.5em; margin:0vh 0 auto; ">






