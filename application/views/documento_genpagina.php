<?php

$this->load->helper('file');


$data0 ='    <style>

.img-contenedor img {
-webkit-transition:all .9s ease; /* Safari y Chrome */
-moz-transition:all .9s ease; /* Firefox */
-o-transition:all .9s ease; /* IE 9 */
-ms-transition:all .9s ease; /* Opera */
width:100%;
}

.img-contenedor:hover img {
-webkit-transform:scale(1.25);
-moz-transform:scale(1.25);
-ms-transform:scale(1.25);
-o-transform:scale(1.25);
transform:scale(1.25);
}

.img-contenedor {/*Ancho y altura son modificables al requerimiento de cada uno*/
/*width:300px;*/
/*height:180px;*/
overflow:hidden;
}

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
   
contenedor {
  position: relative;
  width: 600px;
  height: 400px;
  background-color: #f0f0f0;
  margin: 50px auto;
  padding: 20px;
}

.texto-transversal {
  top: 50%;
  left: 50%;
  transform: translate(0%, 0%) rotate(-0deg);
  background-color: rgba(0, 0, 0, 0.7);
  padding: 20px;
  color: white;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
}

.texto-transversal h2 {
  margin: 0;
  padding: 0;
  font-size: 24px;
  text-transform: uppercase;
}

.texto-transversal p {
  margin: 0;
  padding: 0;
  font-size: 18px;
}


 /* Estilos para la imagen en miniatura */
    .thumbnail {
     /* width: 200px;
        height: auto; */
        cursor: pointer;
    }
    /* Estilos para la ventana emergente */
    #modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 50px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.9);
    }
    /* Estilos para la imagen en la ventana emergente */
    #modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Estilos para el PDF en la ventana emergente */
    #pdf-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.9);
    }

    #pdf-modal-content {
        margin: auto;
        display: block;
        width: 90%;
        height: 90%;
        max-width: 900px;
    }

    /* Estilos para cerrar la ventana emergente */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* New styles for author photo */
    .author-photo {
        position: absolute;
        top: 10px; /* Adjust as needed */
        right: 10px; /* Adjust as needed */
        width: 50px; /* Size of the circle */
        height: 50px; /* Size of the circle */
        border-radius: 50%; /* Makes the image circular */
        object-fit: cover; /* Ensures the image covers the circle area */
        border: 2px solid #fff; /* Optional: white border around the photo */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Optional: subtle shadow */
        z-index: 10; /* Ensure it's above the cover image */
    }
 </style>
    
  </head>

 <body>


<header>
  <div class="collapse bg-secondary" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white"> <a href="https://educaysoft.org/repositorioeys/eventos/2023-11-29.jpeg" class="text-white">Acerca del Proyecto de Aula de Ingenieria de Software</a></h4>
          <p class="text-light"> El proyecto de aula en Ingeniería de Software  implico la planificación, desarrollo y evaluación colaborativa de soluciones informáticas, fomentando el trabajo en equipo, la resolución de problemas y la aplicación práctica de conceptos técnicos. .</p>

        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contactanos</h4>
          <ul class="list-unstyled">
            <li><a href="https://educaysoft.org/sica/evento/participantes/356" class="text-white">5to-A Ingenieria de Software I</a></li>
            <li><a href="https://educaysoft.org/sica/evento/participantes/357" class="text-white">5to-B Ingenieria de Softare I</a></li>
            <li><a href="https://educaysoft.org/sica/evento/participantes/350" class="text-white">4to-B Base de Datos I</a></li>
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

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<main>
';


$data1='</div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
     <p class="mb-1">Este sitio web que presenta material de lectura de acceso gratuito, es parte del producto del <b>PROYECTO DE AULA</b> titulado <a href="https://educaysoft.org/repositorioeys/2024-01-15-FQSA-01627.pdf"> <b> "Diseño y Desarrollo de una plataforma web para la Gestión de la información Académica"</b></a> </p>
    <p class="mb-0">El proyecto fue realizado con la participación de <a href="https://educaysoft.org/sica/evento/participantes/350"> 4-B Base de Datos I</a> ,<a href="https://educaysoft.org/sica/evento/participantes/356"> 5to-A</a> y <a href="https://educaysoft.org/sica/evento/participantes/357">5to-B</a>  Ingenieria de Software I en el periodo 2023-1S, cuyo tutor fue el Ing. Stalin Francis Msc., Docente de las Asignaturas.</p>
  </div>
</footer>

<script  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>

<script type="text/javascript"
   src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">



$(document).ready(function() {

$(".submenu").click(function(){
  $(this).children("ul").slideToggle();
});

$("ul").click(function(ev){
  ev.stopPropagation();
});

});

function cargarVideo(url){
        document.getElementById("slider").src=url;
}

