<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//ADMIN PAGINATION CONFIG
//Customizing links

$config['per_page'] = 10;
$config['num_links'] = 4;
$config['use_page_numbers'] = TRUE;

$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';

$config['first_link'] = '';
$config['first_tag_open'] = '';
$config['first_tag_close'] = '';

$config['last_link'] = '';
$config['last_tag_open'] = '';
$config['last_tag_close'] = '';

$config['next_link'] = '';
$config['next_tag_open'] = '';
$config['next_tag_close'] = '';

$config['prev_link'] = '';
$config['prev_tag_open'] = '';
$config['prev_tag_close'] = '';

$config['cur_tag_open'] = '<li class="active"><span>';
$config['cur_tag_close'] = '</span></li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';

/* End of file pagination.php */
/* Location: /admin/config/pagination.php */