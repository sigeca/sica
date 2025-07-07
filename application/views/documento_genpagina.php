<?php

$this->load->helper('file');

$data0 ='    <style>
      /* Custom styles for modern look */
      body {
        font-family: \'Roboto\', sans-serif;
        background-color: #f8f9fa;
      }
      .navbar {
        background-color: #343a40 !important; /* Dark header */
      }
      .navbar-brand {
        color: #ffffff !important;
      }
      .section-hero {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(\'https://educaysoft.org/sica/images/banner-educaysoft.jpg\') no-repeat center center;
        background-size: cover;
        color: white;
        padding: 80px 0;
      }
      .section-hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
      }
      .section-hero p.lead {
        font-size: 1.25rem;
        opacity: 0.9;
      }
      .card {
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        overflow: hidden; /* Ensure rounded corners for images */
      }
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      }
      .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        object-fit: cover; /* Ensures images cover the area without distortion */
      }
      .card-body {
        padding: 1.5rem;
      }
      .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #007bff; /* Primary color */
      }
      .card-text {
        color: #6c757d;
      }
      .btn-custom-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        transition: background-color 0.3s ease;
      }
      .btn-custom-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
      }
      .btn-custom-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
        transition: background-color 0.3s ease;
      }
      .btn-custom-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
      }
      .img-contenedor {
        position: relative;
        overflow: hidden;
      }
      .img-contenedor input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
      }
      .img-contenedor button {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
      }

      /* Styles for the PDF viewer modal - Bootstrap 5 Modal */
      #pdfModal .modal-dialog {
        max-width: 90%;
        height: 90%;
        margin: 1.75rem auto;
      }
      #pdfModal .modal-content {
        height: 100%;
        border-radius: 10px;
        overflow: hidden;
      }
      #pdfModal .modal-body {
        padding: 0;
        height: calc(100% - 56px); /* Adjust based on header/footer height */
      }
      #pdfViewer {
        width: 100%;
        height: 100%;
        border: none;
      }
      .modal-backdrop.show {
        opacity: 0.7; /* Darker backdrop */
      }

      /* Image Modal */
      #imageModal .modal-dialog {
        max-width: 80%;
      }
      #imageModal .modal-content {
        background-color: transparent;
        border: none;
      }
      #imageModal .modal-body {
        display: flex;
        justify-content: center;
        align-items: center;
      }
      #modal-content-image {
        max-width: 100%;
        max-height: 80vh;
        display: block;
        margin: auto;
      }
      .close-image-modal {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        opacity: 1; /* Ensure close button is visible */
        text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
      }
      .close-image-modal:hover,
      .close-image-modal:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
      }
 </style>
  </head>

 <body>
';

$data1='
    </div>
  </div>
</main>

<footer class="text-muted py-4 bg-dark mt-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#" class="text-white-50">Back to top</a>
    </p>
    <p class="mb-1 text-white-50">Este sitio web que presenta material de lectura de acceso gratuito, es parte del producto del <b>PROYECTO DE AULA</b> titulado <a href="https://educaysoft.org/repositorioeys/2024-01-15-FQSA-01627.pdf" class="text-info"> <b> "Diseño y Desarrollo de una plataforma web para la Gestión de la información Académica"</b></a> </p>
    <p class="mb-0 text-white-50">El proyecto fue realizado con la participación de <a href="https://educaysoft.org/sica/evento/participantes/350" class="text-info"> 4-B Base de Datos I</a> ,<a href="https://educaysoft.org/sica/evento/participantes/356" class="text-info"> 5to-A</a> y <a href="https://educaysoft.org/sica/evento/participantes/357" class="text-info">5to-B</a>  Ingenieria de Software I en el periodo 2023-1S, cuyo tutor fue el Ing. Stalin Francis Msc., Docente de las Asignaturas.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>

<script type="text/javascript"
   src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
  // Original submenu logic (if still relevant)
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

