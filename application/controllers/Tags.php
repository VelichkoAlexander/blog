<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Tags_model', 'tags');

    }

    public function index()
    {
        echo 'tags';
    }

    public function view($uri = false)
    {
        if ($uri && $data['posts'] = $this->tags->get_posts($uri)) {
            $data['tag_title'] = $this->tags->get($uri);
            $data['tags'] = $this->tags->get();
            $this->breadcrumbs->push('Main page', '/');
            $this->breadcrumbs->push($data['tag_title'], ' ');
            $data['bread'] = $this->breadcrumbs->show();
            $this->mustache->parse_view('content', 'tags/tags_items', $data);
            $this->mustache->render();
        } else {
            show_404();
        }

    }
}