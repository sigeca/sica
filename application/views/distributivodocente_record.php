<div id="eys-nav-i">
    <div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="iddistributivodocente"><?php echo $distributivodocente['iddistributivodocente']; ?></span>
        </span>
        <?php echo ($distributivodocente['eliminado']==1)? '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>':'<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; ?>
    </div>

    <?php
$permitir_acceso_modulo=true; 
    if(isset($distributivodocente)) {
        $permitir=0;
        $j=0;
        $numero=$j;
        if(isset($this->session->userdata['acceso'])) {
            foreach($this->session->userdata['acceso'] as $row) 
            {
                if("persona"==$row["modulo"]["modulo"]) {
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


        <li> <?php echo anchor('distributivodocente/elprimero/', 'primero', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('distributivodocente/anterior/'.$distributivodocente['iddistributivodocente'], 'anterior', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('distributivodocente/siguiente/'.$distributivodocente['iddistributivodocente'], 'siguiente', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"><?php echo anchor('distributivodocente/elultimo/', 'Último', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('distributivodocente/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('distributivodocente/edit/'.$distributivodocente['iddistributivodocente'],'Edit', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"> <?php echo anchor('distributivodocente/quitar/'.$distributivodocente['iddistributivodocente'],'Quitar', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('distributivodocente/listar/','Listar', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('distributivodocente/reportepdf/'.$distributivodocente['iddistributivodocente'],'reportepdf', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('distributivodocente/generaweb/'.$distributivodocente['iddistributivo'],'generaweb', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('distributivodocente/paginaweb/'.$distributivodocente['iddistributivo'],'web', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('distributivodocente/reportepdf2/'.$distributivodocente['iddistributivo'],'reportepdf2', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
    </ul>
    <?php } ?>
    <?php
    } else {
    ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li><?php echo anchor('distributivodocente/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
    </ul>
    <?php
    }
    ?>
</div>
<br>
<br>








<?php echo form_open('distributivodocente/save_edit') ?>
<?php echo form_hidden('iddistributivodocente',$distributivodocente['iddistributivodocente']) ?>


<div class="container" style="max-width:900px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id distributivo docente: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('iddistributivodocente',$distributivodocente['iddistributivodocente'],array("id"=>"iddistributivodocente","disabled"=>"disabled",'placeholder'=>'Iddistributivodocentes','style'=>'width:100%')); 
		?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('docente/actual/'.$distributivodocente['iddocente'], 'Docente:'); ?>  </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

echo form_input('eldocente',$options[$distributivodocente['iddocente']],array("id"=>"eldocente","disabled"=>"disabled",'style'=>'width:100%;')); 

echo form_input(array('name'=>'iddocente',"type"=>"hidden","value"=>$distributivodocente['iddocente'],"id"=>"iddocente")); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('distributivo/actual/'.$distributivodocente['iddistributivo'], 'Distributivo:'); ?> </label>
	<div class="col-md-10">
     	<?php 
    $options= array("NADA");
    foreach ($distributivo as $row){
	      $options[$row->iddistributivo]= $row->eldistributivo;
    }
    echo form_input('iddistributivo',$options[$distributivodocente['iddistributivo']],array("disabled"=>"disabled",'style'=>'width:100%;')); 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('tiempodedicacion/actual/'.$distributivodocente['idtiempodedicacion'], 'Tiempo dedicacion:'); ?>  </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($tiempodedicacions as $row){
	$options[$row->idtiempodedicacion]= $row->nombre;
}

echo form_input('idtiempodedicacion',$options[$distributivodocente['idtiempodedicacion']],array("id"=>"idtiempodedicacion","disabled"=>"disabled",'style'=>'width:100%;')); 

		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('categoriadocente/actual/'.$distributivodocente['idcategoriadocente'], 'Categoría del docente:'); ?>  </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($categoriadocentes as $row){
	$options[$row->idcategoriadocente]= $row->nombre;
}

echo form_input('idcategoriadocente',$options[$distributivodocente['idcategoriadocente']],array("id"=>"idcategoriadocente","disabled"=>"disabled",'style'=>'width:100%;')); 

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('relaciondependencia/actual/'.$distributivodocente['idrelaciondependencia'], 'Relación de dependencia:'); ?>  </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($relaciondependencias as $row){
	$options[$row->idrelaciondependencia]= $row->nombre;
}

echo form_input('idrelaciondependencia',$options[$distributivodocente['idrelaciondependencia']],array("id"=>"idrelaciondependencia","disabled"=>"disabled",'style'=>'width:100%;')); 

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Portfolio Web: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('portafoliodrive',$distributivodocente['portafoliodrive'],array("id"=>"portafoliodrive","disabled"=>"disabled",'placeholder'=>'Portafolioweb','style'=>'width:100%')); 
		?>
	</div> 
</div>



<div class="form-group row" >
  


	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">
<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Asignaturas  docente en el periodo</b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('index.php/asignaturadocente/add/'.$distributivodocente['iddistributivodocente']) ?>">Nueva asignatura</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddido</th>
	 <th>idasig</th>
	 <th>nivel</th>
	 <th>Asignatura</th>
	 <th>Paralelo</th>
	 <th>h.sema</th>
	 <th>h.hora</th>
	 <th>Estado</th>
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
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Distributivos individual</b>
        </div>
        <div class="pull-right">
             <a class="btn btn-success" href="<?php echo base_url('docenteactividadacademica/add/'.$distributivodocente['iddistributivodocente']) ?>">Sumar actividad</a>
	         <a class="btn btn-danger" href="<?php echo base_url('docenteactividadacademica/reportepdf/'.$distributivodocente['iddistributivodocente']) ?>">Reporte individual</a>
	        <a class="btn btn-danger" href="<?php echo base_url('docenteactividadacademica/clonar/'.$distributivodocente['iddistributivodocente']) ?>">Clonar</a>
        </div>
    </div>
</div>

h
	<table class="table table-striped table-bordered table-hover" id="mydataad">
	 <thead>
	 <tr>
	 <th>Id</th>
	 <th>docente</th>
	 <th>item</th>
	 <th>tipo</th>
	 <th>Actividad academica</th>
 	<th>Hor/sem</th>
 	<th>Hor/ocup</th>
 	<th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_dataad">
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
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Silabos  del docente</b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('silabo/add/') ?>">Crear un silabo</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatas">
	 <thead>
	 <tr>
	 <th>iddocente</th>
	 <th>idsilabo</th>
	 <th>elsilabo</th>
	 <th>periodo</th>
	 <th>Archivopdf</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datas">
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
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Eventos-cursos:</b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('evento/add/') ?>">Crear un evento</a>
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
	 <th>idsilabo</th>
	 <th>idevento</th>
	 <th>evento</th>
	 <th>Classroom</th>
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






<?php echo form_close(); ?>




<script type="text/javascript">

$(document).ready(function(){
	var iddistributivodocente=document.getElementById("iddistributivodocente").innerHTML;
	var idperiodoacademico=<?php echo $distributivo[0]->idperiodoacademico; ?>;
	var iddocente=  document.getElementById("iddocente").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('distributivodocente/asignaturadocente_data')?>', type: 'GET',data:{iddistributivodocente:iddistributivodocente}},});

	var mytablaad= $('#mydataad').DataTable({"ajax": {url: '<?php echo site_url('docenteactividadacademica/docenteactividadacademica_data')?>', type: 'GET',data:{iddistributivodocente:iddistributivodocente}},});

	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('docente/silabo_data')?>', type: 'GET',data:{iddocente:iddocente,idperiodoacademico:idperiodoacademico}},});


	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('distributivodocente/evento_data')?>', type: 'GET',data:{iddistributivodocente:iddistributivodocente}},});


});



 $('#show_data').on('click', '.item_gesi', function() { // Reemplaza '#tuElementoDisparador' con el selector real del elemento que dispara esta función

        const $this = $(this); // Almacena la referencia a $(this) en una variable

        const periodoAcademico = $this.data('elperiodoacademico');
        const asignatura = $this.data('laasignatura');
        const paralelo = $this.data('paralelo');
        const idPeriodoAcademico = $this.data('idperiodoacademico');
        const idDocente = $this.data('iddocente');
        const idPersona = $this.data('idpersona');
        const idAsignatura = $this.data('idasignatura');
        const idAsignaturaDocente = $this.data('idasignaturadocente');

        const nombre = `${periodoAcademico} - ${asignatura}`;
        const titulo = `${periodoAcademico} - P${paralelo} - ${asignatura}`;
        const descripcion = nombre; // Ya que parece ser igual a nombre
        const duracionSilabo = "4 meses";
        const linkDetalle = "";
        let idSilabo = 0;
        let idCalendarioAcademico = 0;
        let fechaInicia = "";
        let fechaFinaliza = "";

        $.ajax({
            url: '<?php echo site_url('silabo/save')?>',
            method: 'POST',
            data: {
                nombre: nombre,
                descripcion: descripcion,
                idperiodoacademico: idPeriodoAcademico,
                iddocente: idDocente,
                idasignatura: idAsignatura,
                duracion: duracionSilabo,
                linkdetalle: linkDetalle
            },
            dataType: 'json',
            success: function(data) {
                idSilabo = data.idsilabo;
                idCalendarioAcademico = data.idcalendarioacademico;
                fechaInicia = data.fechainicio;
                fechaFinaliza = data.fechafin;

                // Llamada AJAX para evento después de completar la primera
                const idTipoEvento = 2; // CURSOS DE MALLA
                const idEventoEstado = 2; // INSCRIPCION
                const idInstitucion = 1; // Universidad Tecnica Luis Vargas Torres
                const detalleEvento = titulo;
                const idUsuario = 0;
                const fechaEvento = new Date();
                const duracionEvento = 0;
                const costoEvento = 0;
                const codigoClassroom = "";
                const aulavirtual = "";

                $.ajax({
                    url: '<?php echo site_url('evento/save')?>',
                    method: 'POST',
                    data: {
                        idtipoevento: idTipoEvento,
                        idevento_estado: idEventoEstado,
                        idinstitucion: idInstitucion,
                        titulo: titulo,
                        fechainicia: fechaInicia,
                        fechafinaliza: fechaFinaliza,
                        detalle: detalleEvento,
                        idusuario: idUsuario,
                        fecha: fechaEvento.toISOString(), // Formatea la fecha para la petición
                        duracion: duracionEvento,
                        costo: costoEvento,
                        idsilabo: idSilabo,
                        codigoclassroom: codigoClassroom,
                        aulavirtual: aulavirtual,
                        idasignaturadocente: idAsignaturaDocente,
                        idcalendarioacademico: idCalendarioAcademico,
                        idpersona: idPersona
                    },
                    success: function(dataEvento) {
                        // Manejar la respuesta de la segunda llamada AJAX si es necesario
                        console.log("Evento guardado:", dataEvento);
                    },
                    error: function(xhrEvento, ajaxOptionsEvento, thrownErrorEvento) {
                        console.error("Error al guardar evento:", xhrEvento.status, thrownErrorEvento);
                        alert(`Error al guardar evento: ${xhrEvento.status} - ${thrownErrorEvento}`);
                    }
                });

            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error("Error al guardar sílabo:", xhr.status, thrownError);
                alert(`Error al guardar sílabo: ${xhr.status} - ${thrownError}`);
            }
        });

    });




/*

$('#show_data').on('click','.item_gesi',function(){
var nombre= $(this).data('elperiodoacademico')+" - "+$(this).data('laasignatura') ;
var titulo= $(this).data('elperiodoacademico')+" - P"+$(this).data('paralelo')+" - "+$(this).data('laasignatura') ;
var descripcion= $(this).data('elperiodoacademico')+" - "+$(this).data('laasignatura') ;
var idperiodoacademico= $(this).data('idperiodoacademico');
var iddocente= $(this).data('iddocente');
var idpersona= $(this).data('idpersona');
var idasignatura= $(this).data('idasignatura');
var idasignaturadocente=$(this).data('idasignaturadocente');	
var duracion= "4 meses";
var linkdetalle= "";
	var idsilabo=0;
	var idcalendarioacademico=0;

	var fechainicia = ""; 
	var fechafinaliza= "";
$.ajax({url: '<?php echo site_url('silabo/save')?>',
	method: 'POST',
	data:{nombre:nombre,descripcion:descripcion,idperiodoacademico:idperiodoacademico,iddocente:iddocente,idasignatura:idasignatura,duracion:duracion,linkdetalle:linkdetalle},
	async : false,
	dataType: 'json',
	success: function(data){
	 idsilabo=data.idsilabo;
	 idcalendarioacademico=data.idcalendarioacademico;
	 fechainicia=data.fechainicio;
	 fechafinaliza=data.fechafin;
	
	},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }

	    })

	var idtipoevento=2; 
	var idevento_estado=2; 
	var idinstitucion=1;  
	var detalle =titulo;
	var idusuario=0;
	var fecha= new Date();
	var duracion=0;
	var costo=0;	
	var codigoclassroom="";	

$.ajax({url: '<?php echo site_url('evento/save')?>',
	method: 'POST',
	data:{idtipoevento:idtipoevento,idevento_estado:idevento_estado,idinstitucion:idinstitucion,titulo:titulo,fechainicia:fechainicia,fechafinaliza:fechafinaliza,detalle:detalle,idusuario:idusuario,fecha:fecha,duracion:duracion,costo:costo,idsilabo:idsilabo,codigoclassroom:codigoclassroom,idasignaturadocente:idasignaturadocente,idcalendarioacademico:idcalendarioacademico,idpersona:idpersona},
	async : true,
	success: function(data){
	
	
	},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })

	});

*/



$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idasignaturadocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});

$('#show_dataad').on('click','.item_ver',function(){
var id= $(this).data('iddocenteactividadacademica');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});






$('#show_datas').on('click','.item_ver',function(){
var id= $(this).data('idsilabo');
var retorno= $(this).data('retornos');
window.location.href = retorno+'/'+id;
});



$('#show_data1').on('click','.item_ver',function(){
var id= $(this).data('idevento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});



</script>

</body>









</html>
