<?php echo form_open('literalreglamento/save_edit') ?>
<?php echo form_hidden('idliteralreglamento',$literalreglamento['idliteralreglamento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>


<tr>
<td> reglamento:</td>
<td><?php
$options= array('--Select--');

foreach ($articuloreglamentos as $row){
	$options[$row->idarticuloreglamento]="Articulo No.". $row->numero." - ".$row->titulo;
}

 echo form_dropdown("idreglamento",$options, $literalreglamento['idreglamento']);  ?></td>
</tr>

<tr>
      <td>Letra:</td>
      <td><?php echo form_input('letra',$literalreglamento['letra'],array('placeholder'=>'Letra del ', "style"=>"width:500px")) ?></td>
  </tr>


<tr>
      <td>Contenido:</td>
<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '20',   'cols' => '20', 'style'=> 'width:50%;height:200px;', "placeholder"=>"contenido del literalreglamento" );    
      echo form_textarea('contenido',$literalreglamento['contenido'],$textarea_options) ?></td>
  </tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('literalreglamento','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
