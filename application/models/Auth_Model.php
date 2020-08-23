<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_Model extends CI_Model {

	function login($data)
	{
        $login = $this->db->get_where('users', $data);
        return $login->row_array();
    }

    function updateLogin($id)
	{
        $this->db->where('id', $id);
        $this->db->set('last_login', 'NOW()', FALSE);
        $result = $this->db->update('users');
        return $result; 
    }
}