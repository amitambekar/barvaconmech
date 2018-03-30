<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Textconfig extends MX_Controller {
	public function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Textconfig_model');
    }
	public function index()
	{
		
		$getTextConfiguration = $this->Textconfig_model->getTextConfiguration();
		$data['getTextConfiguration'] = $getTextConfiguration;
		$this->load->view('includes/header');
		$this->load->view('textconfig',$data);
		
	}

	public function add()
	{
		$post = $this->input->post();
		$status = '';
		$message = '';
		$data = $this->Textconfig_model->updateTextConfig($post);
		$status = 'success';
		$message = 'Text Configuration updated successfully';
		
		$response = array('status'=>$status,'message'=>$message);
		echo responseObject($response);
	}

	public function edit($id = 0)
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$category_name = $this->input->post('category_name');
			$id = $this->input->post('id');
			$data = $this->Pscm_model->editPscm($category_name,$id);
			if($data > 0)
			{
				$status = 'success';
				$message = 'successfully updated';	
			}
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		} else {
			$pscmDetails = $this->Pscm_model->getPscm($id);
			$data['pscm_details'] = $pscmDetails;
			$this->load->view('includes/header');
			$this->load->view('edit_pscm',$data);
		}
	}

	public function delete($id = 0)
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$id = $this->input->post('id');
			$data = $this->Pscm_model->deletePscm($id);
			if($data > 0)
			{
				$status = 'success';
				$message = 'successfully deleted';	
			}
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		}
	}
}