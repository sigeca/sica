
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("precioarticulo/save") ?>


<div class="form-group row">
<label class="col-md-2 col-form-label">Articulo: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

 echo form_dropdown("idarticulo",$options, set_select('--Select--','default_value'),array('id'=>'idarticulo'));  
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha desde:</label>
<div class="col-md-10">
<?php

   date_default_timezone_set('America/Guayaquil');
    $date = date("Y-m-d");
    $horai= date("H:i:s");
    


 echo form_input(array("name"=>"fechadesde","id"=>"fechadesde","type"=>"date","value"=>$date));  

?>
</div>
</div>






<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha hasta:</label>
<div class="col-md-10">
<?php

   date_default_timezone_set('America/Guayaquil');
    $date = date("Y-m-d");
    $horai= date("H:i:s");
    


 echo form_input(array("name"=>"fechahasta","id"=>"fechahasta","type"=>"date","value"=>0,"disabled"=>"disabled"));  

?>
</div>
</div>






<div class="form-group row">
<label class="col-md-2 col-form-label">Precio:</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('style'=> 'width:100px;', "placeholder"=>"Precio con decimals" );    
 echo form_textarea("precio","", $textarea_options);  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Detalle:</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle del prestamo" );    
 echo form_textarea("detalle","", $textarea_options);  

?>
</div>
</div>


















<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("precioarticulo","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

<script>

	$(document).ready(()=>{
	  var idarticulo= <?php echo $idarticulo; ?>;
	  if(idarticulo>0){
		    $('#idarticulo option[value="'+idarticulo+'"]').attr('selected','selected');
		    get_participantes();
	  }
	});     



</script>
