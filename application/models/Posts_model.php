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

    function get($uri)
    {
        $this->_visibility_rules($this->table);
        return $this->db
            ->select('id, title, text, created, meta_keywords, meta_description')
            ->from($this->table)
            ->where($this->table . '.uri', $uri)
            ->limit(1)
            ->get()->row_array();
    }

    public function get_comments($id)
    {
        return $this->db
            ->select('id, author, text, created_date')
            ->from('comments')
            ->where('post_id', $id)
            ->get()->result_array();


    }

    function get_post($offset)
    {
        $this->_visibility_rules($this->table);
        return $this->db
            ->select('id,uri,title,short_text')
            ->from($this->table)
            ->limit($this->per_page, ($offset - 1) * $this->per_page)
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
        $this->_visibility_rules($table);
        $this->db->select('id')
            ->from($table);
        return $this->db->count_all_results();
    }


}