<?php

class Tags_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param $id number    post id
     * @return array        all tags for post
     */
    public function get_post_tags($id)
    {
        return $this->db
            ->select('tags.id,tags.title as text')
            ->from('tags')
            ->join('tags_posts_rel', 'tags_posts_rel.tag_id = tags.id')
            ->where('tags_posts_rel.post_id', $id)
            ->get()->result_array();
    }

    /**
     * @param $id number    current post id
     * @param $like string  for search tags
     * @return mixed
     */
    public function get_tags($id, $like, $ids = false)
    {
        $subquery = $this->db
            ->select('tag_id')
            ->from('tags_posts_rel')
            ->where('post_id', $id)
            ->get_compiled_select();

        return $this->db
            ->select('id, title as text')
            ->from('tags')
            ->where_not_in('id', $id)
            ->like('title', $like, 'left')
            ->limit(10)
            ->get()->result_array();
    }

    public function add($arr)
    {
        foreach ($arr as $tag) {
            $insertArr[] = array('uri' => $tag, 'title' => $tag);
        }
        $ids = [];
        $count_items = count($insertArr);
        $this->db
            ->insert_batch('tags', $insertArr);
        $first_id = $this->db->insert_id();
        $last_id = $first_id + ($count_items - 1);
        for ($i = $first_id; $i <= $last_id; $i++) {
            $ids[] = $i;
        }
        return $ids;
    }

    public function update($post_id, $tags)
    {
        foreach ($tags as $tag) {
            $insertArr[] = array('tag_id' => $tag, 'post_id' => $post_id);
        }

        $this->db
            ->insert_batch('tags_posts_rel', $insertArr);
    }

    public function delete($post_id, $tags)
    {
        return $this->db
            ->where('post_id', $post_id)
            ->where_in('tag_id', $tags)
            ->delete('tags_posts_rel');


    }

}