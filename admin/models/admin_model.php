<?php

class Admin_model extends CI_Model
{
    public function get_user($data)
    {
        return $this->db
            ->select('id')
            ->from('users')
            ->where('login', $data['login'])
            ->where('password', $data['password'])
            ->get()->result_array();
    }

    public function post_add($data)
    {

        $this->db->limit(1)
            ->insert('posts', ['uri' => $data['uri'],
                'title' => $data['title'],
                'short_text' => $data['title'],
                'text' => $data['body'],
                'is_deleted' => '0',
                 'is_visible'=>'1']);
        return true;
    }
}