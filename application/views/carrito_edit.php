<?php echo form_open('carrito/save_edit') ?>
<?php echo form_hidden('idcarrito',$carrito['idcarrito']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Carrito:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idcarrito',$carrito['idcarrito'],array("id"=>"idcarrito","disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($personas as $row){
    // Asumiendo que 'eluser' o 'nombre' es el campo a mostrar de la persona/usuario
	$options[$row->idpersona]= isset($row->eluser) ? $row->eluser : $row->idpersona;
}

 echo form_dropdown("idpersona",$options, $carrito['idpersona']);  
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha:</label>
	<div class="col-md-10">
		<?php
      echo form_input('fecha',$carrito['fecha'],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('carrito','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
