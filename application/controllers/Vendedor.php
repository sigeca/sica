<?php

class Vendedor extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('vendedor_model');
  	  $this->load->model('estudio_model');
  	  $this->load->model('silabo_model');
}

    /**
     * Checks user access permissions.
     * Redirects to login if access is not permitted for 'persona' module.
     */
    private function _check_access() {
        if (!isset($this->session->userdata['acceso'])) {
            redirect('login/logout');
        }

        $has_access = false;
        foreach ($this->session->userdata['acceso'] as $module_access) {
            if (isset($module_access['modulo']['modulo']) && $module_access['modulo']['modulo'] === 'persona') {
                $has_access = true;
                break;
            }
        }

        if (!$has_access) {
            redirect('login/logout');
        }
    }



public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['vendedor']=$this->vendedor_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['vendedor']['idpersona'])->result();
			
		$data['title']="Lista de vendedors";
		$this->load->view('page_header');
		$this->load->view('vendedor_record',$data);
		$this->load->view('page_footer');
	}else{
	 	$this->load->view('page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('page_footer.php');
	}

 }





	public function reportepdf()
	{
		$idpersona=$this->uri->segment(3);
	 	$data['estudios']= $this->estudio_model->lista_estudios1($idpersona)->result();
		$data['title']="Evento";
		$this->load->view('vendedor_list_pdf',$data);
	}







public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['vendedor']=$this->vendedor_model->vendedor($this->uri->segment(3))->row_array();
	$data['estudios']= $this->estudio_model->estudios($data['vendedor']['idpersona'])->result();


	$data['title']="Modulo del Vendedor";
	$this->load->view('page_header');		
	$this->load->view('vendedor_record',$data);
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
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['title']="Nueva Vendedor";
			$this->load->view('page_header');		
			$this->load->view('vendedor_form',$data);
			$this->load->view('page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idvendedor' => $this->input->post('idvendedor'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$result=$this->vendedor_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Vendedor ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
			$data['vendedor'] = $this->vendedor_model->vendedor($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['title'] = "Actualizar Vendedor";
			$this->load->view('page_header');		
			$this->load->view('vendedor_edit',$data);
			$this->load->view('page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idvendedor');
	 	$array_item=array(
		 	
		 	'idvendedor' => $this->input->post('idvendedor'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$this->vendedor_model->update($id,$array_item);
	 	redirect('vendedor');
 	}


 	public function delete()
 	{
 		$data=$this->vendedor_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('vendedor/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		$data['title']="Vendedors";
		$this->load->view('page_header');		
		$this->load->view('vendedor_list',$data);
		$this->load->view('page_footer');
	}



	function vendedor_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->vendedor_model->lista_vendedorsB();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idvendedor,$r->elvendedor,
					$r->href='<a href="javascript:void(0);" class="item_ver" data-doctos="'.$r->idpersona.'">'.$r->cantidad.'</a>',
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('vendedor/actual').'"  data-idvendedor="'.$r->idvendedor.'">Ver</a>');
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

			$idvendedor=$this->input->get('idvendedor');
			$idperiodoacademico=$this->input->get('idperiodoacademico');
			$data0 =$this->silabo_model->silabosdp($idvendedor,$idperiodoacademico);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idvendedor,$r->idsilabo,$r->elsilabo,$r->elperiodo,$r->archivopdf,
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




    public function estudio_data1() {
        $this->_check_access();
        $idpersona = $this->input->get('idpersona');
        if ($idpersona) {
            //$data = $this->documento_model->ldocumentos_by_persona($idpersona);
			$data =$this->estudio_model->estudios($idpersona);
        // Prepara la respuesta
        $response = array(
            'status' => 'success',
            'data' => $data
        );

        // Establece la cabecera Content-Type y envía la respuesta JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
 


        } else {
            echo json_encode(['data' => []]);
        }
    }







	function estudio_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idpersona=$this->input->get('idpersona');
			$data0 =$this->estudio_model->estudios($idpersona);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idpersona,$r->idestudio,$r->lainstitucion,$r->nivel,$r->titulo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_vere"  data-retornoe="'.site_url('estudio/actual').'"    data-idestudio="'.$r->idestudio.'">Ver</a>');
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
		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['vendedor'] = $this->vendedor_model->elprimero();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['vendedor']['idpersona'])->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Vendedor";
		    $this->load->view('page_header');		
		    $this->load->view('vendedor_record',$data);
		    $this->load->view('page_footer');
		  }else{
		    $this->load->view('page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('page_footer');
		  }
	 }

	public function elultimo()
	{
		$data['vendedor'] = $this->vendedor_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['estudios']= $this->estudio_model->estudios($data['vendedor']['idpersona'])->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas0()->result();
		    $data['title']="Vendedor";
		  
		    $this->load->view('page_header');		
		    $this->load->view('vendedor_record',$data);
		    $this->load->view('page_footer');
		  }else{

		    $this->load->view('page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('page_footer');
		  }
	}

	public function siguiente(){
		$data['vendedor'] = $this->vendedor_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['vendedor']['idpersona'])->result();

		$data['title']="Vendedor";
		$this->load->view('page_header');		
		$this->load->view('vendedor_record',$data);
		$this->load->view('page_footer');
	}

	public function anterior(){
		$data['vendedor'] = $this->vendedor_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['estudios']= $this->estudio_model->estudios($data['vendedor']['idpersona'])->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Vendedor";
		$this->load->view('page_header');		
		$this->load->view('vendedor_record',$data);
		$this->load->view('page_footer');
	}






	public function vendedor1(){
                header('Content-Type: application/json');

 // Consultar la vista vendedor1
 // Consultar la vista vendedor1

		$vendedores = $this->vendedor_model->vendedordep1(1)->result();
 // Si no hay resultados, devolver un array vacío
        if (empty($vendedores)) {
            echo json_encode([]);
            return;
        }

        // Codificar los resultados a JSON y enviarlos a la salida
        echo json_encode($vendedores);


	}






}
