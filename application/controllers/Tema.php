<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function Index($id = false) {
        if (!$id) {
            redirect(base_url(), 'refresh');
        }

        $this->load->model('Temas_model');

        $data['tema'] = $this->Temas_model->GetBy($id);

        if (!$data['tema']) {
            redirect(base_url(), 'refresh');
        }

        $this->load->model('Baralhos_model');

        $data['baralhos'] = $this->Baralhos_model->GetAllPublicBy($id);

        $data['temas'] = $this->Temas_model->GetAll();

        $this->load->view('tema', $data);
    }

}
