<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generic extends CI_Model 
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct(); 
	}

	/********************
	* function to get all post data throught comma separated string
	*
	* @return array
	* @fields - string 
	*********************/
	
	function get_post($fields)
	{
		$result=array();
		$fields=str_replace(' ','', $fields);
		foreach (explode(',',$fields) as $field)
		{
			$result[$field]=$this->input->post($field);
		}
		return $result;
	}
	function get_main_slides()
	{
		$this->db->select('name, description, image, align, width');
		$this->db->from('slides');
		$this->db->where('is_visible',1);
		$this->db->where('is_deleted',0);
		$result = $this->db->get()->result_array();
		foreach ($result as $key => $value)
		{
			$result[$key]['name'] = htmlspecialchars_decode($value['name']);
			$result[$key]['description'] = nl2br($value['description']);
			switch($value['align'])
			{
				case 'center' :
					$offset = floor((12 - $value['width'])/2);
					$result[$key]['align'] = ' text-center col-md-offset-'.$offset;
				break;
				case 'right' :
					$result[$key]['align'] = ' col-md-offset-6';
				break;
				default:
					$result[$key]['align'] = '';
				break;
			}
		}
		return $result;
	}

	function get_main_seo($uri = false)
	{
		if($uri)
		{
			$this->db->select('title, meta_keywords, meta_description');
			$this->db->from('pages');
			$this->db->where('uri',$uri);
			$this->db->where('is_main_seo',1);
			$this->db->limit(1);
			$data = $this->db->get()->row_array();
			if(!empty($data))
			{
				set_seo($data);
			}
		}
		return;
		}
}