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
        // Pega cartas do baralho.
        $cartas = $this->Cartas_model->GetAllBy($id);
        $data['totalComb'] = 0;
        // Separa frente e verso.
        foreach ($cartas as $carta) {
            $data['cartas'][] = (object) array(
                'id' => $carta->id,
                'conteudo' => $carta->frente,
            );
            $data['cartas'][] = (object) array(
                'id' => $carta->id,
                'conteudo' => $carta->verso,
            );
            $data['totalComb']++;
        }
        // Mistura cartas.
        shuffle($data['cartas']);

        $this->load->view('jogar', $data);
    }

}
