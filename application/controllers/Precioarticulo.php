<?php
class Precioarticulo extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('precioarticulo_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('articulo_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['precioarticulo'] = $this->precioarticulo_model->elultimo();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['personas']= $this->persona_model->lista_personas0()->result();

 		// print_r($data['precioarticulo_list']);
  		$data['title']="Lista de Precioarticuloes";
		$this->load->view('page_header');		
  		$this->load->view('precioarticulo_record',$data);
		$this->load->view('page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['precioarticulo'] = $this->precioarticulo_model->precioarticulo($this->uri->segment(3))->row_array();


		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['title']="Precioarticulo del documento";
	 
		$data['title']="Modulo de sesiones del evento";
		$this->load->view('page_header');		
		$this->load->view('precioarticulo_record',$data);
		$this->load->view('page_footer');
	   }else{
		$this->load->view('page_header.php');
		$this->load->view('login_form');
		$this->load->view('page_footer.php');
	   }
	}




	public function add()
	{

		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas0()->result();
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$data['title']="Nueva sesion de eventos";
	 	$this->load->view('page_header');		
	 	$this->load->view('precioarticulo_form',$data);
	 	$this->load->view('page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fechaprestamo' => $this->input->post('fechaprestamo'),
		 	'fechadevolucion' => $this->input->post('fechadevolucion'),
		 	'detalle' => $this->input->post('detalle'),
		 	'horaprestamo' => $this->input->post('horaprestamo'),
		 	'horadevolucion' => $this->input->post('horadevolucion'),
	 	);
	 	$result=$this->precioarticulo_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Fecha para este evento ya fue asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 
 	}



	public function edit()
	{
	 	$data['precioarticulo'] = $this->precioarticulo_model->precioarticulo($this->uri->segment(3))->row_array();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Precioarticulo";
 	 	$this->load->view('page_header');		
 	 	$this->load->view('precioarticulo_edit',$data);
	 	$this->load->view('page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idprecioarticulo');
	 	$array_item=array(
		 	'idprecioarticulo' => $this->input->post('idprecioarticulo'),
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fechaprestamo' => $this->input->post('fechaprestamo'),
		 	'fechadevolucion' => $this->input->post('fechadevolucion'),
		 	'detalle' => $this->input->post('detalle'),
		 	'horaprestamo' => $this->input->post('horaprestamo'),
		 	'horadevolucion' => $this->input->post('horadevolucion'),
	 	);
	 	$this->precioarticulo_model->update($id,$array_item);
	 	redirect('precioarticulo/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->precioarticulo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('precioarticulo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('page_header');		
  $this->load->view('precioarticulo_list',$data);
	$this->load->view('page_footer');
}



function precioarticulo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		if($this->uri->segment(3))
		{
			$idevento=$this->uri->segment(3);
		}else{
			$idevento=$this->input->get('idevento');
		}

	 	$data0 = $this->precioarticulo_model->precioarticulosA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idprecioarticulo,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('precioarticulo/actual').'"   data-idprecioarticulo="'.$r->idprecioarticulo.'">Ver</a>');
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
		

	 	$data['precioarticulos']= $this->precioarticulo_model->precioarticulosA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('page_header');		
		$this->load->view('precioarticulo_list_pdf',$data);
//		$this->load->view('page_footer');
	}





public function elprimero()
{
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['precioarticulo'] = $this->precioarticulo_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Precioarticulo del documento";
    $this->load->view('page_header');		
    $this->load->view('precioarticulo_record',$data);
    $this->load->view('page_footer');
  }else{
    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
 }

public function elultimo()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['precioarticulo'] = $this->precioarticulo_model->elultimo();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Precioarticulo del documento";
  
    $this->load->view('page_header');		
    $this->load->view('precioarticulo_record',$data);
    $this->load->view('page_footer');
  }else{

    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
}

public function siguiente(){
 // $data['precioarticulo_list']=$this->precioarticulo_model->lista_precioarticulo()->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['precioarticulo'] = $this->precioarticulo_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Precioarticulo del documento";
 // $data['title']="Correo";
	$this->load->view('page_header');		
  $this->load->view('precioarticulo_record',$data);
	$this->load->view('page_footer');
}

public function anterior(){
 // $data['precioarticulo_list']=$this->precioarticulo_model->lista_precioarticulo()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['precioarticulo'] = $this->precioarticulo_model->anterior($this->uri->segment(3))->row_array();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Precioarticulo del documento";
	$this->load->view('page_header');		
  $this->load->view('precioarticulo_record',$data);
	$this->load->view('page_footer');
}







public function get_precioarticulo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idprecioarticulo')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idprecioarticulo' => $this->input->get('idprecioarticulo')));
        $query = $this->db->get('precioarticulo');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
