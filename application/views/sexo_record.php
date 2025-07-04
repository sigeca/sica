<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('sexo/save_edit') ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li> <?php echo anchor('sexo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('sexo/anterior/'.$sexo['idsexo'], 'anterior'); ?></li>
        <li> <?php echo anchor('sexo/siguiente/'.$sexo['idsexo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('sexo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('sexo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('sexo/edit/'.$sexo['idsexo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('sexo/quitar/'.$sexo['idsexo'],'Quitar'); ?></li>
        <li> <?php echo anchor('sexo/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idsexo',$sexo['idsexo']) ?>

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
