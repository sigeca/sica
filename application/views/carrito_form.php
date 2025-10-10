<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("carrito/save") ?>

<div class="form-group row">
<label class="col-md-2 col-form-label">persona responsable:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos." - ".$row->nombres;
}
 echo form_dropdown("idpersona",$options,set_select('--Select--','default_value'), array('id'=>'idpersona'));  
?>
</div>
</div>





<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("carrito","Atras") ?> </td>
</tr>
</table>
<?php echo form_close();?>
