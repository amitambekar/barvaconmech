<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('home');
	}

	/*public function clear_all_cache()
	{
		$path = $this->config->item('cache_path');

	    $cache_path = ($path == '') ? APPPATH.'cache/' : $path;

	    $handle = opendir($cache_path);
	    while (($file = readdir($handle))!== FALSE) 
	    {
	        //Leave the directory protection alone
	        if ($file != '.htaccess' && $file != 'index.html')
	        {
	           @unlink($cache_path.'/'.$file);
	        }
	    }
	    closedir($handle);
	}*/

}