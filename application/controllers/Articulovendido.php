<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulovendido extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('articulovendido_model'); // Load the model
        $this->load->helper('date');
    }


// En application/controllers/Articulovendido.php

public function guardar() {
    header('Content-Type: application/json');
    $input = json_decode($this->input->raw_input_stream, true);
    $cart = $input['cart'];

    if (empty($cart)) {
        echo json_encode(['success' => false, 'message' => 'El carrito está vacío.']);
        return;
    }

    // Calcular el total
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // TODO: Generar un ID de orden único para esta transacción
    $order_id = uniqid('order_');

    // Aquí es donde te conectarías con la API de Deuna
    // NOTA: Esto es un pseudo-código. Necesitas la URL real y la estructura de la API de Deuna.
    $deuna_api_url = 'https://api.deuna.app/v2/payments'; // Ejemplo de URL
    $api_key = 'TU_API_KEY';
    $secret_key = 'TU_CLAVE_SECRETA';

    $payment_data = [
        'amount' => $total,
        'currency' => 'USD', // O la moneda correspondiente
        'order_id' => $order_id,
        'description' => 'Compra en tienda online',
        'callback_url' => base_url('Articulovendido/deuna_webhook'), // URL para recibir notificaciones
    ];

    try {
        // Simular la llamada a la API de Deuna (tendrías que usar una librería real)
        // $client = new GuzzleHttp\Client();
        // $response = $client->post($deuna_api_url, [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . $api_key,
        //         'Content-Type' => 'application/json',
        //     ],
        //     'json' => $payment_data,
        // ]);

        // $deuna_response = json_decode($response->getBody(), true);
        
        // Simulación de una respuesta exitosa
        $deuna_response = [
            'success' => true,
            'payment_url' => 'https://deuna.app/payment/' . $order_id,
            'qr_code' => 'data:image/png;base64,...', // Un QR en base64
        ];

        if (isset($deuna_response['success']) && $deuna_response['success']) {
            // Guardar la orden en tu base de datos con estado "Pendiente"
            // Esto es crucial para poder actualizarla después
            $this->articulovendido_model->guardar_orden_pendiente($order_id, $cart, $total);

            // Devolver la URL de pago o el QR al frontend
            echo json_encode([
                'success' => true,
                'payment_url' => $deuna_response['payment_url'],
                'qr_code' => $deuna_response['qr_code'],
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al crear la orden de pago con Deuna.']);
        }

    } catch (Exception $e) {
        // Manejar errores de conexión o de la API
        echo json_encode(['success' => false, 'message' => 'Error de conexión con el servicio de pago: ' . $e->getMessage()]);
    }
}









/*
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
                'fechaventa'  => date('Y-m-d')
            ];

            // Use the model to save the data
            if (!$this->articulovendido_model->guardar_articulo_vendido($data)) {
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

 */

public function deuna_webhook() {
    // Recibir la notificación de Deuna
    $deuna_notification = json_decode($this->input->raw_input_stream, true);

    // TODO: Validar la notificación para asegurarte de que proviene de Deuna
    // Esto suele hacerse verificando una firma o hash en los headers.
    
    // Obtener los datos de la transacción
    $transaction_id = $deuna_notification['transaction']['id'];
    $order_id = $deuna_notification['order']['id'];
    $status = $deuna_notification['transaction']['status'];

    if ($status === 'paid' || $status === 'completed') {
        // La transacción fue exitosa. Actualizar la orden en la base de datos
        $this->articulovendido_model->actualizar_estado_orden($order_id, 'Completado');
        
        // Aquí podrías enviar un email de confirmación, etc.
        
        // Responder con un 200 OK para que Deuna sepa que recibiste la notificación
        http_response_code(200);
        echo json_encode(['status' => 'success']);
    } else {
        // La transacción falló o fue cancelada
        $this->articulovendido_model->actualizar_estado_orden($order_id, 'Fallido');
        http_response_code(200);
        echo json_encode(['status' => 'failure']);
    }
}






}
