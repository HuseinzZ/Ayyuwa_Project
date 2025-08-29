<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cek_login($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $row = $query->row();

            // Jika password di-hash
            if (password_verify($password, $row->password)) {
                return $row;
            }

            // jika password plain
            if ($row->password === $password) {
                return $row;
            }
        }
        return false;
    }
}
