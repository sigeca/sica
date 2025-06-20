<?php echo form_open('chklstportafolio/save_edit') ?>
<?php echo form_hidden('idchklstportafolio',$chklstportafolio['idchklstportafolio']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del chklstportafolio:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'nombre','value'=>$chklstportafolio['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asunto:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"descripcion","id" =>"descripcion");    
echo form_textarea('descripcion',$chklstportafolio['descripcion'],$textarea_options ); 
?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración(horas):</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'duracion','value'=>$chklstportafolio['duracion'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Page detalle:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'linkdetalle','value'=>$chklstportafolio['linkdetalle'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignatura:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla."-".$row->area."-".$row->nombre;
}
 echo form_dropdown("idasignatura",$options, $chklstportafolio['idasignatura']);  
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo académico:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}
echo form_dropdown("idperiodoacademico",$options, $chklstportafolio['idperiodoacademico']);  	
?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docente:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

echo form_dropdown("iddocente",$options, $chklstportafolio['iddocente']); 

?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Link detalle:</label>
	<div class="col-md-10">
		<?php
 echo form_input("linkdetalle",$chklstportafolio['linkdetalle'], array("placeholder"=>"Link de detalle"));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Documentos:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->autor." - ". $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $chklstportafolio['iddocumento']);  

		?>
	</div> 
</div>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('chklstportafolio','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
