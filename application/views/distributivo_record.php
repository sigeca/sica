<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
<?php
if(isset($distributivo))
{
?>
        <li> <?php echo anchor('distributivo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('distributivo/siguiente/'.$distributivo['iddistributivo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('distributivo/anterior/'.$distributivo['iddistributivo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('distributivo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('distributivo/add', 'Nuevo'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('distributivo/edit/'.$distributivo['iddistributivo'],'Edit'); ?></li>
  <!--        <li style="border-right:1px solid green"> <?php echo anchor('distributivo/delete/'.$distributivo['iddistributivo'],'Delete'); ?></li> -->
        <li> <?php echo anchor('distributivo/listar/'.$distributivo['idperiodoacademico'],'Listar'); ?></li>
        <li> <?php echo anchor('distributivo/reportepdf/'.$distributivo['iddistributivo'],'reportepdf'); ?></li>
        <li> <?php echo anchor('distributivo/reportepdf2/'.$distributivo['iddistributivo'],'reportepdf2'); ?></li>
        <li> <?php echo anchor('distributivo/generahorario/'.$distributivo['iddistributivo'],'generahorario'); ?></li>
   <!----     <li> <?php echo anchor('curso/cursos_'.str_replace('-','_',$distributivo['elperiodoacademico']).'_'.$asignaturadocente['idareaconocimiento'],'Web'); ?></li>  -->
        <li> <?php echo anchor('distributivo/exportarxls/'.$distributivo['iddistributivo'],'ExportarXLS'); ?></li>
        <li> <?php echo anchor('distributivo/vistaweb/'.$distributivo['elperiodoacademico'].'-'.$asignaturadocente['idareaconocimiento'],'web'); ?></li>
<?php 
}else{
?>
        <li> <?php echo anchor('distributivo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('distributivo/save_edit') ?>
<?php echo form_hidden('iddistributivo',$distributivo['iddistributivo']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('iddistributivo',$distributivo['iddistributivo'],array("id"=>"iddistributivo","disabled"=>"disabled"));
		?>
	</div> 
</div> 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> ( <?php echo anchor('periodoacademico/actual/'.$distributivo['idperiodoacademico'], 'Periodo :'); ?>):</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
  	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]=$row->elperiodoacademico;
	}
	?>
		<?php

    echo form_input('idperiodoacademico',$options[$distributivo['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label"> <?php echo anchor('departamento/actual/'.$distributivo['iddepartamento'], 'Departamento - carrera'); ?>: </label>
     	<?php 

$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

	?>
	<div class="col-md-10">
		<?php
echo form_input('iddepartamento',$options[$distributivo['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> <?php echo anchor('estadodistributivo/actual/'.$distributivo['idestadodistributivo'], 'Estado'); ?>: </label>
     	<?php 

$options= array("NADA");
foreach ($estadodistributivos as $row){
	$options[$row->idestadodistributivo]= $row->nombre;
}

	?>
	<div class="col-md-10">
		<?php
echo form_input('idestadodistributivo',$options[$distributivo['idestadodistributivo']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>







<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Los docentes: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('distributivodocente/add/'.$distributivo['iddistributivo']) ?>">Agregar docente</a>
<a class="btn btn-danger" href="<?php echo base_url('index.php/distributivodocente/genpagina/'.$distributivo['iddistributivo']) ?>">Generar pagina</a>
        </div>

    </div>
</div>



	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddistributivo</th>
	 <th>iddisdoce</th>
	 <th>iddocente</th>
	 <th>eldocente</th>
	 <th>#asigna</th>
	 <th>horas</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>






<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var iddistributivo=document.getElementById("iddistributivo").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('distributivo/docente_data')?>', type: 'GET',data:{iddistributivo:iddistributivo}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddistributivodocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>
