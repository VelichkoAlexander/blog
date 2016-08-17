<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model', 'posts');
        $this->load->model('tags_model', 'tags');
        $this->load->library('form_validation');

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


    }

    //TODO: make normal msg
    public function update_post($id = false)
    {
        $this->add($id);
    }


    public function add_post($id = NULL)
    {
        if (!$id) {
            $this->add();
        } else {
            if ($data['post'] = $this->posts->get($id)) {
                $data['tags'] = $this->tags->get_tag($id);
                $this->mustache->parse_view('content', 'edit_post/edit_post', $data);
                $this->mustache->render();
            } else {
                show_404();
            }
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

    public function _unique_slug($str)
    {
        // Do NOT validate if slug already exists
        // UNLESS it's the slug for the current page
        $id = $this->uri->segment(3);
        $this->db->where('uri', $this->input->post('uri'));
        !$id || $this->db->where('id !=', $id);
        $page = $this->posts->unique_slug();

        if ($page[$id] == $id || count($page)) {
            $this->form_validation->set_message('_unique_slug', '%s should be unique');
            return FALSE;
        }

        return TRUE;
    }


    function add($id = NULL)
    {
        // Initialise rules for validate
        $rules = $this->posts->rules;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $query = $this->generic->get_post('title, uri, short_text, text, is_visible');
            $tags = $this->input->post('tags');
            if ($id ? $this->posts->update_post($query, $id) : $new_post_id = $this->posts->add_post($query)) {
                if (!empty($tags)) {
                    $id ? $this->tags->new_update_tags($id, $tags) : $this->tags->new_add_tags($new_post_id, $tags);
                }
                $this->output->set_output(json_encode([
                    'status' => 'success',
                    'data' => NULL,
                    'message' => 'all good'
                ]));
            } else {
                $this->output->set_output(json_encode([
                    'status' => 'error',
                    'data' => NULL,
                    'message' => 'something wrong'
                ]));
            }
        } else {
            $this->output->set_output(json_encode([
                'status' => 'fail',
                'data' => NULL,
                'message' => validation_errors(' ', ' ')
            ]));
        }
    }


}