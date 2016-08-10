<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        return $this->db
            ->like('title', $keyword, $side = 'both')
            ->from('posts')
            ->get()->result_array();
    }
}