<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulovendido extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('articulovendido_model'); // Load the model
        $this->load->helper('date');
    }

    public function guardar() {
        // Set the response header to be JSON
        header('Content-Type: application/json');

        // Get the POST data from the request body
        $input = json_decode($this->input->raw_input_stream, true);
        $cart = $input['cart'];

        if (empty($cart)) {
            echo json_encode(['success' => false, 'message' => 'El carrito está vacío.']);
            return;
        }

        $all_saved = true;
        foreach ($cart as $item) {
            $data = [
                'idarticulo'    => $item['id'],
                'cantidad'      => $item['quantity'],
                'precio'        => $item['price'],
                'fechavendido'  => date('Y-m-d')
            ];

            // Use the model to save the data
            if (!$this->Articulovendido_model->guardar_articulo_vendido($data)) {
                $all_saved = false;
                break; // Stop if any save fails
            }
        }

        if ($all_saved) {
            echo json_encode(['success' => true, 'message' => 'Venta registrada exitosamente.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Ocurrió un error al guardar uno o más artículos.']);
        }
    }
}
