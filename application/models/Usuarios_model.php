<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function GetBy($id) {
        $this->db->select('*')
            ->from('usuarios')
            ->where('id', $id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    function Insert($data) {
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
        $this->db->insert('usuarios', $data);
        $id = $this->db->insert_id();
        if ($id) {
            return $this->GetBy($id);
        } else {
            return false;
        }
    }

    function Update($data, $id) {
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
        $this->db->where('id', $id);
        $this->db->update('usuarios', $data);
        return $this->GetBy($id);
    }

    ///// /////

    function Login($data) {
        $this->db->select('*')
            ->from('usuarios')
            ->where('email', $data['email']);
        $results = $this->db->get()->result();
        return $results;
    }

    function GetByEmail($email) {
        $this->db->select('*')
            ->from('usuarios')
            ->where('email', $email);
        $result = $this->db->get()->result();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }


}
