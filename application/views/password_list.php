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


<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Lista de passwords 
                  <div class="float-right">

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Usuario:</label>
<?php
$options= array('--Select--');
foreach ($usuarios as $row){
	$options[$row->idusuario]= $row->elusuario."-".$row->email;
}
?>

	<div class="col-md-10">

<?php
     echo form_dropdown("idusuario",$options, set_select('--Select--','default_value'),array('id'=>'idusuario','onchange'=>'filtra_usuario()'));  
?>
</div>
</div>



</div>
			  
        	</h3>
       	     </div>

<div id="eys-nav-i">
	<ul>
		<li> <?php echo anchor('password', 'Home'); ?></li>
	</ul>
</div>

<br>
<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>ID</th>
 <th>usuario</th>
 <th>elevento</th>
 <th>password</th>
 <th>onoff</th>
 <th>fechaon</th>
 <th>fechaoff</th>
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

	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('password/password_data')?>', type: 'GET',data:{idusuario:idusuario}},});

});

$('#show_data').on('click','.item_ver',function(){

var id= $(this).data('idpassword');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


var idusuario=0;
function filtra_usuario()
{

idusuario = $('select[name=idusuario]').val();
var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('password/password_data')?>', type: 'GET',data:{idusuario:idusuario}},});
}







$('#show_data').on('click','.item_enviar',function(){

        var correopara="";
	var idpersona= $(this).data('idpersona');

      $.ajax({
        url: "<?php echo site_url('persona/get_persona') ?>",
	  method: 'POST',
	  data: {idpersona:idpersona},
	  async : false,
          dataType : 'json',
	  success: function(data) {
		   correopara= data[0].correo;  
	},
      	error: function (xhr, ajaxOptions, thrownError){ 
        	alert(xhr.status);
        	alert(thrownError);
      	}
	});


	if(correopara != ''){
		var certi= 'hola' ;
	
	
		 var email="maestria.ti@utelvt.edu.ec";
		 var nome="Ing. Stalin Francis"; 		
                 var msg="<div style='text-align:center; border-radius:25px; border:2px solid #73AD21; padding:10px;'> Estimado/a <b>"+ $(this).data('lapersona')+"</b> ,  Tus documentos estan siendo guadados y clasificados en la plataforma Cloud de la Carrera en Tecnología de la Información. Puedes  acceder a la plataforma utilizando el siguiente enlace <a href='"+"https://educaysoft.org/sica/login"+"'>Login</a>. Una vez que hayas solicitado y recibido tus credenciales, podrás acceder a tu portafolio. <br> Te informamos que tu portafolio ha sido  actualizado  con el documenoto <br> "+$(this).data('asunto')+". </br> Puedes  desacargar el documento directamente en el siguiente enlace.<br> <span sytle='font-size:30px;'><a href='"+certi+"'>tu documento</a></spane></div>" ;
		 var mailto= "stalin.francis@utelvt.edu.ec";
		 var secure="siteform";
		 var idpersona=$(this).data('idpersona');
		 var asunto=$(this).data('subject');

		 var head=$(this).data('head');  ""; // "<div> <b>Las Jornadas virtuales de fortalecimiento de la EGB y BGU de Esmeraldas en propuestas educativas vinculadas a los intereses marítimos</b>, ha sido organizado por la Armada del Ecuador con el apoyo técnico de la Universidad Técnica Luis Vargas Torres de Esmeraldas, gracias al convenio marco que tienen estas dos instituciones. <br><br>  Este correo le ha sido entregado después de haber terminado de forma satisfactoria la capacitación sobre temas marítimos, lo que lo hace merecedor/a a una certificación que reposará de forma segura en los servidores de la Universidad y que puede descargar accediendo al siguiente link</div>";
			
		var foot0=$(this).data('foot'); 
		 var foot=" <div style='text-align:center; background-color:lightgrey; font-size:12px; padding-top:30px;'> Este correo ha sido enviado a "+mailto+ ", de acuerdo a la Ley Orgánica de Protección de datos, usted tiene el derecho a solicitar a la Universidad Técnica Luis Vargas Torres, la actualización, inclusión, supresión y/o tratamiento de los datos personales incluidos en sus bases de datos, con este correo electrónico usted acepta recibir información de las actividades académicas que realiza el Alma Mater así como nuestra propuestas académicas <br><br> Este correo fue generado y enviado automáticamente desde el sistema cloud elaborado por docentes y estudiantes de la Carrera en Tecnología de la Información</div> ";

		msg=head+msg+foot0+foot;

		var correode="tecnologiasdelainformacion@utelvt.edu.ec";
		if(correopara==''){
			correopara=mailto;
		}

	    $.ajax({
		url: "<?php echo site_url('seguimiento/send') ?>",
		data: {nome:nome, correopara:correopara, msg:msg, correode:correode, secure:secure, asunto:asunto, idpersona:idpersona},
		method: 'POST',
		async : false,
		success: function(data){
		var html = '';
		var i;
		alert(data);


		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    
	});

	}else{
		alert("No se encontra el archivo");
	}
});






</script>

