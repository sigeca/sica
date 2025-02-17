<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($fechacalendario))
{
?>
        <li> <?php echo anchor('/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('/siguiente/'.$fechacalendario['idfechacalendario'], 'siguiente'); ?></li>
        <li> <?php echo anchor('/anterior/'.$fechacalendario['idfechacalendario'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('/edit/'.$fechacalendario['idfechacalendario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('/delete/'.$fechacalendario['idfechacalendario'],'Delete'); ?></li>
        <li> <?php echo anchor('/listar/'.$fechacalendario['idfechacalendario'],'Listar'); ?></li>

<?php 
}else{
?>
        <li> <?php echo anchor('/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('/save_edit') ?>
<?php echo form_hidden('id',$fechacalendario['idfechacalendario']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('id',$fechacalendario['idfechacalendario'],array("disabled"=>"disabled"));
		?>
	</div> 
</div> 








<div class="form-group row">
    <label class="col-md-2 col-form-label"> Actividad :</label>
	<div class="col-md-10">
		<?php
       echo form_input('actividad',$fechacalendario['actividad'],array('placeholder'=>'Nombre del fechacalendario','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:50%;height:100px;', "placeholder"=>"Tema a  tratar" );    

	echo form_textarea('detalle',$fechacalendario['detalle'],$textarea_options);

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Resultados:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:50%;height:100px;', "placeholder"=>"Tema a  tratar" );    

	echo form_textarea('resultados',$fechacalendario['resultados'],$textarea_options);

		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('',$fechacalendario['fechadesde'],array('type'=>'date','placeholder'=>'fecha desde','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('',$fechacalendario['fechahasta'],array('type'=>'date','placeholder'=>'fecha hasta','style'=>'width:500px;')) 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hito:</label>
	<div class="col-md-10">
		<?php
       echo form_input('actividad',$fechacalendario['hito'],array('placeholder'=>'Hito','style'=>'width:500px;'));
		?>
	</div> 
</div>












<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('calendarioacademico/actual/'.$['idcalendarioacademico'],'Calendario acadiemico:'); ?> </label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($calendarioacademicos as $row){
	$options[$row->idcalendarioacademico]= $row->elcalendarioacademico;
}
echo form_input('',$options[$['idcalendarioacademico']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Estado actividad:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($estadoactividades as $row){
	$options[$row->idestadoactividad]=$row->nombre;
}

echo form_input('idestadoactividad',$options[$['idestadoactividad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>




<?php echo form_close(); ?>



