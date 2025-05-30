<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("asignaturadocente/save") ?>
<?php echo form_hidden("idasignaturadocente")  ?>

<div class="form-group row">
<label class="col-md-2 col-form-label">Distributivo:</label>
<div class="col-md-10">
    <div class="form-group">
<?php 

$options= array('--Select--');
foreach ($distributivos as $row){
	$options[$row->iddistributivo]= $row->eldistributivo;
}

echo form_dropdown("iddistributivo",$options, set_select('--Select--','default_value'),array('id'=>'iddistributivo','onchange'=>'get_docentes()')); 
?>

    </div>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Distributivo Docente:</label>
<div class="col-md-10">
    <div class="form-group">

   <select class="form-control" id="iddistributivodocente" name="iddistributivodocente" required>
                 <option>No Selected</option>
          </select>
    </div>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Malla:</label>
<div class="col-md-10">
    <div class="form-group">
<?php 
$options= array('--Select--');
foreach ($mallas as $row){
	$options[$row->idmalla]=$row->nombrecorto;
}

 echo form_dropdown("idmalla",$options, set_select('--Select--','default_value'),array('id'=>'idmalla','onchange'=>'get_asignaturas()'));  

?>
    </div>
</div>
</div>







<div class="form-group row">
<label class="col-md-2 col-form-label">Asignatura:</label>
<div class="col-md-10">
    <div class="form-group">


   <select class="form-control" id="idasignatura" name="idasignatura" required>
                 <option>No Selected</option>
          </select>
    </div>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Paralelo:</label>
<div class="col-md-10">
    <div class="form-group">
<?php 

$options= array('--Select--');
foreach ($paralelos as $row){
	$options[$row->idparalelo]= $row->nombre;
}

echo form_dropdown("idparalelo",$options, set_select('--Select--','default_value'),array('id'=>'idparalelo','onchange'=>'get_estado()')); 

?>
    </div>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Afinidad titulo:</label>
<div class="col-md-10">
    <div class="form-group">
<?php 

$options= array('--Select--');
foreach ($afinidadtitulos as $row){
	$options[$row->idafinidadtitulo]= $row->nombre;
}

echo form_dropdown("idafinidadtitulo",$options, set_select('--Select--','default_value'),array('id'=>'idafinidadtitulo','onchange'=>'get_estado()')); 

?>
    </div>
</div>
</div>





<div class="form-group row">
<label class="col-md-2 col-form-label">Estado:</label>
<div class="col-md-10">
    <div class="form-group">


   <select class="form-control" id="idestadoasignaturadocente" name="idestadoasignaturadocente" required>
                 <option>No Selected</option>
          </select>
    </div>
</div>
</div>





<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asignaturadocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>


 <script>
document.cookie = "witcher=Geralt; SameSite=None; Secure";

function get_docentes() {
	var iddistributivo = $('select[name=iddistributivo]').val();
    $.ajax({
        url: "<?php echo site_url('asignaturadocente/get_docentes') ?>",
        data: {iddistributivo:iddistributivo},
        method: 'POST',
	async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].iddistributivodocente+'>'+data[i].eldocente+'</option>';
        }
        $('#iddistributivodocente').html(html);


        },
      error: function (xhr, ajaxoptions, thrownerror) {
        alert(xhr.status);
        alert(thrownerror);
      }
    })

}



  function get_asignaturas() {
	var idmalla = $('select[name=idmalla]').val();
    $.ajax({
        url: "<?php echo site_url('asignaturadocente/get_asignaturas') ?>",
        data: {idmalla: idmalla},
        method: 'POST',
	async : false,
        dataType : 'json',
        success: function(data){
		console.log(data);
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].idasignatura+'>'+data[i].area+" - "+data[i].nivel+" - "+data[i].nombre+'</option>';
        }
        $('#idasignatura').html(html);


        },
      error: function (xhr, ajaxoptions, thrownerror) {
        alert(xhr.status);
        alert(thrownerror);
      }
    })

}



async function get_estado() {
        try{
        const response= await $.ajax({
            url: "<?php echo site_url('asignaturadocente/get_estado') ?>",
            data: {
                    iddistributivo: $('select[name=iddistributivo]').val(),
                    idasignatura: $('select[name=idasignatura]').val(),
                    idparalelo: $('select[name=idparalelo]').val()
            },
            method: 'POST',
            dataType: 'json',
        });
        console.log(response);
        let html='';
        response.forEach(item=>{
                html += '<option value="${item.idestadoasignaturadocente}">${item.estado}</option>';
            });
            if(response.length===0)
            {
                html += '<option value="1">VACANTE</option>';
            }
            $('#idestadoasignaturadocente').html(html);
      } catch(error){ 
            alert(error.status);
            alert(error.responseText);
      }
}








</script>
