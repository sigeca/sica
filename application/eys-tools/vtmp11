<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
<?php
if(isset($articulo))
{
?>
        <li> <?php echo anchor('articulo/elprimero/', 'primero', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('articulo/siguiente/'.$articulo['idarticulo'], 'siguiente', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('articulo/anterior/'.$articulo['idarticulo'], 'anterior', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li  style="border-right:1px solid #ccc; padding-right:15px;"><?php echo anchor('articulo/elultimo/', 'Último', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('articulo/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('articulo/edit/'.$articulo['idarticulo'],'Edit', 'style="text-decoration:none; color:#ffc107; font-weight:bold;"'); ?></li>
      <!--  <li style="border-right:1px solid green"> <?php echo anchor('articulo/delete/'.$articulo['idarticulo'],'Delete'); ?></li> --->
        <li style="border-right:1px solid #ccc; padding-right:15px;"> <?php echo anchor('articulo/listar/','Listar', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('articulo/genpagina/'.$articulo['idinstitucion'],'generar web', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('articulo/articulo_'.$articulo['idinstitucion'],'Web', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>

        <li> <?php echo anchor('articulo/genpaginaprecios1/'.$articulo['idinstitucion'],'generar web', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('articulo/articuloprecios_'.$articulo['idinstitucion'],'Web', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('articulo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idarticulo',$articulo['idarticulo']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idarticulo",  "name"=>'idarticulo','value'=>$articulo['idarticulo'],"disabled"=>"disabled",'placeholder'=>'Idarticulos','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$articulo['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$articulo['detalle'],$textarea_options); 
		?>
	</div> 
</div>
  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foto:</label>
	<div class="col-md-10">
 <img src="https://educaysoft.org/descargar.php?archivo=articulos/articulo<?php echo $articulo['idarticulo']; ?>.jpg" alt="articulo" width="400" height="300"> 
  

	</div> 
<div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">


 <input type="file" id="fileInput<?php echo trim($articulo['idarticulo']); ?>" accept="image/*">
  <button onclick="uploadImage('articulo<?php echo trim($articulo['idarticulo']); ?>.jpg','<?php echo trim($articulo['idarticulo']); ?>')">Subir Imagen</button>
  <p id="status<?php echo trim($articulo['idarticulo']); ?>"></p> </div>';


</div>



<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12"	style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
		<?php echo anchor('ubicacionarticulo/add/'.$articulo['idarticulo'], 'Ubicación'); ?>:
        </div>
        
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatau">
	 <thead>
	 <tr>
	 <th>idubicacionarticulo</th>
	 <th>idarticulo</th>
	 <th>launidad</th>
	 <th>Responsable</th>
	 <th>fecha</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datau">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>





<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12"  style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
 <?php echo anchor('prestamoarticulo/add', 'Prestamo'); ?>:
        </div>
        
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idprestamo</th>
	 <th>idarticulo</th>
	 <th>lapersona</th>
	 <th>fecha prestamo.</th>
	 <th>hora prestamo.</th>
	 <th>fecha devolucion.</th>
	 <th>hora devolucion.</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>






<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12"  style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
 <?php echo anchor('precioarticulo/add', 'Precio'); ?>:
        </div>
        
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydataprecio">
	 <thead>
	 <tr>
	 <th>idprecio</th>
	 <th>idarticulo</th>
	 <th>precio</th>
	 <th>fecha desde.</th>
	 <th>fecha hasta.</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_dataprecio">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>








<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idarticulo=document.getElementById("idarticulo").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('articulo/ubicacion_data')?>', type: 'GET',data:{idarticulo:idarticulo}},});


	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('articulo/prestamo_data')?>', type: 'GET',data:{idarticulo:idarticulo}},});
	var mytablaf= $('#mydataprecio').DataTable({"ajax": {url: '<?php echo site_url('articulo/precio_data')?>', type: 'GET',data:{idarticulo:idarticulo}},});
});

$('#show_datau').on('click','.item_ver',function(){
var id= $(this).data('idubicacionarticulo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamoarticulo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


$('#show_dataprecio').on('click','.item_ver',function(){
var id= $(this).data('idprecioarticulo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





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
    return url.endsWith("/") ? url + "cargaimagen.php" : url + "/cargaimagen.php";
}










</script>


</body>









</html>
