<?php

class Contabilidad extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('contabilidad_model');
    $this->load->model('beneficiario_model');
      	$this->load->model('tipodocu_model');
      	$this->load->model('documento_model');
  	  $this->load->model('pagador_model');

 // Esto es importante para permitir solicitudes de origen cruzado (CORS)
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit();
        }


}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['contabilidad'] = $this->contabilidad_model->elprimero();
  		$data['beneficiarios']= $this->beneficiario_model->listar_beneficiarios1()->result();
  		$data['pagadores']= $this->pagador_model->listar_pagadores1()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
			
		$data['title']="Lista de contabilidades";
		$this->load->view('template/page_header');
		$this->load->view('contabilidad_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }




public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['contabilidad'] = $this->contabilidad_model->contabilidad($this->uri->segment(3))->row_array();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['beneficiarios']= $this->beneficiario_model->listar_beneficiarios1()->result();
  	$data['pagadores']= $this->pagador_model->listar_pagadores1()->result();
	$data['title']="Modulo de Contabilidads";
	$this->load->view('template/page_header');		
	$this->load->view('contabilidad_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}






	public function add()
	{
		$data['beneficiarios']= $this->beneficiario_model->listar_beneficiarios1()->result();
  		$data['pagadores']= $this->pagador_model->listar_pagadores1()->result();
		$data['title']="Nueva Contabilidad";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('contabilidad_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'fechacontabilidad' => $this->input->post('fechacontabilidad'),
		 	'valor' => $this->input->post('valor'),
		 	'detalle' => $this->input->post('detalle'),
			'idbeneficiario' => $this->input->post('idbeneficiario'),
			'idpagador' => $this->input->post('idpagador'),
	 	);
	 	$this->contabilidad_model->save($array_item);
	 //	redirect('contabilidad');
	//	redirect($_SERVER['HTTP_REFERER']);
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['contabilidad'] = $this->contabilidad_model->contabilidad($this->uri->segment(3))->row_array();
		$data['beneficiarios']= $this->beneficiario_model->listar_beneficiarios1()->result();
		$data['documentos']= $this->documento_model->lista_facturas(20)->result();
  		$data['pagadores']= $this->pagador_model->listar_pagadores1()->result();
 	 	$data['title'] = "Actualizar Contabilidad";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('contabilidad_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcontabilidad');
	 	$array_item=array(
		 	
		 	'idcontabilidad' => $this->input->post('idcontabilidad'),
			
		 	'fechacontabilidad' => $this->input->post('fechacontabilidad'),
		 	'valor' => $this->input->post('valor'),
		 	'detalle' => $this->input->post('detalle'),
			'idbeneficiario' => $this->input->post('idbeneficiario'),
			'idpagador' => $this->input->post('idpagador'),
			'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->contabilidad_model->update($id,$array_item);
	 	//redirect('contabilidad');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->contabilidad_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('contabilidad/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Contabilidads";
	$this->load->view('template/page_header');		
  $this->load->view('contabilidad_list',$data);
	$this->load->view('template/page_footer');
}



function contabilidad_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->contabilidad_model->lista_contabilidadsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcontabilidad,$r->elbeneficiario,$r->elpagador,$r->detalle,$r->fechacontabilidad,$r->valor,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('contabilidad/actual').'"  data-idcontabilidad="'.$r->idcontabilidad.'">Ver</a>');
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
	$data['contabilidad'] = $this->contabilidad_model->elprimero();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
  	$data['beneficiarios']= $this->beneficiario_model->lista_beneficiarios()->result();
  	$data['pagadores']= $this->pagador_model->lista_pagadores()->result();
    $data['title']="Contabilidad";
    $this->load->view('template/page_header');		
    $this->load->view('contabilidad_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['contabilidad'] = $this->contabilidad_model->elultimo();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
  	$data['beneficiarios']= $this->beneficiario_model->listar_beneficiarios1()->result();
  	$data['pagadores']= $this->pagador_model->listar_pagadores1()->result();
    $data['title']="Contabilidad";
  
    $this->load->view('template/page_header');		
    $this->load->view('contabilidad_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['contabilidad_list']=$this->contabilidad_model->lista_contabilidad()->result();
	$data['contabilidad'] = $this->contabilidad_model->siguiente($this->uri->segment(3))->row_array();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['beneficiarios']= $this->beneficiario_model->listar_beneficiarios1()->result();
  	$data['pagadores']= $this->pagador_model->listar_pagadores1()->result();
  $data['title']="Contabilidad";
	$this->load->view('template/page_header');		
  $this->load->view('contabilidad_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['contabilidad_list']=$this->contabilidad_model->lista_contabilidad()->result();
	$data['contabilidad'] = $this->contabilidad_model->anterior($this->uri->segment(3))->row_array();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	$data['beneficiarios']= $this->beneficiario_model->listar_beneficiarios1()->result();
  	$data['pagadores']= $this->pagador_model->listar_pagadores1()->result();
  	$data['title']="Contabilidad";
	$this->load->view('template/page_header');		
 	$this->load->view('contabilidad_record',$data);
	$this->load->view('template/page_footer');
}



    // API para guardar un nuevo registro
    public function api_save_contabilidad() {
        $this->output->set_content_type('application/json');
        $input = json_decode($this->input->raw_input_stream, true);

        if ($input) {
            $array_item = array(
                'fechacontabilidad' => $input['fechacontabilidad'],
                'valor' => $input['valor'],
                'detalle' => $input['detalle'],
                'idbeneficiario' => $input['idbeneficiario'],
                'idpagador' => $input['idpagador'],
                'iddocumento' => $input['iddocumento'] ?? null, // Asegúrate de que este campo exista y sea opcional
            );

            $result = $this->contabilidad_model->save($array_item);

            if ($result) {
                $this->output->set_output(json_encode(['status' => 'success', 'message' => 'Registro guardado exitosamente']));
            } else {
                $this->output->set_output(json_encode(['status' => 'error', 'message' => 'Error al guardar el registro']));
            }
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'Datos inválidos']));
        }
    }

    // API para actualizar un registro existente
    public function api_update_contabilidad() {
        $this->output->set_content_type('application/json');
        $input = json_decode($this->input->raw_input_stream, true);

        if ($input && isset($input['idcontabilidad'])) {
            $id = $input['idcontabilidad'];
            $array_item = array(
                'fechacontabilidad' => $input['fechacontabilidad'],
                'valor' => $input['valor'],
                'detalle' => $input['detalle'],
                'idbeneficiario' => $input['idbeneficiario'],
                'idpagador' => $input['idpagador'],
                'iddocumento' => $input['iddocumento'] ?? null,
            );

            $result = $this->contabilidad_model->update($id, $array_item);

            if ($result) {
                $this->output->set_output(json_encode(['status' => 'success', 'message' => 'Registro actualizado exitosamente']));
            } else {
                $this->output->set_output(json_encode(['status' => 'error', 'message' => 'Error al actualizar el registro']));
            }
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'Datos inválidos o ID no proporcionado']));
        }
    }

    // API para obtener un registro por ID
    public function api_get_contabilidad_by_id($id) {
        $this->output->set_content_type('application/json');
        $contabilidad = $this->contabilidad_model->contabilidad($id)->row_array();
        if ($contabilidad) {
            $this->output->set_output(json_encode(['status' => 'success', 'data' => $contabilidad]));
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'Registro no encontrado']));
        }
    }

    // API para obtener el último registro
    public function api_get_last_contabilidad() {
        $this->output->set_content_type('application/json');
        $contabilidad = $this->contabilidad_model->elultimo()->row_array();
        if ($contabilidad) {
            $this->output->set_output(json_encode(['status' => 'success', 'data' => $contabilidad]));
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'No hay registros de contabilidad']));
        }
    }

    // API para obtener el primer registro
    public function api_get_first_contabilidad() {
        $this->output->set_content_type('application/json');
        $contabilidad = $this->contabilidad_model->elprimero()->row_array();
        if ($contabilidad) {
            $this->output->set_output(json_encode(['status' => 'success', 'data' => $contabilidad]));
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'No hay registros de contabilidad']));
        }
    }

    // API para obtener el siguiente registro
    public function api_get_next_contabilidad($id) {
        $this->output->set_content_type('application/json');
        $contabilidad = $this->contabilidad_model->siguiente($id)->row_array();
        if ($contabilidad) {
            $this->output->set_output(json_encode(['status' => 'success', 'data' => $contabilidad]));
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'No hay siguiente registro']));
        }
    }

    // API para obtener el registro anterior
    public function api_get_previous_contabilidad($id) {
        $this->output->set_content_type('application/json');
        $contabilidad = $this->contabilidad_model->anterior($id)->row_array();
        if ($contabilidad) {
            $this->output->set_output(json_encode(['status' => 'success', 'data' => $contabilidad]));
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'No hay registro anterior']));
        }
    }

    // API para buscar registros por detalle
    public function api_search_contabilidad() {
        $this->output->set_content_type('application/json');
        $search_term = $this->input->get('query'); // Obtener el término de búsqueda de la query string

        if ($search_term) {
            // Asumiendo que tienes un método en tu modelo para buscar
            // Si no lo tienes, necesitarás crearlo. Por ejemplo:
            // public function search_contabilidad($query) { return $this->db->like('detalle', $query)->get('contabilidad'); }
            $results = $this->contabilidad_model->search_contabilidad($search_term)->result_array();
            if ($results) {
                $this->output->set_output(json_encode(['status' => 'success', 'data' => $results]));
            } else {
                $this->output->set_output(json_encode(['status' => 'error', 'message' => 'No se encontraron resultados']));
            }
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'Término de búsqueda no proporcionado']));
        }
    }


    // API para listar contabilidades con paginación
    public function api_list_contabilidades($limit = 10, $offset = 0) {
        $this->output->set_content_type('application/json');
        // Asumiendo que tienes un método en tu modelo para listar con límite y offset
        // public function get_paginated_contabilidades($limit, $offset) { return $this->db->limit($limit, $offset)->get('contabilidad'); }
        $contabilidades = $this->contabilidad_model->get_paginated_contabilidades($limit, $offset)->result_array();
        $total_records = $this->db->count_all('contabilidad'); // Obtener el total de registros

        if ($contabilidades) {
            $this->output->set_output(json_encode([
                'status' => 'success',
                'data' => $contabilidades,
                'total_records' => $total_records
            ]));
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'No hay registros de contabilidad en este rango']));
        }
    }

    // API para obtener todos los beneficiarios
    public function api_get_beneficiarios() {
        $this->output->set_content_type('application/json');
        $beneficiarios = $this->beneficiario_model->listar_beneficiarios1()->result_array();
        if ($beneficiarios) {
            $this->output->set_output(json_encode(['status' => 'success', 'data' => $beneficiarios]));
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'No hay beneficiarios']));
        }
    }

    // API para obtener todos los pagadores
    public function api_get_pagadores() {
        $this->output->set_content_type('application/json');
        $pagadores = $this->pagador_model->listar_pagadores1()->result_array();
        if ($pagadores) {
            $this->output->set_output(json_encode(['status' => 'success', 'data' => $pagadores]));
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'No hay pagadores']));
        }
    }

    // API para un reporte consolidado (ejemplo simple)
    public function api_get_consolidated_report() {
        $this->output->set_content_type('application/json');
        // Aquí deberías implementar la lógica para generar tu reporte consolidado.
        // Esto es solo un placeholder. Podrías sumar valores por mes, por beneficiario, etc.
        $total_valor = $this->db->select_sum('valor')->get('contabilidad')->row()->valor;

        if ($total_valor !== null) {
            $this->output->set_output(json_encode([
                'status' => 'success',
                'report' => [
                    'total_registros' => $this->db->count_all('contabilidad'),
                    'total_valor_consolidado' => $total_valor,
                    // Agrega más datos de reporte aquí
                ]
            ]));
        } else {
            $this->output->set_output(json_encode(['status' => 'error', 'message' => 'No se pudo generar el reporte consolidado']));
        }
    }











}
