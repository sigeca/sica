<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulovendido_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }



// Función para guardar una orden pendiente
public function guardar_orden_pendiente($order_id, $cart_items, $total) {
    // Guardar la orden principal en una nueva tabla (ej. 'ordenes_deuna')
    // Con estado 'pendiente', y el order_id de Deuna
    $orden_data = [
        'order_deuna_id' => $order_id,
        'total' => $total,
        'estado' => 'Pendiente',
        'fecha' => date('Y-m-d')
    ];
    $this->db->insert('ordenes_deuna', $orden_data);
    $id_orden_local = $this->db->insert_id();

    // Guardar cada artículo vendido asociado a esta orden
    foreach ($cart_items as $item) {
        $articulo_data = [
            'id_orden' => $id_orden_local,
            'idarticulo' => $item['id'],
            'cantidad' => $item['quantity'],
            'precio' => $item['price'],
            'fechavendido' => date('Y-m-d')
        ];
        $this->db->insert('articulovendido', $articulo_data);
    }
}

// Función para actualizar el estado de la orden
public function actualizar_estado_orden($order_id, $new_status) {
    $this->db->where('order_deuna_id', $order_id);
    return $this->db->update('ordenes_deuna', ['estado' => $new_status]);
}






//    public function guardar_articulo_vendido($data) {
        // The idarticulovendido column is likely an auto-incrementing primary key,
        // so we don't need to provide it in the data array.
  //      return $this->db->insert('articulovendido', $data);
   // }
}
