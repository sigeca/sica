<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($articuloreglamento))
{
?>
        <li> <?php echo anchor('articuloreglamento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('articuloreglamento/siguiente/'.$articuloreglamento['idarticuloreglamento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('articuloreglamento/anterior/'.$articuloreglamento['idarticuloreglamento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('articuloreglamento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('articuloreglamento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('articuloreglamento/edit/'.$articuloreglamento['idarticuloreglamento'],'Edit'); ?></li>
      <!--  <li style="border-right:1px solid green"> <?php echo anchor('articuloreglamento/delete/'.$articuloreglamento['idarticuloreglamento'],'Delete'); ?></li> --->
        <li> <?php echo anchor('articuloreglamento/listar/','Listar'); ?></li>
        <li> <?php echo anchor('articuloreglamento/genpagina/1','generar web'); ?></li>
        <li> <?php echo anchor('articuloreglamento/articuloreglamento_1','Web'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('articuloreglamento/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idarticuloreglamento',$articuloreglamento['idarticuloreglamento']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idarticuloreglamento",  "name"=>'idarticuloreglamento','value'=>$articuloreglamento['idarticuloreglamento'],"disabled"=>"disabled",'placeholder'=>'Idarticuloreglamentos','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$articuloreglamento['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('contenido',$articuloreglamento['contenido'],$textarea_options); 
		?>
	</div> 
</div>
  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Archivo:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('archivo',$articuloreglamento['archivo'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('reglamento/actual/'.$articuloreglamento['idreglamento'], 'El trámite:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($reglamentos as $row){
	$options[$row->idreglamento]= $row->nombre;
}

echo form_input('idreglamento',$options[$articuloreglamento['idreglamento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Orden:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'numero','value'=>$articuloreglamento['numero'],"disabled"=>"disabled",'placeholder'=>'Orden','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foto:</label>
	<div class="col-md-10">
 <img src="https://repositorioutlvte.org/Repositorio/articuloreglamento/articuloreglamento<?php echo $articuloreglamento['idarticuloreglamento']; ?>.jpg" alt="articuloreglamento" width="400" height="300"> 
  

	</div> 
<div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">


 <input type="file" id="fileInput<?php echo trim($articuloreglamento['idarticuloreglamento']); ?>" accept="image/*">
  <button onclick="uploadImage('articuloreglamento<?php echo trim($articuloreglamento['idarticuloreglamento']); ?>.jpg','<?php echo trim($articuloreglamento['idarticuloreglamento']); ?>')">Subir Imagen</button>
  <p id="status<?php echo trim($articuloreglamento['idarticuloreglamento']); ?>"></p> </div>';


</div>















<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idarticuloreglamento=document.getElementById("idarticuloreglamento").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('articuloreglamento/ubicacion_data')?>', type: 'GET',data:{idarticuloreglamento:idarticuloreglamento}},});


	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('articuloreglamento/prestamo_data')?>', type: 'GET',data:{idarticuloreglamento:idarticuloreglamento}},});
});

$('#show_datau').on('click','.item_ver',function(){
var id= $(this).data('idubicacionarticuloreglamento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamoarticuloreglamento');
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
    var selectElement = document.getElementById("idnumeroador");
    var url = "https://repositorioutlvte.org";
    return url.endsWith("/") ? url + "cargaimagenarticuloreglamento.php" : url + "/cargaimagenarticuloreglamento.php";
}










</script>


</body>









</html>
