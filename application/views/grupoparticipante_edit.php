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
      <td>Fecha desde:</td>
<td><?php echo form_input(array("name"=>'fechadesde',"id"=>"fechadesde","value"=>$grupoparticipante['fechadesde'],"type"=>"date")); ?></td>
  </tr>

<tr>
      <td>Fecha hasta:</td>
<td><?php echo form_input(array("name"=>'fechahasta',"id"=>"fechahasta","value"=>$grupoparticipante['fechahasta'],"type"=>"date")); ?></td>
  </tr>
 
 

<tr>
<td> Topo de grupo:</td>
<td><?php
$options= array('--Select--');
foreach ($tipogrupoparticipantes as $row){
	$options[$row->idtipogrupoparticipante]= $row->nombre;
}

 echo form_dropdown("idtipogrupoparticipante",$options, $grupoparticipante['idtipogrupoparticipante']);  ?></td>
</tr>

<tr>
      <td>grupo:</td>
      <td><?php echo form_input( array("name"=>'nombre',"id"=>'nombre',"value"=>$grupoparticipante['nombre'],'type'=>'text','placeholder'=>'nombre')); ?></td>
  </tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('grupoparticipante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
