<?php
class IaPrompt_model extends CI_Model {

    public function get_reglamentos() {
        return $this->db->get('reglamento')->result();
    }

    public function get_contenido_articulo($idreglamento, $numeroarticulo) {
        $this->db->where('idreglamento', $idreglamento);
        $this->db->where('numeroarticulo', $numeroarticulo);
        $query = $this->db->get('articuloreglamento');
        $row = $query->row();
        return $row ? $row->contenido : "Artículo no encontrado.";
    }
}

