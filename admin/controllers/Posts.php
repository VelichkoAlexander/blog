<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model', 'posts');
        $this->load->model('tags_model', 'tags');
    }

    public function index()
    {
        echo 'Post api';
    }

    public function new_post()
    {
        $this->mustache->write_view('content', 'edit_post/add_post');
        $this->mustache->render();
    }

    public function edit_post($id = false)
    {
        if ($id && $data['post'] = $this->posts->get($id)) {
            $data['tags'] = $this->tags->get_tag($id);
            $this->mustache->parse_view('content', 'edit_post/edit_post', $data);
            $this->mustache->render();
        } else {
            show_404();
        }

    }

    //TODO: make normal msg
    public function update_post($id = false)
    {
        if ($id) {
            $query = $this->generic->get_post('title, uri, short_text, text, is_visible');
            $tags = $this->generic->get_post('tags');
            if ($this->posts->update_post($query, $id)) {
                $this->tags->new_update_tags($id, $tags);
                
                $this->output->set_output(json_encode(array('message' => 'all good')));
            } else {
                $this->output->set_output(json_encode(array('message' => 'something wrong')));
            }
        }
    }


//TODO: make normal msg
    public function add_post()
    {
        $query = $this->generic->get_post('title,uri,short_text,text,is_visible');
        $tags = $this->input->post('tags');
        $new_post_id = $this->posts->add_post($query);
        if ($new_post_id) {
            if (!empty($tags)) {
                $this->tags->new_add_tags($new_post_id, $tags);
            }
            $this->output->set_output(json_encode(['message' => 'all good']));
        } else {
            $this->output->set_output(json_encode(['message' => 'something wrong']));
        }

    }

//TODO: make normal msg
    public function del_post($id = false)
    {
        if ($id && $data['result'] = $this->posts->del_post($id)) {
            redirect('/');
        } else {
            redirect('/');
        }
    }

    public function check_uri($uri = false)
    {

        if ($uri && $data = $this->posts->check_uri($uri)) {
            $this->output->set_output(json_encode(['uri' => '1']));
        } else {
            $this->output->set_output(json_encode(['uri' => '0']));
        }

    }

    public function get_tags()
    {
        if ($data = $this->tags->get_tags()) {
            $array = array();
            foreach ($data as $item) {
                $array[] = $item['title'];
            }

            $this->output->set_output(json_encode(['tags' => $array]));
        } else {
            $this->output->set_output(json_encode(['tags' => '']));
        }
    }


}