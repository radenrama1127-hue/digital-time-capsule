<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function cek_login($username, $password)
    {
        return $this->db
            ->where('username', $username)
            ->where('password', $password)
            ->get('users')
            ->row();
    }

    public function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }

}
