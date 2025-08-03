<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulovendido_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function guardar_articulo_vendido($data) {
        // The idarticulovendido column is likely an auto-incrementing primary key,
        // so we don't need to provide it in the data array.
        return $this->db->insert('articulovendido', $data);
    }
}
