<?php echo form_open('articuloreglamento/save_edit') ?>
<?php echo form_hidden('idarticuloreglamento',$articuloreglamento['idarticuloreglamento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>


<tr>
<td> reglamento:</td>
<td><?php
$options= array('--Select--');
foreach ($reglamentos as $row){
	$options[$row->idreglamento]= $row->nombre;
}

 echo form_dropdown("idreglamento",$options, $articuloreglamento['idreglamento']);  ?></td>
</tr>

<tr>
      <td>Número:</td>
      <td><?php echo form_input('numero',$articuloreglamento['numero'],array('placeholder'=>'Nombre del ', "style"=>"width:500px")) ?></td>
  </tr>



<tr>
      <td>Contenido:</td>
<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '20',   'cols' => '20', 'style'=> 'width:50%;height:200px;', "placeholder"=>"contenido del articuloreglamento" );    
      echo form_textarea('contenido',$articuloreglamento['contenido'],$textarea_options) ?></td>
  </tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('articuloreglamento','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
