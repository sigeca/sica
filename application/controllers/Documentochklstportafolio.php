<?php
class Documentochklstportafolio extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('documentochklstportafolio_model');
      		$this->load->model('persona_model');
      		$this->load->model('chklstportafolio_model');
      		$this->load->model('tema_model');
	}

	public function index(){
  		$data['chklstportafolios']= $this->chklstportafolio_model->lista_chklstportafolios()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['documentochklstportafolio'] = $this->documentochklstportafolio_model->elultimo();

 		// print_r($data['documentochklstportafolio_list']);
  		$data['title']="Lista de Documentochklstportafolioes";
		$this->load->view('template/page_header');		
  		$this->load->view('documentochklstportafolio_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
  		$data['chklstportafolios']= $this->chklstportafolio_model->lista_chklstportafolios()->result();
        if($this->uri->segment(3)){
		$data['documentochklstportafolio'] = $this->documentochklstportafolio_model->documentochklstportafolioss($this->uri->segment(3));
        }else{

		$data['documentochklstportafolio'] = $this->documentochklstportafolio_model->documentochklstportafolioss(1);
        }
		$data['title']="Nueva unidades del chklstportafolio";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documentochklstportafolio_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idchklstportafolio' => $this->input->post('idchklstportafolio'),
		 	'nombre' => $this->input->post('nombre'),
		 	'orden' => $this->input->post('orden'),
	 	);
	 	$this->documentochklstportafolio_model->save($array_item);
	 	redirect('documentochklstportafolio');
 	}



	public function edit()
	{
	 	$data['documentochklstportafolio'] = $this->documentochklstportafolio_model->documentochklstportafolio($this->uri->segment(3))->row_array();
		$data['chklstportafolios']= $this->chklstportafolio_model->lista_chklstportafolios()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Documentochklstportafolio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documentochklstportafolio_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumentochklstportafolio');
	 	$array_item=array(
		 	'nombre' => $this->input->post('nombre'),
		 	'unidad' => $this->input->post('unidad'),
		 	'idchklstportafolio' => $this->input->post('idchklstportafolio'),
	 	);
	 	$this->documentochklstportafolio_model->update($id,$array_item);
	 	redirect('documentochklstportafolio/actual/'.$id);
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('iddocumentochklstportafolio');
	 	$array_item=array(
		 	'idchklstportafolio' => $this->input->post('idchklstportafolio'),
		 	'idpersona' => $this->input->post('idpersona'),
	 	);
	 	echo $this->documentochklstportafolio_model->update($id,$array_item);
 	}



 	public function delete()
 	{
 		$data=$this->documentochklstportafolio_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documentochklstportafolio/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Unidades del chklstportafolio";
		$this->load->view('template/page_header');		
		$this->load->view('documentochklstportafolio_list',$data);
		$this->load->view('template/page_footer');
	}



	function documentochklstportafolio_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->documentochklstportafolio_model->listar_documentochklstportafolio1();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentochklstportafolio,$r->idchklstportafolio,$r->unidad,$r->launidad,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idchklstportafolio="'.$r->iddocumentochklstportafolio.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}





	function tema_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$iddocumentochklstportafolio=$this->input->get('iddocumentochklstportafolio');
			$data0 =$this->tema_model->temas2($iddocumentochklstportafolio);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentochklstportafolio,$r->idtema,$r->unidad,$r->numerosesion,$r->nombrecorto,$r->duracionminutos,$r->idvideotutorial,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('tema/actual').'"    data-idtema="'.$r->idtema.'">Ver</a>');
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
		$data['documentochklstportafolio'] = $this->documentochklstportafolio_model->documentochklstportafolio($this->uri->segment(3))->row_array();
	  if(!empty($data))
	  {
			$data['chklstportafolios']= $this->chklstportafolio_model->lista_chklstportafolios()->result();

		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Documentochklstportafolio del videotutorial";
	    $this->load->view('template/page_header');		
	    $this->load->view('documentochklstportafolio_record',$data);
	    $this->load->view('template/page_footer');
	  }else{
	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}







	public function elprimero()
	{
		$data['documentochklstportafolio'] = $this->documentochklstportafolio_model->elprimero();
	  if(!empty($data))
	  {
			$data['chklstportafolios']= $this->chklstportafolio_model->lista_chklstportafolios()->result();

		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Documentochklstportafolio del videotutorial";
	    $this->load->view('template/page_header');		
	    $this->load->view('documentochklstportafolio_record',$data);
	    $this->load->view('template/page_footer');
	  }else{
	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function elultimo()
	{
		$data['documentochklstportafolio'] = $this->documentochklstportafolio_model->elultimo();
	  if(!empty($data))
	  {
			$data['chklstportafolios']= $this->chklstportafolio_model->lista_chklstportafolios()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Documentochklstportafolio del videotutorial";
	  
	    $this->load->view('template/page_header');		
	    $this->load->view('documentochklstportafolio_record',$data);
	    $this->load->view('template/page_footer');
	  }else{

	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function siguiente(){
	 // $data['documentochklstportafolio_list']=$this->documentochklstportafolio_model->lista_documentochklstportafolio()->result();
		$data['documentochklstportafolio'] = $this->documentochklstportafolio_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['chklstportafolios']= $this->chklstportafolio_model->lista_chklstportafolios()->result();
	    $data['title']="Documentochklstportafolio del videotutorial";
	 // $data['title']="Correo";
		$this->load->view('template/page_header');		
	  $this->load->view('documentochklstportafolio_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
	 // $data['documentochklstportafolio_list']=$this->documentochklstportafolio_model->lista_documentochklstportafolio()->result();
	$data['documentochklstportafolio'] = $this->documentochklstportafolio_model->anterior($this->uri->segment(3))->row_array();
	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['chklstportafolios']= $this->chklstportafolio_model->lista_chklstportafolios()->result();
	 // $data['title']="Correo";
	    $data['title']="Documentochklstportafolio del videotutorial";
		$this->load->view('template/page_header');		
	  $this->load->view('documentochklstportafolio_record',$data);
		$this->load->view('template/page_footer');
	}


}
