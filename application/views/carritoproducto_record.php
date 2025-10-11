<div id="eys-nav-i">

<div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="idcarritoproducto"><?php echo $carritoproducto['idcarritoproducto']; ?></span>
        </span>
        <?php echo ($carritoproducto['eliminado']==1)? '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>':'<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; ?>
    </div>



    <?php
$permitir_acceso_modulo=true; 
    if(isset($carritoproducto)) {
        $permitir=0;
        $j=0;
        $numero=$j;
        if(isset($this->session->userdata['acceso'])) {
            foreach($this->session->userdata['acceso'] as $row) 
            {
                if("carritoproducto"==$row["modulo"]["modulo"]) {
                    $numero=$j;
                    $permitir=1;
                }
                $j=$j+1;
            }
        }
        if($permitir==0) {
            redirect('login/logout');
        }
    ?>

    <?php if($this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']){ ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
 
 
        <li> <?php echo anchor('carritoproducto/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('carritoproducto/anterior/'.$carritoproducto['idcarritoproducto'], 'anterior'); ?></li>
        <li> <?php echo anchor('carritoproducto/siguiente/'.$carritoproducto['idcarritoproducto'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('carritoproducto/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('carritoproducto/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('carritoproducto/edit/'.$carritoproducto['idcarritoproducto'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('carritoproducto/delete/'.$carritoproducto['idcarritoproducto'],'Delete'); ?></li>
        <li> <?php echo anchor('carritoproducto/listar/'.$carritoproducto['idcarritoproducto'],'Listar'); ?></li>
	<li> <?php echo anchor('carritoproducto/reportepdf/'.$carritoproducto['idcarritoproducto'], 'Reportepdf'); ?></li>

    </ul>

    <?php } ?>
    <?php
    } else {
    ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li><?php echo anchor('carritoproducto/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
    </ul>
    <?php
    }
    ?>
</div>
<br>
<br>








<?php echo form_hidden('idcarritoproducto',$carritoproducto['idcarritoproducto']) ?>


<div class="container" style="max-width:900px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Carritocompra:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idcarritocompra',$carritoproducto['idcarritocompra'],array("id"=>"idcarritocompra","disabled"=>"disabled"));
		?>
	</div> 
</div>









<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('unidad/actual/'.$carritoproducto['idunidad'], 'La unidad:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($unidades as $row){
	$options[$row->idunidad]= $row->nombre;
}

echo form_input('idunidad',$options[$carritoproducto['idunidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('producto/actual/'.$carritoproducto['idproducto'], 'El producto:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($productos as $row){
	$options[$row->idproducto]= $row->nombre;
}

echo form_input('idproducto',$options[$carritoproducto['idproducto']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>

















<div class="form-group row">
    <label class="col-md-2 col-form-label"> Cantidad:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('cantidad',$carritoproducto['cantidad'],array('type'=>'text',"disabled"=>"disabled", 'placeholder'=>'cantidad','style'=>'width:500px;')) 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Precio:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('precio',$carritoproducto['precio'],array('type'=>'text',"disabled"=>"disabled", 'placeholder'=>'precio','style'=>'width:500px;')) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$carritoproducto['detalle'],$textarea_options); 


		?>
	</div> 
</div>

























<?php echo form_close(); ?>





</body>









</html>
