<?php echo form_open('documentotrabajointegracioncurricular/save_edit') ?>
<?php echo form_hidden('iddocumentotrabajointegracioncurricular',$documentotrabajointegracioncurricular['iddocumentotrabajointegracioncurricular']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id documentotrabajointegracioncurricular</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddocumentotrabajointegracioncurricular','value'=>$documentotrabajointegracioncurricular['iddocumentotrabajointegracioncurricular'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Documentos:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]=$row->iddocumento.' - '.$row->autor." - ". $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $documentotrabajointegracioncurricular['iddocumento']);  ?></td>
</tr>

<tr>
<td> Portafolio:</td>
<td><?php
$options= array('--Select--');
foreach ($trabajointegracioncurriculars as $row){
	$options[$row->idtrabajointegracioncurricular]= $row->idtrabajointegracioncurricular." - ".$row->nombre;
}

 echo form_dropdown("idtrabajointegracioncurricular",$options, $documentotrabajointegracioncurricular['idtrabajointegracioncurricular']);  ?></td>
</tr>


<tr>
<td> Actividad academica: </td>
<td><?php 

$options= array('--Select--');
foreach ($docenteactividadacademicas as $row){
	$options[$row->iddocenteactividadacademica]=$row->item." - ". $row->eldistributivodocente." - ".$row->nombreactividad." - (".$row->numerohoras.")";
}

 echo form_dropdown("iddocenteactividadacademica",$options,$documentotrabajointegracioncurricular['iddocenteactividadacademica']);  ?></td>
</tr>

<tr>
<td> Minutos ocupados: </td>
<td><?php echo form_input("minutosocupados",$documentotrabajointegracioncurricular['minutosocupados'], array("placeholder"=>"Minutos utilizados"))  ?></td>
</tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('documentotrabajointegracioncurricular','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
