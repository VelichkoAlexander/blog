<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('admin_model', 'amodel');
    }

    public function index()
    {
        $data = [];
        $this->mustache->parse_view('content', 'admin/login', $data);
        $this->mustache->render();
    }

    public function login()
    {
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        $result = $this->amodel->get_user([
            'login' => $login,
            'password' => $password
        ]);
        if ($result) {
            $this->session->set_userdata(['id' => $result[0]['id']]);
            redirect('admin/');
            return false;
        } else {
            redirect('Login');
        }
    }


}