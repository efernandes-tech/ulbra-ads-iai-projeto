<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Baralhos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function GetBy($id) {
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

    function GetAllBy($usuario_id) {
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

    ///// /////

    function GetAllPublic() {
        $this->db->select('*')
            ->from('baralhos')
            ->where('publico', 1);
        $result = $this->db->get()->result();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

}
