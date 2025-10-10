<div id="eys-nav-i">
    <div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="idpersona"><?php echo $persona['idpersona']; ?></span>
        </span>
        <?php echo ($persona['eliminado']==1)? '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>':'<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; ?>
    </div>

    <?php
$permitir_acceso_modulo=true; 
    if(isset($persona)) {
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
        <li><?php echo anchor('persona/elprimero/', 'Primero', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li><?php echo anchor('persona/siguiente/'.$persona['idpersona'], 'Siguiente', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li><?php echo anchor('persona/anterior/'.$persona['idpersona'], 'Anterior', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"><?php echo anchor('persona/elultimo/', 'Último', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li><?php echo anchor('persona/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li><?php echo anchor('persona/edit/'.$persona['idpersona'],'Editar', 'style="text-decoration:none; color:#ffc107; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"> <?php echo anchor('persona/quitar/'.$persona['idpersona'],'Quitar', 'style="text-decoration:none; color:#dc3545; font-weight:bold;"'); ?></li>
        <li><?php echo anchor('persona/listar/','Listar', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li><?php echo anchor('persona/relacion/'.$persona['idpersona'],'Relaciones', 'style="text-decoration:none; color:#6f42c1; font-weight:bold;"'); ?></li>
    </ul>
    <?php } ?>
    <?php
    } else {
    ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li><?php echo anchor('persona/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
    </ul>
    <?php
    }
    ?>
</div>
<br>
<br>

<?php echo form_hidden('idpersona',$persona['idpersona']) ?>

<div class="container" style="max-width:900px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;">Tipo de persona:</label>
        <div class="col-md-9">
            <?php
            $options= array("NADA");
            foreach ($tipopersonas as $row){
                $options[$row->idtipopersona]= $row->nombre;
            }
            echo form_input('idtipopersona',$options[$persona['idtipopersona']],array("disabled"=>"disabled",'class'=>'form-control-plaintext','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;">Cédula:</label>
        <div class="col-md-9">
            <?php
            echo form_input('cedula',$persona['cedula'],array("disabled"=>"disabled",'class'=>'form-control-plaintext','placeholder'=>'cedula','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;">Apellidos:</label>
        <div class="col-md-9">
            <?php
            echo form_input('apellidos',$persona['apellidos'],array("disabled"=>"disabled",'class'=>'form-control-plaintext','placeholder'=>'apellidos','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;">Nombres:</label>
        <div class="col-md-9">
            <?php
            echo form_input('nombres',$persona['nombres'],array("disabled"=>"disabled",'class'=>'form-control-plaintext','placeholder'=>'nombres','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-4">
    <label class="col-md-3 col-form-label" style="font-weight:bold;">Foto:</label>
    <div class="col-md-9">
        <img src="https://educaysoft.org/descargar.php?archivo=fotos/<?php echo $persona['cedula']; ?>.jpg" 
             alt="Foto de la persona" 
             style="max-width:100%; height:auto; border-radius:5px; box-shadow:0 0 5px rgba(0,0,0,0.2);">
    </div>
</div>


    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;">Fecha nacimiento:</label>
        <div class="col-md-9">
            <?php
            echo form_input('fechanacimiento',$persona['fechanacimiento'],array("disabled"=>"disabled",'class'=>'form-control-plaintext','placeholder'=>'Fechanacimiento','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;">Sexo:</label>
        <div class="col-md-9">
            <?php
            $options= array("NADA");
            foreach ($sexos as $row){
                $options[$row->idsexo]= $row->nombre;
            }
            echo form_input('idsexo',$options[$persona['idsexo']],array("disabled"=>"disabled",'class'=>'form-control-plaintext','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;">Descripción:</label>
        <div class="col-md-9">
            <?php
            $textarea_options = array('class' => 'form-control-plaintext','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:100%;height:100px;');
            echo form_textarea('descripcion',$persona['descripcion'],$textarea_options);
            ?>
        </div>
    </div>

    <hr style="margin-top:30px; margin-bottom:30px; border-top:1px solid #eee;">

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;"><?php echo anchor('direccion/add/'.$persona['idpersona'], 'Dirección:', 'style="text-decoration:none; color:#007bff;"'); ?>:</label>
        <div class="col-md-9">
            <?php
            $options = array();
            foreach ($direccions as $row){
                $options[$row->iddireccion]=$row->nombre;
            }
            echo form_multiselect('direccion[]',$options,(array)set_value('iddireccion', ''), array('class'=>'form-control','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;"><?php echo anchor('correo/add/'.$persona['idpersona'], 'Correo:', 'style="text-decoration:none; color:#007bff;"'); ?>:</label>
        <div class="col-md-9">
            <?php
            $options = array();
            $arractu=array();
            foreach ($correos as $row){
                $options[$row->idcorreo]=$row->elcorreo.' - '.$row->elestado;
                $arractu[$row->idcorreo]= base_url().'correo/actual/'.$row->idcorreo;
            }
            echo form_multiselect('correo[]',$options,(array)set_value('idcorreo', ''), array('class'=>'form-control','style'=>'width:100%','name'=>'idcorreo','id'=>'idcorreo','onChange'=>'editarcorreo()'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;"><?php echo anchor('telefono/add/'.$persona['idpersona'], 'Teléfono:', 'style="text-decoration:none; color:#007bff;"'); ?>:</label>
        <div class="col-md-9">
            <?php
            $options = array();
            $arractut=array();
            foreach ($telefonos as $row){
                $options[$row->idtelefono]=$row->numero.' - '.$row->elestado;
                $arractut[$row->idtelefono]= base_url().'telefono/actual/'.$row->idtelefono;
            }
            echo form_multiselect('telefono[]',$options,(array)set_value('idtelefono', ''), array('class'=>'form-control','style'=>'width:100%','name'=>'telefono', 'id'=>'idtelefono','onchange'=>'editartelefono()'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;"><?php echo anchor('nacionalidadpersona/add', 'Nacionalidad:', 'style="text-decoration:none; color:#007bff;"'); ?>:</label>
        <div class="col-md-9">
            <?php
            $options = array();
            foreach ($nacionalidadpersonas as $row){
                $options[$row->idnacionalidadpersona]=$row->lanacionalidad;
            }
            echo form_multiselect('nacionalidadpersona[]',$options,(array)set_value('idnacionalidadpersona', ''), array('class'=>'form-control','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;"><?php echo anchor('paispersona/add', 'País residencia:', 'style="text-decoration:none; color:#007bff;"'); ?>:</label>
        <div class="col-md-9">
            <?php
            $options = array();
            foreach ($paispersonas as $row){
                $options[$row->idpaispersona]=$row->elpais;
            }
            echo form_multiselect('paispersona[]',$options,(array)set_value('idpaispersona', ''), array('class'=>'form-control','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;"><?php echo anchor('provinciapersona/add', 'Provincia residencia:', 'style="text-decoration:none; color:#007bff;"'); ?>:</label>
        <div class="col-md-9">
            <?php
            $options = array();
            foreach ($provinciapersonas as $row){
                $options[$row->idprovinciapersona]=$row->laprovincia;
            }
            echo form_multiselect('provinciapersona[]',$options,(array)set_value('idprovinciapersona', ''), array('class'=>'form-control','style'=>'width:100%;'));
            ?>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" style="font-weight:bold;">Foto (Nombre de archivo):</label>
        <div class="col-md-9">
            <?php
            echo form_input('foto',$persona['foto'],array("disabled"=>"disabled",'class'=>'form-control-plaintext','placeholder'=>'foto','style'=>'width:100%'));
            ?>
        </div>
    </div>

    <hr style="margin-top:30px; margin-bottom:30px; border-top:1px solid #eee;">

    <div class="row">
        <div class="col-12" style="border:1px solid #ddd; border-radius:8px; padding:15px; margin-bottom:20px;">
            <div class="row" style="background-color:#f8f9fa; padding:10px 0; border-bottom:1px solid #e9ecef; margin-bottom:15px; border-radius:5px;">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <h5 style="margin:0; color:#333;"><b>Estudios realizados:</b></h5>
                    <div>
                        <a class="btn btn-success btn-sm me-2" href="<?php echo base_url('estudio/add/'.$persona['idpersona']) ?>">Nueva estudio</a>
                        <a class="btn btn-info btn-sm" href="<?php echo base_url('docente/reportepdf/'.$persona['idpersona']) ?>">Reporte</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="mydatae" style="width:100%;">
                    <thead>
                        <tr>
                            <th>ID Persona</th>
                            <th>ID Estudio</th>
                            <th>Institución</th>
                            <th>Nivel</th>
                            <th>Título</th>
                            <th style="text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="show_datae">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12" style="border:1px solid #ddd; border-radius:8px; padding:15px; margin-bottom:20px;">
            <div class="row" style="background-color:#f8f9fa; padding:10px 0; border-bottom:1px solid #e9ecef; margin-bottom:15px; border-radius:5px;">
                <div class="col-lg-12">
                    <h5 style="margin:0; color:#333;"><b>Documentos subidos:</b></h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="mydatac" style="width:100%;">
                    <thead>
                        <tr>
                            <th>ID Doc.</th>
                            <th>ID Persona</th>
                            <th>Título</th>
                            <th>Elaboración</th>
                            <th>Archivo</th>
                            <th style="text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12" style="border:1px solid #ddd; border-radius:8px; padding:15px;">
            <div class="row" style="background-color:#f8f9fa; padding:10px 0; border-bottom:1px solid #e9ecef; margin-bottom:15px; border-radius:5px;">
                <div class="col-lg-12">
                    <h5 style="margin:0; color:#333;"><b>Documentos recibidos:</b></h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="mydatadr" style="width:100%;">
                    <thead>
                        <tr>
                            <th>ID Doc.</th>
                            <th>ID Persona</th>
                            <th>Título</th>
                            <th>Elaboración</th>
                            <th>Archivo</th>
                            <th style="text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="show_datadr">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php echo form_close(); ?>

<script type="text/javascript">
$(document).ready(function(){
    var idpersona = document.getElementById("idpersona").innerHTML;
    // Initialize DataTables for each table
 var mydatac =   $('#mydatac').DataTable({
         "processing": true,
            "serverSide": true, // If using server-side processing for large datasets


        "ajax": {
            url: '<?php echo site_url('persona/documento_data')?>',
            type: 'GET',
            data: {idpersona: idpersona}
        },

 "columns": [
                { "data": "iddocumento" },
                { "data": "idpersona" }, // Example field, adjust to actual column names
                { "data": "asunto" },
                { "data": "fechaelaboracion" },
                { "data": "archivopdf" },
                {
                   "data": null,
                    "render": function(data, type, row) {
                        let actions = '';
                        const canView = <?php echo $permitir_acceso_modulo ? 'true' : 'false'; ?>;
                        const canEdit = <?php echo $permitir_acceso_modulo ? 'true' : 'false'; ?>;
                        const canDelete = <?php echo $permitir_acceso_modulo ? 'true' : 'false'; ?>;

                       if (canEdit) {
                            actions += '<a href="<?php echo site_url('documento/actual/'); ?>' + row.iddocumento + '" class="btn btn-warning btn-sm">Editar</a> ';
                        }
                        return actions;
                    }
}
            ],
   "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]], // Define las opciones de registros por página
        "pageLength": 10, // Muestra 10 registros por defecto
        "responsive": true, // Habilita la funcionalidad responsive
        "scrollX": true, // Habilita el scroll horizontal si la tabla es más ancha que el contenedor
            // Language configuration for DataTables
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            }






    });

    $('#mydatae').DataTable({
        "ajax": {
            url: '<?php echo site_url('docente/estudio_data1')?>',
            type: 'GET',
            data: {idpersona: idpersona}
        },
 "columns": [
                { "data": "idpersona" },
                { "data": "idestudio" }, // Example field, adjust to actual column names
                { "data": "lainstitucion" },
                { "data": "nivel" },
                { "data": "titulo" },
                {
                   "data": null,
                    "render": function(data, type, row) {
                        let actions = '';
                        const canView = <?php echo $permitir_acceso_modulo ? 'true' : 'false'; ?>;
                        const canEdit = <?php echo $permitir_acceso_modulo ? 'true' : 'false'; ?>;
                        const canDelete = <?php echo $permitir_acceso_modulo ? 'true' : 'false'; ?>;

                        if (canView) {
                            actions += '<button class="btn btn-info btn-sm item_ver" data-idevento="' + row.iddocumento + '" data-bs-toggle="modal" data-bs-target="#myModal">Ver</button> ';
                        }
                        if (canEdit) {
                            actions += '<a href="<?php echo site_url('evento/edit/'); ?>' + row.iddocumento + '" class="btn btn-warning btn-sm">Editar</a> ';
                        }
                        if (canDelete) {
                            actions += '<a href="<?php echo site_url('evento/quitar/'); ?>' + row.iddocumento + '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Está seguro de eliminar este evento?\')">Eliminar</a>';
                        }
                        return actions;
                    }
}
            ],
            // Language configuration for DataTables
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            }




    });

    $('#mydatadr').DataTable({
        "ajax": {
            url: '<?php echo site_url('persona/documento_recibido')?>',
            type: 'GET',
            data: {idpersona: idpersona}
        }
    });
});

$('#show_data').on('click','.docu_ver',function(){
    var ordenador = "https://"+$(this).data('ordenador');
    var ubicacion=$(this).data('ubicacion');
    if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
            ubicacion = ordenador+"/"+ubicacion;
    }else{
            ubicacion = ordenador+ubicacion;
    }
    var archivo = $(this).data('archivo');
    var certi= ubicacion.trim()+archivo.trim();
    window.location.href = certi;
});

$('#show_datadr').on('click','.docu_ver',function(){
    var ordenador = "https://"+$(this).data('ordenador');
    var ubicacion=$(this).data('ubicacion');
    if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
            ubicacion = ordenador+"/"+ubicacion;
    }else{
            ubicacion = ordenador+ubicacion;
    }
    var archivo = $(this).data('archivo');
    var certi= ubicacion.trim()+archivo.trim();
    window.location.href = certi;
});

$('#show_data').on('click','.item_ver',function(){
    var id= $(this).data('iddocumento');
    var retorno= $(this).data('retorno');
    window.location.href = retorno+'/'+id;
});

$('#show_datadr').on('click','.item_ver',function(){
    var id= $(this).data('iddocumento');
    var retorno= $(this).data('retorno');
    window.location.href = retorno+'/'+id;
});

$('#show_datae').on('click','.item_vere',function(){
    var id= $(this).data('idestudio');
    var retorno= $(this).data('retornoe');
    window.location.href = retorno+'/'+id;
});

function editarcorreo() {
    var options = document.getElementById('idcorreo').selectedOptions;
    var idcorreo = Array.from(options).map(({ value }) => value);
    var refe = JSON.parse('<?= json_encode($arractu); ?>');
    console.log(refe[idcorreo]);
    window.location.href = refe[idcorreo];
}

function editartelefono() {
    var options = document.getElementById('idtelefono').selectedOptions;
    var idtelefono = Array.from(options).map(({ value }) => value);
    var refe = JSON.parse('<?= json_encode($arractut); ?>');
    console.log(refe[idtelefono]);
    window.location.href = refe[idtelefono];
}
</script>
