<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
<?php
if(isset($contabilidad))
{
?>
        <li> <?php echo anchor('contabilidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('contabilidad/anterior/'.$contabilidad['idcontabilidad'], 'anterior'); ?></li>
        <li> <?php echo anchor('contabilidad/siguiente/'.$contabilidad['idcontabilidad'], 'siguiente'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"><?php echo anchor('contabilidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('contabilidad/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('contabilidad/edit/'.$contabilidad['idcontabilidad'],'Edit', 'style="text-decoration:none; color:#ffc107; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"> <?php echo anchor('contabilidad/delete/'.$contabilidad['idcontabilidad'],'Delete', 'style="text-decoration:none; color:#dc3545; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('contabilidad/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('contabilidad/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idcontabilidad',$contabilidad['idcontabilidad']) ?>



<div class="form-group row">
	<label class="col-md-2 col-form-label">Id Contabilidad:</label>
	<div class="col-md-10">
		<?php
echo form_input('idcontabilidad',$contabilidad['idcontabilidad'],array("disabled"=>"disabled",'placeholder'=>'Idcontabilidads'));
		?>
	</div>
</div>





<div class="form-group row">
	<label class="col-md-2 col-form-label">Beneficiario:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($beneficiarios as $row){
	$options[$row->idbeneficiario]= $row->elbeneficiario;
}

echo form_input('idbeneficiario',$options[$contabilidad['idbeneficiario']],array("disabled"=>"disabled",'style'=> 'width:500px;'));


		?>
	</div>
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label">Fecha:</label>
	<div class="col-md-10">
		<?php
	echo form_input('fechacontabilidad',$contabilidad['fechacontabilidad'],array("disabled"=>"disabled",'placeholder'=>'Numero'));
		?>
	</div>
</div>




<div class="form-group row">
	<label class="col-md-2 col-form-label">Valor:</label>
	<div class="col-md-10">
		<?php
 
     echo form_input('valor',$contabilidad['valor'],array("disabled"=>"disabled",'placeholder'=>'Numero'));

		?>
	</div>
</div>



  
<div class="form-group row">
	<label class="col-md-2 col-form-label">Pagador:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($pagadores as $row){
	$options[$row->idpagador]= $row->elpagador;
}

echo form_input('idpagador',$options[$contabilidad['idpagador']],array("disabled"=>"disabled",'style'=> 'width:500px;'));
		?>
	</div>
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label">Detalle:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$contabilidad['detalle'],$textarea_options); 

		?>
	</div>
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label"> <button onclick='verpdf()'>Documento-:</button></label>
	<div class="col-md-10">
		<?php
		$options= array("NADA");
		foreach ($documentos as $row){
			$options[$row->iddocumento]= $row->asunto;
		}

		echo form_input('iddocumento',$options[$contabilidad['iddocumento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div>
</div>








		<script>


function verpdf(){
	var iddocumento =<?php echo $contabilidad["iddocumento"]; ?>;

    $.ajax({
        url: "<?php echo site_url('documento/get_documentoA') ?>",
        data: {iddocumento: iddocumento},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
	var orde=data[0].elordenador;
	var dire=data[0].ruta;
	var ordenador = "https://"+orde;
	var ubicacion=dire;
	if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        	ubicacion = ordenador+"/"+ubicacion;
	}else{
		ubicacion = ordenador+ubicacion;
	}
	var archi=data[0].archivopdf;
	var archivo =archi;
	var certi= ubicacion.trim()+archivo.trim();
	window.location.href = certi;


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })
}



</script>





</body>









</html>
