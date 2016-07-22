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
//        $this->_visibility_rules($this->table);
        $this->db->where($this->table . '.is_deleted', 0);
        return $this->db
            ->select('posts.id, posts.title,posts.short_text, posts.text, posts.is_visible')
            ->from($this->table)
            ->where('id', $id)
            ->limit(1)
            ->get()->row_array();
    }

    function get_post($offset)
    {
//        $this->_visibility_rules($this->table);
        return $this->db
            ->select('id,uri,title,short_text')
            ->from($this->table)
            ->limit($this->per_page, ($offset - 1) * $this->per_page)
            ->get()->result_array();
    }

    function get_all_post()
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

    public function count_all($table)
    {
        return $this->db->count_all($table);
    }

    public function del_post($id)
    {
        $this->db
            ->limit(1)
            ->where('id', $id)
            ->set('is_deleted', '1')
            ->update($this->table);
        $afftectedRows = $this->db->affected_rows();
        return $afftectedRows == 1 ? true : false;

    }

    public function add_post($data)
    {
        $this->db->limit(1)
            ->insert('posts', $data);
        return $this->db->affected_rows();

    }

    public function update_post($data, $id)
    {
        $this->db->limit(1)
            ->where('id', $id)
            ->set($data)
            ->update('posts');
        return $this->db->affected_rows();

    }
}