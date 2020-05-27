<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login');
    }

    public function index()
    {
        $this->load->view('login');
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password,
        );

        $cek_role = $this->Model_login->cek_login("akun", $where)->row()->level;


        $cek = $this->Model_login->cek_login("akun", $where)->num_rows();
        if ($cek > 0) {

            $data_session = array(
                'nama' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            if ($cek_role == 0) {
                redirect(base_url("admin"));
            } else {
                redirect(base_url("customer"));
            }
        } else {
            echo "Username dan password salah !";
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
