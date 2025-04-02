<?php

class Documento extends CI_Controller{

  public function __construct(){
      parent::__construct();
    $this->load->database();
    $this->load->helper('form');
	}


// Método para cargar un modelo solo cuando sea necesario
    private function load_model($model_name) {
        if (!isset($this->$model_name)) {
            $this->load->model($model_name);
        }
    }


	public function index(){

	    $this->load_model('documento_model');
	    $this->load_model('documento_estado_model');
	    $this->load_model('tipodocumentodocumento_model');
	    $this->load_model('tipodocu_model');
	    $this->load_model('destinodocumento_model');
	    $this->load_model('ordenador_model');
	    $this->load_model('directorio_model');

 		if(isset($this->session->userdata['logged_in'])){
			$data['documento'] = $this->documento_model->elultimo();
		    $data['tipodocumentodocumentos'] =$this->tipodocumentodocumento_model->tipodocumentodocumento1($data['documento']['iddocumento'])->result();
			$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
			$data['destinodocumentos']= $this->destinodocumento_model->lista_destinodocumento()->result();
			$data['emisores'] =$this->documento_model->emisores($data['documento']['iddocumento'])->result();
			$data['destinatarios'] = $this->documento_model->destinatarios($data['documento']['iddocumento'])->result();
			$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
			$data['directorios'] = $this->directorio_model->lista_directorios()->result();

  	$data['documento_estados']= $this->documento_estado_model->lista_documento_estado()->result();
			$data['title']="Usted esta visualizando el documento No: ";
			$this->load->view('template/page_header');		
			$this->load->view('documento_record',$data);
			$this->load->view('template/page_footer');
   		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
   		}
	}



//==============================================
// Llamar al formulario para un nuevo documento.
// ==============================================

	public function add()
	{
        $this->load_model('documento_model');
        $this->load_model('documento_estado_model');
	    $this->load_model('persona_model');
	    $this->load_model('tipodocu_model');
	    $this->load_model('destinodocumento_model');
	    $this->load_model('ordenador_model');

		$data['title']="Usted esta Creando un nuevo Documento";
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['destinodocumentos']= $this->destinodocumento_model->lista_destinodocumento()->result();
		$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
		$data['personas']= $this->persona_model->lista_personasA()->result();
  		$data['documento_estados']= $this->documento_estado_model->lista_documento_estado()->result();
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documento_form',$data);
	 	$this->load->view('template/page_footer');
	}


//==============================================
// Guardar el nuevo documento.
// ==============================================
	public function  save()
	{
        $this->load_model('documento_model');
	 	$array_item=array(
		 	
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'idtipodocu' => $this->input->post('idtipodocu'),
		 	'iddestinodocumento' => $this->input->post('iddestinodocumento'),
		 	'archivopdf' => $this->input->post('archivopdf'),
		 	'asunto' => $this->input->post('asunto'),
		 	'descripcion' => $this->input->post('descripcion'),
			'fechaelaboracion' => $this->input->post('fechaelaboracion'),
			'fechasubida' => $this->input->post('fechasubida'),
			'idordenador' => $this->input->post('idordenador'),
			'iddirectorio' => $this->input->post('iddirectorio'),
			'iddocumento_estado' => $this->input->post('iddocumento_estado'),
	 	);
		$array_creador=array(
			'iddocumento'=>0,
			'idpersona'=>$this->input->post('idpersona')
		);
	 	echo $this->documento_model->save($array_item,$array_creador);
	 	//redirect('documento');
 	}



