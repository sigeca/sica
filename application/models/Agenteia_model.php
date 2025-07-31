<?php
class Agenteia_model extends CI_Model {

    public function get_reglamentos() {
        // Query the 'articuloreglamento1' view to get unique regulations.
        $this->db->select('idreglamento, elreglamento as nombre');
        $this->db->group_by('idreglamento, elreglamento');
        return $this->db->get('articuloreglamento1')->result();
    }

    public function get_contenido_articulo($idreglamento, $numero) {
        // Query the 'articuloreglamento1' view to find the article content.
        $this->db->where('idreglamento', $idreglamento);
        $this->db->where('numero', $numero);
        $query = $this->db->get('articuloreglamento1');
        $row = $query->row();
        return $row ? $row->contenido : "Artículo no encontrado.";
    }
}
?>
