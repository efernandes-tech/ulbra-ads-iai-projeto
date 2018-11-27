<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carta extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->model('Cartas_model');

        $this->load->library('form_validation');
    }

    public function Index($baralho_id = false) {
        if (!$baralho_id) {
            redirect(base_url('meus-baralhos'),'refresh');
        }

        $data['baralho_id'] = $baralho_id;

        $data['cartas'] = $this->Cartas_model->GetAllBy($baralho_id);

        $this->load->view('cartas', $data);
    }

    public function Ver($baralho_id = false, $id = false) {
        if (!$baralho_id) {
            redirect(base_url('meus-baralhos'),'refresh');
        }

        if ($id) {
            $data['title'] = 'Editar';

            $data['carta'] = $this->Cartas_model->GetBy($id);
        } else {
            $data['title'] = 'Cadastrar';

            $data['carta'] = (object) array(
                'id' => null,
                'baralho_id' => $baralho_id,
                'frente' => '',
                'verso' => ''
            );
        }

        $data['error'] = null;

        $this->load->view('carta', $data);
    }

    public function Salvar() {
        $this->form_validation->set_rules('frente', 'Frente', 'required|trim');
        $this->form_validation->set_rules('verso', 'Verso', 'required|trim');
        $this->form_validation->set_rules('baralho_id', 'Baralho', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            $dataRegister = $this->input->post();
            $id = $dataRegister['id'];
            if ($id) {
                // Editar.
                unset($dataRegister['id']);
                $dataRegister['updated'] = date('Y-m-d H:i:s');
                $res = $this->Cartas_model->Update($dataRegister, $id);
            } else {
                // Cadastrar.
                $dataRegister['created'] = date('Y-m-d H:i:s');
                $res = $this->Cartas_model->Insert($dataRegister);
            }
            if ($res) {
                $data['error'] = null;
            } else {
                $data['error'] = "Não foi possível cadastrar a carta.";
            }
        }

        if ($data['error']) {
            $data['title'] = 'Cadastrar';

            $data['carta'] = (object) $this->input->post();

            $this->load->view('carta', $data);
        } else {
            redirect(base_url('cartas/baralho/'.$dataRegister['baralho_id']),'refresh');
        }
    }

    public function Deletar($id = false) {
        if (!$id) {
            redirect(base_url(), 'refresh');
        }
        $this->Cartas_model->Delete($id);

        redirect(base_url('cartas/baralho/'.$this->input->post('baralho_id')),'refresh');
    }
}
