<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cartas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function GetBy($id) {
        $this->db->select('*')
            ->from('cartas')
            ->where('id', $id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    function GetAllBy($baralho_id) {
        $this->db->select('*')
            ->from('cartas')
            ->where('baralho_id', $baralho_id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function Insert($data) {
        $this->db->insert('cartas', $data);
        $id = $this->db->insert_id();
        if ($id) {
            return $this->GetBy($id);
        } else {
            return false;
        }
    }

    function Update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('cartas', $data);
        return $this->GetBy($id);
    }

    function Delete($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('cartas');
        return $result;
    }

    ///// /////

    function GetAllReview($baralho_id) {
        $this->db->select('*')
            ->from('cartas')
            ->where('data_prox_revisao <=', date('Y-m-d H:i:s'))
            ->where('baralho_id', $baralho_id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function SalvarRevisao($data) {
        $id = $data['carta_id'];
        $revisao = $data['revisao'];
        $data = array(
            'data_revisao' => date('Y-m-d H:i:s'),
            'data_prox_revisao' => date('Y-m-d H:i:s', strtotime('+ '.$revisao.' days')),
        );
        $this->db->where('id', $id);
        $this->db->update('cartas', $data);
        return $this->GetBy($id);
    }
}
