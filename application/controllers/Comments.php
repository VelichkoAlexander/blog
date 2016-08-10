<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Comments_model', 'comments');

    }

    public function index()
    {
        echo 'Comments';
    }

    public function create()
    {
        $query = $this->generic->get_post('author,text,post_id');
        if (empty($query['author'])) {
            send_json(array('status' => 'error',
                'message' => 'Please complete the field Name.'));
        } else if (empty($query['text'])) {
            send_json(array('status' => 'error',
                'message' => 'Please complete the field Comment.'));

        } else {
            if ($id = $this->comments->create($query)) {
                send_json(array('status' => 'success',
                    'data' => $this->comments->get($id),
                    'message' => 'Record created successfully.'));
            } else {
                send_json(array('status' => 'error',
                    'message' => 'An error occurred while creating a record.'));
            }
        }

    }


}