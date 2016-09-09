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
                $data['tags'] = $this->tags->get_post_tags($id);

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
        if ($id && $data['result'] = $this->posts->delete($id)) {
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

    public function get_tags($id=false)
    {
        $propArray = $this->input->post(array('id','q'));
//        var_dump($propArray);
//        die;
        if ($propArray['id'] && $propArray['q'] && $data = $this->tags->get_tags($propArray['id'], $propArray['q'])) {
            $this->sent_msg('success', $data, 'all good');
        } else {
            $this->sent_msg('error', []);
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

        if (count($page)) {
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
        //validate
        if ($this->form_validation->run()) {
            $query = $this->input->post(array('title', 'uri', 'short_text', 'text', 'is_visible'));
            $tags = $this->input->post('tags');
            if ($id ? $this->posts->update($query, $id) : $new_post_id = $this->posts->add($query)) {
                if (!empty($tags)) {
                    $id ? $this->tags->update($id, $tags) : $this->tags->add_tags($new_post_id, $tags);
                }
                $this->sent_msg('success', null, 'all good');
            } else {
                $this->sent_msg();
            }
        } else {
            $this->sent_msg('fail', null, validation_errors(' ', ' '));
        }
    }

    function sent_msg($status = 'error', $data = 'NULL', $message = 'something wrong')
    {
        $this->output->set_output(json_encode([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ]));
    }
}