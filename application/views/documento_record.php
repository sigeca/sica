<div id="eys-nav-i">
<div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="iddocumento"><?php echo $documento['iddocumento']; ?></span>
        </span>
        <?php echo ($documento['eliminado']==1)? '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>':'<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; ?>
    </div>

<?php
$permitir_acceso_modulo=true; 
if(isset($documento)){
	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if($row["modulo"]["id"]==16) //modulo documento
			{
				$numero=$j; //el inidice del arreglo donde estan los permisos
				$permitir=1; //indicador de que si se encontro permisos
			}
			$j=$j+1;
	    	}
	}
	if($permitir==0){
		redirect('login/logout');
	}
?>

    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li> <?php echo anchor('documento/elprimero/', 'primero','style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('documento/siguiente/'.$documento['iddocumento'], 'siguiente', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('documento/anterior/'.$documento['iddocumento'], 'anterior', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"><?php echo anchor('documento/elultimo/', 'Último', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['create']){ ?>
        <li> <?php echo anchor('documento/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
	<?php } ?>


	<?php
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['update']){ ?>

        <li> <?php echo anchor('documento/edit/'.$documento['iddocumento'],'Edit', 'style="text-decoration:none; color:#ffc107; font-weight:bold;"'); ?></li>
	<?php } ?>

	<?php
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['delete']){ ?>

        <li  style="border-right:1px solid #ccc; padding-right:15px;" > <?php echo anchor('documento/delete/'.$documento['iddocumento'],'Delete', 'style="text-decoration:none; color:#dc3545; font-weight:bold;"'); ?></li>
	<?php } ?>

	<?php
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['read']){ ?>
		<li> <?php echo anchor('documento/listar/','Listar'); ?></li>
	<?php } ?>



        <li style="border-right:1px solid #ccc; padding-right:15px;"   > <?php echo "<a onclick='verpdf()'>Ver PDF</a>" ?></li>
		<li> <?php echo anchor('documento/reportepdf/'.$documento['idtipodocu'],'reportepdf', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>

        <li> <?php echo anchor('documento/genpagina/'.$documento['idtipodocu'],'generar web', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('documento/documento_'.$documento['idtipodocu'],'Web', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>

    </ul>
<?php
}else{
?>

    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li> <?php echo anchor('evento_estado/add', 'Nuevo'); ?></li>
    </ul>
<?php
}
?>

</div>
<br>
<br>


<?php echo form_open('documento/save_edit') ?>
<?php echo form_hidden('iddocumento',$documento['iddocumento']) ?>


<div class="container" style="max-width:900px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    <div class="form-group row mb-3">
    <label class="col-md-3 col-form-label" style="font-weight:bold;"> <?php echo anchor('tipodocu/elprimero/', 'Tipo documento'); ?> :</label>
     	<?php
	$options= array("NADA");
	foreach ($tipodocus as $row){
		$options[$row->idtipodocu]= $row->descripcion;
	}
	$arrdatos=array('name'=>'idtipodocu','value'=>$options[$documento['idtipodocu']],"disabled"=>"disabled","style"=>"width:100%");
	?>
	<div class="col-md-10">
		<?php
			echo form_input($arrdatos)
		?>
	</div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipodocumentodocumento/add/'.$documento['iddocumento'], 'Tipodocumento:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
 	$arrurl2 = array();
  	foreach ($tipodocumentodocumentos as $row){
		$options[$row->idtipodocumentodocumento]=$row->nombre;
		$arrurl2[$row->idtipodocumentodocumento]= base_url().'tipodocumentodocumento/actual/'.$row->idtipodocumentodocumento;
	}
 echo form_multiselect('tipodocumentodocumento[]',$options,(array)set_value('idtipodocumentodocumento', ''), array('style'=>'width:100%','name'=>'idtipodocumentodocumento','id'=> 'idtipodocumentodocumento','onChange'=>'editartipodocumento()'));

	?>
	</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('destinodocumento/elprimero/', 'Destino documento'); ?> :</label>
     	<?php
	$options= array("NADA");
	foreach ($destinodocumentos as $row){
		$options[$row->iddestinodocumento]= $row->nombre;
	}
	$arrdatos=array('name'=>'iddestinodocumento','value'=>$options[$documento['iddestinodocumento']],"disabled"=>"disabled","style"=>"width:100%");
	?>
	<div class="col-md-10">
		<?php
			echo form_input($arrdatos)
		?>
	</div>
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de creación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechaelaboracion',$documento['fechaelaboracion'],array('type'=>'date','placeholder'=>'fechaelaboracion','style'=>'width:100%;'))
		?>
	</div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de subida:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechasubida',$documento['fechasubida'],array('type'=>'date','placeholder'=>'fecha de carga','style'=>'width:100%;'))
		?>
	</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('emisor/add/'.$documento['iddocumento'], 'Emisor/emisores:') ?> </label>
     	<?php

	$options = array();
    $arractu=array();
  	foreach ($emisores as $row){
		$options[$row->idpersona]=$row->elemisor;
		$arractu[$row->idemisor]= base_url().'emisor/actual/'.$row->idemisor;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idemisor[]',$options,(array)set_value('idemisor', ''), array('style'=>'width:100%','name'=>'idemisor','id'=>'idemisor','onChange'=>'editaremisor()'));
		?>
	</div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('destinatario/add/'.$documento['iddocumento'], 'Destinatarios/as:') ?> </label>
     	<?php
	$options=array();
  	foreach ($destinatarios as $row){
		$options[$row->idpersona]=$row->eldestinatario;
	}
	?>
	<div class="col-md-10">
		<?php
 			echo form_multiselect('iddestinatario[]',$options,(array)set_value('iddestinatario',''), array('style'=>'width:100%;'));
		?>
	</div>
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asunto:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:100%;height:100px;');
 echo form_textarea('asunto',$documento['asunto'],$textarea_options);
		?>
	</div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripción:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:100%;height:100px;');
 echo form_textarea('descripcion',$documento['descripcion'],$textarea_options);
		?>
	</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <a href="<?php echo base_url(); ?>index.php/documento/show_pdf/<?php echo $documento['iddocumento']; ?>">Archivo_Pdf</a>   </label>
	<div class="col-md-10">
		<?php
      echo form_input('archivopdf',$documento['archivopdf'],array("id"=>"archivopdf","disabled"=>"disabled",'placeholder'=>'Archivo php','style'=>'width:100%;'));

		?>
	</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ordenador:</label>
     	<?php
	$options= array("NADA");
	foreach ($ordenadores as $row){
		$options[$row->idordenador]= $row->nombre;
	}

	?>
	<div class="col-md-10">
		<?php
			echo form_input('idordenador',$options[$documento['idordenador']],array("id"=>"idordenador","disabled"=>"disabled",'style'=>'width:100%;'));
		?>
	</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Directorio:</label>
     	<?php
	$options= array("NADA");
	foreach ($directorios as $row){
		$options[$row->iddirectorio]= $row->ruta;
	}
	?>
	<div class="col-md-10">
		<?php
		echo form_input('iddirectorio',$options[$documento['iddirectorio']],array("id"=>"iddirectorio", "disabled"=>"disabled",'style'=>'width:100%;'));
		?>
	</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Estado del documento:</label>
     	<?php
$options= array("NADA");
foreach ($documento_estados as $row){
	$options[$row->iddocumento_estado]= $row->nombre;
}

	?>
	<div class="col-md-10">
		<?php


echo form_input('iddocumento_estado',$options[$documento['iddocumento_estado']],array('id'=>'iddocumento_estado', "disabled"=>"disabled",'style'=>'width:100%;'));
		?>
	</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Portada:</label>
	<div class="col-md-10">
 <img src="https://educaysoft.org/repositorioeys/portadas/<?php echo pathinfo(trim($documento['archivopdf']),PATHINFO_FILENAME); ?>.jpg" alt="portada del documento"  height="400">


	</div>
<div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">


 <input type="file" id="fileInput<?php echo trim($documento['iddocumento']); ?>" accept="image/*">
  <button onclick="uploadImage('<?php echo pathinfo(trim($documento['archivopdf']),PATHINFO_FILENAME); ?>.jpg','<?php echo trim($documento['iddocumento']); ?>')">Subir Imagen</button>
  <p id="status<?php echo trim($documento['iddocumento']); ?>"></p> </div>


</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Previsualización del Documento:</label>
    <div class="col-md-10">
        <iframe id="pdfPreview" style="width: 100%; height: 600px; border: none;"></iframe>
    </div>
</div>

</div>
<?php echo form_close(); ?>



<script>
var inputval=document.getElementById("iddocumento_estado").value;
if (inputval == "NO CARGADO"){
	document.getElementById("iddocumento_estado").style.backgroundColor="red";
}else{

	document.getElementById("iddocumento_estado").style.backgroundColor="green";
}


function verpdf(){

var orde=document.getElementById("idordenador").value;
var dire=document.getElementById("iddirectorio").value;
var ordenador = "https://"+orde;
var ubicacion=dire;
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archi=document.getElementById("archivopdf").value;
var archivo =archi;
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;


}

function editaremisor()
{

	var options = document.getElementById('idemisor').selectedOptions;
	  var idemisor = Array.from(options).map(({ value }) => value);
       var refe = JSON.parse('<?= json_encode($arractu); ?>');
	console.log(refe[idemisor]);
	window.location.href = refe[idemisor];

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
   // var selectElement = document.getElementById("idordenador");
    var url = "https://repositorioutlvte.org";
    return url.endsWith("/") ? url + "cargaimagenportada.php" : url + "/cargaimagenportada.php";
}

// Function to load PDF into the iframe for preview
document.addEventListener('DOMContentLoaded', function() {
    var pdfFileName = "<?php echo $documento['archivopdf']; ?>";
    var pdfViewer = document.getElementById('pdfPreview');
    if (pdfFileName) {
        var pdfUrl = "https://educaysoft.org/repositorioeys/" + pdfFileName.trim();
        pdfViewer.src = pdfUrl;
    }
});

</script>



</body>







</html>
