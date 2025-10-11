<?php
class Carritoproducto extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('carritoproducto_model');
      		$this->load->model('persona_model');
      		$this->load->model('carrito_model');
      		$this->load->model('producto_model');
	}

	public function index(){
		$data['carritoproducto'] = $this->carritoproducto_model->elultimo();
		$data['carritos']= $this->carrito_model->lista_carritos()->result();
		$data['productos']= $this->producto_model->lista_productos()->result();
  		$data['personas']= $this->persona_model->lista_personas0()->result();

 		// print_r($data['carritoproducto_list']);
  		$data['title']="Lista de Carritoproductoes";
		$this->load->view('page_header');		
  		$this->load->view('carritoproducto_record',$data);
		$this->load->view('page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['carritoproducto'] = $this->carritoproducto_model->carritoproducto($this->uri->segment(3))->row_array();

		    $data['carritos']= $this->carrito_model->lista_carritos()->result();

		$data['productos']= $this->producto_model->lista_productos()->result();
		$data['personas']= $this->persona_model->lista_personas0()->result();
		$data['title']="Carritoproducto del unidad";
	 
		$data['title']="Modulo ubicación del artículo: ";
		$this->load->view('page_header');		
		$this->load->view('carritoproducto_record',$data);
		$this->load->view('page_footer');
	   }else{
		$this->load->view('page_header.php');
		$this->load->view('login_form');
		$this->load->view('page_footer.php');
	   }
	}




	public function add()
	{


	    if($this->uri->segment(3))
	    {
		    $data['carritos']= $this->carrito_model->carrito($this->uri->segment(3))->result();
        }else{
		    $data['carritos']= $this->carrito_model->lista_carritos()->result();
         }

		 $data['productos']= $this->producto_model->lista_productos()->result();
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$data['title']="Nueva ubicación de artículo: ";
	 	$this->load->view('page_header');		
	 	$this->load->view('carritoproducto_form',$data);
	 	$this->load->view('page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idcarrito' => $this->input->post('idcarrito'),
		 	'idproducto' => $this->input->post('idproducto'),
		 	'cantidad' => $this->input->post('cantidad'),
		 	'precio' => $this->input->post('precio'),
	 	);
	 	$result=$this->carritoproducto_model->save($array_item);
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
	 	$data['carritoproducto'] = $this->carritoproducto_model->carritoproducto($this->uri->segment(3))->row_array();
		$data['productos']= $this->producto_model->lista_productos()->result();
		$data['personas']= $this->persona_model->lista_personas0()->result();
 	 	$data['title'] = "Actualizar Carritoproducto";
 	 	$this->load->view('page_header');		
 	 	$this->load->view('carritoproducto_edit',$data);
	 	$this->load->view('page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idcarritoproducto');
	 	$array_item=array(
		 	'idcarritoproducto' => $this->input->post('idcarritoproducto'),
		 	'idcarrito' => $this->input->post('idcarrito'),
		 	'idproducto' => $this->input->post('idproducto'),
		 	'cantidad' => $this->input->post('cantidad'),
		 	'precio' => $this->input->post('precio'),
	 	);
	 	$this->carritoproducto_model->update($id,$array_item);
	 	redirect('carritoproducto/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->carritoproducto_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('carritoproducto/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('page_header');		
  $this->load->view('carritoproducto_list',$data);
	$this->load->view('page_footer');
}



function carritoproducto_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

			$idcarrito=$this->input->get('idcarrito');

	 	$data0 = $this->carritoproducto_model->carritoproductosA($idcarrito);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcarrito,$r->idcarritoproducto,$r->idproducto,$r->elproducto,$r->cantidad,$r->precio,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('carritoproducto/actual').'"   data-idcarritoproducto="'.$r->idcarritoproducto.'">Ver</a>');
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
		

	 	$data['carritoproductos']= $this->carritoproducto_model->carritoproductosA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('page_header');		
		$this->load->view('carritoproducto_list_pdf',$data);
//		$this->load->view('page_footer');
	}





public function elprimero()
{
  	$data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['carritoproducto'] = $this->carritoproducto_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas0()->result();
    $data['title']="Carritoproducto del unidad";
    $this->load->view('page_header');		
    $this->load->view('carritoproducto_record',$data);
    $this->load->view('page_footer');
  }else{
    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
 }

public function elultimo()
{
	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  $data['productos']= $this->producto_model->lista_productos()->result();
 // 		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['carritoproducto'] = $this->carritoproducto_model->elultimo();
//		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  //		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas0()->result();
    $data['title']="Carritoproducto del unidad";
  
    $this->load->view('page_header');		
    $this->load->view('carritoproducto_record',$data);
    $this->load->view('page_footer');
  }else{

    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
}

public function siguiente(){
 // $data['carritoproducto_list']=$this->carritoproducto_model->lista_carritoproducto()->result();
	$data['unidades']= $this->unidad_model->lista_unidades()->result();

	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  $data['productos']= $this->producto_model->lista_productos()->result();


  	//	$data['temas']= $this->tema_model->lista_temas()->result();
//		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['carritoproducto'] = $this->carritoproducto_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas0()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Carritoproducto del unidad";
 // $data['title']="Correo";
	$this->load->view('page_header');		
  $this->load->view('carritoproducto_record',$data);
	$this->load->view('page_footer');
}

public function anterior(){
 // $data['carritoproducto_list']=$this->carritoproducto_model->lista_carritoproducto()->result();
  $data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['carritoproducto'] = $this->carritoproducto_model->anterior($this->uri->segment(3))->row_array();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas0()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Carritoproducto del unidad";
	$this->load->view('page_header');		
  $this->load->view('carritoproducto_record',$data);
	$this->load->view('page_footer');
}







public function get_carritoproducto() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idcarritoproducto')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idcarritoproducto' => $this->input->get('idcarritoproducto')));
        $query = $this->db->get('carritoproducto');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
