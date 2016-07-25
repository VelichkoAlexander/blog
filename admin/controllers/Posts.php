<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model', 'posts');
        $this->load->model('tags_model', 'tags');
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
        }
        $respond = $this->posts->update_post($query, $id);
        if ($respond) {
            $this->tags->remove_tag($id);
            if ($data = $this->input->post('tags')) {
                foreach ($data as $tag) {
                    if ($tag_id = $this->tags->check_tag($tag)) {
                        $this->tags->rel_tag($tag_id->id, $id);
                    } else {
                        $tag_id = $this->tags->add_tag(array('uri' => $tag, 'title' => $tag));
                        $this->tags->rel_tag($tag_id, $id);
                    }
                }
            }
            $this->output->set_output(json_encode(array('message' => 'all good')));
        } else {
            $this->output->set_output(json_encode(array('message' => 'something wrong')));
        }
    }


//TODO: make normal msg
    public function add_post()
    {
        $query = $this->generic->get_post('title,uri,short_text,text,is_visible');
        $respond = $this->posts->add_post($query);

        if ($respond) {
            if ($data = $this->input->post('tags')) {
                foreach ($data as $tag) {
                    if ($tag_id = $this->tags->check_tag($tag)) {
                        $this->tags->rel_tag($tag_id->id, $respond);
                    } else {
                        $tag_id = $this->tags->add_tag(array('uri' => $tag, 'title' => $tag));
                        $this->tags->rel_tag($tag_id, $respond);
                    }
                }
            }
            $this->output->set_output(json_encode(['message' => 'all good']));
        } else {
            $this->output->set_output(json_encode(['message' => 'something wrong']));
        }

    }

//TODO: make normal msg
    public
    function del_post($id = false)
    {
        if ($id && $data['result'] = $this->posts->del_post($id)) {
            redirect('/');
        } else {
            redirect('/');
        }
    }

    public
    function check_uri($uri = false)
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