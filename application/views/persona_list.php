<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
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

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

</style>


<div id="eys-nav-i">
	<ul>
		<li> <?php echo anchor('persona', 'Home'); ?></li>
	</ul>
</div>

<br>

<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Persona - Listar 
                 <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>-->
			  
        	</h3>
       	     </div>

<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>ID</th>
 <th>Cedula</th>
 <th>Apellidos</th>
 <th>Nombres</th>
 <th>FechaNacimiento</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="Modal_pdf" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 800px;">





 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

 </div>



<script type="text/javascript">

$(document).ready(function(){

    var mytabla= $('#mydatac').DataTable({
            "processing": true,
"ajax": {url: '<?php echo site_url('persona/persona_data')?>', type: 'GET'},
    "autoWidth": false, // Desactiva el auto-ajuste de ancho
        "columns": [
            { "width": "5%" }, // Columna 1
            { "width": "10%" }, // Columna 2
            { "width": "30%" },  // Columna 3
            { "width": "30%" },  // Columna 3
            { "width": "15%" },  // Columna 3
            { "width": "10%" }  // Columna 3
]
});

});

$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idpersona');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


</script>

