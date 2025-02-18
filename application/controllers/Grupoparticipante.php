<?php

class Grupoparticipante extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('grupoparticipante_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('tipogrupoparticipante_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['grupoparticipante']=$this->grupoparticipante_model->lista_grupoparticipantes()->row_array();
  		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  		$data['tipogrupoparticipantes']= $this->tipogrupoparticipante_model->lista_tipogrupoparticipantes()->result();
			
		$data['title']="Lista de grupoparticipantes";
		$this->load->view('template/page_header');
		$this->load->view('grupoparticipante_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){
        $data['grupoparticipante'] = $this->grupoparticipante_model->grupoparticipante($this->uri->segment(3))->row_array();
        $data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
        $data['tipogrupoparticipantes']= $this->tipogrupoparticipante_model->lista_tipogrupoparticipantes()->result();
        $data['title']="Modulo de Telefonos";
        $this->load->view('template/page_header');		
        $this->load->view('grupoparticipante_record',$data);
        $this->load->view('template/page_footer');
   }else{
        $this->load->view('template/page_header.php');
        $this->load->view('login_form');
        $this->load->view('template/page_footer.php');
   }
}






public function add()
{

	if($this->uri->segment(3))
	{
		$data['asignaturas']= $this->asignatura_model->asignaturas1($this->uri->segment(3))->result();

	}else{

		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
	}


  	$data['tipogrupoparticipantes']= $this->tipogrupoparticipante_model->lista_tipogrupoparticipantes()->result();
		$data['title']="Nueva Grupoparticipante";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('grupoparticipante_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idgrupoparticipante' => $this->input->post('idgrupoparticipante'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipogrupoparticipante' => $this->input->post('idtipogrupoparticipante'),
	 	);
	 	$this->grupoparticipante_model->save($array_item);
	 	//redirect('grupoparticipante');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['grupoparticipante'] = $this->grupoparticipante_model->grupoparticipante($this->uri->segment(3))->row_array();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA(0)->result();
  		$data['tipogrupoparticipantes']= $this->tipogrupoparticipante_model->lista_tipogrupoparticipantes()->result();
 	 	$data['title'] = "Actualizar Grupoparticipante";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('grupoparticipante_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idgrupoparticipante');
	 	$array_item=array(
		 	
		 	'idgrupoparticipante' => $this->input->post('idgrupoparticipante'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipogrupoparticipante' => $this->input->post('idtipogrupoparticipante'),
	 	);
	 	$this->grupoparticipante_model->update($id,$array_item);
	 	//redirect('grupoparticipante');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->grupoparticipante_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('grupoparticipante/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Grupoparticipantes";
	$this->load->view('template/page_header');		
  $this->load->view('grupoparticipante_list',$data);
	$this->load->view('template/page_footer');
}



function grupoparticipante_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->grupoparticipante_model->lista_grupoparticipantesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idgrupoparticipante,$r->area,$r->malla,$r->laasignatura,$r->descripcion,$r->cantidad,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('grupoparticipante/actual').'"  data-idgrupoparticipante="'.$r->idgrupoparticipante.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}








public function elprimero()
{
	$data['grupoparticipante'] = $this->grupoparticipante_model->elprimero();
  	$data['tipogrupoparticipantes']= $this->tipogrupoparticipante_model->lista_tipogrupoparticipantes()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Grupoparticipante";
    $this->load->view('template/page_header');		
    $this->load->view('grupoparticipante_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['grupoparticipante'] = $this->grupoparticipante_model->elultimo();
  	$data['tipogrupoparticipantes']= $this->tipogrupoparticipante_model->lista_tipogrupoparticipantes()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Grupoparticipante";
  
    $this->load->view('template/page_header');		
    $this->load->view('grupoparticipante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['grupoparticipante_list']=$this->grupoparticipante_model->lista_grupoparticipante()->result();
	$data['grupoparticipante'] = $this->grupoparticipante_model->siguiente($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipogrupoparticipantes']= $this->tipogrupoparticipante_model->lista_tipogrupoparticipantes()->result();
  $data['title']="Grupoparticipante";
	$this->load->view('template/page_header');		
  $this->load->view('grupoparticipante_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['grupoparticipante_list']=$this->grupoparticipante_model->lista_grupoparticipante()->result();
	$data['grupoparticipante'] = $this->grupoparticipante_model->anterior($this->uri->segment(3))->row_array();
 	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipogrupoparticipantes']= $this->tipogrupoparticipante_model->lista_tipogrupoparticipantes()->result();
  $data['title']="Grupoparticipante";
	$this->load->view('template/page_header');		
  $this->load->view('grupoparticipante_record',$data);
	$this->load->view('template/page_footer');
}




}
