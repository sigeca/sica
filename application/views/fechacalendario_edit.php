<?php echo form_open('fechacalendario/save_edit') ?>
<?php echo form_hidden('idfechacalendario',$fechacalendario['idfechacalendario']) ?>
<h2> <?php echo $title; ?></h2>
<hr />

<div class="form-group row">
    <label class="col-md-2 col-form-label"> idfechacalendario:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'idfechacalendario','value'=>$fechacalendario['idfechacalendario'], "style"=>"width:100px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde :</label>
	<div class="col-md-10">

      <?php echo form_input( array("name"=>'fechadesde',"id"=>'fechadesde',"value"=>$fechacalendario['fechadesde'],'type'=>'date','placeholder'=>'fecha desde'));

		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta :</label>
	<div class="col-md-10">

      <?php echo form_input( array("name"=>'fechahasta',"id"=>'fechahasta',"value"=>$fechacalendario['fechahasta'],'type'=>'date','placeholder'=>'fecha hasta'));

		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Actividad:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'actividad','value'=>$fechacalendario['actividad'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> detalle:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle" );    
echo form_textarea('detalle',$fechacalendario['detalle'],$textarea_options ); 

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Resultados:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle" );    
echo form_textarea('resultados',$fechacalendario['resultados'],$textarea_options ); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Calendario académico:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($calendarioacademicos as $row){
	$options[$row->idcalendarioacademico]= $row->elcalendarioacademico;
}

 echo form_dropdown("idcalendarioacademico",$options, $fechacalendario['idcalendarioacademico']);  
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hito:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'hito','value'=>$fechacalendario['hito'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Estado actividad:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($estadoactividades as $row){
	$options[$row->idestadoactividad]= $row->nombre;
}

 echo form_dropdown("idestadoactividad",$options, $fechacalendario['idestadoactividad']);  
		?>
	</div> 
</div>








 








 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('fechacalendario','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
