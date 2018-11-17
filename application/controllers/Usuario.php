<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Usuarios_model');
        $this->load->library('form_validation');
    }

    public function Login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|valid_email|trim');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            $dataLogin = $this->input->post();
            $res = $this->Usuarios_model->Login($dataLogin);
            if ($res) {
                foreach ($res as $result) {
                    if (password_verify($dataLogin['senha'], $result->senha)) {
                        $data['error'] = null;
                        $this->session->set_userdata('logged', true);
                        $this->session->set_userdata('email', $result->email);
                        $this->session->set_userdata('id', $result->id);
                        redirect();
                    } else {
                        $data['error'] = "Senha incorreta.";
                    }
                }
            }else{
                $data['error'] = "Usuário não cadastrado.";
            }
        }
        $this->load->view('login', $data);
    }

    public function Logout() {
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');
        redirect();
    }

    public function Cadastrar() {
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|valid_email|trim|callback_email_nao_cadastrado');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            $dataRegister = $this->input->post();
            $res = $this->Usuarios_model->Insert($dataRegister);
            if ($res) {
                $data['error'] = null;
            } else {
                $data['error'] = "Não foi possível criar o usuário.";
            }
        }
        if ($data['error'])
            $this->load->view('login', $data);
        else {
            $this->session->set_userdata('logged', true);
            $this->session->set_userdata('email', $res->email);
            $this->session->set_userdata('id', $res->id);
            redirect();
        }
    }

    public function AlterarSenha() {
        $data['success'] = null;
        $data['error'] = null;
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            $data = $this->input->post();
            $this->Usuarios_model->Update($data, $this->session->userdata('id'));
            $data['success'] = "Senha alterada com sucesso!";
            $data['error'] = null;
        }
        $data['usuario'] = $this->Usuarios_model->GetBy($this->session->userdata('id'));
        $this->load->view('alterar-senha', $data);
    }

    public function Baralhos() {
        $this->load->model('Baralhos_model');
        $baralhos = $this->Baralhos_model->GetAllBy($this->session->userdata('id'));
        $data['baralhos'] = $baralhos;
        $data['error'] = null;
        $this->load->view('meus-baralhos', $data);
    }

    public function email_nao_cadastrado($email) {
        $usuario = $this->Usuarios_model->GetByEmail($email);
        if ($usuario !== FALSE) {
            $this->form_validation->set_message("email_nao_cadastrado", "O email '%s' já está cadastrado.");
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
