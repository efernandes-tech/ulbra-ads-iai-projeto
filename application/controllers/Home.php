<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function Index() {
        $this->load->model('Temas_model');
        $this->load->model('Baralhos_model');

        $data['temas'] = $this->Temas_model->GetAll();
        $data['baralhos'] = $this->Baralhos_model->GetAllPublicTop3();

        $this->load->view('home', $data);
    }

}
