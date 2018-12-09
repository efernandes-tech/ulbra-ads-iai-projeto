<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Baralhos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function GetBy($id) {
        $this->db->select('b.*, t.nome AS tema, t.icon AS tema_icon')
            ->from('baralhos b')
            ->join('temas t', 't.id = b.tema_id', 'inner')
            ->where('b.id', $id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    function GetAllBy($usuario_id) {
        $this->db->select('b.*, t.nome AS tema, t.icon AS tema_icon')
            ->from('baralhos b')
            ->join('temas t', 't.id = b.tema_id', 'inner')
            ->where('usuario_id', $usuario_id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function Insert($data) {
        $this->db->insert('baralhos', $data);
        $id = $this->db->insert_id();
        if ($id) {
            return $this->GetBy($id);
        } else {
            return false;
        }
    }

    function Update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('baralhos', $data);
        return $this->GetBy($id);
    }

    function Delete($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('baralhos');
        return $result;
    }

    ///// /////

    function GetAllPublicTop3() {
        $this->db->select('b.*, t.nome AS tema, t.icon AS tema_icon')
            ->from('baralhos b')
            ->join('temas t', 't.id = b.tema_id', 'inner')
            ->where('publico', 1)
            ->limit(3);
        $result = $this->db->get()->result();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function GetAllPublicBy($tema_id) {
        $this->db->select('b.*, t.nome AS tema, t.icon AS tema_icon')
            ->from('baralhos b')
            ->join('temas t', 't.id = b.tema_id', 'inner')
            ->where('publico', 1)
            ->where('tema_id', $tema_id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

}
