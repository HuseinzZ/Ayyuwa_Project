<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property LoginModel $LoginModel
 */
class Auth extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function prosesLogin()
    {
        // Ambil input username dan password
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        // Cek ke model
        $user = $this->LoginModel->cek_login($username, $password);

        if ($user) {
            // Simpan session
            $this->session->set_userdata([
                'user_id'  => $user->id,
                'username' => $user->username,
                'role'      => $user->role,
                'logged_in' => TRUE
            ]);

            // Cek role
            if ($user->role == 'admin') {
                redirect('dashboard/admin');
            } elseif ($user->role == 'user') {
                redirect('dashboard/user');
            } else {
                // default 
                redirect('auth');
            }

            $this->load->view('dashboard');
        } else {
            // Jika gagal
            $this->session->set_flashdata('error', 'Username atau password salah.');
            redirect('auth');
        }
    }

    //logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
