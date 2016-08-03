<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comments_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function get($id){
        $this->db
            ->from('comments')
            ->where('id',$id)
            ->limit(1);
            if(!($data = $this->db->get()->row_array())){
                return false;
            }else{
                return $data;
            }

    }

    public function create($data){
        $this->db->insert('comments', $data);
        return $this->db->insert_id();
    }


}