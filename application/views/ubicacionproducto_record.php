<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('ubicacionproducto/save_edit') ?>
    <ul>
<?php
if(isset($ubicacionproducto))
{
?>
 
        <li> <?php echo anchor('ubicacionproducto/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('ubicacionproducto/anterior/'.$ubicacionproducto['idubicacionproducto'], 'anterior'); ?></li>
        <li> <?php echo anchor('ubicacionproducto/siguiente/'.$ubicacionproducto['idubicacionproducto'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ubicacionproducto/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ubicacionproducto/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ubicacionproducto/edit/'.$ubicacionproducto['idubicacionproducto'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ubicacionproducto/delete/'.$ubicacionproducto['idubicacionproducto'],'Delete'); ?></li>
        <li> <?php echo anchor('ubicacionproducto/listar/'.$ubicacionproducto['idubicacionproducto'],'Listar'); ?></li>
	<li> <?php echo anchor('ubicacionproducto/reportepdf/'.$ubicacionproducto['idubicacionproducto'], 'Reportepdf'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('ubicacionproducto/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$ubicacionproducto['idubicacionproducto']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('unidad/actual/'.$ubicacionproducto['idunidad'], 'La unidad:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($unidades as $row){
	$options[$row->idunidad]= $row->nombre;
}

echo form_input('idunidad',$options[$ubicacionproducto['idunidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('producto/actual/'.$ubicacionproducto['idproducto'], 'El artículo:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($productos as $row){
	$options[$row->idproducto]= $row->nombre;
}

echo form_input('idproducto',$options[$ubicacionproducto['idproducto']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">   <?php echo anchor('persona/actual/'.$ubicacionproducto['idpersona'],'La persona: '); ?></label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

echo form_input('idpersona',$options[$ubicacionproducto['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha ubicación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$ubicacionproducto['fecha'],array('type'=>'date',"disabled"=>"disabled", 'placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$ubicacionproducto['detalle'],$textarea_options); 


		?>
	</div> 
</div>

























<?php echo form_close(); ?>





</body>









</html>
