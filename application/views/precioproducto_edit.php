<?php echo form_open('precioproducto/save_edit') ?>
<?php echo form_hidden('idprecioproducto',$precioproducto['idprecioproducto']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id precioproducto</td>
     <td><?php 


$eys_arrinput=array('name'=>'idprecioproducto','value'=>$precioproducto['idprecioproducto'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 


<tr>
<td> Articulo:</td>
<td><?php
$options= array('--Select--');
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

 echo form_dropdown("idarticulo",$options, $precioproducto['idarticulo']);  ?></td>
</tr>







 <tr>
      <td>Fecha desde :</td>
      <td><?php echo form_input( array("name"=>'fechadesde',"id"=>'fechadesde',"value"=>$precioproducto['fechadesde'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>
 



 <tr>
      <td>Fecha hasta :</td>
      <td><?php echo form_input( array("name"=>'fechahasta',"id"=>'fechahasta',"value"=>$precioproducto['fechahasta'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>
 
<tr>
     <td>Precio:</td>
     <td><?php 


$eys_arrinput=array('name'=>'precio','value'=>$precioproducto['precio'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
  <td>Detalle:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle","id" =>"detalle");    
echo form_textarea('detalle',$precioproducto['detalle'],$textarea_options ); ?></td>
 </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('precioproducto','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
