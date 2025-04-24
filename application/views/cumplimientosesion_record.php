<!--Arhivo: modeevaluacion_record.php -->
<!--Modulo: cumplimientosesion -->
<!--Descripción: vista que permite visualizar la información del modo de evaluacion -->
<!--Autor: Stalin Francis -->
<!--Fecha: Ultima evaluación: Sabado 4 febrero 2023 -->

<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($cumplimientosesion))
{
?>
        <li> <?php echo anchor('cumplimientosesion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('cumplimientosesion/siguiente/'.$cumplimientosesion['idcumplimientosesion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('cumplimientosesion/anterior/'.$cumplimientosesion['idcumplimientosesion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('cumplimientosesion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('cumplimientosesion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('cumplimientosesion/edit/'.$cumplimientosesion['idcumplimientosesion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('cumplimientosesion/delete/'.$cumplimientosesion['idcumplimientosesion'],'Delete'); ?></li>
        <li> <?php echo anchor('cumplimientosesion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('cumplimientosesion/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('cumplimientosesion/save_edit') ?>
<?php echo form_hidden('idcumplimientosesion',$cumplimientosesion['idcumplimientosesion']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idcumplimientosesion',$cumplimientosesion['idcumplimientosesion'],array("disabled"=>"disabled",'placeholder'=>'Idcumplimientosesions'));
	?>
	</div> 
</div> 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$cumplimientosesion['nombre'],array('placeholder'=>'Nombre del cumplimientosesion')); 

	?>
	</div> 
</div> 
   
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ponderación:</label>
	<div class="col-md-10">
     <?php
       echo form_input('ponderacion',$cumplimientosesion['ponderacion'],array('placeholder'=>'ponderación de la evaluacion')); 
	?>
	</div> 
</div>



<?php echo form_close(); ?>



