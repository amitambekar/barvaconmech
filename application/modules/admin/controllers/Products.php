<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MX_Controller {
	public function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Pscm_model');
        $this->load->model('admin/Products_model');
   		$this->menu_active = 'products';
    }
	public function index()
	{
		
		$pscmList = $this->Pscm_model->getPscmList();
		$data['pscm_list'] = $pscmList;
		$productList = $this->Products_model->getProductList();
		$data['product_list'] = $productList;
		$this->load->view('includes/header');
		$this->load->view('products',$data);
		
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
			$product_filesCount=isset($_FILES['product_gallery_images']['name'])? count($_FILES['product_gallery_images']['name']):0;
			$this->form_validation->set_rules('category_name', 'Category Name', 'required');
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_description', 'Product Description', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        $allowed =  array('gif','png' ,'jpg','jpeg');
	    	if ($filesCount == 0)
	        {
	            $error_array['product_images'] = 'Please choose files for upload';
	        }else if ($product_filesCount == 0)
	        {
	            $error_array['product_gallery_images'] = 'Please choose files for upload gallery image';
	        } 
	        
	        if($filesCount > 0)
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

	        if($product_filesCount > 0)
	        {
				$gallery_files = $_FILES['product_gallery_images']['name'];
				$gallery_error = false;
				foreach($gallery_files as $f)
				{	
					$ext = pathinfo($f, PATHINFO_EXTENSION);
					if(!in_array($ext,$allowed) ) {
					    $gallery_error = true;
					}
				}
				if($gallery_error == true)
				{
					$error_array['product_gallery_images'] = 'Please choose valid format gallery images';
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
			    $gallery_files = $_FILES['product_gallery_images'];
			    for ($i = 0; $i < $product_filesCount; $i++) {
			        $_FILES['uploadedgalleryimage']['name'] = time().'_'.rand(1111,9999).'_'.$gallery_files['name'][$i];
			        $_FILES['uploadedgalleryimage']['type'] = $gallery_files['type'][$i];
			        $_FILES['uploadedgalleryimage']['tmp_name'] = $gallery_files['tmp_name'][$i];
			        $_FILES['uploadedgalleryimage']['error'] = $gallery_files['error'][$i];
			        $_FILES['uploadedgalleryimage']['size'] = $gallery_files['size'][$i];
			        //now we initialize the upload library
			        $this->upload->initialize($config);
			        $gallery_data = array();
			        if ($this->upload->do_upload('uploadedgalleryimage'))
			        {
			        	$gallery_data['uploads'][$i] = $this->upload->data();
			        }
			        
			        $main = 0;
	        		if($count == 0)
	        		{
	        			$main = 1;
	        		}
			        if(isset($gallery_data['uploads']) && count($gallery_data['uploads']) > 0)
			        {
			        	
			        	foreach ($gallery_data['uploads'] as $du)
			        	{
			        		$product_id = $last_inserted_id;
			        		$image_path = $du['file_name'];
			        		$type= 'product_gallery';
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

			$gallery_filesCount=isset($_FILES['product_gallery_images']['name'])? count($_FILES['product_gallery_images']['name']):0;
			$gallery_image_count = $this->input->post('gallery_image_count');

			$this->form_validation->set_rules('category_name', 'Category Name', 'required');
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_description', 'Product Description', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        $allowed =  array('gif','png' ,'jpg','jpeg');
	    	if ($filesCount == 0 && $image_count == 0)
	        {
	            $error_array['product_images'] = 'Please choose files for upload';
	        }else if ($gallery_filesCount == 0 && $gallery_image_count == 0)
	        {
	            $error_array['product_gallery_images'] = 'Please choose files for upload gallery image';
	        }
	        if ($filesCount > 0 && $image_count > 0)
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
	        if ($gallery_filesCount > 0 && $gallery_image_count > 0)
	        {
				$gallery_files = $_FILES['product_gallery_images']['name'];
				$error = false;
				foreach($gallery_files as $f)
				{	
					$ext = pathinfo($f, PATHINFO_EXTENSION);
					if(!in_array($ext,$allowed) ) {
					    $error = true;
					}
				}
				if($error == true)
				{
					$error_array['product_gallery_images'] = 'Please choose valid format gallery images';
				}
	        }
	        if(count($error_array) == 0 )
	        {
	        	$this->Products_model->editProduct($category_id,$product_name,$product_description,$product_id);	
	        	
		        	$this->load->library('upload');
				    $config['upload_path'] = FCPATH . 'uploads/products/';
				    $config['allowed_types'] = 'gif|jpg|png';
				if($filesCount > 0)
	        	{
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
				if($gallery_filesCount > 0)
	        	{
				    $gallery_files = $_FILES['product_gallery_images'];
				    for ($i = 0; $i < $gallery_filesCount; $i++)
		        	{
				        $_FILES['uploadedgalleryimage']['name'] = time().'_'.rand(1111,9999).'_'.$gallery_files['name'][$i];
				        $_FILES['uploadedgalleryimage']['type'] = $gallery_files['type'][$i];
				        $_FILES['uploadedgalleryimage']['tmp_name'] = $gallery_files['tmp_name'][$i];
				        $_FILES['uploadedgalleryimage']['error'] = $gallery_files['error'][$i];
				        $_FILES['uploadedgalleryimage']['size'] = $gallery_files['size'][$i];
				        //now we initialize the upload library
				        $this->upload->initialize($config);
				        $gallery_data = array();
				        if ($this->upload->do_upload('uploadedgalleryimage'))
				        {
				        	$gallery_data['uploads'][$i] = $this->upload->data();
				        }
				        
				        $main = 0;
		        		if(isset($gallery_data['uploads']) && count($gallery_data['uploads']) > 0)
				        {
				        	foreach ($gallery_data['uploads'] as $du)
				        	{
				        		$image_path = $du['file_name'];
				        		$type= 'product_gallery';
				        		$created_date = date("Y-m-d H:i:s");
				        	$this->Products_model->addMedia($product_id,$image_path,$type,$created_date,$main);
				        	}
				        }
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