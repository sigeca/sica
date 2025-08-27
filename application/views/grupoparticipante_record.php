<div id="eys-nav-i">

<div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="idgrupoparticipante"><?php echo $grupoparticipante['idgrupoparticipante']; ?></span>
        </span>
        <?php echo ($grupoparticipante['eliminado']==1)? '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>':'<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; ?>
    </div>


    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li> <?php echo anchor('grupoparticipante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('grupoparticipante/anterior/'.$grupoparticipante['idgrupoparticipante'], 'anterior'); ?></li>
        <li> <?php echo anchor('grupoparticipante/siguiente/'.$grupoparticipante['idgrupoparticipante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('grupoparticipante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('grupoparticipante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('grupoparticipante/edit/'.$grupoparticipante['idgrupoparticipante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('grupoparticipante/delete/'.$grupoparticipante['idgrupoparticipante'],'Delete'); ?></li>
        <li> <?php echo anchor('grupoparticipante/listar/','Listar'); ?></li>
    </ul>
</div>
<br>
<br>


<?php echo form_open('grupoparticipante/save_edit') ?>
<?php echo form_hidden('idgrupoparticipante',$grupoparticipante['idgrupoparticipante']) ?>
<div class="container" style="max-width:900px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
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
