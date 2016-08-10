<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model', 'posts');
        $this->load->model('tags_model', 'tags');
        $this->load->library('pagination');

    }

    public function index($page = 1)
    {
        if ($page < 1) {
            $page = 0;
        }

        $page = intval($page);
        if ($data['posts'] = $this->posts->get_post($page)) {
            $config['base_url'] = 'http://blog.dev/';
            $config['total_rows'] = $this->posts->count_all('posts');
            $config['per_page'] = $this->posts->per_page;
            $config['next_tag_open'] = '<li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo;';
            $config['next_link'] = '&raquo;';
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            if ($data['tags'] = $this->tags->get()) {
            }
            //template
            $this->mustache->parse_view('content', 'main_page/categories_list', $data);
            $this->mustache->render();
        } else {
            show_404();
        }

    }
}                                                               	