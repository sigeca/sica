<?php echo form_open('contrasenia/save_edit') ?>
<?php echo form_hidden('idcontrasenia',$contrasenia['idcontrasenia']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
    
  <tr>
      <td>Nombre largo:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombrelargo','value'=>$contrasenia['nombrelargo'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>Nombre corto:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombrecorto','value'=>$contrasenia['nombrecorto'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
      <td>Fecha inicio :</td>
      <td><?php echo form_input( array("name"=>'fechainicio',"id"=>'fechainicio',"value"=>$contrasenia['fechainicio'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>




<tr>
      <td>Fecha fin :</td>
      <td><?php echo form_input( array("name"=>'fechafin',"id"=>'fechafin',"value"=>$contrasenia['fechafin'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>









 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('contrasenia','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
