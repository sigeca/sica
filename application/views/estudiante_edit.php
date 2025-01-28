<?php echo form_open('estudiante/save_edit') ?>
<?php echo form_hidden('idestudiante',$estudiante['idestudiante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id estudiante</td>
     <td><?php 


$eys_arrinput=array('name'=>'idestudiante','value'=>$estudiante['idestudiante'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $estudiante['idpersona']);  ?></td>
</tr>

<tr>
<td> Departamento/Carrera:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $estudiante['iddepartamento']);  ?></td>
</tr>

<tr>
      <td>Fecha de Desde:</td>
      <td><?php echo form_input( array("name"=>'fechadesde',"id"=>'fechadesde',"value"=>$estudiante['fechadesde'],'type'=>'date','placeholder'=>'fechadesde')); ?></td>
  </tr>

<tr>
      <td>Fecha de hasta:</td>
      <td><?php echo form_input( array("name"=>'fechahasta',"id"=>'fechahata',"value"=>$estudiante['fechahasta'],'type'=>'date','placeholder'=>'fechahasta')); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('estudiante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
