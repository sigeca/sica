<?php
class Precioproducto extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('precioproducto_model');
      		$this->load->model('documento_model');
      		$this->load->model('evento_model');
      		$this->load->model('articulo_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['precioproducto'] = $this->precioproducto_model->elultimo();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();

 		// print_r($data['precioproducto_list']);
  		$data['title']="Lista de Precioproductoes";
		$this->load->view('page_header');		
  		$this->load->view('precioproducto_record',$data);
		$this->load->view('page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['precioproducto'] = $this->precioproducto_model->precioproducto($this->uri->segment(3))->row_array();


		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['title']="Precioproducto del documento";
	 
		$data['title']="Modulo de sesiones del evento";
		$this->load->view('page_header');		
		$this->load->view('precioproducto_record',$data);
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
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$data['title']="Nueva sesion de eventos";
	 	$this->load->view('page_header');		
	 	$this->load->view('precioproducto_form',$data);
	 	$this->load->view('page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'fechadesde' => $this->input->post('fechadesde'),
		 	'fechahasta' => $this->input->post('fechahasta'),
		 	'detalle' => $this->input->post('detalle'),
		 	'precio' => $this->input->post('precio'),
	 	);
	 	$result=$this->precioproducto_model->save($array_item);
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
	 	$data['precioproducto'] = $this->precioproducto_model->precioproducto($this->uri->segment(3))->row_array();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
 	 	$data['title'] = "Actualizar Precioproducto";
 	 	$this->load->view('page_header');		
 	 	$this->load->view('precioproducto_edit',$data);
	 	$this->load->view('page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idprecioproducto');
	 	$array_item=array(
		 	'idprecioproducto' => $this->input->post('idprecioproducto'),
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'fechadesde' => $this->input->post('fechadesde'),
		 	'fechahasta' => $this->input->post('fechahasta'),
		 	'detalle' => $this->input->post('detalle'),
		 	'precio' => $this->input->post('precio'),
	 	);
	 	$this->precioproducto_model->update($id,$array_item);
	 	redirect('precioproducto/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->precioproducto_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('precioproducto/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('page_header');		
  $this->load->view('precioproducto_list',$data);
	$this->load->view('page_footer');
}



function precioproducto_data()
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

	 	$data0 = $this->precioproducto_model->precioproductosA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idprecioproducto,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('precioproducto/actual').'"   data-idprecioproducto="'.$r->idprecioproducto.'">Ver</a>');
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
		

	 	$data['precioproductos']= $this->precioproducto_model->precioproductosA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('page_header');		
		$this->load->view('precioproducto_list_pdf',$data);
//		$this->load->view('page_footer');
	}





public function elprimero()
{
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['precioproducto'] = $this->precioproducto_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

    $data['title']="Precioproducto del documento";
    $this->load->view('page_header');		
    $this->load->view('precioproducto_record',$data);
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
	$data['precioproducto'] = $this->precioproducto_model->elultimo();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Precioproducto del documento";
  
    $this->load->view('page_header');		
    $this->load->view('precioproducto_record',$data);
    $this->load->view('page_footer');
  }else{

    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
}

public function siguiente(){
 // $data['precioproducto_list']=$this->precioproducto_model->lista_precioproducto()->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['precioproducto'] = $this->precioproducto_model->siguiente($this->uri->segment(3))->row_array();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Precioproducto del documento";
 // $data['title']="Correo";
	$this->load->view('page_header');		
  $this->load->view('precioproducto_record',$data);
	$this->load->view('page_footer');
}

public function anterior(){
 // $data['precioproducto_list']=$this->precioproducto_model->lista_precioproducto()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['precioproducto'] = $this->precioproducto_model->anterior($this->uri->segment(3))->row_array();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Precioproducto del documento";
	$this->load->view('page_header');		
  $this->load->view('precioproducto_record',$data);
	$this->load->view('page_footer');
}







public function get_precioproducto() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idprecioproducto')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idprecioproducto' => $this->input->get('idprecioproducto')));
        $query = $this->db->get('precioproducto');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
