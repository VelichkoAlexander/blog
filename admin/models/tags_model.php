<?php

class Tags_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
     echo 'tags';
    }
    public function get_tag($id)
    {
        return $this->db
            ->select('tags.id,tags.title')
            ->from('tags')
            ->join('tags_posts_rel', 'tags_posts_rel.tag_id = tags.id')
            ->where('tags_posts_rel.post_id', $id)
            ->get()->result_array();
    }

    public function get_tags()
    {
        return $this->db
            ->select('title')
            ->from('tags')
            ->get()->result_array();
    }


    public function check_tag($title_tag)
    {
        return $this->db
            ->select('id')
            ->from('tags')
            ->where('title', $title_tag)
            ->get()->row();
    }

    public function update_tag($id, $tag_id)
    {
        return $this->db
            ->limit(1)
            ->where('id', $id)
            ->set(array('tag_id' => $tag_id, 'post_id' => $id))
            ->update('tags_posts_rel');
    }

    public function add_tag($tag)
    {
        $this->db
            ->limit(1)
            ->insert('tags', $tag);
        return $this->db->insert_id();
    }

    public function rel_tag($tag_id, $post_id)
    {
        $this->db
            ->limit(1)
            ->insert('tags_posts_rel', array('tag_id' => $tag_id, 'post_id' => $post_id));
    }

    public function remove_tag($post_id)
    {
        return $this->db
            ->where('post_id', $post_id)
            ->delete('tags_posts_rel');

    }

}