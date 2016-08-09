<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_model', 'posts');
        $this->load->model('Tags_model', 'tags');
    }

    public function index()
    {

    }

    public function view($uri = FALSE)
    {
        if ($uri && $data = $this->posts->get($uri)) {
            $data['created'] = hr_date($data['created']);
            $data['post_tags'] = $this->posts->get_tags($data['id']);
            $data['tags'] = $this->tags->get();
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