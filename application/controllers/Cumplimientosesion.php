<?php
/*----------------------------------------------------------------------------------
	Arhivo: Cumplimientosesion.php -->
	Modulo: cumplimientosesion -->
	Descripción: permite administrar la información del modo de evaluacion -->
	Autor: Stalin Francis -->
	Fecha: Ultima evaluación: Sabado 4 febrero 2023 -->
-----------------------------------------------------*/

class Cumplimientosesion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('cumplimientosesion_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['cumplimientosesion']=$this->cumplimientosesion_model->cumplimientosesion(1)->row_array();
		$data['title']="Lista de cumplimientosesiones";
		$this->load->view('template/page_header');
		$this->load->view('cumplimientosesion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva cumplimientosesion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('cumplimientosesion_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idcumplimientosesion' => $this->input->post('idcumplimientosesion'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->cumplimientosesion_model->save($array_item);
	 	redirect('cumplimientosesion');
 	}



public function edit()
{
	 	$data['cumplimientosesion'] = $this->cumplimientosesion_model->cumplimientosesion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar cumplimientosesion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('cumplimientosesion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcumplimientosesion');
	 	$array_item=array(
		 	
		 	'idcumplimientosesion' => $this->input->post('idcumplimientosesion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->cumplimientosesion_model->update($id,$array_item);
	 	redirect('cumplimientosesion');
 	}


 	public function delete()
 	{
 		$data=$this->cumplimientosesion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('cumplimientosesion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Cumplimientosesion";
	$this->load->view('template/page_header');		
  $this->load->view('cumplimientosesion_list',$data);
	$this->load->view('template/page_footer');
}



function cumplimientosesion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->cumplimientosesion_model->lista_cumplimientosesions();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcumplimientosesion,$r->numero,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('cumplimientosesion/actual').'"     data-idcumplimientosesion="'.$r->idcumplimientosesion.'">Ver</a>');
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
	$data['cumplimientosesion'] = $this->cumplimientosesion_model->cumplimientosesion($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Cumplimientosesion";
    $this->load->view('template/page_header');		
    $this->load->view('cumplimientosesion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }












public function elprimero()
{
	$data['cumplimientosesion'] = $this->cumplimientosesion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Cumplimientosesion";
    $this->load->view('template/page_header');		
    $this->load->view('cumplimientosesion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['cumplimientosesion'] = $this->cumplimientosesion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Cumplimientosesion";
  
    $this->load->view('template/page_header');		
    $this->load->view('cumplimientosesion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['cumplimientosesion_list']=$this->cumplimientosesion_model->lista_cumplimientosesion()->result();
	$data['cumplimientosesion'] = $this->cumplimientosesion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Cumplimientosesion";
	$this->load->view('template/page_header');		
  $this->load->view('cumplimientosesion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['cumplimientosesion_list']=$this->cumplimientosesion_model->lista_cumplimientosesion()->result();
	$data['cumplimientosesion'] = $this->cumplimientosesion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Cumplimientosesion";
	$this->load->view('template/page_header');		
  $this->load->view('cumplimientosesion_record',$data);
	$this->load->view('template/page_footer');
}

}
