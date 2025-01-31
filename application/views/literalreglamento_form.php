<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("literalreglamento/save") ?>
<?php echo form_hidden("idliteralreglamento")  ?>








<div class="form-group row">
<label class="col-md-2 col-form-label">Título: </label>
<div class="col-md-10">
<?php
     
     echo form_input("titulo","", array("placeholder"=>"titulo en el reglamento",'style'=>'width:500px;'));
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Número: </label>
<div class="col-md-10">
<?php
     
     echo form_input("numero","", array("placeholder"=>"numero en el reglamento",'style'=>'width:500px;'));
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Contenido: </label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"contenido" );    
	
echo form_textarea("contenido","", $textarea_options);

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Reglamento: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($reglamentos as $row){
	$options[$row->idreglamento]= $row->nombre;
}

 echo form_dropdown("idreglamento",$options, set_select('--Select--','default_value'),array('id'=>'idreglamento'));  
?>
</div>
</div>




<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("literalreglamento","Atras") ?> </td>
</tr>




</table>
<?php echo form_close();?>

