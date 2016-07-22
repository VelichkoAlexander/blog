<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model', 'posts');
        $this->load->library('pagination');

    }

    public function index()
    {
    }

    public function get_list($page = 1)
    {
        if ($page < 1) {
            $page = 0;
        }
        $page = intval($page);

        if ($data['posts'] = $this->posts->get_post($page)) {
            $config['base_url'] = 'http://blog.dev';
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

            $this->mustache->parse_view('content', 'main_page/categories_list', $data);
            $this->mustache->render();
        } else {
            show_404();
        }

    }

    public function get_post($id = false)
    {

        if ($id && $data['post'] = $this->posts->get($id)) {

        }

    }

    public function del_post($id = false)
    {
        if ($id && $data['result'] = $this->posts->del_post($id)) {
            redirect('/');
        } else {
            redirect('/');
        }
    }

    public function edit_post($id = false)
    {
        if (!$id) {
            $this->mustache->write_view('content', 'edit_post/add_post');
        } elseif ($id && $data['post'] = $this->posts->get($id)) {
            $data['post']['id'] = $id;
            $this->mustache->parse_view('content', 'edit_post/edit_post', $data);
        }
        $this->mustache->render();

    }

    public function update_post($id = false)
    {
        if ($id) {
            $query = [];
            $query['title'] = $this->input->post('title');
            $query['uri'] = $this->input->post('uri');
            $query['short_text'] = $this->input->post('short_text');
            $query['text'] = $this->input->post('body');
            $query['is_visible'] = $this->input->post('visibility');
            $query['is_deleted'] = '0';
            $respond = $this->posts->update_post($query, $id);
            if ($respond) {
                $this->output->set_output(json_encode(array('message' => 'all good')));
            } else {
                $this->output->set_output(json_encode(array('message' => 'something wrong')));
            }
        }
    }


    public function add_post()
    {
        $query = [];
        $query['title'] = $this->input->post('title');
        $query['uri'] = $this->input->post('uri');
        $query['short_text'] = $this->input->post('short_text');
        $query['text'] = $this->input->post('body');
        $query['is_visible'] = $this->input->post('visibility');
        $query['is_deleted'] = '0';
        $respond = $this->posts->add_post($query);
        if ($respond) {
            $this->output->set_output(json_encode(['message' => 'all good']));

        } else {
            $this->output->set_output(json_encode(['message' => 'something wrong']));
        }

    }




}