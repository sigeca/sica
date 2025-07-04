<?php

class Asignaturadocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('docente_model');
	  $this->load->model('malla_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('periodoacademico_model');
  	  $this->load->model('asignaturadocente_model');
  	  $this->load->model('estadoasignaturadocente_model');
  	  $this->load->model('distributivo_model');
  	  $this->load->model('distributivodocente_model');
  	  $this->load->model('paralelo_model');
  	  $this->load->model('afinidadtitulo_model');
  	  $this->load->model('jornadadocente_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['asignaturadocente']=$this->asignaturadocente_model->lista_asignaturadocentes()->row_array();
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['paralelos']= $this->paralelo_model->lista_paralelos()->result();
  	$data['afinidadtitulos']= $this->afinidadtitulo_model->lista_afinidadtitulos()->result();
  	$data['estadoasignaturadocentes']= $this->estadoasignaturadocente_model->lista_estadoasignaturadocentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
			
		$data['title']="Lista de asignaturadocentes";
		$this->load->view('template/page_header');
		$this->load->view('asignaturadocente_record',$data);
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


  	$data['distributivodocentes']=$this->distributivodocente_model->distributivodocentes2($this->uri->segment(3))->row_array();
	$data['docentes']= $this->docente_model->docente1($data['distributivodocentes']['iddocente'])->result();
  	$data['distributivos']=$this->distributivo_model->lista_distributivos1($data['distributivodocentes']['idperiodoacademico'])->result();
	}else{
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['distributivos']=$this->distributivo_model->lista_distributivos1(0)->result();
	}


	$data['mallas']= $this->malla_model->lista_mallas()->result();
	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
  	$data['paralelos']= $this->paralelo_model->lista_paralelos()->result();
  	$data['afinidadtitulos']= $this->afinidadtitulo_model->lista_afinidadtitulos()->result();
  		$data['estadoasignaturadocentes']= $this->estadoasignaturadocente_model->lista_estadoasignaturadocentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	$data['title']="Nueva Asignaturadocente";
 	$this->load->view('page_header');		
 	$this->load->view('asignaturadocente_form',$data);
 	$this->load->view('page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'iddistributivodocente' => $this->input->post('iddistributivodocente'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idparalelo' => $this->input->post('idparalelo'),
			'idafinidadtitulo' => $this->input->post('idafinidadtitulo'),
			'idsilabo' => 0,
			'idestadoasignaturadocente' => 1,
	 	);
	 	$result=$this->asignaturadocente_model->save($array_item);


	 	if($result == FALSE)
		{
		echo "<script language='JavaScript'> alert('Asignatura ya fue asignada'); </script>";
		echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
		echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



public function edit()
{
	 	$data['asignaturadocente'] = $this->asignaturadocente_model->asignaturadocente($this->uri->segment(3))->row_array();
		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
  		$data['paralelos']= $this->paralelo_model->lista_paralelos()->result();
  		$data['afinidadtitulos']= $this->afinidadtitulo_model->lista_afinidadtitulos()->result();
  		$data['estadoasignaturadocentes']= $this->estadoasignaturadocente_model->lista_estadoasignaturadocentes()->result();
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
 	 	$data['title'] = "Actualizar Asignaturadocente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('asignaturadocente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idasignaturadocente');
	 	$array_item=array(
		 	
		 	'idasignaturadocente' => $this->input->post('idasignaturadocente'),
			'iddistributivodocente' => $this->input->post('iddistributivodocente'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idparalelo' => $this->input->post('idparalelo'),
			'idafinidadtitulo' => $this->input->post('idafinidadtitulo'),
			'idestadoasignaturadocente' => $this->input->post('idestadoasignaturadocente'),
	 	);
	 	$this->asignaturadocente_model->update($id,$array_item);
	 	redirect('asignaturadocente/actual/'.$id);
 	}


 	public function delete()
 	{
 		$result=$this->asignaturadocente_model->delete($this->uri->segment(3));
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Primero elimine la Joranada académica'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{

			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Asignaturadocentes";
	$this->load->view('template/page_header');		
  $this->load->view('asignaturadocente_list',$data);
	$this->load->view('template/page_footer');
}



function asignaturadocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->asignaturadocente_model->lista_asignaturadocentesA(0);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idasignaturadocente,$r->eldistributivodocente,$r->laasignatura,$r->paralelo,$r->estado,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('asignaturadocente/actual').'"  data-idasignaturadocente="'.$r->idasignaturadocente.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();

}




	function jornadadocente_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idasignaturadocente=$this->input->get('idasignaturadocente');
			$data0 =$this->jornadadocente_model->jornadadocentes($idasignaturadocente);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idasignaturadocente,$r->idjornadadocente,$r->nombre,$r->horainicio,$r->duracionminutos,$r->elaula,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('jornadadocente/actual').'"    data-idjornadadocente="'.$r->idjornadadocente.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}





	function jornadadocente2_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idasignatura=$this->input->get('idasignatura');
			$data0 =$this->jornadadocente_model->jornadadocentexasignatura($idasignatura);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idasignatura,$r->paralelo,$r->nombre,$r->horainicio,$r->duracionminutos,$r->eldistributivodocente,$r->elaula,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('jornadadocente/actual').'"    data-idjornadadocente="'.$r->idjornadadocente.'">Ver</a>');
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
		$iddistributivo=$this->uri->segment(3);
		$tmp=explode("-",$this->uri->segment(3));
		$iddistributivo=$tmp[0];
		if(isset($tmp[1]))
		{
			$ordenrpt=$tmp[1];
		}else{
			$ordenrpt=0;
		}
	 	$data['asignaturadocentes']= $this->asignaturadocente_model->asignaturadocentexdistributivo($iddistributivo,$ordenrpt)->result();
		$data['distributivo']=$this->distributivo_model->distributivo1($iddistributivo)->result();
		$data['title']="Evento";
		$this->load->view('asignaturadocente_list_pdf',$data);
	}









