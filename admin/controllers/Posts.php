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
        redirect(site_url('/admin'));
    }

    public function new_post()
    {
        $this->mustache->write_view('content', 'add_post/add_post');
        $this->mustache->render();
    }

    public function update($id = NULL)
    {
        if ($data['post'] = $this->posts->get($id)) {
            $data['tags'] = $this->tags->get_post_tags($id);

            $this->mustache->parse_view('content', 'edit_post/edit_post', $data);
            $this->mustache->render();
        } else {
            show_404();
        }
    }
    public function delete($id = false)
    {
        if ($id && $data['result'] = $this->posts->delete($id)) {
            $this->sent_msg($status = 'success', $data = 'NULL', $message = 'your post successfully deleted');
        } else {
            $this->sent_msg();
        }
    }

    public function check_uri($uri = false)
    {
        if ($uri && $data = $this->posts->check_uri($uri)) {
            $this->sent_msg('success', array('uri' => '1'), 'uri exist');
        } else {
            $this->sent_msg('success', array('uri' => '0'), 'uri do not exist ');
        }
    }

    public function get_tags()
    {
        $propArray = $this->input->get(array('id', 'q', 'id_tags'));
        if ($propArray['id'] && $propArray['q'] && $data = $this->tags->get_tags($propArray['id'], $propArray['q'], $propArray['id_tags'])) {
            $this->sent_msg('success', $data, 'all good');
        } else {
            $this->sent_msg('error', []);
        }
    }

    public function _unique_slug($str)
    {
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

    function add()
    {
        // Initialise rules for validate
        $rules = $this->posts->rules;
        $this->form_validation->set_rules($rules);
        //validate
        if ($this->form_validation->run()) {
            $query = $this->input->post(array('title', 'uri', 'short_text', 'text', 'is_visible','meta_keywords','meta_description'));
            $tags = $this->input->post(array('tags', 'tags_id'));
            if ($id = $this->posts->add($query)) {
                $tags = $this->tagsTransform($id, $tags);
                if ($tags['add_tags']) {
                    $this->tags->update($id, $tags['add_tags']);
                }
                $this->sent_msg('success', null, 'all good');
            } else {
                $this->sent_msg();
            }
        } else {
            $this->sent_msg('fail', null, validation_errors(' ', ' '));
        }
    }

    public function update_post($id = false)
    {
        // Initialise rules for validate
        $rules = $this->posts->rules;
        $this->form_validation->set_rules($rules);
        //validate
        if ($this->form_validation->run()) {
            $query = $this->input->post(array('title', 'uri', 'short_text', 'text', 'is_visible','meta_keywords','meta_description'));
            $tags = $this->input->post(array('tags', 'tags_id'));
            if ($id && $this->posts->update($query, $id)) {
                $tags = $this->tagsTransform($id, $tags);
                if ($tags['add_tags']) {
                    $this->tags->update($id, $tags['add_tags']);
                }
                if ($tags['add_del']) {
                    $this->tags->delete($id, $tags['add_del']);
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
        echo(json_encode([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ]));
    }

    function tagsTransform($id, $tags)
    {
        $newTags = array();
        $tagsExist = array();
        if ($tags['tags'] && is_array($tags['tags']) ) {
            foreach ($tags['tags'] as $tag) {
                if (!is_numeric($tag)) {
                    $newTags[] = $tag;
                } else {
                    $tagsExist[] = $tag;
                }
            }
        } else {
            $tagsExist = [];
        }
        if ($newTags && $newTagsId = $this->tags->add($newTags)) {
            $this->tags->update($id, $newTagsId);
        }
        if ($tags['tags_id']) {
            $tags['tags_id'] = substr($tags['tags_id'], 0, -1);
            $tags['tags_id'] = explode(',', $tags['tags_id']);
        } else {
            $tags['tags_id'] = [];
        }
        $add_tags = array_diff($tagsExist, $tags['tags_id']);
        $add_del = array_diff($tags['tags_id'], $tagsExist);
        return array('add_tags' => $add_tags, 'add_del' => $add_del);
    }
}