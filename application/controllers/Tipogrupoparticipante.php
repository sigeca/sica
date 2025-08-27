<?php

class Tipogrupoparticipante extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tipogrupoparticipante_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipogrupoparticipante'] = $this->tipogrupoparticipante_model->elultimo();
            $data['title'] = "Tipogrupoparticipante";
            $this->load->view('template/page_header');
            $this->load->view('tipogrupoparticipante_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo tipogrupoparticipante
    public function add() {
        $data['title'] = "Nuevo tipogrupoparticipante";
        $this->load->view('template/page_header');
        $this->load->view('tipogrupoparticipante_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo tipogrupoparticipante
    public function save() {
        $array_item = array(
            'idtipogrupoparticipante' => $this->input->post('idtipogrupoparticipante'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->tipogrupoparticipante_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Tipogrupoparticipante ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de tipogrupoparticipante
    public function edit() {
        $data['tipogrupoparticipante'] = $this->tipogrupoparticipante_model->tipogrupoparticipante($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar tipogrupoparticipante";
        $this->load->view('template/page_header');
        $this->load->view('tipogrupoparticipante_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de tipogrupoparticipante
    public function save_edit() {
        $id = $this->input->post('idtipogrupoparticipante');
        $array_item = array(
            'idtipogrupoparticipante' => $this->input->post('idtipogrupoparticipante'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->tipogrupoparticipante_model->update($id, $array_item);
        redirect('tipogrupoparticipante');
    }

    // Método para eliminar un tipogrupoparticipante
    public function delete() {
        $data = $this->tipogrupoparticipante_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('tipogrupoparticipante/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->tipogrupoparticipante_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El tipogrupoparticipante no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los tipogrupoparticipantes
    public function listar() {
        $data['tipogrupoparticipante_list'] = $this->tipogrupoparticipante_model->lista_tipogrupoparticipantesA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('tipogrupoparticipante_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de tipogrupoparticipante en formato JSON
    public function tipogrupoparticipante_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->tipogrupoparticipante_model->lista_tipogrupoparticipantesA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idtipogrupoparticipante, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tipogrupoparticipante/actual').'"   data-idtipogrupoparticipante="' . $r->idtipogrupoparticipante . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de tipogrupoparticipante
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipogrupoparticipante'] = $this->tipogrupoparticipante_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('tipogrupoparticipante_record', $data);
                $this->load->view('template/page_footer');
            } else {
                $this->load->view('template/page_header');
                $this->load->view('registro_vacio');
                $this->load->view('template/page_footer');
            }
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el último registro de tipogrupoparticipante
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipogrupoparticipante'] = $this->tipogrupoparticipante_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('tipogrupoparticipante_record', $data);
                $this->load->view('template/page_footer');
            } else {
                $this->load->view('template/page_header');
                $this->load->view('registro_vacio');
                $this->load->view('template/page_footer');
            }
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el siguiente registro de tipogrupoparticipante
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipogrupoparticipante'] = $this->tipogrupoparticipante_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('tipogrupoparticipante_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  tipogrupoparticipante
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['tipogrupoparticipante'] = $this->tipogrupoparticipante_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('tipogrupoparticipante_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_tipogrupoparticipante() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipogrupoparticipante')) {
        $this->db->select('*');
        $this->db->where(array('idtipogrupoparticipante' => $this->input->post('idtipogrupoparticipante')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
