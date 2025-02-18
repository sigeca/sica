<?php echo form_open('grupoparticipante/save_edit') ?>
<?php echo form_hidden('idgrupoparticipante',$grupoparticipante['idgrupoparticipante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id grupoparticipante</td>
     <td><?php 


$eys_arrinput=array('name'=>'idgrupoparticipante','value'=>$grupoparticipante['idgrupoparticipante'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla." - ".$row->area." - ".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, $grupoparticipante['idasignatura']);  ?></td>
</tr>

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($tipogrupoparticipantes as $row){
	$options[$row->idtipogrupoparticipante]= $row->nombre;
}

 echo form_dropdown("idtipogrupoparticipante",$options, $grupoparticipante['idtipogrupoparticipante']);  ?></td>
</tr>

<tr>
      <td>Cantidad:</td>
      <td><?php echo form_input( array("name"=>'cantidad',"id"=>'cantidad',"value"=>$grupoparticipante['cantidad'],'type'=>'text','placeholder'=>'cantidad')); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('grupoparticipante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
