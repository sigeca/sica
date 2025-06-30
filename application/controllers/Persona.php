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
        $this->load->model('Persona_model');
        $this->load->model('Tipopersona_model');
        $this->load->model('Sexo_model');
        $this->load->model('Correo_model');
        $this->load->model('Telefono_model');
        $this->load->model('Direccion_model');
        $this->load->model('Nacionalidadpersona_model');
        $this->load->model('Paispersona_model');
        $this->load->model('Provinciapersona_model');
        $this->load->model('Estudio_model'); // Assuming this model exists for studies
        $this->load->model('Documento_model'); // Assuming this model exists for documents

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
            $last_person = $this->Persona_model->lastPersona();
            if ($last_person) {
                $idpersona = $last_person['idpersona'];
            } else {
                // If no persons exist, redirect to add new
                redirect('persona/add');
                return;
            }
        }

        $persona = $this->Persona_model->persona($idpersona);

        if (!$persona) {
            // Handle case where person is not found, maybe show an error or redirect
            log_message('error', 'Persona with ID ' . $idpersona . ' not found.');
            show_404(); // Or redirect to a list view with a message
            return;
        }

        $data['persona'] = $persona;
        $data['tipopersonas'] = $this->Tipopersona_model->lista_tipopersonas()->result();
        $data['sexos'] = $this->Sexo_model->lista_sexos()->result();
        $data['direccions'] = $this->Direccion_model->direccions_persona($idpersona)->result();
        $data['correos'] = $this->Correo_model->correos_persona($idpersona)->result();
        $data['telefonos'] = $this->Telefono_model->telefonos_persona($idpersona)->result();
        $data['nacionalidadpersonas'] = $this->Nacionalidadpersona_model->nacionalidadpersonas_persona($idpersona)->result();
        $data['paispersonas'] = $this->Paispersona_model->paispersonas_persona($idpersona)->result();
        $data['provinciapersonas'] = $this->Provinciapersona_model->provinciapersonas_persona($idpersona)->result();

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

    /**
     * Display the first person record.
     */
    public function elprimero() {
        $this->_check_access();
        $persona = $this->Persona_model->elprimero();
        if ($persona) {
            redirect('persona/index/' . $persona['idpersona']);
        } else {
            // No persons found, redirect to add
            redirect('persona/add');
        }
    }

    /**
     * Display the next person record.
     *
     * @param int $idpersona The current person ID.
     */
    public function siguiente($idpersona) {
        $this->_check_access();
        $persona = $this->Persona_model->siguiente($idpersona);
        if ($persona) {
            redirect('persona/index/' . $persona['idpersona']);
        } else {
            // Reached the last record, stay on current or go to first
            redirect('persona/index/' . $idpersona);
        }
    }

    /**
     * Display the previous person record.
     *
     * @param int $idpersona The current person ID.
     */
    public function anterior($idpersona) {
        $this->_check_access();
        $persona = $this->Persona_model->anterior($idpersona);
        if ($persona) {
            redirect('persona/index/' . $persona['idpersona']);
        } else {
            // Reached the first record, stay on current or go to last
            redirect('persona/index/' . $idpersona);
        }
    }

    /**
     * Display the last person record.
     */
    public function elultimo() {
        $this->_check_access();
        $persona = $this->Persona_model->elultimo();
        if ($persona) {
            redirect('persona/index/' . $persona['idpersona']);
        } else {
            // No persons found, redirect to add
            redirect('persona/add');
        }
    }

    /**
     * Add a new person record.
     */
    public function add() {
        $this->_check_access();
        $data['title'] = "Nueva Persona";
        $data['tipopersonas'] = $this->Tipopersona_model->lista_tipopersonas()->result();
        $data['sexos'] = $this->Sexo_model->lista_sexos()->result();

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

            $inserted_id = $this->Persona_model->add_persona($new_persona_data);

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

    /**
     * Edit an existing person record.
     *
     * @param int $idpersona The ID of the person to edit.
     */
    public function edit($idpersona) {
        $this->_check_access();
        $data['title'] = "Editar Persona";
        $data['persona'] = $this->Persona_model->persona($idpersona);

        if (!$data['persona']) {
            show_404();
            return;
        }

        $data['tipopersonas'] = $this->Tipopersona_model->lista_tipopersonas()->result();
        $data['sexos'] = $this->Sexo_model->lista_sexos()->result();

        // Validation rules for editing
        // 'cedula' rule should allow current unique value, or be unique for other records
        $this->form_validation->set_rules('cedula', 'Cédula', 'required|min_length[10]|max_length[10]|callback_check_cedula_unique[' . $idpersona . ']');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|max_length[100]');
        $this->form_validation->set_rules('nombres', 'Nombres', 'required|max_length[100]');
        $this->form_validation->set_rules('fechanacimiento', 'Fecha de Nacimiento', 'required|callback_valid_date');
        $this->form_validation->set_rules('idsexo', 'Sexo', 'required|numeric');
        $this->form_validation->set_rules('idtipopersona', 'Tipo de Persona', 'required|numeric');
        $this->form_validation->set_rules('foto', 'Foto', 'trim|max_length[255]'); // Add validation for photo filename

        if ($this->form_validation->run() === FALSE) {
            // Validation failed or first load, show the form
            $this->load->view('page_header', $data);
            $this->load->view('persona_edit_form', $data); // Assuming a dedicated edit form or same form with different data
            $this->load->view('page_footer', $data);
        } else {
            // Validation passed, save the data
            $updated_persona_data = [
                'idtipopersona' => $this->input->post('idtipopersona'),
                'cedula' => $this->input->post('cedula'),
                'apellidos' => $this->input->post('apellidos'),
                'nombres' => $this->input->post('nombres'),
                'fechanacimiento' => $this->input->post('fechanacimiento'),
                'idsexo' => $this->input->post('idsexo'),
                'descripcion' => $this->input->post('descripcion'),
                'foto' => $this->input->post('foto'), // If photo filename is editable through form
                'actualizacion' => date('Y-m-d H:i:s')
            ];

            $this->Persona_model->update_persona($idpersona, $updated_persona_data);
            $this->session->set_flashdata('success', 'Persona actualizada exitosamente.');
            redirect('persona/index/' . $idpersona);
        }
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
    public function save_edit() {
        $this->_check_access();
        $idpersona = $this->input->post('idpersona');

        if (!$idpersona) {
            $this->session->set_flashdata('error', 'ID de persona no proporcionado para la edición.');
            redirect('persona/listar'); // Or redirect to an error page
        }

        // The validation and update logic should ideally be in the `edit` method.
        // For now, mirroring the simplified save logic if this is a direct POST target.
        // It's better to refactor `edit` to handle this.
        $updated_persona_data = [
            'idtipopersona' => $this->input->post('idtipopersona'),
            'cedula' => $this->input->post('cedula'),
            'apellidos' => $this->input->post('apellidos'),
            'nombres' => $this->input->post('nombres'),
            'fechanacimiento' => $this->input->post('fechanacimiento'),
            'idsexo' => $this->input->post('idsexo'),
            'descripcion' => $this->input->post('descripcion'),
            'foto' => $this->input->post('foto'),
            'actualizacion' => date('Y-m-d H:i:s')
        ];

        if ($this->Persona_model->update_persona($idpersona, $updated_persona_data)) {
            $this->session->set_flashdata('success', 'Persona actualizada exitosamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al actualizar la persona.');
        }
        redirect('persona/index/' . $idpersona);
    }


    /**
     * Soft deletes a person record.
     *
     * @param int $idpersona The ID of the person to remove.
     */
    public function quitar($idpersona) {
        $this->_check_access();
        if ($this->Persona_model->quitar_persona($idpersona)) {
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

    /**
     * Retrieves person data for DataTables (AJAX endpoint).
     * This method is called via AJAX from the `persona_list.php` view.
     */
    public function persona_data() {
        $this->_check_access(); // Ensure access for AJAX calls as well
        $data = $this->Persona_model->lista_personas(); // Assuming this returns data for DataTables
        echo json_encode($data);
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
            $data = $this->Documento_model->documentos_by_persona($idpersona);
            echo json_encode(['data' => $data]); // DataTables expects 'data' key
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
            $data = $this->Documento_model->documentos_recibidos_by_persona($idpersona);
            echo json_encode(['data' => $data]);
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
        $data['persona'] = $this->Persona_model->persona($idpersona);

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