	public function get_parametros()
	{

        $this->load_model('documento_model');
 	$iddocumento = $this->input->get('iddocumento');
	header("Content-type: application/json; charset=utf-8");
 	echo json_encode($this->documento_model->parametros_documento($iddocumento));

	}





public function genpagina()
{
	    $this->load_model('documento_model');
	$idtipodocu=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$idtipodocu=$this->uri->segment(3);
	 	$data['documentos']= $this->documento_model->lista_documentosxtipo($idtipodocu,0)->result();
		$arreglo=array();
		$i=0;
//		foreach($data['formatoinstitucionals'] as $row){
//		$idformatoinstitucional=$row->idformatoinstitucional;

//		$xx=array($this->prestamoformatoinstitucional_model->prestamoformatoinstitucionalsA($idformatoinstitucional)->result_array());
//		if(count($xx[0]) > 0){
//		foreach($xx as $row2){
//			foreach($row2 as $row3)
//			 {
//				$arreglo+=array($i=>array($row->idformatoinstitucional=>$row3));
//				$i=$i+1;
//			}
///			}
//		}
//		}
		$data['prestamoformatoinstitucional']=array();
//		$data['prestamoformatoinstitucional']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('documento_genpagina',$data);
	}
}




















	public function actual(){

        $this->load_model('documento_model');
	    $this->load_model('documento_estado_model');
	    $this->load_model('tipodocumentodocumento_model');
	    $this->load_model('persona_model');
	    $this->load_model('tipodocu_model');
	    $this->load_model('destinodocumento_model');
	    $this->load_model('ordenador_model');
	    $this->load_model('directorio_model');


	 // $data['documento_list']=$this->documento_model->lista_documento()->result();
	  $data['documento'] = $this->documento_model->documento( $this->uri->segment(3))->row_array();
      $data['tipodocumentodocumentos'] =$this->tipodocumentodocumento_model->tipodocumentodocumentoxdocu($data['documento']['iddocumento'])->result();
	  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	  $data['destinodocumentos']= $this->destinodocumento_model->lista_destinodocumento()->result();
	  $data['emisores'] =$this->documento_model->emisores($this->uri->segment(3))->result();
	  $data['destinatarios'] = $this->documento_model->destinatarios($data['documento']['iddocumento'])->result();
		$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
		$data['directorios'] = $this->directorio_model->lista_directorios()->result();
		$data['documento_estados']= $this->documento_estado_model->lista_documento_estado()->result();
		$data['title']="Usted esta visualizando el documento No: ";
		$this->load->view('template/page_header');		
	  $this->load->view('documento_record',$data);
		$this->load->view('template/page_footer');
	}

