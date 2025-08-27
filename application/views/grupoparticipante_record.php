<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($grupoparticipante))
{
?>
        <li> <?php echo anchor('grupoparticipante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('grupoparticipante/anterior/'.$grupoparticipante['idgrupoparticipante'], 'anterior'); ?></li>
        <li> <?php echo anchor('grupoparticipante/siguiente/'.$grupoparticipante['idgrupoparticipante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('grupoparticipante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('grupoparticipante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('grupoparticipante/edit/'.$grupoparticipante['idgrupoparticipante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('grupoparticipante/delete/'.$grupoparticipante['idgrupoparticipante'],'Delete'); ?></li>
        <li> <?php echo anchor('grupoparticipante/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('grupoparticipante/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('grupoparticipante/save_edit') ?>
<?php echo form_hidden('idgrupoparticipante',$grupoparticipante['idgrupoparticipante']) ?>
<table>
  <tr>
     <td>Id Grupoparticipante:</td>
     <td><?php echo form_input('idgrupoparticipante',$grupoparticipante['idgrupoparticipante'],array("disabled"=>"disabled",'placeholder'=>'Idgrupoparticipantes')) ?></td>
  </tr>
 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('participante/actual/'.$grupoparticipante['idparticipante'], 'Participante:') ?> </label>
	<div class="col-md-10">
     	<?php 

	$options = array();
  	foreach ($participantes as $row){
		$options[$row->idparticipante]=$row->nombres;
        }	
echo form_input('idparticipante',$options[$grupoparticipante['idparticipante']],array("disabled"=>"disabled",'style'=>'width:500px')); 
 
		?>
	</div> 
</div>
 



 
  <tr>
     <td>Grupo:</td>
     <td><?php echo form_input('nombre',$grupoparticipante['nombre'],array("disabled"=>"disabled",'placeholder'=>'Cantidad','style'=>'width:500px')) ?></td>
  </tr>


  
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('fechadesde',$grupoparticipante['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta: </label>
	<div class="col-md-10">
     	<?php 
       echo form_input('fechahasta',$grupoparticipante['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;'));
		?>
	</div> 
</div>









<?php echo form_close(); ?>





</body>









</html>
