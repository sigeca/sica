<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('tipogrupoparticipante/save_edit') ?>
    <ul>
        <li> <?php echo anchor('tipogrupoparticipante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipogrupoparticipante/anterior/'.$tipogrupoparticipante['idtipogrupoparticipante'], 'anterior'); ?></li>
        <li> <?php echo anchor('tipogrupoparticipante/siguiente/'.$tipogrupoparticipante['idtipogrupoparticipante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipogrupoparticipante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipogrupoparticipante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipogrupoparticipante/edit/'.$tipogrupoparticipante['idtipogrupoparticipante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipogrupoparticipante/quitar/'.$tipogrupoparticipante['idtipogrupoparticipante'],'Quitar'); ?></li>
        <li> <?php echo anchor('tipogrupoparticipante/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idtipogrupoparticipante',$tipogrupoparticipante['idtipogrupoparticipante']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idtipogrupoparticipante',$tipogrupoparticipante['idtipogrupoparticipante'],array("disabled"=>"disabled",'placeholder'=>'Idtipogrupoparticipantes')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$tipogrupoparticipante['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
