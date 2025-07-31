<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenteia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Agenteia_model');
    }

    public function index() {
        $data['reglamentos'] = $this->Agenteia_model->get_reglamentos();
        $this->load->view('agenteia/index', $data);
    }

    public function generar_prompt() {
        $idreglamento = $this->input->post('idreglamento');
        $articulo = $this->input->post('numeroarticulo');
        $prompt_usuario = $this->input->post('prompt_usuario'); // Get user prompt
        $contenido = $this->Agenteia_model->get_contenido_articulo($idreglamento, $articulo);

        // Combine user prompt with article content
        $prompt_completo = $prompt_usuario . ": " . $contenido;
        $respuesta = $this->consultar_openai($prompt_completo);

        $data['respuesta'] = $respuesta;
        $this->load->view('agenteia/resultado', $data);
    }

    private function consultar_openai($prompt) {
        $apiKey = getenv('OPENAI_API_KEY');
        if (!$apiKey) {
            throw new Exception("La variable de entorno OPENAI_API_KEY no está definida.");
        }

        $postData = [
            "model" => "gpt-4o-mini",
            "messages" => [
                ["role" => "user", "content" => $prompt]
            ],
            "temperature" => 0.7
        ];

        $ch = curl_init('https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        return $data['choices'][0]['message']['content'] ?? "No se pudo generar respuesta.";
    }
}
?>
