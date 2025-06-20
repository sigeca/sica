
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("documentochklstportafolio/save") ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Checklist portafolio:</label>
	<div class="col-md-10">
		<?php
	$options= array('--Select--');
	foreach ($chklstportafolios as $row){
		$options[$row->idchklstportafolio]= $row->nombre;
	}

	 echo form_dropdown("idchklstportafolio",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 



 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Orden del documento:</label>
	<div class="col-md-10">
	<?php
	 echo form_input(array("name"=>"orden","id"=>"orden"));  
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Nombre de la unidad:</label>
	<div class="col-md-10">
	<?php
	echo form_input(array("name"=>"nombre","id"=>"nombre"));  
		?>
	</div> 
</div> 


<table>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("documentochklstportafolio","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

