<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Tags_model','tags');
		
	}

	public function index()
	{
	echo 'tags';
	}
	public  function view($uri=false){
		
		if($uri && $data['tags'] = $this->tags->get_posts($uri)){
			$this->mustache->parse_view('content','tags/items',$data);
			$this->mustache->render();
		}

	}
}