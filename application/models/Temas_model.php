<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Temas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function GetBy($id) {
        $this->db->select('t.*')
            ->from('temas t')
            ->where('t.id', $id)
            ->order_by('t.ordem ASC');
        $result = $this->db->get()->result();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    function Insert($data) {
        $this->db->insert('temas', $data);
        $id = $this->db->insert_id();
        if ($id) {
            return $this->GetBy($id);
        } else {
            return false;
        }
    }

    function Update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('temas', $data);
        return $this->GetBy($id);
    }

    ///// /////

    function GetAll() {
        $this->db->select('t.*')
            ->from('temas t')
            ->order_by('t.ordem ASC');
        $result = $this->db->get()->result();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

}
