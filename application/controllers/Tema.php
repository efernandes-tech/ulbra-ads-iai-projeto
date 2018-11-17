<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function Index($id = false) {
        $this->load->model('Temas_model');

        $data['temas'] = $this->Temas_model->GetAll();

        if ($id) {
            $this->load->model('Baralhos_model');

            $data['baralhos'] = $this->Baralhos_model->GetAllPublicBy($id);
        }

        $data['id'] = $id;

        $this->load->view('tema', $data);
    }

}
