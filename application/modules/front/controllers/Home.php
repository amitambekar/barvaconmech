<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('index');
		$this->load->view('includes/footer');
	}
}
