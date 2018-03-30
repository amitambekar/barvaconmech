<?php

class Common_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function getConfigurationsData($type = '')
    {
    	$this->db->trans_start();
    	$this->db->select('*');
		$this->db->from('text_configurations as tc');
		$this->db->where('tc.type',$type);
		$this->db->where('tc.status','active');
		$this->db->order_by("tc.id", "desc"); 
		$this->db->limit(1);
		$query = $this->db->get();
		$data = array();
		foreach($query->result() as $row)
		{
			$data = array(
						'id'=>$row->id,
						'type'=>$row->type,
						'data'=>$row->data,
						'status'=>$row->status
						);
		}
    	$this->db->trans_complete();
    	return $data;
    }
    function getCategoryProductList()
    {
    	$this->db->trans_start();
    	$this->db->select('psc.id as category_id,psc.category_name as category_name');
		$this->db->from('product_service_category as psc');
		$query = $this->db->get();
		$response = array();
		foreach ($query->result() as $row)
		{
			$this->db->select('ps.id as product_id,ps.product_name as product_name');
			$this->db->from('product_service as ps');
			$this->db->where('ps.category_id',$row->category_id);
			$query1 = $this->db->get();
			$product_array = array();
			foreach ($query1->result() as $row1)
			{
				$product_array[] = (array)$row1;	
			}
			$response[] = array(
							"category_id"=>$row->category_id,
							"category_name"=>$row->category_name,
							"product_array"=>$product_array
							);
		}

		//print_r($response);
		$this->db->trans_complete();
		return $response;
    }

    function getProductList()
    {
    	$this->db->trans_start();
    	$this->db->select('*,ps.id as product_id');
		$this->db->from('product_service as ps');
		//$this->db->join('product_service_category as psc', 'psc.id = ps.category_id','left');
		$this->db->where('ps.status','active');
		$this->db->order_by("ps.id", "desc"); 
		$query = $this->db->get();
		$data = array();
		foreach ($query->result() as $row) {
			$data[] = array(
							'product_id'=>$row->product_id,
							'product_name'=>$row->product_name,
							'product_description'=>$row->description,
				 			);
		}
    	$this->db->trans_complete();
    	return $data;
    }

    function getProductListById($product_ids=array())
    {
    	$this->db->trans_start();
    	$this->db->select('*,ps.id as product_id');
		$this->db->from('product_service as ps');
		//$this->db->join('product_service_category as psc', 'psc.id = ps.category_id','left');
		$this->db->where('ps.status','active');
		$this->db->where_in('ps.id', $product_ids);
		$this->db->order_by("ps.id", "desc"); 
		$query = $this->db->get();
		$data = array();
		foreach ($query->result() as $row) {
			$data[] = array(
							'product_id'=>$row->product_id,
							'product_name'=>$row->product_name,
							'product_description'=>$row->description,
				 			);
		}
    	$this->db->trans_complete();
    	return $data;
    }

    function getProducts()
    {
    	$this->db->trans_start();
    	$this->db->select('*,psc.id as category_id');
		$this->db->from('product_service_category as psc');
		$this->db->join('product_service as ps', 'ps.category_id = psc.id','inner');
		$this->db->where('ps.id !=','');
		$this->db->where('psc.status','active');
		//$this->db->group_by('psc.id'); 
		
		$query = $this->db->get();
		
		$category_data = array();
		$category_main_data = array();
		$main_data = array();
		foreach($query->result() as $row)
		{
			$category_data = array(
							'category_name'=>$row->category_name,
							'category_id'=>$row->category_id,
							);

			$this->db->select('*,ps.id as product_id');
			$this->db->from('product_service as ps');
			//$this->db->join('product_service_category as psc', 'psc.id = ps.category_id','left');
			$this->db->where('ps.category_id',$row->category_id);
			$this->db->where('ps.status','active');
			$query1 = $this->db->get();
			$product_data = array();
			$product_data1 = array();
			foreach($query1->result() as $row)
			{
				$product_data = array(
									'product_id'=>$row->product_id,
									'product_name'=>$row->product_name,
									'product_description'=>$row->description,
									);

				$this->db->select('*');
				$this->db->from('media as m');
				$this->db->where('m.product_id',$row->product_id); 
				$query2 = $this->db->get();
				$media_data = array();
				foreach($query2->result() as $row)
				{
					$media_data[] = array(
									'image_path'=>$row->image_path,
									'main'=>$row->main,
									'type'=>$row->type,
									'media_id'=>$row->media_id
									);
				}
		    	$product_data['images'] = $media_data;
		    	$product_data1[] = $product_data;
			}

	    	$category_main_data['category_data'] = $category_data;
	    	$category_main_data['category_data']['product_data'] = $product_data1;
	    	$main_data[] = $category_main_data;
	    	
		}
		//$main_data = $category_main_data;
    	$this->db->trans_complete();
		return $main_data;
    }

 	function enquiry($name,$contact_number)
 	{
 		$this->db->trans_start();
        $array = array('name' => $name,'contact_number'=>$contact_number,'created_date' => date("Y-m-d H:i:s"));
		$this->db->set($array);
		$this->db->insert('enquiry');
		$last_inserted_id = $this->db->insert_id();
		$this->db->trans_complete();
        return $last_inserted_id;
 	}

 	function contact_us($name="",$contact_number="",$company_name="",$interests="",$query="",$requirement="",$type="Contact Us")
 	{
 		$this->db->trans_start();
        $array = array('name' => $name,'contact_number'=>$contact_number,'company_name'=>$company_name,'interests'=>$interests,'query'=>$query,'requirement'=>$requirement,'type'=>$type,'created_date' => date("Y-m-d H:i:s"));
		$this->db->set($array);
		$this->db->insert('contact_us');
		$last_inserted_id = $this->db->insert_id();
		$this->db->trans_complete();
        return $last_inserted_id;
 	} 
}