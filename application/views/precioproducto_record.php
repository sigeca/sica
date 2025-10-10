<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('precioproducto/save_edit') ?>
    <ul>
<?php
if(isset($precioproducto))
{
?>
 
        <li> <?php echo anchor('precioproducto/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('precioproducto/anterior/'.$precioproducto['idprecioproducto'], 'anterior'); ?></li>
        <li> <?php echo anchor('precioproducto/siguiente/'.$precioproducto['idprecioproducto'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('precioproducto/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('precioproducto/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('precioproducto/edit/'.$precioproducto['idprecioproducto'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('precioproducto/delete/'.$precioproducto['idprecioproducto'],'Delete'); ?></li>
        <li> <?php echo anchor('precioproducto/listar/'.$precioproducto['idprecioproducto'],'Listar'); ?></li>
	<li> <?php echo anchor('precioproducto/reportepdf/'.$precioproducto['idprecioproducto'], 'Reportepdf'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('precioproducto/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$precioproducto['idprecioproducto']) ?>
<table>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('articulo/actual/'.$precioproducto['idarticulo'], 'El artículo:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

echo form_input('idarticulo',$options[$precioproducto['idarticulo']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>

















<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechadesde',$precioproducto['fechadesde'],array('type'=>'date',"disabled"=>"disabled", 'placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechahasta',$precioproducto['fechahasta'],array('type'=>'date',"disabled"=>"disabled",  'placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Precio:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('precio',$precioproducto['precio'],array("disabled"=>"disabled",  'placeholder'=>'precio','style'=>'width:500px;')) 
		?>
	</div> 
</div>
  




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$precioproducto['detalle'],$textarea_options); 


		?>
	</div> 
</div>

























<?php echo form_close(); ?>





</body>









</html>
