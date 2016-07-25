<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->dx_auth->is_logged_in()) {
            redirect('/auth/login');
            exit;
        }
        $this->user_id = $this->dx_auth->get_user_id();
        $this->role_id = $this->dx_auth->get_role_id();
        if ($this->generic->is_admin($this->role_id)) {
             $this->load->model('Posts_model', 'posts');
            $data['list'] = $this->posts->get_all_posts();

            $this->mustache->parse_view('content','/admin/dashboard', $data);


        }
    }

    public function index()
    {
        $this->mustache->render();
    }

}