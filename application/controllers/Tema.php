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

        $data['id'] = $id;

        $this->load->model('Temas_model');

        $data['temas'] = $this->Temas_model->GetAll();

        $this->load->model('Baralhos_model');

        $baralhos = $this->Baralhos_model->GetAllPublicBy($id);

        if ($baralhos) {
            $data['baralhos'] = $baralhos;
        } else {
            redirect(base_url(),'refresh');
        }

        $this->load->view('tema', $data);
    }

}
