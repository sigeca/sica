<?php

class Usuario extends CI_Controller{

  	public function __construct(){
      		parent::__construct();
      		$this->load->model('usuario_model');
      		$this->load->model('persona_model');
      		$this->load->model('perfil_model');
      		$this->load->model('pagina_model');
      		$this->load->model('institucion_model');
	}

	public function index(){
 if(isset($this->session->userdata['logged_in'])){
	$data['usuario'] = $this->usuario_model->elultimo();
	$data['personas']= $this->persona_model->lista_personas0()->result();
	$data['paginas']= $this->pagina_model->lista_paginas()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();

  	$data['title']="Lista de Usuarios";
	$this->load->view('template/page_header');		
  	$this->load->view('usuario_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}



public function actual(){
 if(isset($this->session->userdata['logged_in'])){
	$data['usuario']=$this->usuario_model->usuario($this->uri->segment(3))->row_array();

	$data['personas']= $this->persona_model->lista_personas0()->result();
	$data['paginas']= $this->pagina_model->lista_paginas()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();


	$data['title']="Modulo de Usuario";
	$this->load->view('page_header');		
	$this->load->view('usuario_record',$data);
	$this->load->view('page_footer');
   }else{
	$this->load->view('page_header.php');
	$this->load->view('login_form');
	$this->load->view('page_footer.php');
   }
}




public function add()
{
		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['title']="Nuevo Usuario";
	 	$this->load->view('page_header');		
	 	$this->load->view('usuario_form',$data);
	 	$this->load->view('page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	'password' => $this->input->post('password'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idperfil' => $this->input->post('idperfil'),
		 	'idpagina' => $this->input->post('idpagina'),
		 	'email' => $this->input->post('email'),
	 	);
	 	$this->usuario_model->save($array_item);
	 	redirect('usuario');
 	}



public function edit()
{
	 	$data['usuario'] = $this->usuario_model->usuario($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['paginas']= $this->pagina_model->lista_paginas()->result();
		$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 	 	$data['title'] = "Actualizar Usuario";
 	 	$this->load->view('page_header');		
 	 	$this->load->view('usuario_edit',$data);
	 	$this->load->view('page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idusuario');
	 	$array_item=array(
		 	'password' => $this->input->post('password'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idinstitucion' => $this->input->post('idinstitucion'),
		 	'idperfil' => $this->input->post('idperfil'),
		 	'idpagina' => $this->input->post('idpagina'),
		 	'email' => $this->input->post('email'),
		 	'inicio' => $this->input->post('inicio'),
	 	);
	 	$this->usuario_model->update($id,$array_item);
	 	redirect('usuario/actual/'.$id);
 	}

 	public function delete()
 	{
 		$data=$this->usuario_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('usuario/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function listar()
{
	
  $data['usuario'] = $this->usuario_model->lista_usuarios()->result();
  $data['perfil']= $this->perfil_model->lista_perfiles()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Usuarios";
	$this->load->view('page_header');		
  $this->load->view('usuario_list',$data);
	$this->load->view('page_footer');
}

function usuario_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->usuario_model->lista_usuarios1();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idusuario,$r->elusuario,$r->elperfil,$r->password,$r->email,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('usuario/actual').'"  data-idusuario="'.$r->idusuario.'" data-archivopdf="'.base_url()."pdfs/".$r->email.'">ver</a>');
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

	$data['usuario'] = $this->usuario_model->elprimero();
	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['paginas']= $this->pagina_model->lista_paginas()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Usuario";
  
    $this->load->view('template/page_header');		
    $this->load->view('usuario_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }


public function elultimo()
{

	$data['usuario'] = $this->usuario_model->elultimo();
	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['paginas']= $this->pagina_model->lista_paginas()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Usuario";
  
    $this->load->view('template/page_header');		
    $this->load->view('usuario_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }









public function siguiente(){
 // $data['usuario_list']=$this->usuario_model->lista_usuario()->result();
	$data['usuario'] = $this->usuario_model->siguiente($this->uri->segment(3))->row_array();
	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['paginas']= $this->pagina_model->lista_paginas()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Usuario";
	$this->load->view('template/page_header');		
  $this->load->view('usuario_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['usuario_list']=$this->usuario_model->lista_usuario()->result();
	$data['usuario'] = $this->usuario_model->anterior($this->uri->segment(3))->row_array();
	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['paginas']= $this->pagina_model->lista_paginas()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['title']="Usuario";
	$this->load->view('template/page_header');		
  	$this->load->view('usuario_record',$data);
	$this->load->view('template/page_footer');
}





}
