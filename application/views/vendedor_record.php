<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
<?php
if(isset($vendedor))
{
?>
        <li> <?php echo anchor('vendedor/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('vendedor/anterior/'.$vendedor['idvendedor'], 'anterior'); ?></li>
        <li> <?php echo anchor('vendedor/siguiente/'.$vendedor['idvendedor'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('vendedor/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('vendedor/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('vendedor/edit/'.$vendedor['idvendedor'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('vendedor/delete/'.$vendedor['idvendedor'],'Delete'); ?></li>
        <li> <?php echo anchor('vendedor/listar/','Listar'); ?></li>
        <li> <?php echo anchor('vendedor/reportepdf/'.$vendedor['idpersona'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('vendedor/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('vendedor/save_edit') ?>
<?php echo form_hidden('idvendedor',$vendedor['idvendedor']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">id persona: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idpersona',$vendedor['idpersona'],array("id"=>"idpersona","disabled"=>"disabled",'placeholder'=>'Idvendedors','style'=>'width:600px;')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">id Vendedor: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idvendedor',$vendedor['idvendedor'],array("id"=>"idvendedor","disabled"=>"disabled",'placeholder'=>'Idvendedors','style'=>'width:600px;')); 
		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Vendedor: </label>
	<div class="col-md-10">
     	<?php 
 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$vendedor['idpersona']],array("disabled"=>"disabled",'style'=>'width:600px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foto:</label>
	<div class="col-md-10">

    <img src="https://educaysoft.org/descargar.php?archivo=fotos/<?php echo $vendedor['cedula']; ?>.jpg" 
             alt="Foto de la persona" 
             style="max-width:100%; height:auto; border-radius:5px; box-shadow:0 0 5px rgba(0,0,0,0.2);">

	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> Depart-Carrera: </label>
	<div class="col-md-10">
     	<?php 

$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

echo form_input('iddepartamento',$options[$vendedor['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:600px;'));
		?>
	</div> 
</div>

  



<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Estudios realizados: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('estudio/add/'.$vendedor['idpersona']) ?>">Nueva estudio</a><a class="btn btn-danger" href="<?php echo base_url('vendedor/reportepdf/'.$vendedor['idpersona']) ?>">Reporte</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
	 <th>idpersona</th>
	 <th>idestudio</th>
	 <th>intitucion</th>
	 <th>nivel</th>
	 <th>titulo</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datae">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>




<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Publicaciones del vendedor: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('publicacion/add/') ?>">Nueva publicacion</a><a class="btn btn-danger" href="<?php echo base_url('publicacionvendedor/add/'.$vendedor['idvendedor']) ?>">Nueva publicación vendedor</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatap">
	 <thead>

<tr>
 <th>ID</th>
 <th>Vendedor</th>
 <th>titulo</th>
 <th>tipo</th>
 <th>url</th>
 <th>fecha</th>
 <th style="text-align: right;">Actions</th>
 </tr>


	 </thead>
	 <tbody id="show_datap">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>


<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Asignaturas del vendedor: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('asignaturadelvendedor/add/') ?>">Nueva asignatura</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydataa">
	 <thead>
<tr>
 <th>ID</th>
 <th>Vendedor</th>
 <th>Asignatura</th>
 <th>Evidencia</th>
 <th style="text-align: right;">Actions</th>
 </tr>



	 </thead>
	 <tbody id="show_dataa">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>









<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
	    <div class="col-lg-12 margin-tb">
		<div class="pull-left">
		    <b>Participación en distributivo: </b>
		</div>
	    </div>
	</div>

	<table class="table table-striped table-bordered table-hover" id="mydatad">
	 <thead>
	 <tr>
	 <th>idvendedor</th>
	 <th>iddistributivo</th>
	 <th>iddistdoce</th>
	 <th>perido</th>
	 <th>Departamento</th>
	 <th>numeasig</th>
	 <th>horas</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datad">
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
	var idvendedor=document.getElementById("idvendedor").value;
	var idpersona=document.getElementById("idpersona").value;
	var mytablaf= $('#mydatad').DataTable({"ajax": {url: '<?php echo site_url('distributivo/vendedor2_data')?>', type: 'GET',data:{idvendedor:idvendedor}},});
	var mytabla= $('#mydatap').DataTable({"ajax": {url: '<?php echo site_url('publicacionvendedor/publicacionvendedor_data')?>', type: 'GET',data:{idvendedor:idvendedor}},});
	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('vendedor/estudio_data')?>', type: 'GET',data:{idpersona:idpersona}},});
	var mytabla= $('#mydataa').DataTable({"ajax": {url: '<?php echo site_url('asignaturadelvendedor/asignaturadelvendedor_data')?>', type: 'GET',data:{idvendedor:idvendedor}},});
});






$('#show_datae').on('click','.item_vere',function(){
var id= $(this).data('idestudio');
var retorno= $(this).data('retornoe');
window.location.href = retorno+'/'+id;
});




$('#show_datad').on('click','.item_ver',function(){
var id= $(this).data('iddistributivovendedor');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});

$('#show_datap').on('click','.item_ver',function(){
var id= $(this).data('idpublicacionvendedor');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});

$('#show_dataa').on('click','.item_ver',function(){
var id= $(this).data('idasignaturadelvendedor');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





</script>


</body>









</html>
