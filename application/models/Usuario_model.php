<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUsuario($id) {
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
    
    function insertUsuario($data) {
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
        $this->db->insert('usuarios', $data);
        $usuario_id = $this->db->insert_id();
        if ($usuario_id) {
            return $this->getUsuario($usuario_id);
        } else {
            return false;
        }
    }

    function updateUsuario($data, $id) {
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
        $this->db->where('id', $id);
        $this->db->update('usuarios', $data);
        return $this->db->getUsuario($id);
    }

    ///// /////

    function login($data) {
        $this->db->select('*')
            ->from('usuarios')
            ->where('email', $data['email']);
        $results = $this->db->get()->result();
        return $results;
    }

}
