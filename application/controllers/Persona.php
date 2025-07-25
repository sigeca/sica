<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Persona
 * @property Persona_model $Persona_model
 * @property Tipopersona_model $Tipopersona_model
 * @property Sexo_model $Sexo_model
 * @property Correo_model $Correo_model
 * @property Telefono_model $Telefono_model
 * @property Direccion_model $Direccion_model
 * @property Nacionalidadpersona_model $Nacionalidadpersona_model
 * @property Paispersona_model $Paispersona_model
 * @property Provinciapersona_model $Provinciapersona_model
 * @property Estudio_model $Estudio_model
 * @property Documento_model $Documento_model
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 * @property CI_URI $uri
 */
class Persona extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models
        $this->load->model('persona_model');
        $this->load->model('tipopersona_model');
        $this->load->model('sexo_model');
        $this->load->model('correo_model');
        $this->load->model('telefono_model');
        $this->load->model('direccion_model');
        $this->load->model('nacionalidadpersona_model');
        $this->load->model('paispersona_model');
        $this->load->model('provinciapersona_model');
        $this->load->model('estudio_model'); // Assuming this model exists for studies
        $this->load->model('documento_model'); // Assuming this model exists for documents

        // Helper for form and URL
        $this->load->helper('form');
        $this->load->helper('url');
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

    /**
     * Loads the view for a specific person's record.
     *
     * @param int|null $idpersona The ID of the person to display.
     */
    public function index($idpersona = null) {
        $this->_check_access(); // Ensure user has access

        $data = [];
        $data['title'] = "Gestión de Personas";

        // Determine the person ID to display
        if ($idpersona === null) {
            // If no ID is provided, try to get the last one or redirect to list/add
            $last_person = $this->persona_model->elultimo();
            if ($last_person) {
                $idpersona = $last_person['idpersona'];
            } else {
                // If no persons exist, redirect to add new
                redirect('persona/add');
                return;
            }
        }

        $persona = $this->persona_model->elultimo();

        if (!$persona) {
            // Handle case where person is not found, maybe show an error or redirect
            log_message('error', 'Persona with ID ' . $idpersona . ' not found.');
            show_404(); // Or redirect to a list view with a message
            return;
        }

        $data['persona'] = $persona;
        $data['tipopersonas'] = $this->tipopersona_model->lista_tipopersonas()->result();
        $data['sexos'] = $this->sexo_model->lista_sexos()->result();
        $data['direccions'] = $this->direccion_model->direccionspersona($idpersona)->result();
        $data['correos'] = $this->correo_model->correospersona($idpersona)->result();
        $data['telefonos'] = $this->telefono_model->telefonospersona($idpersona)->result();
        $data['nacionalidadpersonas'] = $this->nacionalidadpersona_model->nacionalidadpersonaspersona($idpersona)->result();
        $data['paispersonas'] = $this->paispersona_model->paispersonaspersona($idpersona)->result();
        $data['provinciapersonas'] = $this->provinciapersona_model->provinciapersonaspersona($idpersona)->result();

        // Prepare data for dynamic links for emails and phones
        $arractu_correo = [];
        foreach ($data['correos'] as $correo) {
            $arractu_correo[$correo->idcorreo] = base_url('correo/actual/' . $correo->idcorreo);
        }
        $data['arractu'] = json_encode($arractu_correo);

        $arractu_telefono = [];
        foreach ($data['telefonos'] as $telefono) {
            $arractu_telefono[$telefono->idtelefono] = base_url('telefono/actual/' . $telefono->idtelefono);
        }
        $data['arractut'] = json_encode($arractu_telefono);

        // Load views
        $this->load->view('page_header', $data);
        $this->load->view('persona_record', $data);
        $this->load->view('page_footer', $data);
    }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){
	$data['persona']=$this->persona_model->persona($this->uri->segment(3))->row_array();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
	$data['direccions'] =$this->direccion_model->direccionspersona($data['persona']['idpersona'])->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
  	$data["sexos"]= $this->sexo_model->lista_sexos()->result();
  	$data["tipopersonas"]= $this->tipopersona_model->lista_tipopersonas()->result();
  	$data["paispersonas"]= $this->paispersona_model->lista_paispersonas1($data['persona']['idpersona'])->result();
  	$data["nacionalidadpersonas"]= $this->nacionalidadpersona_model->lista_nacionalidadpersonas1($data['persona']['idpersona'])->result();
  	$data["provinciapersonas"]= $this->provinciapersona_model->lista_provinciapersonas1($data['persona']['idpersona'])->result();
	$data['title']="Usted esta visualizando la persona No : ";
	$this->load->view('page_header');		
	$this->load->view('persona_record',$data);
	$this->load->view('page_footer');
   }else{
	$this->load->view('page_header.php');
	$this->load->view('login_form');
	$this->load->view('page_footer.php');
   }
}






    /**
     * Display the first person record.
     */
