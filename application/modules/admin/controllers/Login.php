<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	public function __construct() 
	{
		parent::__construct();

    }
	public function index()
	{
		$this->load->view('login');
		if($this->input->post())
		{
			$response = array();
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->load->model('admin/Login_model');
			$data = $this->Login_model->login($email,$password);
			if(!empty($data))
			{
				$this->session->set_userdata($data);
				redirect('admin/home');
			}else
			{
				$this->session->set_flashdata('message', 'Email and Password does not match');
				redirect('admin/login');
			}
		}
	}
}