// Función para mostrar la imagen en la ventana emergente (using Bootstrap Modal)
function mostrarImagen(imagen) {
    var imageModal = new bootstrap.Modal(document.getElementById(\'imageModal\'));
    document.getElementById("modal-content-image").src = imagen;
    imageModal.show();
}

// Function to open PDF in a Bootstrap modal
function openPdfViewer(pdfUrl) {
    document.getElementById(\'pdfViewer\').src = pdfUrl;
    var pdfModal = new bootstrap.Modal(document.getElementById(\'pdfModal\'));
    pdfModal.show();
}

// The Bootstrap modal already handles closing itself when the backdrop is clicked or data-bs-dismiss is used.
// No explicit closePdfModal or cerrarModal functions are needed if using Bootstrap\'s default behavior.
// However, if you need to clear the iframe src on close, you can listen to the \'hidden.bs.modal\' event.
document.getElementById(\'pdfModal\').addEventListener(\'hidden.bs.modal\', function (event) {
  document.getElementById(\'pdfViewer\').src = ""; // Clear the src when modal is closed
});


function uploadImage(nombre,idx) {
  var fI="fileInput"+idx;
  var st="status"+idx;
  var filesInput = document.getElementById(fI);
  var status = document.getElementById(st);
  var totalFiles= filesInput.files.length;

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
  for (var index = 0; index < totalFiles; index++) {
    formData.append("files[]", filesInput.files[index]);
  }

  formData.append("nombrearchivo",nombre);
  var uploadUrl = getUploadUrl();

  axios.post(uploadUrl, formData)
    .then(function(response) {
      console.log("El archivo PDF se cargó correctamente en el servidor en la nube.");
      // Optionally update the image src on the card after successful upload without reloading
      // For simplicity, history.back() is kept, but consider an AJAX update for better UX.
      history.back();
    })
    .catch(function(error){
      console.error("Error al cargar el archivo PDF en el servidor en la nube. Código de estado:", error);
    });
}

function getUploadUrl() {
    // This function seems unrelated to the current page logic unless used elsewhere.
    // Ensure 'idordenador' exists if this function is called.
    var selectElement = document.getElementById("idordenador");
    var url = "https://educaysoft.org";
    return url.endsWith("/") ? url + "cargaportada.php" : url + "/cargaportada.php";
}

</script>

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
    		<title>EDUCACIÓN Y SOFTWARE</title>
    		<link rel="educaysoft" href="https://congresoutlvte.org/faci/">
    		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpDtLEtnWjH7Cgokb/1T7b0B2SjQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        ';
	 	$data=$data.$data0;

	$data=$data.'
  		<header class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="https://educaysoft.org/sica/images/logoeys.png" alt="Educaysoft Logo" height="30" class="d-inline-block align-top me-2">
                    Educaysoft
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            '.anchor('documento', 'Home', 'class="nav-link"').'
                        </li>
                        </ul>
                </div>
            </div>
        </header>

        <section class="section-hero text-center container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="https://educaysoft.org/repositorioeys/qr/documento-'.$row->idtipodocu.'-'.$row->idtipodocu.'.png" height="150px" class="img-fluid rounded-3 shadow-lg">
                </div>
                <div class="col-md-8 text-center text-md-start">
                    <p class="lead mb-2">Tipo de documento</p>
                    <h1 class="display-4 fw-light mb-3">'.$row->idtipodocu.'</h1>
                    <p class="lead" style="font-size:1.5em; color:#e9ecef;text-shadow: 1px 1px 2px #000;">'.$row->eltipodocu.'</p>
                </div>
            </div>
        </section>

        <main class="py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">';
	 	$inicio=0;
		}


$data.='<div class="col">
          <div class="card shadow-sm h-100">
            <div class="img-contenedor position-relative overflow-hidden" style="height: 250px;">';

// Remote file url
$remoteFile = "https://educaysoft.org/repositorioeys/portadas/".pathinfo(trim($row->archivopdf),PATHINFO_FILENAME).".jpg";

$file_headers = @get_headers($remoteFile);

if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $data.='<img src="https://educaysoft.org/repositorioeys/documento/documento0.jpg" class="card-img-top h-100 w-100" alt="No hay portada disponible">
    <div class="position-absolute w-100 h-100 d-flex flex-column justify-content-center align-items-center bg-dark bg-opacity-75 text-white p-3">
        <p class="mb-2 text-center">No hay portada. ¿Deseas subir una?</p>
        <input type="file" id="fileInput'.trim($row->iddocumento).'" accept="image/*" class="form-control mb-2">
        <button onclick="uploadImage(\''.pathinfo(trim($row->archivopdf),PATHINFO_FILENAME).'.jpg\',\''.trim($row->iddocumento).'\')" class="btn btn-primary btn-sm">Subir Imagen</button>
        <small id="status'.trim($row->iddocumento).'" class="text-warning mt-2"></small>
    </div>';
} else {
    $data.='<img src="https://educaysoft.org/repositorioeys/portadas/'.pathinfo(trim($row->archivopdf),PATHINFO_FILENAME).'.jpg" class="card-img-top h-100 w-100 thumbnail" alt="Portada del documento" onclick="mostrarImagen(\'https://educaysoft.org/repositorioeys/portadas/'.pathinfo(trim($row->archivopdf),PATHINFO_FILENAME).'.jpg\')">';
}

$data.='
            </div>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-2 text-primary">Código: <span class="text-success fw-bold">'.htmlspecialchars($row->iddocumento).'</span></h5>
                <h5 class="card-title mb-2 text-primary">Nombre: <span class="text-secondary fw-bold">'.htmlspecialchars($row->asunto).'</span></h5>
                <h6 class="text-dark mb-2"><b>Autor:</b></h6>
                <p class="card-text flex-grow-1">'.htmlspecialchars($row->autor).'</p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <button class="btn btn-custom-primary btn-sm flex-fill me-2" onclick="openPdfViewer(\'https://educaysoft.org/repositorioeys/'.$row->archivopdf.'\')">
                        <i class="fas fa-book-open me-1"></i> Leer Documento
                    </button>
                    <a href="https://educaysoft.org/repositorioeys/'.$row->archivopdf.'" class="btn btn-custom-secondary btn-sm flex-fill" target="_blank" download>
                        <i class="fas fa-download me-1"></i> Descargar Archivo
                    </a>
                </div>
            </div>
          </div>
        </div>';
}

$data=$data.$data1;

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

<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalLabel">Visualizador de Documento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe id="pdfViewer" src="" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body text-center p-0">
        <img id="modal-content-image" src="" alt="Imagen Grande" class="img-fluid rounded shadow-lg">
      </div>
       <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index: 10;"></button>
    </div>
  </div>
</div>

<div class="row justify-content-center d-none"> <div class="row">
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

// This script block should be placed after all the HTML elements it targets
// to ensure the DOM is loaded. It also seems to belong to a different functionality.
// If it's meant to be on the same page, consider moving it into the main script block
// or ensure it's loaded after the elements it references.
$(document).ready(function(){
	// Ensure DataTable is initialized only if the table is actually present
    if ($.fn.DataTable.isDataTable(\'#mydatac\')) {
        var mytabla= $(\'#mydatac\').DataTable({"ajax": {url: \'<?php echo site_url('documento/documento_data')?>\', type: \'GET\'},});
    }
});

$('#show_data').on('click','.item_ver',function(){
	var id= $(this).data('iddocumento');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;
});


</script>
