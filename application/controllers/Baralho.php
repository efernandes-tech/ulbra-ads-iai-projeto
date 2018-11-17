<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baralho extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function Index($id = false) {
        if ($id) {
            $data['title'] = 'Editar';

            $this->load->model('Baralhos_model');

            $data['baralho'] = $this->Baralhos_model->GetBy($id);
        } else {
            $data['title'] = 'Cadastrar';

            $data['baralho'] = (object) array(
                'id' => null,
                'nome' => '',
            );
        }

        $this->load->view('baralho', $data);
    }

    public function Revisar($id = false) {
    	if (!$id) {
    		redirect(base_url(), 'refresh');
    	}
        $this->load->model('Baralhos_model');
        $this->load->model('Cartas_model');

        $data['baralho'] = $this->Baralhos_model->GetBy($id);
        $data['cartas'] = $this->Cartas_model->GetAllBy($id);

        $this->load->view('revisar', $data);
    }

    public function Salvar() {
        $data = $this->input->post();
        print_r($data);
        // die();
        redirect(base_url('meus-baralhos'),'refresh');
    }

}
