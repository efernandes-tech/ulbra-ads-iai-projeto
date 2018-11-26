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
        // $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|trim');
        // $this->form_validation->set_rules('usuario_id', 'Usuario', 'required');
        // $this->form_validation->set_rules('tema_id', 'Tema', 'required');
        // $this->form_validation->set_rules('descricao', 'Descrição', 'required|min_length[3]|trim');
        // $this->form_validation->set_rules('revisao_facil', 'Dias Revisao - Facil', 'required|min_length[1]|trim');
        // $this->form_validation->set_rules('revisao_bom', 'Dias Revisao - Bom', 'required|min_length[1]|trim');
        // $this->form_validation->set_rules('revisao_dificil', 'Dias Revisao - Dificil', 'required|min_length[1]|trim');
        // if ($this->form_validation->run() == FALSE) {
        //     $data['error'] = validation_errors();
        // } else {
        //     $dataRegister = $this->input->post();
        //     $id = $dataRegister['id'];
        //     if ($id) {
        //         // Editar.
        //         unset($dataRegister['id']);
        //         $dataRegister['updated'] = date('Y-m-d H:i:s');
        //         $res = $this->Baralhos_model->Update($dataRegister, $id);
        //     } else {
        //         // Cadastrar.
        //         $dataRegister['created'] = date('Y-m-d H:i:s');
        //         $res = $this->Baralhos_model->Insert($dataRegister);
        //     }
        //     if ($res) {
        //         $data['error'] = null;
        //     } else {
        //         $data['error'] = "Não foi possível cadastrar o baralho.";
        //     }
        // }

        // if ($data['error']) {
        //     $this->load->model('Temas_model');

        //     $data['temas'] = $this->Temas_model->GetAll();

        //     $data['title'] = 'Cadastrar';

        //     $data['baralho'] = (object) $this->input->post();

        //     $this->load->view('baralho', $data);
        // } else {
        //     redirect(base_url('meus-baralhos'),'refresh');
        // }
    }

    public function Deletar($id = false) {
        // if (!$id) {
        //     redirect(base_url(), 'refresh');
        // }
        // $this->load->model('Baralhos_model');

        // $this->Baralhos_model->Delete($id);

        // redirect(base_url('meus-baralhos'),'refresh');
    }
}
