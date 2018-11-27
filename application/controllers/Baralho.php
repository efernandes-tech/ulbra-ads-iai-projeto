<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baralho extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->model('Baralhos_model');

        $this->load->library('form_validation');
    }

    public function Index($id = false) {
        if ($id) {
            $data['title'] = 'Editar';

            $data['baralho'] = $this->Baralhos_model->GetBy($id);
        } else {
            $data['title'] = 'Cadastrar';

            $data['baralho'] = (object) array(
                'id' => null,
                'usuario_id' => $this->session->userdata('id'),
                'nome' => '',
                'tema_id' => null,
                'descricao' => '',
                'publico' => 0,
                'revisao_facil' => 1,
                'revisao_bom' => 3,
                'revisao_dificil' => 7,
            );
        }

        $this->load->model('Temas_model');

        $data['temas'] = $this->Temas_model->GetAll();

        $data['error'] = null;

        $this->load->view('baralho', $data);
    }

    public function Revisar($id = false) {
    	if (!$id) {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('Baralhos_model');
        $this->load->model('Cartas_model');

        $data['baralho'] = $this->Baralhos_model->GetBy($id);
        $data['cartasBaralho'] = $this->Cartas_model->GetAllBy($id);
        $data['cartasRevisar'] = $this->Cartas_model->GetAllReview($id);

        if (!$data['cartasRevisar']) {
            redirect(base_url('meus-baralhos'), 'refresh');
        }

        $this->load->view('revisar', $data);
    }

    public function Salvar() {
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('usuario_id', 'Usuario', 'required');
        $this->form_validation->set_rules('tema_id', 'Tema', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('revisao_facil', 'Dias Revisao - Facil', 'required|min_length[1]|trim');
        $this->form_validation->set_rules('revisao_bom', 'Dias Revisao - Bom', 'required|min_length[1]|trim');
        $this->form_validation->set_rules('revisao_dificil', 'Dias Revisao - Dificil', 'required|min_length[1]|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            $dataRegister = $this->input->post();
            $id = $dataRegister['id'];
            if ($id) {
                // Editar.
                unset($dataRegister['id']);
                $dataRegister['updated'] = date('Y-m-d H:i:s');
                $res = $this->Baralhos_model->Update($dataRegister, $id);
            } else {
                // Cadastrar.
                $dataRegister['created'] = date('Y-m-d H:i:s');
                $res = $this->Baralhos_model->Insert($dataRegister);
            }
            if ($res) {
                $data['error'] = null;
            } else {
                $data['error'] = "Não foi possível cadastrar o baralho.";
            }
        }

        if ($data['error']) {
            $this->load->model('Temas_model');

            $data['temas'] = $this->Temas_model->GetAll();

            $data['title'] = 'Cadastrar';

            $data['baralho'] = (object) $this->input->post();

            $this->load->view('baralho', $data);
        } else {
            redirect(base_url('meus-baralhos'),'refresh');
        }
    }

    public function Deletar($id = false) {
        if (!$id) {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('Baralhos_model');

        $this->Baralhos_model->Delete($id);

        redirect(base_url('meus-baralhos'),'refresh');
    }

    public function SalvarRevisao()
    {
        $dataRegister = $this->input->post();

        $this->load->model('Cartas_model');

        $result = $this->Cartas_model->SalvarRevisao($dataRegister);

        echo json_encode($result);
    }
}
