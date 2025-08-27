<?php echo form_open('tipogrupoparticipante/save_edit') ?>
<?php echo form_hidden('idtipogrupoparticipante',$tipogrupoparticipante['idtipogrupoparticipante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id tipogrupoparticipante:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idtipogrupoparticipante',$tipogrupoparticipante['idtipogrupoparticipante'],array('placeholder'=>'Idtipogrupoparticipante')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$tipogrupoparticipante['nombre'],array('placeholder'=>'Nombre tipogrupoparticipante')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipogrupoparticipante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
