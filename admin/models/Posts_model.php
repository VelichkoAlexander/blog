<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Posts_model extends CI_Model
{
    var $table = 'posts';
    var $per_page = 5;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('date');
    }

    function _visibility_rules($table = '')
    {
        $this->db->where($table . '.is_deleted', 0);
        $this->db->where($table . '.is_visible', 1);
    }

    function get($id = false)
    {
        $this->db->where($this->table . '.is_deleted', 0);
        return $this->db
            ->select('posts.id, posts.title,posts.short_text, posts.text, posts.is_visible')
            ->from($this->table)
            ->where('id', $id)
            ->limit(1)
            ->get()->row_array();
    }

    function get_all_posts()
    {
        $this->db->where($this->table . '.is_deleted', 0);
        return $this->db
            ->select('id,uri,title,short_text,is_visible')
            ->from($this->table)
            ->get()->result_array();
    }

    public function get_tags($id)
    {
        return $this->db
            ->select('tags.uri,tags.title')
            ->from('tags')
            ->join('tags_posts_rel', 'tags_posts_rel.tag_id = tags.id')
            ->where('tags_posts_rel.post_id', $id)
            ->get()->result_array();
    }

    public function del_post($id)
    {
        return $this->db
            ->limit(1)
            ->where('id', $id)
            ->set('is_deleted', '1')
            ->update($this->table);
    }

    public function add_post($data)
    {
        return $this->db
            ->limit(1)
            ->insert('posts', $data);
    }

    public function update_post($data, $id)
    {
        return $this->db
            ->limit(1)
            ->where('id', $id)
            ->set($data)
            ->update('posts');
    }
}