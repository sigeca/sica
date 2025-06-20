<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($chklstportafolio))
{
?>
        <li> <?php echo anchor('chklstportafolio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('chklstportafolio/siguiente/'.$chklstportafolio['idchklstportafolio'], 'siguiente'); ?></li>
        <li> <?php echo anchor('chklstportafolio/anterior/'.$chklstportafolio['idchklstportafolio'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('chklstportafolio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('chklstportafolio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('chklstportafolio/edit/'.$chklstportafolio['idchklstportafolio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('chklstportafolio/delete/'.$chklstportafolio['idchklstportafolio'],'Delete'); ?></li>
        <li> <?php echo anchor('chklstportafolio/listar/','Listar'); ?></li>
        <li> <?php echo anchor('chklstportafoliounidad/','Unidades'); ?></li>
        <li> <?php echo anchor('chklstportafolio/reportepdf/'.$chklstportafolio['idchklstportafolio'],'Reportepdf'); ?></li>
        <li> <?php echo anchor('chklstportafolio/exportcsv/'.$chklstportafolio['idchklstportafolio'],'ExportarCSV'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('chklstportafolio/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('chklstportafolio/save_edit') ?>
<?php echo form_hidden('idchklstportafolio',$chklstportafolio['idchklstportafolio']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idchklstportafolio',$chklstportafolio['idchklstportafolio'],array("id"=>"idchklstportafolio","disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php
       echo form_input('nombre',$chklstportafolio['nombre'],array('placeholder'=>'Nombre del chklstportafolio','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripción:</label>
	<div class="col-md-10">
		<?php
       echo form_input('descripcion',$chklstportafolio['descripcion'],array('placeholder'=>'Descripción del chklstportafolio','style'=>'width:500px;'));
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> duración:</label>
	<div class="col-md-10">
		<?php
       		echo form_input('duracion',$chklstportafolio['duracion'],array('placeholder'=>'Duracion en horas','style'=>'width:500px;'));		?>
	</div> 
</div>  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignatura: ( <?php echo anchor('asignatura/actual/'.$chklstportafolio['idasignatura'], 'Ver'); ?>):</label>

	<div class="col-md-10">
     <td><?php 
    $options= array("NADA");
    foreach ($asignaturas as $row){
	      $options[$row->idasignatura]=$row->area." - ". $row->nombre;
    }
    echo form_input('idasignatura',$options[$chklstportafolio['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo: ( <?php echo anchor('periodoacademico/actual/'.$chklstportafolio['idperiodoacademico'], 'Ver'); ?>):</label>

	<div class="col-md-10">
     <td><?php 
    $options= array("NADA");
    foreach ($periodoacademicos as $row){
	      $options[$row->idperiodoacademico]= $row->nombrecorto;
    }
    echo form_input('idperiodoacademico',$options[$chklstportafolio['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docente: ( <?php echo anchor('docente/actual/'.$chklstportafolio['iddocente'], 'Ver'); ?>):</label>

	<div class="col-md-10">
     <td><?php 
    $options= array("NADA");
    foreach ($docentes as $row){
	      $options[$row->iddocente]= $row->eldocente;
    }
    echo form_input('iddocente',$options[$chklstportafolio['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Documento:</label>
	<div class="col-md-10">
     <?php 
   // print_r($chklstportafolio);
//die();


    
    
    $options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('iddocumento',$options[$chklstportafolio['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documentochklstportafolio/add/'.$chklstportafolio['idchklstportafolio'], 'Documentos:') ?> </label>
     	<?php 
	$options=array();
    $arractu=array();
  	foreach ($documentochklstportafolios as $row){
		$options[$row->iddocumentochklstportafolio]=$row->eldocumento;
		$arractu[$row->iddocumentochklstportafolio]= base_url().'documentochklstportafolio/actual/'.$row->iddocumentochklstportafolio;
	}
	?>
	<div class="col-md-10">
		<?php

 echo form_multiselect('documentochklstportafolio[]',$options,(array)set_value('iddocumento', ''), array('style'=>'width:500px','name'=>'iddocumentochklstportafolio','id'=>'iddocumentochklstportafolio','onChange'=>'editardocumentochklstportafolio()')); 
		?>
	</div> 
</div>



<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Unidades : ( <?php echo anchor('unidadchklstportafolio/add/'.$chklstportafolio['idchklstportafolio'], 'New'); ?>):  </b>
        </div>
        
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idchklstportafolio</th>
	 <th>idunidadchklstportafolio</th>
	 <th>Unidad</th>
	 <th>nombre</th>
	 <th>sesiones</th>
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




<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
	<div class="pull-left"> 
	 <b>Eventos dictados: ( <?php echo anchor('evento/add', 'New'); ?>):</b>
        </div>
        
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
	 <th>idchklstportafolio</th>
	 <th>idevento</th>
	 <th>evento</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data1">
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
  	<div class="col-12" style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
	<div class="pull-left"> 
	 <b>Seguimiento chklstportafolio: ( <?php echo anchor('seguimientochklstportafolio/add/'.$chklstportafolio['idchklstportafolio'], 'New'); ?>):</b>
        </div>

<div class="pull-right">
<a class="btn btn-danger" href="<?php echo base_url('chklstportafolio/exportarxls/'.$chklstportafolio['idperiodoacademico']) ?>">Informe excel</a>
        </div>

    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatas">
	 <thead>
	 <tr>
	 <th>idseguimientochklstportafolio</th>
	 <th>idchklstportafolio</th>
	 <th>Criterio de evaluación</th>
	 <th>Nivel cumplimiento</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data2">
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
	var idchklstportafolio=document.getElementById("idchklstportafolio").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('chklstportafolio/unidadchklstportafolio_data')?>', type: 'GET',data:{idchklstportafolio:idchklstportafolio}},});


	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('chklstportafolio/evento_data')?>', type: 'GET',data:{idchklstportafolio:idchklstportafolio}},});
	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('chklstportafolio/seguimientochklstportafolio_data')?>', type: 'GET',data:{idchklstportafolio:idchklstportafolio}},});

});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idunidadchklstportafolio');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});



$('#show_data1').on('click','.item_ver',function(){
var id= $(this).data('idevento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});

$('#show_data2').on('click','.item_ver',function(){
var id= $(this).data('idseguimientochklstportafolio');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





function mostrarchklstportafolio()
{

	var options = document.getElementById('linkdetalle').value;
	window.location.href = options;



}


function editardocumentochklstportafolio()
{

	var options = document.getElementById('iddocumentochklstportafolio').selectedOptions;
	  var iddocumentochklstportafolio = Array.from(options).map(({ value }) => value);
       var refe = JSON.parse('<?= json_encode($arractu); ?>');
	console.log(refe[iddocumentochklstportafolio]);
	window.location.href = refe[iddocumentochklstportafolio];

}


</script>
</body>
