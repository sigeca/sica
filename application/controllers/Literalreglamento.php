<?php

class Literalreglamento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('literalreglamento_model');
  	  $this->load->model('institucion_model');
     $this->load->model('articuloreglamento_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['literalreglamento']=$this->literalreglamento_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['articuloreglamentos']= $this->articuloreglamento_model->lista_literalreglamentos()->result();
  		$data['title']="Lista de Artiulos";
			$this->load->view('template/page_header');		
  		$this->load->view('literalreglamento_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['articuloreglamentos']= $this->articuloreglamento_model->lista_articuloreglamentos()->result();
		$data['title']="Nuevo Artículo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('literalreglamento_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idliteralreglamento' => $this->input->post('idliteralreglamento'),
	 	'contenido' => $this->input->post('contenido'),
		'idarticuloreglamento' => $this->input->post('idarticuloreglamento'),
	 	'titulo' => $this->input->post('titulo'),
	 	);
	 	$result=$this->literalareglamento_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('formato ya existe ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}

 	}



public function edit()
{
	 	$data['literalreglamento'] = $this->literalreglamento_model->literalreglamento($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->articuloreglamento_model->lista_reglamentos()->result();
 	 	$data['title'] = "Actualizar Articuloliteralreglamento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('literalreglamento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idliteralreglamento');
	 	$array_item=array(
		 	
		 	'idliteralreglamento' => $this->input->post('idliteralreglamento'),
		 	'contenido' => $this->input->post('contenido'),
		'idarticuloreglamento' => $this->input->post('idarticuloreglamento'),
	 	'letra' => $this->input->post('letra'),
	 	);
	 	$this->literalreglamento_model->update($id,$array_item);
	 	redirect('literalreglamento/actual/'.$id);
 	}



public function listar()
{
	
  $data['title']="Articuloliteralreglamento";
	$this->load->view('template/page_header');		
  $this->load->view('literalreglamento_list',$data);
	$this->load->view('template/page_footer');
}

function literalreglamento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->literalreglamento_model->lista_literalreglamentos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idliteralreglamento,$r->nombre,$r->contenido,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('literalreglamento/actual').'"  data-idliteralreglamento="'.$r->idliteralreglamento.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}




	function ubicacion_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idliteralreglamento=$this->input->get('idliteralreglamento');
			$data0 =$this->ubicacionliteralreglamento_model->ubicacionliteralreglamentosA($idliteralreglamento);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacionliteralreglamento,$r->idliteralreglamento,$r->launidad,$r->lapersona,$r->fecha,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionliteralreglamento/actual').'"    data-idubicacionliteralreglamento="'.$r->idubicacionliteralreglamento.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionliteralreglamento/edit').'"    data-idubicacionliteralreglamento="'.$r->idubicacionliteralreglamento.'">edit</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}








	function prestamo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idliteralreglamento=$this->input->get('idliteralreglamento');
			$data0 =$this->prestamoliteralreglamento_model->prestamoliteralreglamentosA($idliteralreglamento);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamoliteralreglamento,$r->idliteralreglamento,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoliteralreglamento/actual').'"    data-idprestamoliteralreglamento="'.$r->idprestamoliteralreglamento.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoliteralreglamento/edit').'"    data-idprestamoliteralreglamento="'.$r->idprestamoliteralreglamento.'">edit</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}




public function genpagina()
{
	$iddistributivo=0;

	$numerorpt=0;
	if($this->uri->segment(3))
	{
		$idarticuloreglamento=$this->uri->segment(3);
	 	$data['literalreglamentos']= $this->literalreglamento_model->literalreglamentoA($idarticuloreglamento)->result();
		$arreglo=array();
		$i=0;
		$data['prestamoliteralreglamento']=array();
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('literalreglamento_genpagina',$data);
	}
}










public function actual()
{
	$data['literalreglamento'] = $this->literalreglamento_model->literalreglamento($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->articuloreglamento_model->lista_reglamentos()->result();
  if(!empty($data))
  {
    $data['title']="Articuloliteralreglamento";
    $this->load->view('template/page_header');		
    $this->load->view('literalreglamento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['literalreglamento'] = $this->literalreglamento_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->articuloreglamento_model->lista_reglamentos()->result();
  if(!empty($data))
  {
    $data['title']="Articuloliteralreglamento";
    $this->load->view('template/page_header');		
    $this->load->view('literalreglamento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['literalreglamento'] = $this->literalreglamento_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->articuloreglamento_model->lista_reglamentos()->result();
  if(!empty($data))
  {
    $data['title']="Articuloliteralreglamento";
  
    $this->load->view('template/page_header');		
    $this->load->view('literalreglamento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['literalreglamento_list']=$this->literalreglamento_model->lista_literalreglamento()->result();
	$data['literalreglamento'] = $this->literalreglamento_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->articuloreglamento_model->lista_reglamentos()->result();
  $data['title']="Articuloliteralreglamento";
	$this->load->view('template/page_header');		
  $this->load->view('literalreglamento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['literalreglamento_list']=$this->literalarticuloreglamento_model->lista_literalreglamento()->result();
	$data['literalreglamento'] = $this->literalreglamento_model->anterior($this->uri->segment(3))->row_array();
$data['reglamentos']= $this->articuloreglamento_model->lista_reglamentos()->result();
  $data['title']="Articuloliteralreglamento";
	$this->load->view('template/page_header');		
  $this->load->view('literalreglamento_record',$data);
	$this->load->view('template/page_footer');
}




	public function literalreglamento_280()
	{
	  $this->load->view('reglamentos/literalreglamento-280');
	}





}
