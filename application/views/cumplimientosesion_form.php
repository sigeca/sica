<!--Arhivo: modeevaluacion_form.php -->
<!--Modulo: cumplimientosesion -->
<!--Descripción: vista que permite ingresar nueva información del modo de evaluacion -->
<!--Autor: Stalin Francis -->
<!--Fecha: Ultima evaluación: Sabado 4 febrero 2023 -->


<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("cumplimientosesion/save") ?>
<?php echo form_hidden("idcumplimientosesion")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de cumplimientosesion"))  ?></td>
</tr>

<tr>
<td> Ponderacion </td>
<td><?php echo form_input("ponderacion","", array("placeholder"=>"Ponderación del cumplimientosesion"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("cumplimientosesion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

