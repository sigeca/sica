<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("chklstportafolio/save") ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del chklstportafolio:</label>
	<div class="col-md-10">
		<?php
 echo form_input("nombre","", array("placeholder"=>"Nombre de chklstportafolio",'style'=>'width:500px;'));
		?>
	</div> 
</div> 


























<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("chklstportafolio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