public function elprimero()
{

	$data['persona'] = $this->persona_model->elprimero();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
	$data['direccions'] =$this->direccion_model->direccionspersona($data['persona']['idpersona'])->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
  	$data["sexos"]= $this->sexo_model->lista_sexos()->result();
  	$data["tipopersonas"]= $this->tipopersona_model->lista_tipopersonas()->result();
  	$data["paispersonas"]= $this->paispersona_model->lista_paispersonas1($data['persona']['idpersona'])->result();
  	$data["nacionalidadpersonas"]= $this->nacionalidadpersona_model->lista_nacionalidadpersonas1($data['persona']['idpersona'])->result();
  	$data["provinciapersonas"]= $this->provinciapersona_model->lista_provinciapersonas1($data['persona']['idpersona'])->result();
  if(!empty($data))
  {
	$data['title']="Usted esta visualizando la persona No : ";
  
    $this->load->view('template/page_header');		
    $this->load->view('persona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }






/**
     * Display the next person record.
     *
     * @param int $idpersona The current person ID.
     */

public function siguiente(){
	$data['persona'] = $this->persona_model->siguiente($this->uri->segment(3))->row_array();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
	$data['direccions'] =$this->direccion_model->direccionspersona($data['persona']['idpersona'])->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
  	$data["sexos"]= $this->sexo_model->lista_sexos()->result();
  	$data["tipopersonas"]= $this->tipopersona_model->lista_tipopersonas()->result();
  	$data["paispersonas"]= $this->paispersona_model->lista_paispersonas1($data['persona']['idpersona'])->result();
  	$data["nacionalidadpersonas"]= $this->nacionalidadpersona_model->lista_nacionalidadpersonas1($data['persona']['idpersona'])->result();
  	$data["provinciapersonas"]= $this->provinciapersona_model->lista_provinciapersonas1($data['persona']['idpersona'])->result();
	$data['title']="Usted esta visualizando la persona No : ";
	$this->load->view('page_header');		
  	$this->load->view('persona_record',$data);
	$this->load->view('page_footer');
}





    /**
     * Display the previous person record.
     *
     * @param int $idpersona The current person ID.
     */

public function anterior(){
	$data['persona'] = $this->persona_model->anterior($this->uri->segment(3))->row_array();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
	$data['direccions'] =$this->direccion_model->direccionspersona($data['persona']['idpersona'])->result();
  	$data["sexos"]= $this->sexo_model->lista_sexos()->result();
  	$data["tipopersonas"]= $this->tipopersona_model->lista_tipopersonas()->result();
  	$data["paispersonas"]= $this->paispersona_model->lista_paispersonas1($data['persona']['idpersona'])->result();
  	$data["nacionalidadpersonas"]= $this->nacionalidadpersona_model->lista_nacionalidadpersonas1($data['persona']['idpersona'])->result();
  	$data["provinciapersonas"]= $this->provinciapersona_model->lista_provinciapersonas1($data['persona']['idpersona'])->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
	$data['title']="Usted esta visualizando la persona No : ";
	$this->load->view('page_header');		
  	$this->load->view('persona_record',$data);
	$this->load->view('page_footer');
}

    /**
     * Display the last person record.
     */

public function elultimo()
{

	$data['persona'] = $this->persona_model->elultimo();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
	$data['direccions'] =$this->direccion_model->direccionspersona($data['persona']['idpersona'])->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
  	$data["sexos"]= $this->sexo_model->lista_sexos()->result();
  	$data["tipopersonas"]= $this->tipopersona_model->lista_tipopersonas()->result();
  	$data["paispersonas"]= $this->paispersona_model->lista_paispersonas1($data['persona']['idpersona'])->result();
  	$data["nacionalidadpersonas"]= $this->nacionalidadpersona_model->lista_nacionalidadpersonas1($data['persona']['idpersona'])->result();
  	$data["provinciapersonas"]= $this->provinciapersona_model->lista_provinciapersonas1($data['persona']['idpersona'])->result();
  if(!empty($data))
  {
	$data['title']="Usted esta visualizando la persona No : ";
  
    $this->load->view('template/page_header');		
    $this->load->view('persona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }






    /**
     * Add a new person record.
     */
    public function add() {
        $this->_check_access();
        $data['title'] = "Nueva Persona";
        $data['tipopersonas'] = $this->tipopersona_model->lista_tipopersonas()->result();
        $data['sexos'] = $this->sexo_model->lista_sexos()->result();

        // Validation rules for adding a new person
        $this->form_validation->set_rules('cedula', 'Cédula', 'required|is_unique[persona.cedula]|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|max_length[100]');
        $this->form_validation->set_rules('nombres', 'Nombres', 'required|max_length[100]');
        $this->form_validation->set_rules('fechanacimiento', 'Fecha de Nacimiento', 'required|callback_valid_date');
        $this->form_validation->set_rules('idsexo', 'Sexo', 'required|numeric');
        $this->form_validation->set_rules('idtipopersona', 'Tipo de Persona', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            // Validation failed or first load, show the form
            $this->load->view('page_header', $data);
            $this->load->view('persona_form', $data); // Assuming you have a persona_form.php for adding/editing
            $this->load->view('page_footer', $data);
        } else {
            // Validation passed, save the data
            $new_persona_data = [
                'idtipopersona' => $this->input->post('idtipopersona'),
                'cedula' => $this->input->post('cedula'),
                'apellidos' => $this->input->post('apellidos'),
                'nombres' => $this->input->post('nombres'),
                'fechanacimiento' => $this->input->post('fechanacimiento'),
                'idsexo' => $this->input->post('idsexo'),
                'descripcion' => $this->input->post('descripcion'),
                // 'foto' field is handled in save_add or a separate upload logic
                'creacion' => date('Y-m-d H:i:s'), // Automatically set creation date
                'eliminado' => 0 // Default to not eliminated
            ];

            $inserted_id = $this->persona_model->add_persona($new_persona_data);

            if ($inserted_id) {
                $this->session->set_flashdata('success', 'Persona creada exitosamente.');
                redirect('persona/index/' . $inserted_id);
            } else {
                $this->session->set_flashdata('error', 'Error al crear la persona. Inténtelo de nuevo.');
                redirect('persona/add');
            }
        }
    }

    /**
     * Custom validation callback for date format.
     *
     * @param string $date The date string to validate.
     * @return bool True if valid, false otherwise.
     */
    public function valid_date($date) {
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
            $this->form_validation->set_message('valid_date', 'El campo {field} debe tener el formato YYYY-MM-DD.');
            return FALSE;
        }
        return TRUE;
    }



	public function  save()
	{

   			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];

	 	$array_item=array(
		 	
		 	'idpersona' => $this->input->post('idpersona'),
      			'cedula' => $this->input->post('cedula'),
		 	'nombres' => $this->input->post('nombres'),
			'apellidos' => $this->input->post('apellidos'),
			'fechanacimiento' => $this->input->post('fechanacimiento'),
			'descripcion' => $this->input->post('descripcion'),
			'idsexo' => $this->input->post('idsexo'),
			'idtipopersona' => $this->input->post('idtipopersona'),
			'foto' => $this->input->post('foto'),
	                'idusuario'=>$idusuario,
			'fechacreacion'=>$fecha,
			'horacreacion'=>$hora
		);
	
		$array_correo=array(
			'idpersona'=>0,
			'nombre'=>$this->input->post('correo'),
			'idcorreo_estado'=>1,
	                'idusuario'=>$this->session->userdata['logged_in']['idusuario'],
			'fechacreacion'=>$fecha,
			'horacreacion'=>$hora
		);
			
		$array_telefono=array(
			'idpersona'=>0,
			'numero'=>$this->input->post('telefono'),
			'idoperadora'=>1,
			'idtelefono_estado'=>1,
	                'idusuario'=>$this->session->userdata['logged_in']['idusuario'],
			'fechacreacion'=>$fecha,
			'horacreacion'=>$hora
		);
		$result=$this->persona_model->save($array_item,$array_correo,$array_telefono);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Persona ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






















    /**
     * Edit an existing person record.
     *
     * @param int $idpersona The ID of the person to edit.
     */

	public function edit()
	{
		$data["persona"] = $this->persona_model->persona($this->uri->segment(3))->row_array();
		$data["sexos"]= $this->sexo_model->lista_sexos()->result();
		$data["tipopersonas"]= $this->tipopersona_model->lista_tipopersonas()->result();
  		$data["paispersonas"]= $this->paispersona_model->lista_paispersonas1($data['persona']['idpersona'])->result();
  	$data["nacionalidadpersonas"]= $this->nacionalidadpersona_model->lista_nacionalidadpersonas1($data['persona']['idpersona'])->result();
  	$data["provinciapersonas"]= $this->provinciapersona_model->lista_provinciapersonas1($data['persona']['idpersona'])->result();
		$data["title"] = "Actualizar Persona";
		$this->load->view('template/page_header');		
		$this->load->view('persona_edit',$data);
		$this->load->view('template/page_footer');
	}







    /**
     * Custom validation callback to check if cedula is unique, allowing current record's cedula.
     *
     * @param string $cedula The cedula to check.
     * @param int $idpersona The ID of the current person being edited.
     * @return bool True if unique or belongs to current person, false otherwise.
     */
    public function check_cedula_unique($cedula, $idpersona) {
        $this->db->where('cedula', $cedula);
        $this->db->where('idpersona !=', $idpersona);
        $query = $this->db->get('persona');
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('check_cedula_unique', 'La cédula {field} ya está registrada para otra persona.');
            return FALSE;
        }
        return TRUE;
    }


    /**
     * Saves the edited person data. (This method is often redundant if `edit` handles save logic)
     * It's good practice to merge `save_edit` into `edit` method for a single entry point.
     * I'll keep it for now as it was in the original context, assuming it's called via form action.
     * However, the recommended approach is to let the `edit($idpersona)` method handle both displaying the form
     * and processing the submission based on `form_validation->run()`.
     */

	public function  save_edit()
	{
		$id=$this->input->post('idpersona');
	 	$array_item=array(
		 	
		 	'idpersona' => $this->input->post('idpersona'),
		 	'cedula' => $this->input->post('cedula'),
     'nombres' => $this->input->post('nombres'),
		 	'apellidos' => $this->input->post('apellidos'),
			'fechanacimiento' => $this->input->post('fechanacimiento'),
			'idsexo' => $this->input->post('idsexo'),
			'idtipopersona' => $this->input->post('idtipopersona'),
			'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->persona_model->update($id,$array_item);
	 	redirect('persona/actual/'.$id);
 	}




    /**
     * Soft deletes a person record.
     *
     * @param int $idpersona The ID of the person to remove.
     */
    public function quitar($idpersona) {
        $this->_check_access();
        if ($this->persona_model->quitar_persona($idpersona)) {
            $this->session->set_flashdata('success', 'Persona marcada como eliminada exitosamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al marcar la persona como eliminada.');
        }
        redirect('persona/index/' . $idpersona);
    }

    /**
     * Lists all person records.
     */
    public function listar() {
        $this->_check_access();
        $data['title'] = "Lista de Personas";
        $this->load->view('page_header', $data);
        $this->load->view('persona_list', $data); // Assuming a persona_list.php view
        $this->load->view('page_footer', $data);
    }


   public function persona_flutter()
    {
		$idpersona=$this->input->post('idpersona');
	 	$personas=$this->persona_model->get_persona_flutter($idpersona);
        echo json_encode(['data' => $personas]); // Devolver datos en formato JSON
 	}









    /**
     * Retrieves person data for DataTables (AJAX endpoint).
     * This method is called via AJAX from the `persona_list.php` view.
     */
 public function persona_dataix()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->persona_model->lista_personas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpersona,$r->cedula,$r->apellidos,$r->nombres,$r->fechanacimiento,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('persona/actual').'"    data-idpersona="'.$r->idpersona.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}



function persona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->persona_model->lista_personas0();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpersona,$r->cedula,$r->apellidos,$r->nombres,$r->fechanacimiento,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('persona/actual').'"    data-idpersona="'.$r->idpersona.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}








    /**
     * Retrieves document data for a specific person (AJAX endpoint).
     *
     * @param int $idpersona The ID of the person.
     */
    public function documento_data() {
        $this->_check_access();
        $idpersona = $this->input->get('idpersona');
        if ($idpersona) {
            //$data = $this->documento_model->ldocumentos_by_persona($idpersona);
            $data = $this->documento_model->lista_documentosC($idpersona);
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

    /**
     * Retrieves received document data for a specific person (AJAX endpoint).
     * This might be a join operation or a different table.
     *
     * @param int $idpersona The ID of the person.
     */
    public function documento_recibido() {
        $this->_check_access();
        $idpersona = $this->input->get('idpersona');
        if ($idpersona) {
            // Assuming a method in Documento_model or a new model for received documents
            $data = $this->documento_model->lista_documentosreci($idpersona);

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

    /**
     * Retrieves study data for a specific person (AJAX endpoint).
     *
     * @param int $idpersona The ID of the person.
     */
    public function estudio_data() {
        $this->_check_access();
        $idpersona = $this->input->get('idpersona');
        if ($idpersona) {
            $data = $this->Estudio_model->estudios_by_persona($idpersona);
            echo json_encode(['data' => $data]);
        } else {
            echo json_encode(['data' => []]);
        }
    }

    // New method for handling relationships, if needed
    public function relacion($idpersona) {
        $this->_check_access();
        $data['title'] = "Relaciones de Persona";
        $data['persona'] = $this->persona_model->persona($idpersona);

        if (!$data['persona']) {
            show_404();
            return;
        }

        // Load any relationship data here, e.g., family members, academic relations, etc.
        // $data['relationships'] = $this->Relationship_model->get_relationships($idpersona);

        $this->load->view('page_header', $data);
        $this->load->view('persona_relationships', $data); // A new view for relationships
        $this->load->view('page_footer', $data);
    }
}
