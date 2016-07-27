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

    public function add_tag($tags)
    {
        $ids = [];
        $count_items = count($tags);
        $this->db
            ->insert_batch('tags', $tags);
        $first_id = $this->db->insert_id();
        $last_id = $first_id + ($count_items - 1);
        for ($i = $first_id; $i <= $last_id; $i++) {
            $ids[] = $i;
        }
        return $ids;

    }

    public function rel_tag($data)
    {
        $this->db
            ->insert_batch('tags_posts_rel', $data);
    }

    public function remove_tag($post_id)
    {
        return $this->db
            ->where('post_id', $post_id)
            ->delete('tags_posts_rel');

    }

    public function new_add_tags($post_id, $arr)
    {
        $exists_tags = [];
        $prepared_add_rel = [];
        $prepared_add_tags = [];
        $prepared_ids = [];
        $query = $this->db
            ->select('id, title')
            ->from('tags')
            ->where_in('title', $arr)
            ->get()->result_array();
        if (!empty($query)) {
            foreach ($query as $row) {
                $exists_tags[] = $row['title'];
                $prepared_add_rel[] = array('tag_id' => $row['id'], 'post_id' => $post_id);
            }
            $add_tags = array_diff($arr, $exists_tags);
            $this->rel_tag($prepared_add_rel);

        } else {
            $add_tags = $arr;

        }
        foreach ($add_tags as $row) {
            $prepared_add_tags[] = array('uri' => $row, 'title' => $row);
        }
        $ids = $this->add_tag($prepared_add_tags);
        foreach ($ids as $row) {
            $prepared_ids[] = array('tag_id' => $row, 'post_id' => $post_id);
        }
        $this->rel_tag($prepared_ids);
    }
    public function new_update_tags($post_id, $arr)
    {
        $this->remove_tag($post_id);
        $exists_tags = [];
        $prepared_add_rel = [];
        $prepared_add_tags = [];
        $prepared_ids = [];
        $query = $this->db
            ->select('id, title')
            ->from('tags')
            ->where_in('title', $arr)
            ->get()->result_array();
        if (!empty($query)) {
            foreach ($query as $row) {
                $exists_tags[] = $row['title'];
                $prepared_add_rel[] = array('tag_id' => $row['id'], 'post_id' => $post_id);
            }
            $add_tags = array_diff($arr, $exists_tags);
            $this->rel_tag($prepared_add_rel);

        } else {
            $add_tags = $arr;

            foreach ($add_tags as $row) {
                $prepared_add_tags[] = array('uri' => $row, 'title' => $row);
            }
            $ids = $this->add_tag($prepared_add_tags);
            foreach ($ids as $row) {
                $prepared_ids[] = array('tag_id' => $row, 'post_id' => $post_id);
            }
            $this->rel_tag($prepared_ids);
        }
    }

}