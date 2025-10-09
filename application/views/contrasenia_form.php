<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("contrasenia/save") ?>
<table>


<tr>
<td> Id </td>
<td><?php echo form_input("idcontrasenia","", array("value"=>0, "placeholder"=>"esta valor es 0 "))  ?></td>
</tr>


<tr>
<td> Dirección web: </td>
<td><?php echo form_input("direccionweb","", array("placeholder"=>"Nombre corto de contrasenia"))  ?></td>
</tr>


<tr>
<td> Usuario </td>
<td><?php echo form_input("usuario","", array("placeholder"=>"Nombre corto de contrasenia"))  ?></td>
</tr>

<tr>
<td> Password: </td>
<td><?php echo form_input("password","", array("placeholder"=>"Nombre largo de contrasenia"))  ?></td>
</tr>


<tr>
<td> Fecha de inicio: </td>
<td><?php echo form_input("fechainicio","", array("placeholder"=>"Fecha de inicio del contrasenia","type"=>"date"))  ?></td>
</tr>


<tr>
<td> Fecha de fin: </td>
<td><?php echo form_input("fechafin","", array("placeholder"=>"Fecha de finalizacion del contrasenia","type"=>"date"))  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("contrasenia","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

