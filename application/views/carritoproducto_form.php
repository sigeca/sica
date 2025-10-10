
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("carritoproducto/save") ?>

<div class="form-group row">
<label class="col-md-2 col-form-label">Carrito:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($carritos as $row){
	$options[$row->idcarrito]=$row->propietario;
}
 echo form_dropdown("idcarrito",$options,set_select('--Select--','default_value'), array('id'=>'idcarrito'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Producto: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($productos as $row){
	$options[$row->idproducto]= $row->nombre;
}

 echo form_dropdown("idproducto",$options, set_select('--Select--','default_value'),array('id'=>'idproducto'));  
?>
</div>
</div>






<div class="form-group row">
<label class="col-md-2 col-form-label">Cantidad :</label>
<div class="col-md-10">
<?php


 echo form_input(array("name"=>"cantidad","id"=>"cantidad","type"=>"text","value"=>1));  

?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Precio :</label>
<div class="col-md-10">
<?php


 echo form_input(array("name"=>"precio","id"=>"precio","type"=>"text","value"=>0));  

?>
</div>
</div>



<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("carritoproducto","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

<script>

	$(document).ready(()=>{
	  var idproducto= <?php echo $idproducto; ?>;
	  if(idproducto>0){
		    $('#idproducto option[value="'+idproducto+'"]').attr('selected','selected');
		    get_participantes();
	  }
	});     



</script>
