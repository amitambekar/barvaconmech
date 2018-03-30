<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('products');
		$this->load->view('includes/footer');
	}
}
