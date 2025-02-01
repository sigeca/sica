<?php

class Articuloreglamento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('articuloreglamento_model');
      $this->load->model('literalreglamento_model');
  	  $this->load->model('institucion_model');
     $this->load->model('reglamento_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['articuloreglamento']=$this->articuloreglamento_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->reglamento_model->lista_reglamentos()->result();
  		$data['title']="Lista de Artiulos";
			$this->load->view('template/page_header');		
  		$this->load->view('articuloreglamento_record',$data);
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
		$data['reglamentos']= $this->reglamento_model->lista_reglamentos()->result();
		$data['title']="Nuevo Artículo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('articuloreglamento_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idarticuloreglamento' => $this->input->post('idarticuloreglamento'),
	 	'contenido' => $this->input->post('contenido'),
		'idreglamento' => $this->input->post('idreglamento'),
	 	'titulo' => $this->input->post('titulo'),
	 	'numero' => $this->input->post('numero'),
	 	);
	 	$result=$this->articuloreglamento_model->save($array_item);
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
	 	$data['articuloreglamento'] = $this->articuloreglamento_model->articuloreglamento($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->reglamento_model->lista_reglamentos()->result();
 	 	$data['title'] = "Actualizar Articuloarticuloreglamento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('articuloreglamento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idarticuloreglamento');
	 	$array_item=array(
		 	
		 	'idarticuloreglamento' => $this->input->post('idarticuloreglamento'),
		 	'contenido' => $this->input->post('contenido'),
		'idreglamento' => $this->input->post('idreglamento'),
	 	'titulo' => $this->input->post('titulo'),
	 	'numero' => $this->input->post('numero')
	 	);
	 	$this->articuloreglamento_model->update($id,$array_item);
	 	redirect('articuloreglamento/actual/'.$id);
 	}



public function listar()
{
	
  $data['title']="Articuloarticuloreglamento";
	$this->load->view('template/page_header');		
  $this->load->view('articuloreglamento_list',$data);
	$this->load->view('template/page_footer');
}

function articuloreglamento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->articuloreglamento_model->lista_articuloreglamentos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idarticuloreglamento,$r->nombre,$r->contenido,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('articuloreglamento/actual').'"  data-idarticuloreglamento="'.$r->idarticuloreglamento.'">Ver</a>');
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

			$idarticuloreglamento=$this->input->get('idarticuloreglamento');
			$data0 =$this->ubicacionarticuloreglamento_model->ubicacionarticuloreglamentosA($idarticuloreglamento);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacionarticuloreglamento,$r->idarticuloreglamento,$r->launidad,$r->lapersona,$r->fecha,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionarticuloreglamento/actual').'"    data-idubicacionarticuloreglamento="'.$r->idubicacionarticuloreglamento.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionarticuloreglamento/edit').'"    data-idubicacionarticuloreglamento="'.$r->idubicacionarticuloreglamento.'">edit</a>');
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

			$idarticuloreglamento=$this->input->get('idarticuloreglamento');
			$data0 =$this->prestamoarticuloreglamento_model->prestamoarticuloreglamentosA($idarticuloreglamento);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamoarticuloreglamento,$r->idarticuloreglamento,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoarticuloreglamento/actual').'"    data-idprestamoarticuloreglamento="'.$r->idprestamoarticuloreglamento.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoarticuloreglamento/edit').'"    data-idprestamoarticuloreglamento="'.$r->idprestamoarticuloreglamento.'">edit</a>');
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
		$idreglamento=$this->uri->segment(3);
	 	$data['articuloreglamentos']= $this->articuloreglamento_model->articuloreglamentoA($idreglamento)->result();
		$arreglo=array();
        $i=0;
        foreach($data['articuloreglamentos'] as $row){
            $idarticuloreglamento=$row->idarticuloreglamento;

            $arreglo[$idarticuloreglamento]=$this->literalreglamento_model->literalreglamentoxarticulo($idarticuloreglamento)->row_array();

        }
        print_r($arreglo);
      //  die();


		$data['literalreglamentos']=array();
        $data['literalreglamentos']=$arreglo;
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('articuloreglamento_genpagina',$data);
	}
}










public function actual()
{
	$data['articuloreglamento'] = $this->articuloreglamento_model->articuloreglamento($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->reglamento_model->lista_reglamentos()->result();
  if(!empty($data))
  {
    $data['title']="Articuloarticuloreglamento";
    $this->load->view('template/page_header');		
    $this->load->view('articuloreglamento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['articuloreglamento'] = $this->articuloreglamento_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->reglamento_model->lista_reglamentos()->result();
  if(!empty($data))
  {
    $data['title']="Articuloarticuloreglamento";
    $this->load->view('template/page_header');		
    $this->load->view('articuloreglamento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['articuloreglamento'] = $this->articuloreglamento_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->reglamento_model->lista_reglamentos()->result();
  if(!empty($data))
  {
    $data['title']="Articuloarticuloreglamento";
  
    $this->load->view('template/page_header');		
    $this->load->view('articuloreglamento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['articuloreglamento_list']=$this->articuloreglamento_model->lista_articuloreglamento()->result();
	$data['articuloreglamento'] = $this->articuloreglamento_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['reglamentos']= $this->reglamento_model->lista_reglamentos()->result();
  $data['title']="Articuloarticuloreglamento";
	$this->load->view('template/page_header');		
  $this->load->view('articuloreglamento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['articuloreglamento_list']=$this->articuloreglamento_model->lista_articuloreglamento()->result();
	$data['articuloreglamento'] = $this->articuloreglamento_model->anterior($this->uri->segment(3))->row_array();
$data['reglamentos']= $this->reglamento_model->lista_reglamentos()->result();
  $data['title']="Articuloarticuloreglamento";
	$this->load->view('template/page_header');		
  $this->load->view('articuloreglamento_record',$data);
	$this->load->view('template/page_footer');
}




	public function articuloreglamento_280()
	{
	  $this->load->view('reglamentos/articuloreglamento-280');
	}





}
