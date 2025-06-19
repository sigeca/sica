<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top:  0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />

<div id="eys-nav-i">
	<ul>
		<li> <?php echo anchor('portafolio/reportepdf?idpersona=8&idperiodoacademico=20', 'Reportepdf'); ?></li>
	</ul>
</div>



<div class="form-group row">
    <div class="col-md-10">
        <div class="row justify-content-center">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-12" style="border: 1px solid #ddd; padding: 15px;">
                    <div class="row" style="background-color: blue; padding: 10px; border-bottom: 5px solid white;">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <b style="color: white;">
                                    <i class="fas fa-file-alt fa-2x"></i> <!-- Icono del documento -->
                                    DOCUMENTOS DEL PORTAFOLIO:
                                </b>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">PERIODO ACADÉMICO:</label>
                        <?php
                        $options = array('--Select--');
                        $default_value='';
                        foreach ($periodoacademicos as $index=> $row) {
                            $options[$row->idperiodoacademico] = $row->nombrecorto;
                             if ($index === array_key_last($periodoacademicos)) {
                                $default_value = $row->idperiodoacademico;
                            }
                        }
                        ?>
                        <div class="col-md-10">
                            <?php
                            echo form_dropdown("idperiodoacademico", $options, $default_value, array('onchange' => 'filtra_periodo()'));
                            ?>
                        </div>
                    </div>

                    <div id="idpersona" style="display:none;"><?php echo $filtro; ?></div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="mydatap">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tipo documento</th>
                                    <th>Título o Asunto</th>
                                    <th>Nombre archivo</th>
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
</div>

















<div class="modal fade" id="Modal_pdf" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 800px;">


 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

 </div>


























<script type="text/javascript">

$(document).ready(function(){
	var idpersona = document.getElementById("idpersona").innerHTML;
	var idportafolio=0;
	var idperiodoacademico=$('select[name=idperiodoacademico]').val();
	var mytablaf= $('#mydatap').DataTable({scrollX:true,responsive:true, autoWidth:false, "ajax": {url: '<?php echo site_url('portafolio/documento_data')?>', type: 'GET',data:{idpersona:idpersona,idperiodoacademico:idperiodoacademico}},});
});




$('#show_data').on('click','.item_ver',function(){

	var id= $(this).data('idevento');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;

});

$('#show_data_e').on('click','.item_ver',function(){

	var id= $(this).data('idevento');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;

});

$('#show_data_t').on('click','.item_ver3',function(){
	var id= $(this).data('idevento3');
	var retorno= $(this).data('retorno3');
	window.location.href = retorno+'/'+id;

});







$('#show_data').on('click','.item_ver2',function(){

	var id= $(this).data('idevento2');
	var retorno= $(this).data('retorno2');
	window.location.href = retorno+'/'+id;

});




var idevento_estado=0;
function filtra_evento()
{
//       var idevento_estado = $('select[name=idevento_estado]').val();

	var idpersona = document.getElementById("idpersona").innerHTML;
       
var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('evento/persona_data')?>', type: 'GET',data:{idpersona:idpersona}},});
}

var idperiodoacademico=0;
function filtra_periodo()
{
	var idpersona = document.getElementById("idpersona").innerHTML;
	idperiodoacademico = $('select[name=idperiodoacademico]').val();
//	var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('documento/documento_dataxtipodocu')?>', type: 'GET',data:{idperiodoacaemico:idperiodoacademico}},});
	var mytablaf= $('#mydatap').DataTable({destroy:true,"ajax": {url: '<?php echo site_url('portafolio/documento_data')?>', type: 'GET',data:{idpersona:idpersona,idperiodoacademico:idperiodoacademico}},});
}


$('#show_datap').on('click','.docu_ver',function(){

var ordenador = "https://"+$(this).data('ordenador');
var ubicacion = $(this).data('ubicacion');
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archivo = $(this).data('archivo');
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;

});





</script>

