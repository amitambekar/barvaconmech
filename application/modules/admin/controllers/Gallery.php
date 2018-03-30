<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MX_Controller {
	public function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Gallery_model');
   		$this->menu_active = 'products';
    }
	public function index()
	{
		
		//$pscmList = $this->Gallery_model->getPscmList();
		//$data['pscm_list'] = $pscmList;
		//$productList = $this->Gallery_model->getProductList();
		//$data['product_list'] = $productList;
		$this->load->view('includes/header');
		$this->load->view('gallery',$data);
		
	}

	public function add()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$category_id = $this->input->post('category_name');
			$product_name = $this->input->post('product_name');
			$product_description = $this->input->post('product_description');
			$filesCount=isset($_FILES['product_images']['name'])? count($_FILES['product_images']['name']):0;
			$this->form_validation->set_rules('category_name', 'Category Name', 'required');
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_description', 'Product Description', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        $allowed =  array('gif','png' ,'jpg','jpeg');
	    	if ($filesCount == 0)
	        {
	            $error_array['product_images'] = 'Please choose files for upload';
	        }
	        else
	        {
				$files = $_FILES['product_images']['name'];
				$error = false;
				foreach($files as $f)
				{	
					$ext = pathinfo($f, PATHINFO_EXTENSION);
					if(!in_array($ext,$allowed) ) {
					    $error = true;
					}
				}
				if($error == true)
				{
					$error_array['product_images'] = 'Please choose valid format images';
				}
	        }
	        if(count($error_array) == 0 )
	        {
	        	$last_inserted_id = $this->Products_model->addProduct($category_id,$product_name,$product_description);	

	        	$this->load->library('upload');
			    $config['upload_path'] = FCPATH . 'uploads/products/';
			    $config['allowed_types'] = 'gif|jpg|png';
			    $files = $_FILES['product_images'];
	        	$count = 0;
	        	for ($i = 0; $i < $filesCount; $i++) {
			        $_FILES['uploadedimage']['name'] = time().'_'.rand(1111,9999).'_'.$files['name'][$i];
			        $_FILES['uploadedimage']['type'] = $files['type'][$i];
			        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
			        $_FILES['uploadedimage']['error'] = $files['error'][$i];
			        $_FILES['uploadedimage']['size'] = $files['size'][$i];
			        //now we initialize the upload library
			        $this->upload->initialize($config);
			        $data = array();
			        if ($this->upload->do_upload('uploadedimage'))
			        {
			        	$data['uploads'][$i] = $this->upload->data();
			        }
			        
			        $main = 0;
	        		if($count == 0)
	        		{
	        			$main = 1;
	        		}
			        if(isset($data['uploads']) && count($data['uploads']) > 0)
			        {
			        	
			        	foreach ($data['uploads'] as $du)
			        	{
			        		$product_id = $last_inserted_id;
			        		$image_path = $du['file_name'];
			        		$type= 'product';
			        		$created_date = date("Y-m-d H:i:s");
			        		$this->Products_model->addMedia($product_id,$image_path,$type,$created_date,$main);
			        	}
			        }
			        $count ++;
			    }
			    $status = 'success';
			    $message = 'Added successfully';
	        }else
	        {
	        	$status = 'error';
	        	$message = $error_array;
	        }
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		}
	}

	public function edit($id = 0)
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$product_id = $this->input->post('product_id');
			$category_id = $this->input->post('category_name');
			$product_name = $this->input->post('product_name');
			$product_description = $this->input->post('product_description');
			$filesCount=isset($_FILES['product_images']['name'])? count($_FILES['product_images']['name']):0;
			$image_count = $this->input->post('image_count');

			$this->form_validation->set_rules('category_name', 'Category Name', 'required');
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_description', 'Product Description', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        $allowed =  array('gif','png' ,'jpg','jpeg');
	    	if ($filesCount == 0 && $image_count == 0)
	        {
	            $error_array['product_images'] = 'Please choose files for upload';
	        }
	        else if ($filesCount > 0 && $image_count > 0)
	        {
				$files = $_FILES['product_images']['name'];
				$error = false;
				foreach($files as $f)
				{	
					$ext = pathinfo($f, PATHINFO_EXTENSION);
					if(!in_array($ext,$allowed) ) {
					    $error = true;
					}
				}
				if($error == true)
				{
					$error_array['product_images'] = 'Please choose valid format images';
				}
	        }
	        if(count($error_array) == 0 )
	        {
	        	$this->Products_model->editProduct($category_id,$product_name,$product_description,$product_id);	
	        	if($filesCount > 0)
	        	{
		        	$this->load->library('upload');
				    $config['upload_path'] = FCPATH . 'uploads/products/';
				    $config['allowed_types'] = 'gif|jpg|png';
				    $files = $_FILES['product_images'];
		        	$count = 0;
		        	for ($i = 0; $i < $filesCount; $i++)
		        	{
				        $_FILES['uploadedimage']['name'] = time().'_'.rand(1111,9999).'_'.$files['name'][$i];
				        $_FILES['uploadedimage']['type'] = $files['type'][$i];
				        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
				        $_FILES['uploadedimage']['error'] = $files['error'][$i];
				        $_FILES['uploadedimage']['size'] = $files['size'][$i];
				        //now we initialize the upload library
				        $this->upload->initialize($config);
				        $data = array();
				        if ($this->upload->do_upload('uploadedimage'))
				        {
				        	$data['uploads'][$i] = $this->upload->data();
				        }
				        
				        $main = 0;
		        		if($count == 0)
		        		{
		        			$main = 1;
		        		}
				        if(isset($data['uploads']) && count($data['uploads']) > 0)
				        {
				        	foreach ($data['uploads'] as $du)
				        	{
				        		$image_path = $du['file_name'];
				        		$type= 'product';
				        		$created_date = date("Y-m-d H:i:s");
				        	$this->Products_model->addMedia($product_id,$image_path,$type,$created_date,$main);
				        	}
				        }
				        $count ++;
				    }
				}
			    $status = 'success';
			    $message = 'Edited successfully';
	        }else
	        {
	        	$status = 'error';
	        	$message = $error_array;
	        }
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		} else {
			$pscmList = $this->Pscm_model->getPscmList();
			$data['pscm_list'] = $pscmList;
			$productDetails = $this->Products_model->getProduct($id);
			$data['product_details'] = $productDetails;
			$this->load->view('includes/header');
			$this->load->view('edit_products',$data);
		}
	}

	public function edit1($id = 0)
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
			$pscmList = $this->Pscm_model->getPscmList();
			$data['pscm_list'] = $pscmList;
			$productDetails = $this->Products_model->getProduct($id);
			$data['product_details'] = $productDetails;
			$this->load->view('includes/header');
			$this->load->view('edit_products',$data);
		}
	}

	public function delete($id = 0)
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$id = $this->input->post('id');
			$this->Products_model->deleteProducts($id);
			$this->Products_model->deleteMedia($id);
			
			$status = 'success';
			$message = 'successfully deleted';	
		
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		}
	}

	public function delete_product_media($id = 0)
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$media_id = $this->input->post('media_id');
			$this->Products_model->deleteProductMedia($media_id);
			
			$status = 'success';
			$message = 'successfully deleted';	
		
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		}
	}
}