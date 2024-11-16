<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($aula))
{
?>
        <li> <?php echo anchor('aula/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('aula/siguiente/'.$aula['idaula'], 'siguiente'); ?></li>
        <li> <?php echo anchor('aula/anterior/'.$aula['idaula'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('aula/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('aula/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('aula/edit/'.$aula['idaula'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('aula/delete/'.$aula['idaula'],'Delete'); ?></li>
        <li> <?php echo anchor('aula/listar/','Listar'); ?></li>
        <li> <?php echo anchor('aula/genpagina/1','generar web'); ?></li>
        <li> <?php echo anchor('aula/vistaweb','Web'); ?></li>

		<li> <?php echo anchor('aula/reportepdf/'.$aula['idinstitucion'],'reportepdf'); ?></li>
<?php 
}else{
?>

        <li> <?php echo anchor('aula/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idaula',$aula['idaula']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idaula",  "name"=>'idaula','value'=>$aula['idaula'],"disabled"=>"disabled",'placeholder'=>'Idaulas','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$aula['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$aula['detalle'],$textarea_options); 
		?>
	</div> 
</div>
  


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Ubicación:</label>
	<div class="col-md-10">
 <img src="https://repositorioutlvte.org/Repositorio/aulas/aula<?php echo $aula['idaula']; ?>.jpg" alt="aula" width="400" height="300"> 
	</div> 

<div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">


 <input type="file" id="fileInput<?php echo trim($aula['idaula']); ?>" accept="image/*">
  <button onclick="uploadImage('aula<?php echo trim($aula['idaula']); ?>.jpg','<?php echo trim($aula['idaula']); ?>')">Subir Imagen</button>
  <p id="status<?php echo trim($aula['idaula']); ?>"></p> </div>



</div>
  





<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('Joranadadocente/add', 'Uso'); ?>: </label>
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idaula</th>
	 <th>asignatura</th>
	 <th>horainicio</th>
	 <th>duracionminutos.</th>
	 <th>nombre</th>
	 <th>nivel.</th>
	 <th>paralelo.</th>
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





<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idaula=document.getElementById("idaula").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('aula/prestamo_data')?>', type: 'GET',data:{idaula:idaula}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamoaula');
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
    var url = "https://repositorioutlvte.org";
    return url.endsWith("/") ? url + "cargaimagenaula.php" : url + "/cargaimagenaula.php";
}









</script>


</body>









</html>
