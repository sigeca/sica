<?php
class Carrito extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('carrito_model');
        // Asumiendo que existe un modelo para la tabla usuario/persona
        $this->load->model('persona_model'); 
    }

    // ========================================================
    // Muestra el último registro del carrito al cargar el módulo
    // ========================================================
    public function index(){
        if(isset($this->session->userdata['logged_in'])){
            $data['carrito'] = $this->carrito_model->elultimo();
            // Asumiendo que esta es la función para listar usuarios
            $data['personas'] = $this->persona_model->lista_personas0()->result(); 
            $data['title'] = "Registro de Carrito";
            $this->load->view('page_header');
            $this->load->view('carrito_record', $data);
            $this->load->view('page_footer');
        } else {
            // Lógica para redirigir si no está logeado
            $this->load->view('page_header');
            $this->load->view('login_form');
            $this->load->view('page_footer');
        }
    }

    // Muestra el formulario para un nuevo carrito
    public function add()
    {
        $data['title'] = "Nuevo Carrito";
        $data['personas'] = $this->persona_model->lista_personas0()->result();
        $this->load->view('page_header');        
        $this->load->view('carrito_form', $data);
        $this->load->view('page_footer');
    }

    // Guarda el nuevo registro de carrito
    public function save()
    {
        $array_item = array(
            'idpersona' => $this->input->post('idpersona'),
            // 'fecha' se maneja automáticamente por la BD (TIMESTAMP DEFAULT CURRENT_TIMESTAMP)
        );
        $this->carrito_model->save($array_item);
        redirect('carrito');
    }

    // Muestra el formulario para editar un carrito
    public function edit()
    {
        $data['carrito'] = $this->carrito_model->carrito($this->uri->segment(3))->row_array();
        $data['personas'] = $this->persona_model->lista_personas0()->result();
        $data['title'] = "Actualizar Carrito";
        $this->load->view('page_header');        
        $this->load->view('carrito_edit', $data);
        $this->load->view('page_footer');
    }

    // Guarda la edición de un registro de carrito
    public function save_edit()
    {
        $id = $this->input->post('idcarrito');
        $array_item = array(
            'idpersona' => $this->input->post('idpersona'),
            // 'fecha' se mantiene (o se actualiza si fuera necesario)
        );
        $this->carrito_model->update($id, $array_item);
        redirect('carrito/actual/' . $id);
    }

    // Elimina un registro de carrito
    public function delete()
    {
        $this->carrito_model->delete($this->uri->segment(3));
        redirect('carrito/elultimo');
    }

    // Muestra el listado de carritos
    public function listar()
    {
        $data['carritos'] = $this->carrito_model->lista_carritos1()->result();
        $data['title'] = "Listado de Carritos";
        $this->load->view('page_header');        
        $this->load->view('carrito_list', $data);
        $this->load->view('page_footer');
    }

    // Método para la tabla de datos (DataTables)
    function carrito_data()
    {
        $data0 = $this->carrito_model->lista_carritos1();
        $data = array();
        foreach($data0->result() as $r){
            $data[] = array(
                $r->idcarrito, 
                $r->idpersona,
                $r->fecha,
                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('carrito/actual').'" data-idcarrito="'.$r->idcarrito.'">Ver</a>'
            );
        }    
        $output = array( 
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }


    // Muestra un registro de carrito específico
    public function actual()
    {
        $data['carrito'] = $this->carrito_model->carrito($this->uri->segment(3))->row_array();
        $data['personas'] = $this->persona_model->lista_personas0()->result();
        if(!empty($data['carrito']))
        {
            $data['title'] = "Carrito";
            $this->load->view('page_header');        
            $this->load->view('carrito_record', $data);
            $this->load->view('page_footer');
        } else {
            $this->load->view('page_header');        
            $this->load->view('registro_vacio');
            $this->load->view('page_footer');
        }
    }

    // Navegación: El primero
    public function elprimero()
    {
        $data['carrito'] = $this->carrito_model->elprimero();
        $data['personas'] = $this->persona_model->lista_personas0()->result();
        if(!empty($data['carrito']))
        {
            $data['title'] = "Carrito";
            $this->load->view('page_header');		
            $this->load->view('carrito_record',$data);
            $this->load->view('page_footer');
        } else {
            $this->load->view('page_header');		
            $this->load->view('registro_vacio');
            $this->load->view('page_footer');
        }
    }

    // Navegación: El último
    public function elultimo()
    {
        $data['carrito'] = $this->carrito_model->elultimo();
        $data['personas'] = $this->persona_model->lista_personas0()->result();
        if(!empty($data['carrito']))
        {
            $data['title'] = "Carrito";
            $this->load->view('page_header');		
            $this->load->view('carrito_record',$data);
            $this->load->view('page_footer');
        } else {
            $this->load->view('page_header');		
            $this->load->view('registro_vacio');
            $this->load->view('page_footer');
        }
    }

    // Navegación: Siguiente
    public function siguiente(){
        $data['carrito'] = $this->carrito_model->siguiente($this->uri->segment(3))->row_array();
        $data['personas'] = $this->persona_model->lista_personas0()->result();
        $data['title'] = "Carrito";
        $this->load->view('page_header');		
        $this->load->view('carrito_record',$data);
        $this->load->view('page_footer');
    }

    // Navegación: Anterior
    public function anterior(){
        $data['carrito'] = $this->carrito_model->anterior($this->uri->segment(3))->row_array();
        $data['personas'] = $this->persona_model->lista_personas0()->result();
        $data['title'] = "Carrito";
        $this->load->view('page_header');		
        $this->load->view('carrito_record',$data);
        $this->load->view('page_footer');
    }

	public function carrito1(){
        header('Content-Type: application/json');
		$id= $this->input->get("idcarrito");
    
        $productos = $this->carritoproducto_model->carritoproductos($id)->result();
 // Si no hay resultados, devolver un array vacío
        if (empty($productos)) {
            echo json_encode([]);
            return;
        }

        // Codificar los resultados a JSON y enviarlos a la salida
        echo json_encode($productos);


	}








}
?>