//////////////////////////////////
// Listar todos los documentos 
/////////////////////////////////
	public function listar()
	{
        $this->load_model('documento_model');
	    $this->load_model('portafolio_model');
	    $this->load_model('tipodocu_model');
	    $this->load_model('destinodocumento_model');
	
  		$data['documentos'] = $this->documento_model->lista_documentos1()->result();
  		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  		$data['portafolios']= $this->portafolio_model->lista_portafolio3(0,0)->result();
  		$data['destinodocumentos']= $this->destinodocumento_model->lista_destinodocumento()->result();
  		$data['filtro']= $this->uri->segment(3);
  		$data['title']="Documento";
		$this->load->view('template/page_header');		
  		$this->load->view('documento_list',$data);
		$this->load->view('template/page_footer');
	}





      function documento_dataflutter() {
	    $this->load_model('documento_model');
        $idtipodocu = $this->input->get('idtipodocu'); // Obtener parámetro GET

        if (!$idtipodocu) {
            echo json_encode(['error' => 'Falta el parámetro idtipodocu']);
            return;
        }

        $documentos = $this->documento_model->get_documentos($idtipodocu); // Obtener datos del modelo

        echo json_encode(['data' => $documentos]); // Devolver datos en formato JSON
    }


	function documento_data()
	{
        $this->load_model('documento_model');
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


		$id=$this->input->get('idtipodocu');

	 	$data0 = $this->documento_model->lista_documentosB($id);
		$data=array();
		foreach($data0->result() as $r){
            if(is_null($r->idportafolio)){         
			$data[]=array($r->iddocumento,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm docu_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">download</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_doc"  data-retorno2="'.site_url('documento/actual').'"    data-iddocumento="'.$r->iddocumento.'">doc</a> <a href="javascript:void(0);" class="btn btn-danger btn-sm item_folio"  data-idpersona="'.$r->idpersona.'"    data-iddocumento="'.$r->iddocumento.'">toporta</a>');
            }else{
			$data[]=array($r->iddocumento,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm docu_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">download</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_doc"  data-retorno2="'.site_url('documento/actual').'"    data-iddocumento="'.$r->iddocumento.'">doc</a> <a href="javascript:void(0);" class="btn btn-success btn-sm item_folio"  data-idpersona="'.$r->idpersona.'"    data-iddocumento="'.$r->iddocumento.'">toporta</a>');

            }


		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
	



/*
		$id=$this->input->get('iddocumento');
	 	$data0 = $this->documento_model->lista_documentosA($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocumento,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
			$r->href='<a href="javascript:void(0);" class="btn btn-primary btn-sm item_pdf"  data-retorno="'.site_url('documento/actual').'"   data-iddocumento="'.$r->iddocumento.'" data-archivopdf="'."/Repositorio/".$r->archivopdf.'">Ver</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"   data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">dowload</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);

 */

		echo json_encode($output);
		exit();
	}




//////////////////////////////////
// Listar por tipo de documento 
/////////////////////////////////
	public function listarxtipodocu()

	{
        $this->load_model('documento_model');
	    $this->load_model('tipodocu_model');
	
  		$data['documento'] = $this->documento_model->lista_documentos()->result();
  		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  		$data['emisores'] =$this->documento_model->emisores(1)->result();
  		$data['destinatarios'] = $this->documento_model->destinatarios(1)->result();
  		$data['title']="Documento";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
  		$this->load->view('documento_listxtipodocu',$data);
		$this->load->view('template/page_footer');
	}

	function documento_dataxtipodocu()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$id=$this->input->get('idtipodocu');

	 	$data0 = $this->documento_model->lista_documentosB($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocumento,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('documento/actual').'"    data-iddocumento="'.$r->iddocumento.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm docu_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">download</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	}




	public function reportepdf()
	{

        $this->load_model('documento_model');

		if($asunto=$this->input->get('asunto')){
		    $data['documentos'] = $this->documento_model->documentosxtipo($this->uri->segment(3),$asunto)->result();
    }else{

		    $data['documentos'] = $this->documento_model->documentosxtipo($this->uri->segment(3),"")->result();

    }

		$data['title']="Evento";
		$this->load->view('documento_list_pdf',$data);
	
	}








public function elprimero()
{
        $this->load_model('documento_model');
	    $this->load_model('tipodocumentodocumento_model');
	    $this->load_model('documento_estado_model');
	    $this->load_model('tipodocu_model');
	    $this->load_model('destinodocumento_model');
	    $this->load_model('ordenador_model');
	    $this->load_model('directorio_model');

	$data['documento'] = $this->documento_model->elprimero();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['destinodocumentos']= $this->destinodocumento_model->lista_destinodocumento()->result();

    $data['tipodocumentodocumentos'] =$this->tipodocumentodocumento_model->tipodocumentodocumento1($data['documento']['iddocumento'])->result();
    $data['emisores'] =$this->documento_model->emisores($data['documento']['iddocumento'])->result();
    $data['destinatarios'] = $this->documento_model->destinatarios($data['documento']['iddocumento'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
  	$data['documento_estados']= $this->documento_estado_model->lista_documento_estado()->result();
	$data['title']="Usted esta visualizando el documento No: ";
  
    $this->load->view('template/page_header');		
    $this->load->view('documento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }


public function elultimo()
{

        $this->load_model('documento_model');
	    $this->load_model('tipodocumentodocumento_model');
	    $this->load_model('documento_estado_model');
	    $this->load_model('tipodocu_model');
	    $this->load_model('destinodocumento_model');
	    $this->load_model('ordenador_model');
	    $this->load_model('directorio_model');
	$data['documento'] = $this->documento_model->elultimo();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['destinodocumentos']= $this->destinodocumento_model->lista_destinodocumento()->result();
    $data['tipodocumentodocumentos'] =$this->tipodocumentodocumento_model->tipodocumentodocumento1($data['documento']['iddocumento'])->result();
    $data['emisores'] =$this->documento_model->emisores($data['documento']['iddocumento'])->result();
    $data['destinatarios'] = $this->documento_model->destinatarios($data['documento']['iddocumento'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
  	$data['documento_estados']= $this->documento_estado_model->lista_documento_estado()->result();
	$data['title']="Usted esta visualizando el documento No: ";
  
    $this->load->view('template/page_header');		
    $this->load->view('documento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }









public function siguiente(){


        $this->load_model('documento_model');
	    $this->load_model('tipodocumentodocumento_model');
	    $this->load_model('documento_estado_model');
	    $this->load_model('tipodocu_model');
	    $this->load_model('destinodocumento_model');
	    $this->load_model('ordenador_model');
	    $this->load_model('directorio_model');

 // $data['documento_list']=$this->documento_model->lista_documento()->result();
	$data['documento'] = $this->documento_model->siguiente($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['destinodocumentos']= $this->destinodocumento_model->lista_destinodocumento()->result();
    $data['tipodocumentodocumentos'] =$this->tipodocumentodocumento_model->tipodocumentodocumento1($data['documento']['iddocumento'])->result();
  $data['emisores'] =$this->documento_model->emisores($data['documento']['iddocumento'])->result();
  $data['destinatarios'] = $this->documento_model->destinatarios($data['documento']['iddocumento'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
  	$data['documento_estados']= $this->documento_estado_model->lista_documento_estado()->result();
	$data['title']="Usted esta visualizando el documento No: ";
	$this->load->view('template/page_header');		
  $this->load->view('documento_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){


        $this->load_model('documento_model');
	    $this->load_model('tipodocumentodocumento_model');
	    $this->load_model('documento_estado_model');
	    $this->load_model('tipodocu_model');
	    $this->load_model('destinodocumento_model');
	    $this->load_model('ordenador_model');
	    $this->load_model('directorio_model');

 // $data['documento_list']=$this->documento_model->lista_documento()->result();
	$data['documento'] = $this->documento_model->anterior($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['destinodocumentos']= $this->destinodocumento_model->lista_destinodocumento()->result();
    $data['tipodocumentodocumentos'] =$this->tipodocumentodocumento_model->tipodocumentodocumento1($data['documento']['iddocumento'])->result();
  $data['emisores'] =$this->documento_model->emisores($data['documento']['iddocumento'])->result();
  $data['destinatarios'] = $this->documento_model->destinatarios($data['documento']['iddocumento'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
  	$data['documento_estados']= $this->documento_estado_model->lista_documento_estado()->result();
	$data['title']="Usted esta visualizando el documento No: ";
	$this->load->view('template/page_header');		
  $this->load->view('documento_record',$data);
	$this->load->view('template/page_footer');
}









	public function edit()
	{

        $this->load_model('documento_model');
	    $this->load_model('tipodocumentodocumento_model');
	    $this->load_model('documento_estado_model');
	    $this->load_model('tipodocu_model');
	    $this->load_model('destinodocumento_model');
	    $this->load_model('ordenador_model');
	    $this->load_model('directorio_model');
    		$data['documento'] = $this->documento_model->documento($this->uri->segment(3))->row_array();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    		$data['destinodocumentos']= $this->destinodocumento_model->lista_destinodocumento()->result();
    		$data['emisores'] =$this->documento_model->emisores($this->uri->segment(3))->result();
    		$data['destinatarios'] = $this->documento_model->destinatarios($this->uri->segment(3))->result();
		$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
		$data['directorios'] = $this->directorio_model->lista_directoriosxordenador($data['documento']['idordenador'])->result();
  		$data['documento_estados']= $this->documento_estado_model->lista_documento_estado()->result();
    		$data['title'] = "Actualizar el  Documento No: ";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
        $this->load_model('documento_model');
		$id=$this->input->post('iddocumento');
	 	$array_item=array(
		 	
		'iddocumento' => $this->input->post('iddocumento'),
	 	);

		if(null!==$this->input->post('idtipodocu'))
		{
			$array_item['idtipodocu'] = $this->input->post('idtipodocu');
		}

		if(null!==$this->input->post('iddestinodocumento'))
		{
			$array_item['iddestinodocumento'] = $this->input->post('iddestinodocumento');
		}





		if(null!==$this->input->post('archivopdf'))
		{
			$array_item['archivopdf'] = $this->input->post('archivopdf');
		}

		if(null!==$this->input->post('asunto'))
		{
			$array_item['asunto'] = $this->input->post('asunto');
		}



		if(null!==$this->input->post('descripcion'))
		{
			$array_item['descripcion'] = $this->input->post('descripcion');
		}


		if(null!==$this->input->post('fechaelaboracion'))
		{
			$array_item['fechaelaboracion'] = $this->input->post('fechaelaboracion');
		}
		if(null!==$this->input->post('fechasubida'))
		{
			$array_item['fechasubida'] = $this->input->post('fechasubida');
		}





		if(null!==$this->input->post('idordenador'))
		{
			$array_item['idordenador'] = $this->input->post('idordenador');
		}

		if(null!==$this->input->post('iddirectorio'))
		{
			$array_item['iddirectorio'] = $this->input->post('iddirectorio');
		}

		if(null!==$this->input->post('iddocumento_estado'))
		{
			$array_item['iddocumento_estado'] = $this->input->post('iddocumento_estado');
		}


	 	$this->documento_model->update($id,$array_item);

	 	redirect('documento/actual/'.$id);
 	}



 	public function delete()
 	{
        $this->load_model('documento_model');
 		$data=$this->documento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function canvas(){
	$this->load->view('template/page_header');
	$this->load->view('canvas');
	$this->load->view('template/page_footer');
}

function show_pdf() {
	 	$data['documento'] = $this->documento_model->documentoA($this->uri->segment(3))->row_array();
 $this->load->view('template/page_header');
 $data['blog_text'] = "POSTULACION"; 
 $this->load->view('cargapdf',$data);
 $this->load->view('template/page_footer'); 
 }



function loadpdf2()
{
 /* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];

/* Choose where to save the uploaded file */
$location = "uploads/".$filename;

/* Save the uploaded file to the local filesystem */
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
  echo 'Success'; 
} else { 
  echo 'Failure'; 
}

}




 function loadpdf() {

//$filename = $_FILES['fileToUpload']['name'];
$filename = $_POST('archivopdf');

echo $filename;
die();
//La direccion debe ser la completa
$target_dir =  $_SERVER["DOCUMENT_ROOT"]."/Repositorio/".$filename;
//$target_dir =  base_url()."pdfs/".$filename;
//$target_dir =  $_SERVER["DOCUMENT_ROOT"]."/facae/".trim($this->session->userdata['logged_in']['pdf']);  //"uploads/";
$target_file =$target_dir; // $target_dir . basename($_FILES["fileToUpload"]["name"]);
  echo $target_file.' - ';


//die();
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  echo "-".$imageFileType;
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
// Check file size
if ($_FILES["filepdf"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "pdf" && $imageFileType != "pdf"
&& $imageFileType != "pdf" ) {
  echo $imageFileType;
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	echo "----".$_FILES["fileToUpload"]["tmp_name"];
  if (move_uploaded_file($_FILES["filepdf"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["filepdf"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}



function loadpdf3()
{

	// Count total files
	$countfiles = count($_FILES['files']['name']);

	$upload_location =  $_SERVER["DOCUMENT_ROOT"]."/Repositorio/";
//	$upload_location =  base_url()."pdfs/";

	// Upload directory
	//$upload_location = "uploads/";

$count = 0;
for($i=0;$i < $countfiles;$i++){

   // File name
   $filename = $_FILES['files']['name'][$i];
   $filename = $_POST["archivopdf"];
   // File path
   $path = $upload_location.$filename;

   // file extension
   $file_extension = pathinfo($path, PATHINFO_EXTENSION);
   $file_extension = strtolower($file_extension);

   // Valid file extensions
   $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");

   // Check extension
   if(in_array($file_extension,$valid_ext)){

      // Upload file
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$path)){
        $count += 1;
      } 
   }

}

echo $count;
exit;


}



 public function get_directorio() {
        // Establecer el tipo de contenido JSON
        header('Content-Type: application/json');

        $idordenador = $this->input->post('idordenador');
        if ($idordenador) {
            $this->db->select('iddirectorio, ruta');
            $this->db->where('idordenador', $idordenador);
            $query = $this->db->get('directorio');
            $data = $query->result();
            echo json_encode($data);
        } else {
            // Manejar el caso cuando no se proporciona idordenador
            echo json_encode(array('error' => 'ID ordenador no proporcionado'));
        }
    }


public function get_documento() {
    if($this->input->post('iddocumento')) {
        $this->db->select('*');
        $this->db->where(array('iddocumento' => $this->input->post('iddocumento')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}
}


public function get_documentoA() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('iddocumento')) {
        $this->db->select('*');
        $this->db->where(array('iddocumento' => $this->input->post('iddocumento')));
        $query = $this->db->get('documento1');
	$data=$query->result();
	echo json_encode($data);
	}
}




   public function scan() {

	$this->load->view('template/page_header');		
  $this->load->view('escanea_documento');
	$this->load->view('template/page_footer');
}


  public function upload() {
        // Obtener el PDF escaneado desde el formulario
        $scannedPdf = $this->input->post('scannedPdf');

        if ($scannedPdf) {
            // Decodificar el PDF desde base64
            list($type, $data) = explode(';', $scannedPdf);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);

            // Guardar el PDF en el servidor
            $filePath = FCPATH . 'uploads/scanned_document_' . time() . '.pdf';
            if (write_file($filePath, $data)) {
                echo "Documento escaneado y guardado en: " . $filePath;
            } else {
                echo "Error al guardar el documento.";
            }
        } else {
            echo "No se recibió ningún documento escaneado.";
        }
    }
















	public function documento_10()
	{
	  $this->load->view('web/documento-10');
	}



	public function documento_104()
	{
	  $this->load->view('web/documento-104');
	}

	public function documento_108()
	{
	  $this->load->view('web/documento-108');
	}


	public function documento_109()
	{
	  $this->load->view('web/documento-109');
	}








}
