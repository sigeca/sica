<div id="eys-nav-i">
<div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="idsexo"><?php echo $sexo['idsexo']; ?></span>
        </span>
        <?php echo ($sexo['eliminado']==1)? '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>':'<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; ?>
    </div>


<?php
$permitir_acceso_modulo=true; 
    if(isset($sexo)) {
        $permitir=0;
        $j=0;
        $numero=$j;
        if(isset($this->session->userdata['acceso'])) {
            foreach($this->session->userdata['acceso'] as $row) 
            {
                if("sexo"==$row["modulo"]["modulo"]) {
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
        <li> <?php echo anchor('sexo/elprimero/', 'primero', 'style="text-decoration:none; color:#007bff; font-weight:bold;"')); ?></li>
        <li> <?php echo anchor('sexo/anterior/'.$sexo['idsexo'], 'anterior', 'style="text-decoration:none; color:#007bff; font-weight:bold;"')); ?></li>
        <li> <?php echo anchor('sexo/siguiente/'.$sexo['idsexo'], 'siguiente', 'style="text-decoration:none; color:#007bff; font-weight:bold;"')); ?></li>
        <li  style="border-right:1px solid #ccc; padding-right:15px;"><?php echo anchor('sexo/elultimo/', 'Último', 'style="text-decoration:none; color:#007bff; font-weight:bold;"')); ?></li>
        <li> <?php echo anchor('sexo/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('sexo/edit/'.$sexo['idsexo'],'Edit', 'style="text-decoration:none; color:#ffc107; font-weight:bold;"'); ?></li>
        <li  style="border-right:1px solid #ccc; padding-right:15px;"> <?php echo anchor('sexo/quitar/'.$sexo['idsexo'],'Quitar', 'style="text-decoration:none; color:#dc3545; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('sexo/listar/','Listar', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>


    </ul>
  <?php } ?>
    <?php
    } else {
    ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li><?php echo anchor('sexo/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
    </ul>
    <?php
    }
    ?>
</div>
<br>
<br>





<?php echo form_hidden('idsexo',$sexo['idsexo']) ?>

<div class="container" style="max-width:900px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idsexo',$sexo['idsexo'],array("disabled"=>"disabled",'placeholder'=>'Idsexos','style'=>'width:100%;')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$sexo['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre','style'=>'width:100%;')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
