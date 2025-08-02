<div id="eys-nav-i">
    <div style="display:flex;flex-direction:row; justify-content:space-between; align-items:center;">
        <span style="text-align: left; font-size:x-large; font-weight:bold;">
            <?php echo $title;  ?>
            <span style="font-size:large; margin-left:10px;" id="id"><?php echo $telefono['idtelefono']; ?></span>
        </span>
        <?php echo ($telefono['eliminado']==1)? '<span style="font-size:large; color:red; font-weight:bold;"> - ELIMINADO</span>':'<span style="font-size:large; color:green; font-weight:bold;"> - ACTIVO</span>'; ?>
    </div>

    <?php
$permitir_acceso_modulo=true; 
    if(isset($)) {
        $permitir=0;
        $j=0;
        $numero=$j;
        if(isset($this->session->userdata['acceso'])) {
            foreach($this->session->userdata['acceso'] as $row) 
            {
                if(""==$row["modulo"]["modulo"]) {
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
        <li> <?php echo anchor('telefono/elprimero/', 'primero', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('telefono/anterior/'.$telefono['idtelefono'], 'anterior', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('telefono/siguiente/'.$telefono['idtelefono'], 'siguiente', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li  style="border-right:1px solid #ccc; padding-right:15px;"><?php echo anchor('telefono/elultimo/', 'Último', 'style="text-decoration:none; color:#007bff; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('telefono/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('telefono/edit/'.$telefono['idtelefono'],'Edit', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li style="border-right:1px solid #ccc; padding-right:15px;" > <?php echo anchor('telefono/delete/'.$telefono['idtelefono'],'Delete', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
        <li> <?php echo anchor('telefono/listar/','Listar', 'style="text-decoration:none; color:#17a2b8; font-weight:bold;"'); ?></li>
    </ul>
    <?php } ?>
    <?php
    } else {
    ?>
    <ul style="list-style:none; padding:0; display:flex; gap:15px; background-color:#f2f2f2; padding:10px; border-radius:5px; margin-top:15px;">
        <li><?php echo anchor('telefono/add', 'Nuevo', 'style="text-decoration:none; color:#28a745; font-weight:bold;"'); ?></li>
    </ul>
    <?php
    }
    ?>
</div>
<br>
<br>





<?php echo form_open('telefono/save_edit') ?>
<?php echo form_hidden('idtelefono',$telefono['idtelefono']) ?>
<table>
  <tr>
     <td>Id telefono:</td>
     <td><?php echo form_input('idtelefono',$telefono['idtelefono'],array("disabled"=>"disabled",'placeholder'=>'Idtelefonos')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($s as $row){
	$options[$row->id]= $row->apellidos." ".$row->nombres;
}

echo form_input('id',$options[$telefono['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 
  <tr>
     <td>Telefono:</td>
     <td><?php echo form_input('numero',$telefono['numero'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>


  
<tr>
     <td>Operadora:</td>
     <td><?php 
$options= array("NADA");
foreach ($operadoras as $row){
	$options[$row->idoperadora]= $row->nombre;
}

echo form_input('idoperadora',$options[$telefono['idoperadora']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Estado del Telfono:</td>
     <td><?php 
$options= array("NADA");
foreach ($telefono_estados as $row){
	$options[$row->idtelefono_estado]= $row->nombre;
}

echo form_input('idtelefono_estado',$options[$telefono['idtelefono_estado']],array("disabled"=>"disabled")) ?></td>
  </tr>




</table>
<?php echo form_close(); ?>





</body>









</html>
