<style>
/* ... (estilos modales del archivo calendarioacademico_list.php) ... */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top:  0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

</style>


<div class="row justify-content-center">
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Carrito - Listar </h3>
       	     </div>

<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>idcarrito</th>
 <th>idpersona</th>
 <th>fecha</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>

<script type="text/javascript">

$(document).ready(function(){
	// La URL para obtener los datos de la tabla debe ser la del controlador 'Carrito'
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('carrito/carrito_data')?>', type: 'GET'},});

});

$('#show_data').on('click','.item_ver',function(){

var id= $(this).data('idcarrito');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


</script>