public function actual()
{
	$data['asignaturadocente'] = $this->asignaturadocente_model->asignaturadocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['paralelos']= $this->paralelo_model->lista_paralelos()->result();
  		$data['afinidadtitulos']= $this->afinidadtitulo_model->lista_afinidadtitulos()->result();
  		$data['estadoasignaturadocentes']= $this->estadoasignaturadocente_model->lista_estadoasignaturadocentes()->result();
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
	  if(!empty($data))
	  {
	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
    $data['title']="Asignaturadocente";
    $this->load->view('page_header');		
    $this->load->view('asignaturadocente_record',$data);
    $this->load->view('page_footer');
  }else{
    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
 }










public function elprimero()
{
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	$data['asignaturadocente'] = $this->asignaturadocente_model->elprimero();
  		$data['paralelos']= $this->paralelo_model->lista_paralelos()->result();
  		$data['afinidadtitulos']= $this->afinidadtitulo_model->lista_afinidadtitulos()->result();
  		$data['estadoasignaturadocentes']= $this->estadoasignaturadocente_model->lista_estadoasignaturadocentes()->result();
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Asignaturadocente";
    $this->load->view('template/page_header');		
    $this->load->view('asignaturadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['asignaturadocente'] = $this->asignaturadocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['paralelos']= $this->paralelo_model->lista_paralelos()->result();
  	$data['afinidadtitulos']= $this->afinidadtitulo_model->lista_afinidadtitulos()->result();
  	$data['estadoasignaturadocentes']= $this->estadoasignaturadocente_model->lista_estadoasignaturadocentes()->result();
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
    $data['title']="Asignaturadocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('asignaturadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['asignaturadocente_list']=$this->asignaturadocente_model->lista_asignaturadocente()->result();
	$data['asignaturadocente'] = $this->asignaturadocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  		$data['paralelos']= $this->paralelo_model->lista_paralelos()->result();
  		$data['afinidadtitulos']= $this->afinidadtitulo_model->lista_afinidadtitulos()->result();
  		$data['estadoasignaturadocentes']= $this->estadoasignaturadocente_model->lista_estadoasignaturadocentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
  

$data['title']="Asignaturadocente";
	$this->load->view('template/page_header');		
  $this->load->view('asignaturadocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['asignaturadocente_list']=$this->asignaturadocente_model->lista_asignaturadocente()->result();
	$data['asignaturadocente'] = $this->asignaturadocente_model->anterior($this->uri->segment(3))->row_array();
 	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['paralelos']= $this->paralelo_model->lista_paralelos()->result();
  		$data['afinidadtitulos']= $this->afinidadtitulo_model->lista_afinidadtitulos()->result();
  		$data['estadoasignaturadocentes']= $this->estadoasignaturadocente_model->lista_estadoasignaturadocentes()->result();
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
	$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
  $data['title']="Asignaturadocente";
	$this->load->view('template/page_header');		
  $this->load->view('asignaturadocente_record',$data);
	$this->load->view('template/page_footer');
}





public function get_docentes() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('iddistributivo')) {
        $this->db->select('*');
        $this->db->where(array('iddistributivo' => $this->input->post('iddistributivo')));
        $query = $this->db->get('distributivodocente1');
	$data=$query->result();
	echo json_encode($data);
	}

}



public function get_asignaturas() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idmalla')) {
        $this->db->select('*');
        $this->db->where(array('idmalla' => $this->input->post('idmalla')));
        $this->db->order_by("area");
        $query = $this->db->order_by("nivel")->get('asignatura1');
	$data=$query->result();
	echo json_encode($data);
	}

}



public function get_estado() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idparalelo')) {
        $this->db->select('*');
        $this->db->where(array('idasignatura' => $this->input->post('idasignatura')));
        $this->db->where(array('idparalelo' => $this->input->post('idparalelo')));
        $this->db->where(array('iddistributivo' => $this->input->post('iddistributivo')));
        $query = $this->db->get('asignaturadocente1');
	$data=$query->result();
	echo json_encode($data);
	}

}







}
