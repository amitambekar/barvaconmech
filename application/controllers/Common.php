<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Common_model');
    }

	public function enquiry()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$response = array();
			$name = $this->input->post('name');
			$contact_number = $this->input->post('contact_number');
			$result = $this->Common_model->contact_us($name,$contact_number,"","","","","Enquiry");
			if($result > 0)
			{
				$html = "Hi,</br>Enquiry Details:</br>Name:".$name."</br>Contact Number:".$contact_number;
				$data = array(
						'to'=>'raju@barvaconmech.com',
						'subject'=>'Enquiry Received',
						'from'=>array('email'=>'info@barvaconmech.com','name'=>'Info Barva ConMech'),
						'html'=>$html
						);
				send_email($data);
				$status = 'success';
				$message = 'Successfully added';
			}
			$response = array('status'=>$status,'message'=>$message);	
			echo responseObject($response);
		}
	}

	public function contact_us()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$response = array();
			$name = $this->input->post('name');
			$contact_number = $this->input->post('contact_number');
			$company_name = $this->input->post('company_name');
			$interests = $this->input->post('interests');
			$query = $this->input->post('query');
			$requirement = $this->input->post('requirement');
			$result = $this->Common_model->contact_us($name,$contact_number,$company_name,$interests,$query,$requirement);
			$interests_list=$this->Common_model->getProductListById(explode(",",$interests));
			$interests_list_name=array();
			foreach($interests_list as $i)
			{
				$interests_list_name[] = $i['product_name'];
			}
			if($result > 0)
			{
				$html = "<html>Hi,</br>Contact Us Details:</br>Name:".$name."</br>Contact Number:".$contact_number."</br>Company Name:".$company_name."</br>interests:".implode(",", $interests_list_name)."</br>"."Query:".$query."</br>Requirements:".$requirement."</html>";
				$data = array(
						'to'=>'raju@barvaconmech.com',
						'subject'=>'Enquiry Received',
						'from'=>array('email'=>'info@barvaconmech.com','name'=>'Info Barva ConMech'),
						'html'=>$html
						);
				send_email($data);
				$status = 'success';
				$message = 'Successfully added';
			}
			$response = array('status'=>$status,'message'=>$message);	
			echo responseObject($response);
		}
	}
}
