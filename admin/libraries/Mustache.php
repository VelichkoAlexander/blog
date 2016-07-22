<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mustache
{
	
	private $CI;
	private $buffer;
	private $template;
	private $config;
	public  $cache;

	function __construct()
	{
		include(APPPATH.'config/mustache'.EXT);
		include(APPPATH.'libraries/mustache_library'.EXT);
		
		if (isset($template))
		{
			$this->config=$template;
			$this->set_template();
			$this->cache=$template['html_cache'];
			$this->cache_ttl=$template['html_cache_ttl'];
		}

		$this->engine = new Mustache_Engine(array(
		'template_class_prefix' => '__MyTemplates_',
		'cache' => APPPATH.'cache/mustache',
		'cache_file_mode' => 0666,
		'loader' => new Mustache_Loader_FilesystemLoader(APPPATH.'views/'),
		// 'partials_loader' => new Mustache_Loader_FilesystemLoader(APPPATH.'views'),
		'escape' => function($value) {
		return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
		},
		'charset' => 'UTF-8',
		//'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
		'strict_callables' => true,
		));
		
	}

	function cached($ttl=FALSE)
	{
		$this->cache=TRUE;
		if ($ttl) $this->cache_ttl=$ttl;
		return $this;
	}

	private function clear_buffer($region)
	{
		if (array_key_exists($region,$this->buffer))
		{
			$this->buffer[$region]='';	
			return TRUE;
		}
		
		return FALSE;
	}

	function set_template($name=FALSE)
	{
		if($name AND array_key_exists($name, $this->config['templates']))
		{
			$this->template=$name;
		}
		else
		{
			$this->template=$this->config['active_template'];	
		}
		$regions=array();		

		foreach (explode(',',$this->config['templates'][$this->template]['regions']) as $region)
		{
			$regions[$region]='';
		}
		$this->buffer=$regions;

	}

	function check_buffer($name)
	{
		return array_key_exists($name, $this->buffer);
	}

	function add_meta($data)
	{
		foreach($data as $elem)
		{
			if(isset($elem['tag']) AND $elem['tag'])
			{
				$meta_tag = '<'.$elem['tag'].' ';
				unset($elem['tag']);
			}
			else
			{
				$meta_tag = '<meta ';
			}
			foreach($elem as $attr => $value)
			{
				$meta_tag .= $attr.'="' . htmlspecialchars(strip_tags($value)) . '" ';
			}
			$meta_tag .= '/>' . PHP_EOL;
			$this->write('meta', $meta_tag);
		}
	}

	function write($region, $data, $overwrite=FALSE)
	{
		if ($this->check_buffer($region))
		{
			if ($overwrite)
			{
				$this->buffer[$region]=$data;	
			}
			else
			{
				$this->buffer[$region]=$this->buffer[$region].$data;
			}
		}
	}
	
	function write_view($region, $file, $overwrite=FALSE)
	{
		$data=file_get_contents(APPPATH.'views/'.$file.'.mustache');
		if ($this->check_buffer($region))
		{
			if ($overwrite)
			{
				$this->buffer[$region]=$data;	
			}
			else
			{
				$this->buffer[$region]=$this->buffer[$region].$data;
			}
		}
	}

	function parse_view($region, $template, $data, $overwrite=FALSE, $return=FALSE)
	{
		if ($this->check_buffer($region))
		{
			if ($this->cache)
			{
				$this->CI =& get_instance();
				$cache_name='partitial_'.implode('|', $this->CI->uri->rsegments).'|'.$region.'|'.str_replace('/', '|', $template);
				
				$this->CI->load->driver('cache', array('adapter' => 'file'));

				if (!$buffer = $this->CI->cache->get($cache_name))
				{
					$tpl = $this->engine->loadTemplate($template);
					$buffer=$tpl->render($data);
					$this->CI->cache->save($cache_name, $buffer, $this->cache_ttl);
				}
			}
			else
			{
				$tpl = $this->engine->loadTemplate($template);
				$buffer=$tpl->render($data);
			}
			if(!$return)
			{
				if ($overwrite)
				{
					$this->buffer[$region]=$buffer;	
				}
				else
				{
					$this->buffer[$region]=$this->buffer[$region].$buffer;
				}
			}
			else
			{
				return $buffer;
			}
		}
		$this->cache=$this->config['html_cache'];
		$this->cache_ttl=$this->config['html_cache_ttl'];
	}

	function render($return = FALSE)
	{

		$this->CI =& get_instance();

		$template=$this->template;
		$buffer=$this->buffer;
		
		if ($this->cache)
		{
			$cache_name=implode('|', $this->CI->uri->rsegments);
			$this->CI->load->driver('cache', array('adapter' => 'file'));

			if (!$output = $this->CI->cache->get($cache_name))
			{
				$output = $this->CI->load->view($this->config['templates'][$template]['master_template'], $buffer, TRUE);
				$this->CI->cache->save($cache_name, $output, $this->cache_ttl);
			}
		}
		else
		{
			$output = $this->CI->load->view($this->config['templates'][$template]['master_template'], $buffer, TRUE);
		}

		if($return)
		{
			return $output;
		}	
		else
		{
			echo $output;
		}
	}

	function add_js($file,$abs=FALSE)
	{
		if($abs){$path=$file;}else{$path='/js/'.$file;}

		$html='<script src="'.$path.'.js"></script>';
		$this->write('scripts', $html);
	}
	function add_css($file,$abs=FALSE)
	{
		if($abs){$path=$file;}else{$path='/css/'.$file;}

		$html='<link rel="stylesheet" media ="all" href="'.$path.'.css" />';
		$this->write('styles', $html);
	}
}
