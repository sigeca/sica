<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($literalreglamento))
{
?>
        <li> <?php echo anchor('literalreglamento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('literalreglamento/siguiente/'.$literalreglamento['idliteralreglamento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('literalreglamento/anterior/'.$literalreglamento['idliteralreglamento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('literalreglamento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('literalreglamento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('literalreglamento/edit/'.$literalreglamento['idliteralreglamento'],'Edit'); ?></li>
      <!--  <li style="border-right:1px solid green"> <?php echo anchor('literalreglamento/delete/'.$literalreglamento['idliteralreglamento'],'Delete'); ?></li> --->
        <li> <?php echo anchor('literalreglamento/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('literalreglamento/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idliteralreglamento',$literalreglamento['idliteralreglamento']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idliteralreglamento",  "name"=>'idliteralreglamento','value'=>$literalreglamento['idliteralreglamento'],"disabled"=>"disabled",'placeholder'=>'Idliteralreglamentos','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('reglamento/actual/'.$literalreglamento['idreglamento'], 'Reglamento:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($articuloreglamentos as $row){
	$options[$row->idarticuloreglamento]= $row->titulo;
}

echo form_input('idarticuloreglamento',$options[$literalreglamento['idarticuloreglamento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Literal:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'letra','value'=>$literalreglamento['letra'],"disabled"=>"disabled",'placeholder'=>'Orden','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>





 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Contenido:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '20','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:200px;');    
 echo form_textarea('contenido',$literalreglamento['contenido'],$textarea_options); 
		?>
	</div> 
</div>
  





























<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idliteralreglamento=document.getElementById("idliteralreglamento").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('literalreglamento/ubicacion_data')?>', type: 'GET',data:{idliteralreglamento:idliteralreglamento}},});


	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('literalreglamento/prestamo_data')?>', type: 'GET',data:{idliteralreglamento:idliteralreglamento}},});
});

$('#show_datau').on('click','.item_ver',function(){
var id= $(this).data('idubicacionliteralreglamento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamoliteralreglamento');
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
    return url.endsWith("/") ? url + "cargaimagenliteralreglamento.php" : url + "/cargaimagenliteralreglamento.php";
}










</script>


</body>









</html>
