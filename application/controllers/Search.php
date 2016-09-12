<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('search_model', 'search');
    }

    public function index()
    {
        echo 'search';
    }

    public function search_keyword()
    {
        $keyword = $this->input->post('keyword');

        if ($keyword && $data['posts'] = $this->search->search($keyword)) {
            $this->mustache->parse_view('content', 'search/search_view', $data);
            $this->mustache->render();
        }else {
            show_404();
        }
    }
}