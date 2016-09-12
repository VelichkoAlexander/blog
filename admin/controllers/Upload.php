<?php

class Upload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

            $this->output->enable_profiler(false);

    }

    public function index()
    {
        echo 'aaaa';
    }

    public function do_upload()
    {
        $config['upload_path'] = '../../www/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size']             = 100;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img')) {
            echo json_encode(array('error' => $this->upload->display_errors('', '')));

        } else {
            echo json_encode(array('upload_data' => $this->upload->data('file_name')));
        }
    }
}
