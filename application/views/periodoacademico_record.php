<div id="eys-nav-i">
    <div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
<span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="idperiodoacademico"><?php echo $periodoacademico['idperiodoacademico']; ?></span>
        </span>

    </div>

    <?php
$permitir_acceso_modulo=true; 
    if(isset($periodoacademico)) {
        $permitir=0;
        $j=0;
        $numero=$j;
        if(isset($this->session->userdata['acceso'])) {
            foreach($this->session->userdata['acceso'] as $row) 
            {
                if("periodoacademico"==$row["modulo"]["modulo"]) {
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
       <li> <?php echo anchor('periodoacademico/elprimero/', 'primero', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('periodoacademico/siguiente/'.$periodoacademico['idperiodoacademico'], 'siguiente', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('periodoacademico/anterior/'.$periodoacademico['idperiodoacademico'], 'anterior', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"><?php echo anchor('periodoacademico/elultimo/', 'Último', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('periodoacademico/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;"> <?php echo anchor('periodoacademico/edit/'.$periodoacademico['idperiodoacademico'],'Edit', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
   <!---     <li style="border-right:1px solid green"> <?php echo anchor('periodoacademico/delete/'.$periodoacademico['idperiodoacademico'],'Delete'); ?></li>  --->
        <li> <?php echo anchor('periodoacademico/listar/','Listar', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('calendarioacademico/','Calendario', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>

   </ul>
    <?php } ?>
    <?php
    } else {
    ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li><?php echo anchor('periodoacademico/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
    </ul>
    <?php
    }
    ?>
</div>
<br>
<br>


<?php echo form_open('periodoacademico/save_edit') ?>
<?php echo form_hidden('idperiodoacademico',$periodoacademico['idperiodoacademico']) ?>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Periodo acad.: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idperiodoacademico',$periodoacademico['idperiodoacademico'],array("id"=>"idperiodoacademico", "disabled"=>"disabled"));
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrecorto',$periodoacademico['nombrecorto'],array('placeholder'=>'Nombre corto del periodoacademico'));

	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrelargo',$periodoacademico['nombrelargo'],array('placeholder'=>'Nombre largo del periodoacademico'));
	?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechainicio',$periodoacademico['fechainicio'],array('placeholder'=>'Fecha en que inicia el periodoacademico')); 

?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha finaliza: </label>
	<div class="col-md-10">
     	<?php 
echo form_input('fechafin',$periodoacademico['fechafin'],array('placeholder'=>'Fecha en que finaliza el periodoacademico')); 
?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label" > Lista de silabos : </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatas">
	 <thead>
	 <tr>
	 <th>iddocente</th>
	 <th>idsilabo</th>
	 <th>elsilabo</th>
	 <th>periodo</th>
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




<?php echo form_close(); ?>

<script type="text/javascript">

$(document).ready(function(){
	var idperiodoacademico=document.getElementById("idperiodoacademico").value;
	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('periodoacademico/silabo_data')?>', type: 'GET',data:{idperiodoacademico:idperiodoacademico}},});


});








$('#show_datas').on('click','.item_ver',function(){
var id= $(this).data('idsilabo');
var retorno= $(this).data('retornos');
window.location.href = retorno+'/'+id;
});





</script>

</body>
