<?php

class Tags_model extends CI_Model
{
    var $table = 'posts';

    public function __construct()
    {
        parent::__construct();
    }

    function _visibility_rules($table = '')
    {
        $this->db->where($table . '.is_deleted', 0);
        $this->db->where($table . '.is_visible', 1);
    }

    public function get_posts($uri)
    {
        $this->_visibility_rules($this->table);
        return $this->db
            ->select('posts.uri, posts.title, posts.short_text')
            ->from('posts')
            ->join('tags_posts_rel','tags_posts_rel.post_id = posts.id')
            ->join('tags','tags.id = tags_posts_rel.tag_id')
            ->where('tags.uri', $uri)
            ->get()->result_array();
    }

}