<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_model', 'posts');
    }

    public function index()
    {

    }

    public function view($uri = FALSE)
    {
        if ($uri && $data = $this->posts->get($uri)) {
            $data['created'] = hr_date($data['created']);
            $data['tags'] = $this->posts->get_tags($data['id']);
            $data['comments'] = $this->posts->get_comments($data['id']);
            $data['comments'] = convert_comments_date($data['comments']);
            set_smm($data);
            set_seo($data);
            $this->mustache->parse_view('content', 'items/view', $data);
            $this->mustache->render();

        } else {
            show_404();
//			redirect('/');
        }


    }
}