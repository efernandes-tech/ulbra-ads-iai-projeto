<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baralho_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save($data) {
        $this->db->insert('baralhos', $data);
        $baralho_id = $this->db->insert_id();
        if ($baralho_id) {
            return $this->getBaralho($baralho_id);
        } else {
            return false;
        }
    }
    
    public function getBaralho($id) {
        $this->db->select('*')
            ->from('baralhos')
            ->where('id', $id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    function getBaralhoPorUsuario($usuario_id) {
        $this->db->select('*')
            ->from('baralhos')
            ->where('usuario_id', $usuario_id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

}
