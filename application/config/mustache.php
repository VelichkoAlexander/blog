<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$template['html_cache']=FALSE;
$template['html_cache_ttl']=300;
$template['engine_config']['cache']='';

$template['active_template'] = 'default';

$template['templates']=array(
		'default'=>array(
							'master_template'=>'index.php',
							'regions'=>'content,title,keywords,description,meta,styles,scripts'
			),
		'ajax'=>array(
							'master_template'=>'index_ajax.php',
							'regions'=>'content'
			)
);

/* End of file mustache.php */
/* Location: ./system/application/config/mustache.php */