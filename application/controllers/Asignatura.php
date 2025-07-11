<?php

class Asignatura extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('asignatura_model');
  	$this->load->model('malla_model');
  	$this->load->model('nivelacademico_model');
      		$this->load->model('docente_model');
      		$this->load->model('persona_model');
      		$this->load->model('areaconocimiento_model');
      		$this->load->model('silabo_model');
      		$this->load->model('horasasignatura_model');
      		$this->load->model('referenciasasignatura_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['asignatura']=$this->asignatura_model->elultimo();
		$data['horasasignaturas'] =$this->horasasignatura_model->horasasignaturasA($data['asignatura']['idasignatura'])->result();
		$data['referenciasasignaturas'] =$this->referenciasasignatura_model->referenciasasignaturasA($data['asignatura']['idasignatura'])->result();
  		$data['mallas']= $this->malla_model->lista_mallas()->result();
 		$data['areaconocimientos']=$this->areaconocimiento_model->lista_areaconocimientos()->result();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
  		$data['title']="Lista de asignatura";
			$this->load->view('template/page_header');		
  		$this->load->view('asignatura_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
  		$data['mallas']= $this->malla_model->lista_mallas()->result();
 		$data['areaconocimientos']=$this->areaconocimiento_model->lista_areaconocimientos()->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
		$data['title']="Nuevo asignatura";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('asignatura_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
		if($this->input->post('idasignatura')>0)
		{
	 	$array_item=array(
	 	'idasignatura' => $this->input->post('idasignatura'),
	 	'nombre' => $this->input->post('nombre'),
	 	'codigo' => $this->input->post('codigo'),
	 	'creditos' => $this->input->post('creditos'),
	 	'idmalla' => $this->input->post('idmalla'),
	 	'idareaconocimiento' => $this->input->post('idareaconocimiento'),
	 	'idnivelacademico' => $this->input->post('idnivelacademico'),
	 	'contenidosminimos' => $this->input->post('contenidosminimos'),
	 	'resultadosaprendizaje' => $this->input->post('resultadosaprendizaje'),
		);
		}else{

	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	'codigo' => $this->input->post('codigo'),
	 	'creditos' => $this->input->post('creditos'),
	 	'idmalla' => $this->input->post('idmalla'),
	 	'idareaconocimiento' => $this->input->post('idareaconocimiento'),
	 	'idnivelacademico' => $this->input->post('idnivelacademico'),
	 	'contenidosminimos' => $this->input->post('contenidosminimos'),
	 	'resultadosaprendizaje' => $this->input->post('resultadosaprendizaje'),
		);


		}
	 	$result=$this->asignatura_model->save($array_item);


	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Persona ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



public function edit()
{
	 	$data['asignatura'] = $this->asignatura_model->asignatura($this->uri->segment(3))->row_array();
  		$data['mallas']= $this->malla_model->lista_mallas()->result();
 		$data['areaconocimientos']=$this->areaconocimiento_model->lista_areaconocimientos()->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
 	 	$data['title'] = "Actualizar Asignatura";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('asignatura_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idasignatura');
	 	$array_item=array(
		 	
		 	'idasignatura' => $this->input->post('idasignatura'),
		 	'nombre' => $this->input->post('nombre'),
		 	'codigo' => $this->input->post('codigo'),
	 		'creditos' => $this->input->post('creditos'),
	 		'idmalla' => $this->input->post('idmalla'),
	 		'idareaconocimiento' => $this->input->post('idareaconocimiento'),
	 		'idnivelacademico' => $this->input->post('idnivelacademico'),
	 		'contenidosminimos' => $this->input->post('contenidosminimos'),
	 		'resultadosaprendizaje' => $this->input->post('resultadosaprendizaje'),
	 	);
	 	$this->asignatura_model->update($id,$array_item);
		echo "<script language='JavaScript'> window.history.go(-2);</script>";
	 //	redirect('asignatura/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->asignatura_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('asignatura/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}







public function listar()
{
	
  $data['title']="Asignatura";
	$this->load->view('page_header');		
  $this->load->view('asignatura_list',$data);
	$this->load->view('page_footer');
}

function asignatura_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->asignatura_model->lista_asignaturasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idasignatura,$r->malla,$r->area,$r->nivel,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('asignatura/actual').'"    data-idasignatura="'.$r->idasignatura.'">Ver</a>');
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

			$idasignatura=$this->input->get('idasignatura');
			$data0 =$this->silabo_model->silabosa($idasignatura,0);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idasignatura,$r->idsilabo,$r->elsilabo,$r->elperiodo,$r->eldocente,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('silabo/actual').'"    data-idsilabo="'.$r->idsilabo.'">Ver</a>');
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
	$data['asignatura'] = $this->asignatura_model->asignatura($this->uri->segment(3))->row_array();
	$data['horasasignaturas'] =$this->horasasignatura_model->horasasignaturasA($data['asignatura']['idasignatura'])->result();
	$data['referenciasasignaturas'] =$this->referenciasasignatura_model->referenciasasignaturasA($data['asignatura']['idasignatura'])->result();
  	$data['mallas']= $this->malla_model->lista_mallas()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
 	$data['areaconocimientos']=$this->areaconocimiento_model->lista_areaconocimientos()->result();
  if(!empty($data))
  {
    $data['title']="Asignatura";
    $this->load->view('template/page_header');		
    $this->load->view('asignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }



	public function reportepdf()
	{
		
		$data['asignaturas'] = $this->asignatura_model->asignaturaxmalla($this->uri->segment(3))->result();

		$data['title']="Evento";
		$this->load->view('asignatura_list_pdf',$data);
	
	}










public function elprimero()
{
	$data['asignatura'] = $this->asignatura_model->elprimero();
	$data['horasasignaturas'] =$this->horasasignatura_model->horasasignaturasA($data['asignatura']['idasignatura'])->result();
	$data['referenciasasignaturas'] =$this->referenciasasignatura_model->referenciasasignaturasA($data['asignatura']['idasignatura'])->result();
  	$data['mallas']= $this->malla_model->lista_mallas()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
 	$data['areaconocimientos']=$this->areaconocimiento_model->lista_areaconocimientos()->result();
  if(!empty($data))
  {
    $data['title']="Asignatura";
    $this->load->view('template/page_header');		
    $this->load->view('asignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['asignatura'] = $this->asignatura_model->elultimo();
	$data['horasasignaturas'] =$this->horasasignatura_model->horasasignaturasA($data['asignatura']['idasignatura'])->result();
	$data['referenciasasignaturas'] =$this->referenciasasignatura_model->referenciasasignaturasA($data['asignatura']['idasignatura'])->result();
  	$data['mallas']= $this->malla_model->lista_mallas()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
 	$data['areaconocimientos']=$this->areaconocimiento_model->lista_areaconocimientos()->result();
  if(!empty($data))
  {
    $data['title']="Asignatura";
  
    $this->load->view('template/page_header');		
    $this->load->view('asignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['asignatura_list']=$this->asignatura_model->lista_asignatura()->result();
	$data['asignatura'] = $this->asignatura_model->siguiente($this->uri->segment(3))->row_array();
	$data['horasasignaturas'] =$this->horasasignatura_model->horasasignaturasA($data['asignatura']['idasignatura'])->result();
	$data['referenciasasignaturas'] =$this->referenciasasignatura_model->referenciasasignaturasA($data['asignatura']['idasignatura'])->result();
  	$data['mallas']= $this->malla_model->lista_mallas()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
 	$data['areaconocimientos']=$this->areaconocimiento_model->lista_areaconocimientos()->result();
  $data['title']="Asignatura";
	$this->load->view('template/page_header');		
  $this->load->view('asignatura_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['asignatura_list']=$this->asignatura_model->lista_asignatura()->result();
	$data['asignatura'] = $this->asignatura_model->anterior($this->uri->segment(3))->row_array();
	$data['horasasignaturas'] =$this->horasasignatura_model->horasasignaturasA($data['asignatura']['idasignatura'])->result();
	$data['referenciasasignaturas'] =$this->referenciasasignatura_model->referenciasasignaturasA($data['asignatura']['idasignatura'])->result();
  	$data['mallas']= $this->malla_model->lista_mallas()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
 	$data['areaconocimientos']=$this->areaconocimiento_model->lista_areaconocimientos()->result();
  $data['title']="Asignatura";
	$this->load->view('template/page_header');		
  $this->load->view('asignatura_record',$data);
	$this->load->view('template/page_footer');
}





}
