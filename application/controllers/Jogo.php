<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jogo extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function Index($id = false) {
        if (!$id) {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('Baralhos_model');

        $data['baralho'] = $this->Baralhos_model->GetBy($id);

        $this->load->view('jogo', $data);
    }

    public function Jogar($id = false) {
        if (!$id) {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('Baralhos_model');
        $this->load->model('Cartas_model');

        $data['baralho'] = $this->Baralhos_model->GetBy($id);
        $data['cartas'] = $this->Cartas_model->GetAllBy($id);

        $this->load->view('jogar', $data);
    }

}
