<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model', 'posts');
        $this->load->model('Generic');

    }

    public function index()
    {
    }

    public function new_post()
    {
        $this->mustache->write_view('content', 'edit_post/add_post');
        $this->mustache->render();
    }

    public function edit_post($id = false)
    {
        if ($id && $data['post'] = $this->posts->get($id)) {
            $data['post']['id'] = $id;
            $this->mustache->parse_view('content', 'edit_post/edit_post', $data);
            $this->mustache->render();
        } else {
            show_404();
        }

    }

    //TODO: make normal meg
    public function update_post($id = false)
    {
        if ($id) {
            $query = $this->generic->get_post('title,uri,short_text,text,is_visible');
            $query['is_deleted'] = '0';
            $respond = $this->posts->update_post($query, $id);
            if ($respond) {
                $this->output->set_output(json_encode(array('message' => 'all good')));
            } else {
                $this->output->set_output(json_encode(array('message' => 'something wrong')));
            }
        }
    }

    //TODO: make normal meg
    public function add_post()
    {
        $query = $this->generic->get_post('title,uri,short_text,text,is_visible');
        $query['is_deleted'] = '0';
        $respond = $this->posts->add_post($query);
        if ($respond) {
            $this->output->set_output(json_encode(['message' => 'all good']));
        } else {
            $this->output->set_output(json_encode(['message' => 'something wrong']));
        }

    }

    //TODO: make normal meg
    public function del_post($id = false)
    {
        if ($id && $data['result'] = $this->posts->del_post($id)) {
            redirect('/');
        } else {
            redirect('/');
        }
    }


}