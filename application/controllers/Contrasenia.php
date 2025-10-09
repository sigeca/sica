<?php

class Contrasenia extends CI_Controller{

  public function __construct(){
      parent::__construct();
      	$this->load->model('contrasenia_model');
    	$this->load->model('silabo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['contrasenia']=$this->contrasenia_model->elultimo();
		$data['title']="Periodo académico";
		$this->load->view('page_header');
		$this->load->view('contrasenia_record',$data);
		$this->load->view('page_footer');
	}else{
	 	$this->load->view('page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva contrasenia";
	 	$this->load->view('page_header');		
	 	$this->load->view('contrasenia_form',$data);
	 	$this->load->view('page_footer');
}


public function  save()
	{
        if($this->input->post('idcontrasenia')>0)
        {

	 	$array_item=array(
	 	'idcontrasenia' => $this->input->post('idcontrasenia'),
	 	'nombrecorto' => $this->input->post('nombrecorto'),
	 	'nombrelargo' => $this->input->post('nombrelargo'),
	 	'fechainicio' => $this->input->post('fechainicio'),
	 	'fechafin' => $this->input->post('fechafin'),
        );

        }else{    
	 	$array_item=array(
	 	'nombrecorto' => $this->input->post('nombrecorto'),
	 	'nombrelargo' => $this->input->post('nombrelargo'),
	 	'fechainicio' => $this->input->post('fechainicio'),
	 	'fechafin' => $this->input->post('fechafin'),
        );
        }
	 	$this->contrasenia_model->save($array_item);
	 	redirect('contrasenia');
 	}



public function edit()
{
	 	$data['contrasenia'] = $this->contrasenia_model->contrasenia($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar contrasenia";
 	 	$this->load->view('page_header');		
 	 	$this->load->view('contrasenia_edit',$data);
	 	$this->load->view('page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcontrasenia');
	 	$array_item=array(
		 	
			'idcontrasenia' => $this->input->post('idcontrasenia'),
			'nombrecorto' => $this->input->post('nombrecorto'),
			'nombrelargo' => $this->input->post('nombrelargo'),
			'fechainicio' => $this->input->post('fechainicio'),
			'fechafin' => $this->input->post('fechafin'),
	 	);
	 	$this->contrasenia_model->update($id,$array_item);
	 	redirect('contrasenia');
 	}


 	public function xdelete()
 	{
 		$this->contrasenia_model->delete($this->uri->segment(3));
	 	redirect('contrasenia/elultimo');
 	}


	public function listar()
	{
	
		  $data['title']="Contrasenia";
		$this->load->view('page_header');		
		  $this->load->view('contrasenia_list',$data);
		$this->load->view('page_footer');
	}



	function contrasenia_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

	 	$data0 = $this->contrasenia_model->lista_contrasenias();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcontrasenia,$r->nombrecorto,$r->fechainicio,$r->fechafin,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('contrasenia/actual').'"  data-idcontrasenia="'.$r->idcontrasenia.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	}




	function silabo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idcontrasenia=$this->input->get('idcontrasenia');
			$data0 =$this->silabo_model->silabosp($idcontrasenia);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocente,$r->idsilabo,$r->elsilabo,$r->elperiodo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retornos="'.site_url('silabo/actual').'"    data-idsilabo="'.$r->idsilabo.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}





public function actual()
{
	$data['contrasenia'] = $this->contrasenia_model->contrasenia($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Contrasenia";
    $this->load->view('page_header');		
    $this->load->view('contrasenia_record',$data);
    $this->load->view('page_footer');
  }else{
    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
 }






public function elprimero()
{
	$data['contrasenia'] = $this->contrasenia_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Contrasenia";
    $this->load->view('page_header');		
    $this->load->view('contrasenia_record',$data);
    $this->load->view('page_footer');
  }else{
    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
 }

public function elultimo()
{
	$data['contrasenia'] = $this->contrasenia_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Contrasenia";
  
    $this->load->view('page_header');		
    $this->load->view('contrasenia_record',$data);
    $this->load->view('page_footer');
  }else{

    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
}

public function siguiente(){
 // $data['contrasenia_list']=$this->contrasenia_model->lista_contrasenia()->result();
	$data['contrasenia'] = $this->contrasenia_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Contrasenia";
	$this->load->view('page_header');		
  $this->load->view('contrasenia_record',$data);
	$this->load->view('page_footer');
}

public function anterior(){
 // $data['contrasenia_list']=$this->contrasenia_model->lista_contrasenia()->result();
	$data['contrasenia'] = $this->contrasenia_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Contrasenia";
	$this->load->view('page_header');		
  $this->load->view('contrasenia_record',$data);
	$this->load->view('page_footer');
}

}
