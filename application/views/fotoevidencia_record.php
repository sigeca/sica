<div id="eys-nav-i">
    <div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="idpersona"><?php echo $fotoevidencia['idfotoevidencia']; ?></span>
        </span>
        <?php echo ($fotoevidencia['eliminado']==1)? '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>':'<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; ?>
    </div>

    <?php
$permitir_acceso_modulo=true; 
    if(isset($fotoevidencia)) {
        $permitir=0;
        $j=0;
        $numero=$j;
        if(isset($this->session->userdata['acceso'])) {
            foreach($this->session->userdata['acceso'] as $row) 
            {
                if("fotoevidencia"==$row["modulo"]["modulo"]) {
                    $numero=$j;
                    $permitir=1;
                }
                $j=$j+1;
            }
        }
        if($permitir==0) {
            redirect('login/logout');
        }
    ?>


    <?php if($this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']){ ?>

    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">

        <li> <?php echo anchor('fotoevidencia/elprimero/', 'primero', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('fotoevidencia/siguiente/'.$fotoevidencia['idfotoevidencia'], 'siguiente', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('fotoevidencia/anterior/'.$fotoevidencia['idfotoevidencia'], 'anterior', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li  style="border-right:1px solid #ccc; padding-right:15px;"><?php echo anchor('fotoevidencia/elultimo/', 'Último', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('fotoevidencia/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"> <?php echo anchor('fotoevidencia/edit/'.$fotoevidencia['idfotoevidencia'],'Edit', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
      <!--  <li style="border-right:1px solid green"> <?php echo anchor('fotoevidencia/delete/'.$fotoevidencia['idfotoevidencia'],'Delete'); ?></li> --->
        <li> <?php echo anchor('fotoevidencia/listar/','Listar', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('fotoevidencia/genpagina/1','generar web', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('fotoevidencia/fotoevidencia_1','Web', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
    </ul>
    <?php } ?>
    <?php
    } else {
    ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li><?php echo anchor('persona/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
    </ul>
    <?php
    }
    ?>
</div>
<br>
<br>







<?php echo form_hidden('idfotoevidencia',$fotoevidencia['idfotoevidencia']) ?>
<div class="container" style="max-width:900px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

 

 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idfotoevidencia",  "name"=>'idfotoevidencia','value'=>$fotoevidencia['idfotoevidencia'],"disabled"=>"disabled",'placeholder'=>'Idfotoevidencias','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$fotoevidencia['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$fotoevidencia['detalle'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha tomada:</label>
	<div class="col-md-10">
	<?php
      echo form_input('fechatomada',$fotoevidencia['fechatomada'],array("disabled"=>"disabled",'placeholder'=>'Fechanacimiento','style'=>'width:600px;')) ;
	?>
	</div> 
</div>

 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foto:</label>
	<div class="col-md-10">
 <img src="https://educaysoft.org/repositorioeys/fotoevidencias/fotoevidencia<?php echo $fotoevidencia['idfotoevidencia']; ?>.jpg" alt="fotoevidencia" width="400" height="300"> 
  

	</div> 
<div class="img-contenedor w3-card-4" style="position:relative; width:100%; height:100%; display:flex; justify-content: center; align-items: center;">


 <input type="file" id="fileInput<?php echo trim($fotoevidencia['idfotoevidencia']); ?>" accept="image/*">
  <button onclick="uploadImage('fotoevidencia<?php echo trim($fotoevidencia['idfotoevidencia']); ?>.jpg','<?php echo trim($fotoevidencia['idfotoevidencia']); ?>')">Subir Imagen</button>
  <p id="status<?php echo trim($fotoevidencia['idfotoevidencia']); ?>"></p> </div>';


</div>















<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idfotoevidencia=document.getElementById("idfotoevidencia").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('fotoevidencia/ubicacion_data')?>', type: 'GET',data:{idfotoevidencia:idfotoevidencia}},});


	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('fotoevidencia/prestamo_data')?>', type: 'GET',data:{idfotoevidencia:idfotoevidencia}},});
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
    return url.endsWith("/") ? url + "cargafotoevidencia.php" : url + "/cargafotoevidencia.php";
}










</script>


</body>









</html>
