<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
    }

    // Listar artículos
    public function index() {
        $data['articles'] = $this->Blog_model->get_articles();
        $this->load->view('blog/index', $data);
    }

    // Ver un artículo
    public function view($id) {
        $data['article'] = $this->Blog_model->get_article($id);
        if (empty($data['article'])) {
            show_404();
        }
        $this->load->view('blog/view', $data);
    }

    // Crear artículo
    public function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('blog/form');
        } else {
            $this->Blog_model->create_article();
            redirect('blog');
        }
    }
}
