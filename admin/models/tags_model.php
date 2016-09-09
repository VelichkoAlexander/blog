<?php

class Tags_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_post_tags($id)
    {
        return $this->db
            ->select('tags.id,tags.title as text')
            ->from('tags')
            ->join('tags_posts_rel', 'tags_posts_rel.tag_id = tags.id')
            ->where('tags_posts_rel.post_id', $id)
            ->get()->result_array();
    }

    public function get_tags($id, $like)
    {
        $subquery = $this->db
            ->select('tag_id')
            ->from('tags_posts_rel')
            ->where('post_id', $id)
            ->get_compiled_select();

        return $this->db
            ->select('id, title as text')
            ->from('tags')
            ->where("`id` NOT IN ($subquery)", NULL, FALSE)
            ->like('title', $like, 'right')
            ->limit(10)
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

    public function remove_tags($post_id, $tags)
    {
        return $this->db
            ->where_in('tag_id', $tags)
            ->where('post_id', $post_id)
            ->delete('tags_posts_rel');

    }

    public function add_tags($post_id, $arr)
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

    public function update($post_id, $arr)
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
            $temp_next = [];
            foreach ($query as $row) {
                $temp_next[] = $row['id'];
                $exists_tags[] = $row['title'];
                $prepared_add_rel[] = array('tag_id' => $row['id'], 'post_id' => $post_id);
            }
            $add_tags = array_diff($arr, $exists_tags);
            $query2 = $this->db
                ->select('tag_id')
                ->from('tags_posts_rel')
                ->where('post_id', $post_id)
                ->get()->result_array();
            if (!empty($query)) {
                $temp_ex = [];
                foreach ($query2 as $row) {
                    $temp_ex[] = $row['tag_id'];
                }

                $remove_tag_id = array_diff($temp_ex, $temp_next);
                $add_tag_id = array_diff($temp_next,$temp_ex);
                if (!empty($remove_tag_id)) {
                    $this->remove_tags($post_id, $remove_tag_id);
                }
                if(!empty($add_tag_id)){
                    $data2 = [];
                    foreach ($add_tag_id as $row) {
                        $data2[] =  array('tag_id' => $row, 'post_id' => $post_id);
                    }
                    $this->rel_tag($data2);
                }
            }

        } else {
            $add_tags = $arr;

        }
        if (!empty($add_tags)) {
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