// Función para mostrar la imagen en la ventana emergente
function mostrarImagen(imagen) {
    // Obtener la referencia de la imagen grande
    var modalImg = document.getElementById("modal-content");
    // Asignar la imagen al src de la ventana emergente
    modalImg.src = imagen;
    // Mostrar la ventana emergente
    document.getElementById(\'modal\').style.display = "block";
}

// Función para cerrar la ventana emergente
function cerrarModal() {
    // Ocultar la ventana emergente
    document.getElementById(\'modal\').style.display = "none";
}

// Función para mostrar el PDF en la ventana emergente
function mostrarPdf(pdfUrl) {
    var pdfModal = document.getElementById("pdf-modal");
    var pdfModalContent = document.getElementById("pdf-modal-content");
    pdfModalContent.innerHTML = \'<embed src="\' + pdfUrl + \'#toolbar=0" type="application/pdf" width="100%" height="100%" />\';
    pdfModal.style.display = "block";
}

// Función para cerrar la ventana emergente del PDF
function cerrarPdfModal() {
    document.getElementById(\'pdf-modal\').style.display = "none";
    document.getElementById(\'pdf-modal-content\').innerHTML = ""; // Clear content on close
}


function uploadImage(nombre,idx) {
  var fI="fileInput"+idx; 
  var st="status"+idx;
  var filesInput = document.getElementById(fI);
  var status = document.getElementById(st);
  var totalFiles= filesInput.files.length;

    alert("entreo");

  if (filesInput.files.length === 0) {
    status.textContent = "Por favor seleccione un archivo.";
    return;
  }

  var file = filesInput.files[0];

  if (file.size > 500 * 1024) {
    status.textContent = "El archivo es demasiado grande. Por favor seleccione un archivo de menos de 500 KB.";
    return;
  }


  var formData = new FormData();

		// Read selected files
    		for (var index = 0; index < totalFiles; index++) {
      			formData.append("files[]", filesInput.files[index]);
    		}



      formData.append("nombrearchivo",nombre);
		var uploadUrl = getUploadUrl();
		alert(uploadUrl);
		alert(nombre);
       axios.post(uploadUrl, formData).then(function(response) {
		console.log("El archivo PDF se cargó correctamente en el servidor en la nube.");
			   history.back(); //Go to the previous page
		   })
		   .catch(function(error){
		           console.error("Error al cargar el archivo PDF en el servidor en la nube. Código de estado:", error);
        	});
}


function getUploadUrl() {
    var selectElement = document.getElementById("idordenador");
    var url = "https://educaysoft.org";
    return url.endsWith("/") ? url + "cargaportada.php" : url + "/cargaportada.php";
}




</script>
    <script src="https://congresoutlvte.org/assets/dist/js/bootstrap.bundle.min.js"></script>
      
  </body>
</html>
                                   
';




$idareaconocimiento=0;
$elperiodoacademico="";
$inicio=1;
$i=0;
$j=0;

$arrcolor=array(1=>"#b4b2b2",2=>"#F5DA81",3=>"#A9F5A9",4=>"#A9F4F3",5=>"#CFCEF7",6=>"#D1A9F4",7=>"#F5A8F3",8=>"#80DBF5",9=>"#9BFE2F",10=>"#9BFE2F");
foreach($documentos as $row){
	

	if($inicio==1)
	{

	$data='
		<!doctype html>
		<html lang="en">
  		<head>
    		<meta charset="utf-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<meta name="description" content="">
    		<meta name="author" content="Stalin Francis Quinde">
    		<meta name="generator" content="Hugo 0.101.0">
        	<meta property="og:site_name" content="Educaysoft" />
        	<meta property="og:image" content="https://educaysoft.org/sica/images/logoeys.png" />
        	<meta property="og:image:width" content="400" />
        	<meta property="og:image:height" content="400" />
    		<title> EDUCACIÓN Y SOFTWARE </title>
    		<link rel="educaysoft" href="https://congresoutlvte.org/faci/">
    		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
		<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" />';
	 	$data=$data.$data0;



	$data=$data.'
  		<section class="py-5 text-center container">
    		<div class="row py-lg-5" style="display:flex;  align-items:center; justify-content: center;" >
		<div style=" flex-basis: 40%"  >
		<img src="https://educaysoft.org/repositorioeys/qr/documento-'.$row->idtipodocu.'-'.$row->idtipodocu.'.png" height="150px">
		</div>
      		<div >
        	<p class="lead text-muted">Tipo de documento</p>
        	<h1 class="fw-light">'.$row->idtipodocu.'</h1>  
        	<p style="font-size:2em; color:#6c757d;text-shadow: 1px 1px 2px #000, -1px -1px 2px #fff;">'.$row->eltipodocu.'</p>
      		</div>
    		</div>
  		</section>
  		<div class="album py-5 bg-light">
    		<div class="container">
      		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
	 	$inicio=0;
		}



$data=$data.'<div class="col">
          <div class="card shadow-sm">
		  <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>';

// Remote file url
$remoteFile = "https://educaysoft.org/repositorioeys/portadas/".pathinfo(trim($row->archivopdf),PATHINFO_FILENAME).".jpg";
// Remote author photo file url
$authorPhotoFile = "https://educaysoft.org/repositorioeys/fotos/".$row->cedula.".jpg"; // Assuming .jpg extension for photos


$file_headers = @get_headers($remoteFile);
$author_photo_headers = @get_headers($authorPhotoFile);

if($file_headers[0] == 'HTTP/1.1 404 Not Found') {

    $data=$data.'<image href="https://educaysoft.org/repositorioeys/documento/documento0.jpg" alt="No hay programación" height="100%" width="100%"/> </svg>
    <div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">';


$data=$data.' <input type="file" id="fileInput'.trim($row->iddocumento).'" accept="image/*">
  <button onclick="uploadImage(\''.pathinfo(trim($row->archivopdf),PATHINFO_FILENAME).'.jpg\',\''.trim($row->iddocumento).'\')">Subir Imagen</button>
  <p id="status'.trim($row->iddocumento).'"></p> </div>';

}else{

$data=$data.'<image  class="thumbnail" href="https://educaysoft.org/repositorioeys/portadas/'.pathinfo(trim($row->archivopdf),PATHINFO_FILENAME).'.jpg" alt="No hay programación" height="100%" width="100%"  onclick="mostrarImagen(\'https://educaysoft.org/repositorioeys/portadas/'.pathinfo(trim($row->archivopdf),PATHINFO_FILENAME).'.jpg\')" /> </svg>
<div class="img-contenedor w3-card-4" style="position:absolute"; top:0px;right:0px; border: 2px solid green; border-radius: 50%; width: 30%; display:flex; justify-content: center; align-items: center;">';

// Check if author photo exists
if($author_photo_headers[0] != 'HTTP/1.1 404 Not Found') {
    $data .= '<img src="https://educaysoft.org/repositorioeys/fotos/'.$row->cedula.'.jpg" alt="Author Photo" class="author-photo">';
}


$data=$data.'</div>

<div id="modal">
  <span class="close" onclick="cerrarModal()">&times;</span>
  <img id="modal-content" src="" alt="Imagen Grande">
</div>';

}

$data=$data.'





        <div class="card-body bg-light" >



<div class="mb-3">
        <h5 class="text-primary">Código:</h5>
        <span class="text-success fw-bold text-shadow"><?= htmlspecialchars("'.$row->iddocumento. '") ?></span>
    </div>
 <div class="mb-3">
        <h5 class="text-primary">Nombre:</h5>
        <span class="text-secondary fw-bold text-shadow"><?= htmlspecialchars("'.$row->asunto.'") ?></span>
    </div>

<div class="mb-3">
        <h6 class="text-dark"><b>Autor:</b></h6>
        <p class="mb-0"><?= htmlspecialchars("'.$row->autor.'") ?></p>
    </div>


        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="https://educaysoft.org/repositorioeys/'.$row->archivopdf.'" class="btn btn-outline-primary btn-sm" target="_blank">Descargar Archivo</a>
                <button onclick="mostrarPdf(\'https://educaysoft.org/repositorioeys/'.$row->archivopdf.'\')" class="btn btn-outline-secondary btn-sm">Ver PDF</button>
            </div>
        </div>'
        ;	


              	$data=$data.'<div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
';


}


	 	$data=$data.$data1;

            // Add the PDF modal structure at the end of the data1 string, before the closing </body> tag
            $data .= '
            <div id="pdf-modal" class="modal">
              <span class="close" onclick="cerrarPdfModal()">&times;</span>
              <div id="pdf-modal-content"></div>
            </div>
            ';

			$file='application/views/web/documento-'.$row->idtipodocu.'.php';


	if ( !write_file($file, $data)){
	     echo 'Unable to write the file';
	}else{
	    echo $file."\n";
	}



echo "archivo generado<br>";
echo "<br>";
echo $file;
die();

?>

<style>

body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top:  0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

</style>


<div class="row justify-content-center">
      <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Lista de documentos 
                 </h3>
       	     </div>




	<div id="eys-nav-i">
	<ul>
    		<li> <?php echo anchor('documento', 'Home'); ?></li>
	</ul>
       	</div>
<br>
<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>ID</th>
 <th>documento</th>
 <th>Asignaturas</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="Modal_pdf" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 800px;">





 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

 </div>



<script type="text/javascript">

$(document).ready(function(){
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('documento/documento_data')?>', type: 'GET'},});

});

$('#show_data').on('click','.item_ver',function(){
	var id= $(this).data('iddocumento');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;
});


</script>
