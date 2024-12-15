<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    // Obtener todos los artículos
    public function get_articles() {
        $query = $this->db->get('articles');
        return $query->result_array();
    }

    // Obtener un artículo por ID
    public function get_article($id) {
        $query = $this->db->get_where('articles', array('id' => $id));
        return $query->row_array();
    }

    // Crear un artículo
    public function create_article() {
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'created_at' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('articles', $data);
    }
}
