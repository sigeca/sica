<?php
class Ubicacionproducto extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('ubicacionproducto_model');
      		$this->load->model('unidad_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('articulo_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['ubicacionproducto'] = $this->ubicacionproducto_model->elultimo();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['unidades']= $this->unidad_model->lista_unidades()->result();

 		// print_r($data['ubicacionproducto_list']);
  		$data['title']="Lista de Ubicacionproductoes";
		$this->load->view('template/page_header');		
  		$this->load->view('ubicacionproducto_record',$data);
		$this->load->view('template/page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['ubicacionproducto'] = $this->ubicacionproducto_model->ubicacionproducto($this->uri->segment(3))->row_array();


		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Ubicacionproducto del unidad";
	 
		$data['title']="Modulo ubicación del artículo: ";
		$this->load->view('template/page_header');		
		$this->load->view('ubicacionproducto_record',$data);
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
		    $data['articulos']= $this->articulo_model->articulo($this->uri->segment(3))->result();
        }else{
		    $data['articulos']= $this->articulo_model->lista_articulos()->result();
         }

		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['unidades']= $this->unidad_model->lista_unidades()->result();
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$data['title']="Nueva ubicación de artículo: ";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('ubicacionproducto_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idunidad' => $this->input->post('idunidad'),
	 	);
	 	$result=$this->ubicacionproducto_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Fecha para este evento ya fue asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 
 	}



	public function edit()
	{
	 	$data['ubicacionproducto'] = $this->ubicacionproducto_model->ubicacionproducto($this->uri->segment(3))->row_array();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Ubicacionproducto";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ubicacionproducto_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idubicacionproducto');
	 	$array_item=array(
		 	'idubicacionproducto' => $this->input->post('idubicacionproducto'),

		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idunidad' => $this->input->post('idunidad'),
	 	);
	 	$this->ubicacionproducto_model->update($id,$array_item);
	 	redirect('ubicacionproducto/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->ubicacionproducto_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ubicacionproducto/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionproducto_list',$data);
	$this->load->view('template/page_footer');
}



function ubicacionproducto_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		if($this->uri->segment(3))
		{
			$idevento=$this->uri->segment(3);
		}else{
			$idevento=$this->input->get('idevento');
		}

	 	$data0 = $this->ubicacionproducto_model->ubicacionproductosA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idubicacionproducto,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('ubicacionproducto/actual').'"   data-idubicacionproducto="'.$r->idubicacionproducto.'">Ver</a>');
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
		

	 	$data['ubicacionproductos']= $this->ubicacionproducto_model->ubicacionproductosA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('template/page_header');		
		$this->load->view('ubicacionproducto_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}





public function elprimero()
{
  	$data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['ubicacionproducto'] = $this->ubicacionproducto_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicacionproducto del unidad";
    $this->load->view('template/page_header');		
    $this->load->view('ubicacionproducto_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  $data['articulos']= $this->articulo_model->lista_articulos()->result();
 // 		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['ubicacionproducto'] = $this->ubicacionproducto_model->elultimo();
//		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  //		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicacionproducto del unidad";
  
    $this->load->view('template/page_header');		
    $this->load->view('ubicacionproducto_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['ubicacionproducto_list']=$this->ubicacionproducto_model->lista_ubicacionproducto()->result();
	$data['unidades']= $this->unidad_model->lista_unidades()->result();

	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  $data['articulos']= $this->articulo_model->lista_articulos()->result();


  	//	$data['temas']= $this->tema_model->lista_temas()->result();
//		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['ubicacionproducto'] = $this->ubicacionproducto_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Ubicacionproducto del unidad";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionproducto_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['ubicacionproducto_list']=$this->ubicacionproducto_model->lista_ubicacionproducto()->result();
  $data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['ubicacionproducto'] = $this->ubicacionproducto_model->anterior($this->uri->segment(3))->row_array();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Ubicacionproducto del unidad";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionproducto_record',$data);
	$this->load->view('template/page_footer');
}







public function get_ubicacionproducto() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idubicacionproducto')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idubicacionproducto' => $this->input->get('idubicacionproducto')));
        $query = $this->db->get('ubicacionproducto');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
