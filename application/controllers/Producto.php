<?php

class Producto extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('producto_model');
      $this->load->model('prestamoproducto_model');
      $this->load->model('precioproducto_model');
  	  $this->load->model('institucion_model');
  	  $this->load->model('ubicacionproducto_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['producto']=$this->producto_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  		$data['title']="Lista de Artiulos";
		$this->load->view('page_header');		
  		$this->load->view('producto_record',$data);
		$this->load->view('page_footer');
	}else{
	 	$this->load->view('page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('page_footer.php');
	}
}


public function add()
{
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['title']="Nuevo Artículo";
	 	$this->load->view('page_header');		
	 	$this->load->view('producto_form',$data);
	 	$this->load->view('page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idproducto' => $this->input->post('idproducto'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->producto_model->save($array_item);
	 	redirect('producto');
 	}



public function edit()
{
	 	$data['producto'] = $this->producto_model->producto($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 	 	$data['title'] = "Actualizar Producto";
 	 	$this->load->view('page_header');		
 	 	$this->load->view('producto_edit',$data);
	 	$this->load->view('page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idproducto');
	 	$array_item=array(
		 	
		 	'idproducto' => $this->input->post('idproducto'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 		'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->producto_model->update($id,$array_item);
	 	redirect('producto');
 	}



public function listar()
{
	
  $data['title']="Producto";
	$this->load->view('page_header');		
  $this->load->view('producto_list',$data);
	$this->load->view('page_footer');
}

function producto_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->producto_model->lista_productos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idproducto,$r->nombre,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('producto/actual').'"  data-idproducto="'.$r->idproducto.'">Ver</a>');
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

			$idproducto=$this->input->get('idproducto');
			$data0 =$this->ubicacionproducto_model->ubicacionproductosA($idproducto);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacionproducto,$r->idproducto,$r->launidad,$r->lapersona,$r->fecha,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionproducto/actual').'"    data-idubicacionproducto="'.$r->idubicacionproducto.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionproducto/edit').'"    data-idubicacionproducto="'.$r->idubicacionproducto.'">edit</a>');
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

			$idproducto=$this->input->get('idproducto');
			$data0 =$this->prestamoproducto_model->prestamoproductosA($idproducto);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamoproducto,$r->idproducto,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoproducto/actual').'"    data-idprestamoproducto="'.$r->idprestamoproducto.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoproducto/edit').'"    data-idprestamoproducto="'.$r->idprestamoproducto.'">edit</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}






	function precio_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idproducto=$this->input->get('idproducto');
			$data0 =$this->precioproducto_model->precioproductosA($idproducto);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprecioproducto,$r->idproducto,$r->precio,$r->fechadesde,$r->fechahasta,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('precioproducto/actual').'"    data-idprecioproducto="'.$r->idprecioproducto.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('precioproducto/edit').'"    data-idprecioproducto="'.$r->idprecioproducto.'">edit</a>');
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

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$idinstitucion=$this->uri->segment(3);
		//$iddistributivo=1;
	 	$data['productos']= $this->producto_model->productoA($idinstitucion)->result();
		$arreglo=array();
		$i=0;
		foreach($data['productos'] as $row){
		$idproducto=$row->idproducto;

		$xx=array($this->prestamoproducto_model->prestamoproductosA($idproducto)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->idproducto=>$row3));
				$i=$i+1;
			}
			}
		}

		}
		$data['prestamoproducto']=array();
		$data['prestamoproducto']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('producto_genpagina',$data);
	}
}


public function genpaginaprecios()
{
	$iddistributivo=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$idinstitucion=$this->uri->segment(3);
		//$iddistributivo=1;
	 	$data['productos']= $this->producto_model->productoA($idinstitucion)->result();
		$arreglo=array();
		$i=0;
		foreach($data['productos'] as $row){
		$idproducto=$row->idproducto;

		$xx=array($this->precioproducto_model->precioproductosA($idproducto)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->idproducto=>$row3));
				$i=$i+1;
			}
			}
		}

		}
		$data['precioproducto']=array();
		$data['precioproducto']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('producto_genpaginaprecios',$data);
	}
}







public function genpaginaprecios1()
{
	if($this->uri->segment(3))
	{
		$idinstitucion=$this->uri->segment(3);
	 	$data['productos']= $this->producto_model->productoA($idinstitucion)->result();
		$arreglo=array();
		$i=0;
		foreach($data['productos'] as $row){
		$idproducto=$row->idproducto;

		$xx=array($this->precioproducto_model->precioproductosA($idproducto)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->idproducto=>$row3));
				$i=$i+1;
			}
			}
		}

		}
		$data['precioproducto']=array();
		$data['precioproducto']=$arreglo;

        // Load header, the improved view, and footer
        $this->load->view('page_header');
		$this->load->view('producto_genpaginaprecios1',$data); // This is the view that will be improved
        $this->load->view('page_footer');

	} else {
        // Handle case where no institution ID is provided, e.g., redirect or show error
        redirect('producto');
    }
}













public function actual()
{
	$data['producto'] = $this->producto_model->producto($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Producto";
    $this->load->view('page_header');		
    $this->load->view('producto_record',$data);
    $this->load->view('page_footer');
  }else{
    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
 }







public function elprimero()
{
	$data['producto'] = $this->producto_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Producto";
    $this->load->view('page_header');		
    $this->load->view('producto_record',$data);
    $this->load->view('page_footer');
  }else{
    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
 }

public function elultimo()
{
	  $data['producto'] = $this->producto_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Producto";
 
    $this->load->view('page_header');		
    $this->load->view('producto_record',$data);
    $this->load->view('page_footer');
  }else{

    $this->load->view('page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('page_footer');
  }
}

public function siguiente(){
 // $data['producto_list']=$this->producto_model->lista_producto()->result();
	$data['producto'] = $this->producto_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Producto";
	$this->load->view('page_header');		
  $this->load->view('producto_record',$data);
	$this->load->view('page_footer');
}

public function anterior(){
 // $data['producto_list']=$this->producto_model->lista_producto()->result();
	$data['producto'] = $this->producto_model->anterior($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Producto";
	$this->load->view('page_header');		
  $this->load->view('producto_record',$data);
	$this->load->view('page_footer');
}




	public function producto_1()
	{
	  $this->load->view('web/producto-1');
	}

	public function producto_48()
	{
      echo "hola";
	  $this->load->view('web/producto-48');
	}


	public function productoprecios_48()
	{
      echo "hola";
	  $this->load->view('web/productoprecios-48');
	}


	public function producto1(){
                header('Content-Type: application/json');


    
    
			$id= $this->input->get("idpersona");
    
    
        $productos = $this->producto_model->productopers($id)->result();
 // Si no hay resultados, devolver un array vacío
        if (empty($productos)) {
            echo json_encode([]);
            return;
        }

        // Codificar los resultados a JSON y enviarlos a la salida
        echo json_encode($productos);


	}








}
