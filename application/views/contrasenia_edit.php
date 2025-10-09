<?php echo form_open('contrasenia/save_edit') ?>
<?php echo form_hidden('idcontrasenia',$contrasenia['idcontrasenia']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>


<tr>
      <td>Dirección web:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'direccionweb','value'=>$contrasenia['direccionweb'], "style"=>"width:100%");
 echo form_input($eys_arrinput); ?></td>
  </tr>

    
  <tr>
      <td>Usuario:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'usuario','value'=>$contrasenia['usuario'], "style"=>"width:100%");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>Password:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'password','value'=>$contrasenia['password'], "style"=>"width:500px");
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
