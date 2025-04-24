<!--Arhivo: modeevaluacion_edit.php -->
<!--Modulo: cumplimientosesion -->
<!--Descripción: vista que permite modificar la información del modo de evaluacion -->
<!--Autor: Stalin Francis -->
<!--Fecha: Ultima evaluación: Sabado 4 febrero 2023 -->


<?php echo form_open('cumplimientosesion/save_edit') ?>
<?php echo form_hidden('idcumplimientosesion',$cumplimientosesion['idcumplimientosesion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id cumplimientosesion</td>
     <td><?php 


$eys_arrinput=array('name'=>'idcumplimientosesion','value'=>$cumplimientosesion['idcumplimientosesion'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 




  <tr>
      <td>Nombre:</td>
      <td><?php
$eys_arrinput=array('name'=>'nombre','value'=>$cumplimientosesion['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>Ponderación:</td>
      <td><?php
$eys_arrinput=array('name'=>'ponderacion','value'=>$cumplimientosesion['ponderacion'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('cumplimientosesion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
