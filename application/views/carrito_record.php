<div id="eys-nav-i">
<div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="idcarrito"><?php echo $carrito['idcarrito']; ?></span>
        </span>
        <?php 
            // Asumiendo que existe una columna 'eliminado' para coherencia con calendarioacademico_record.php
            echo (isset($carrito['eliminado']) && $carrito['eliminado']==1)? 
                '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>' : 
                '<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; 
        ?>
    </div>


<?php
$permitir_acceso_modulo=true; 
if(isset($carrito))
{
	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if("carrito"==$row["modulo"]["modulo"]) // Módulo 'carrito'
			{
				$numero=$j;
				$permitir=1;
			}		
			$j=$j+1;
	    	} 
	}
	if($permitir==0){
		redirect('login/logout');
	}
?>
<?php 	// Se simplifica la condición de acceso a solo si existe el permiso de navegar
	if(isset($this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']) && $this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']){ ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li> <?php echo anchor('carrito/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('carrito/anterior/'.$carrito['idcarrito'], 'anterior'); ?></li>
        <li> <?php echo anchor('carrito/siguiente/'.$carrito['idcarrito'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('carrito/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('carrito/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('carrito/edit/'.$carrito['idcarrito'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('carrito/delete/'.$carrito['idcarrito'],'Delete'); ?></li>
        <li> <?php echo anchor('carrito/listar/','Listar'); ?></li>
	</ul>
<?php } ?>
<?php 
}else{
?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li> <?php echo anchor('carrito/add', 'Nuevo'); ?></li>
    </ul>
<?php
}
?>
</div>
<br>
<br>


<?php echo form_open('carrito/save_edit') ?>
<?php echo form_hidden('idcarrito',$carrito['idcarrito']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Carrito:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idcarrito',$carrito['idcarrito'],array("id"=>"idcarrito","disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Persona:</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
    // Se busca el nombre corto de la persona si existe la lista, si no solo se muestra el idpersona
  	foreach ($personas as $row){
		if($row->idpersona == $carrito['idpersona'])
        {
            $nombre_persona = isset($row->eluser) ? $row->eluser : $row->idpersona; // Asumiendo 'eluser' o similar
            break;
        }
	}
	?>
	<?php
    		echo form_input('idpersona',$nombre_persona,array("disabled"=>"disabled",'style'=>'width:500px;')); 
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha:</label>
	<div class="col-md-10">
     	<?php 
      echo form_input('fecha',$carrito['fecha'],array('placeholder'=>'Fecha de creación',"disabled"=>"disabled","style"=>"width:500px;"));
	?>
	</div> 
</div>



<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12"	style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
		<?php echo anchor('carritoproducto/add/'.$carrito['idcarrito'], 'Carritoproducto'); ?>:
        </div>
        
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatau">
	 <thead>
	 <tr>
	 <th>idcarrito</th>
	 <th>idcarpro</th>
	 <th>idproducto</th>
	 <th>elproducto</th>
	 <th>cantidad</th>
	 <th>precio</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datau">
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
	var idcarrito=document.getElementById("idcarrito").value;
 alert(idcarrito);
	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('carritoproducto/carritoproducto_data')?>', type: 'GET',data:{idcarrito:idcarrito}},});

});

</script>	




</body>
</html>
