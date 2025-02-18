<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("grupoparticipante/save") ?>
<?php echo form_hidden("idgrupoparticipante")  ?>
<table>


<tr>
<td> Asignatura: </td>
<td><?php 

$options= array('--Select--');
foreach ($participantes as $row){
	$options[$row->idparticipante]=$row->elparticipante;
}

 echo form_dropdown("idparticipante",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Tipo de horas: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipogrupoparticipantes as $row){
	$options[$row->idtipogrupoparticipante]=$row->nombre;

}

 echo form_dropdown("idtipogrupoparticipante",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> nombre grupo: </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"nombre(float)"))  ?></td>
</tr>

<tr>
<td> Fecha de desde: </td>
<td><?php echo form_input(array("name"=>"fechadesde","id"=>"fechadesde","type"=>"date"));  ?></td>
</tr>

<tr>
<td> Fecha de hasta: </td>
<td><?php echo form_input(array("name"=>"fechahasta","id"=>"fechahasta","type"=>"date"));  ?></td>
</tr>





<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("grupoparticipante","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

