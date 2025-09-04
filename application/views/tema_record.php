<div id="eys-nav-i">
<div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="idtema"><?php echo $tema['idtema']; ?></span>
        </span>
        <?php echo ($tema['eliminado']==1)? '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>':'<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; ?>
    </div>

   <?php
$permitir_acceso_modulo=true; 
    if(isset($tema)) {
        $permitir=0;
        $j=0;
        $numero=$j;
        if(isset($this->session->userdata['acceso'])) {
            foreach($this->session->userdata['acceso'] as $row) 
            {
                if("tema"==$row["modulo"]["modulo"]) {
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
        <li> <?php echo anchor('tema/elprimero/', 'primero', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('tema/siguiente/'.$tema['idtema'], 'siguiente', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('tema/anterior/'.$tema['idtema'], 'anterior', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;" ><?php echo anchor('tema/elultimo/', 'Último', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('tema/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('tema/edit/'.$tema['idtema'],'Edit', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;" > <?php echo anchor('tema/quitar/'.$tema['idtema'],'Quitar', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('tema/listar/'.$tema['idunidadsilabo'],'Listar', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('temaunidad/','Unidades', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('tema/panel/','Panel', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('tema/reportepdf/'.$tema['idtema'],'reportepdf', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>

    </ul>
    <?php } ?>
    <?php
    } else {
    ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li><?php echo anchor('tema/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
    </ul>
    <?php
    }
    ?>
</div>
<br>
<br>





<?php echo form_open('tema/save_edit') ?>
<?php echo form_hidden('idtema',$tema['idtema']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idtema',$tema['idtema'],array("disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto:</label>
	<div class="col-md-10">
		<?php


       echo form_input('nombrecorto',$tema['nombrecorto'],array('placeholder'=>'Nombre del tema','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('nombrelargo',$tema['nombrelargo'],$textarea_options);
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Objetivo aprendizaje:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('objetivoaprendizaje',$tema['objetivoaprendizaje'],$textarea_options);
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Experiencia(conocimiento previo):</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('experiencia',$tema['experiencia'],$textarea_options);
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Reflexión(arranque):</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('reflexion',$tema['reflexion'],$textarea_options);
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Secuencia contenidos:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4', 'id'=>'secuencia',  'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('secuencia',$tema['secuencia'],$textarea_options);
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Aprendizaje autonomo:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('aprendizajeautonomo',$tema['aprendizajeautonomo'],$textarea_options);
		?>
	</div> 
</div>








   

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Unidad del silabo: ( <?php echo anchor('unidadsilabo/actual/'.$tema['idunidadsilabo'], 'Ver'); ?>):</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
  	foreach ($unidadsilabos as $row){
		$options[$row->idunidadsilabo]=$row->elsilabo." - ".$row->launidad;
	}
	?>
		<?php

    echo form_input('idunidadsilabo',$options[$tema['idunidadsilabo']],array("disabled"=>"disabled",'style'=>'width:600px;')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Número de sesión:</label>
	<div class="col-md-10">
		<?php
       echo form_input('numerosesion',$tema['numerosesion'],array('placeholder'=>'número de sisión','style'=>'width:50px;'));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración (minutos):</label>
	<div class="col-md-10">
		<?php
       echo form_input('duracionminutos',$tema['duracionminutos'],array('placeholder'=>'duracion minutos','style'=>'width:100px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('metodoaprendizajetema/add/'.$tema['idtema'], 'Metodo:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($metodoaprendizajetemas as $row){
		$options[$row->idmetodoaprendizajetema]=$row->elmetodo;
	}
 echo form_multiselect('metodoaprendizajetema[]',$options,(array)set_value('idmetodoaprendizajetema', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div>








<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id videotutorial:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idvideotutorial',$tema['idvideotutorial'],array("disabled"=>"disabled",'placeholder'=>'Idunidadsilaboes','style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">Videotutorial:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($videotutoriales as $row){
	$options[$row->idvideotutorial]= $row->nombre;
}
echo form_input('nombre',$options[$tema['idvideotutorial']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Link presentación:</label>
	<div class="col-md-10">
		<?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('linkpresentacion',$tema['linkpresentacion'],$textarea_options);
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Modo de evaluación: </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->ponderacion." - ".$row->nombre;
}

echo form_input('idmodoevaluacion',$options[$tema['idmodoevaluacion']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Aula:</label>
	<div class="col-md-10">
		<?php
    $options= array("NADA");
    foreach ($aulas as $row){
	      $options[$row->idaula]= $row->nombre;
    }
    echo form_input('idaula',$options[$tema['idaula']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>





<?php echo form_close(); ?>

<script>

$(document).ready(function(){


	 tinymce.init({
		 selector:'#secuencia',
			 height :300,
			readonly: true,
  toolbar: false,
  menubar: false,
  statusbar: false

	});
});
</script>



