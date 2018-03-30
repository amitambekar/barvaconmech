<?php

class Products_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function addProduct($category_id,$product_name,$product_description){
        
		$category_id = $category_id;
		$product_name = $product_name;
		$product_description = $product_description;
		$this->db->trans_start();
        $array = array('category_id' => $category_id,'product_name'=>$product_name,'description'=>$product_description, 'created_date' => date("Y-m-d H:i:s"),'status'=>'active');
		$this->db->set($array);
		$this->db->insert('product_service');
		$last_inserted_id = $this->db->insert_id();
		$this->db->trans_complete();
        return $last_inserted_id;
    }

    function editProduct($category_id,$product_name,$product_description,$product_id){
        $product_id = $product_id;
		$category_id = $category_id;
		$product_name = $product_name;
		$product_description = $product_description;
		
		$this->db->trans_start();
        $array = array('category_id' => $category_id,'product_name'=>$product_name,'description'=>$product_description, 'created_date' => date("Y-m-d H:i:s"),'status'=>'active');
		$this->db->where('id', $product_id);
		$res = $this->db->update('product_service', $array); 

		$this->db->trans_complete();
        return $res;
    }

    function addMedia($product_id,$image_path,$type,$created_date,$main){
        
		$product_id = $product_id;
		$image_path = $image_path;
		$type = $type;
		$main = $main;
		$created_date = $created_date;
		$this->db->trans_start();
        $array = array('product_id' => $product_id,'image_path'=>$image_path,'type'=>$type, 'created_date' =>$created_date,'main'=>$main,'status'=>'active');
		$this->db->set($array);
		$this->db->insert('media');
		$last_inserted_id = $this->db->insert_id();
		$this->db->trans_complete();
        return $last_inserted_id;
    }

    function getProductList()
    {
    	$this->db->trans_start();
    	$this->db->select('*,ps.id as product_id');
		$this->db->from('product_service as ps');
		$this->db->join('product_service_category as psc', 'psc.id = ps.category_id','left');
		$this->db->where('ps.status','active');
		$this->db->order_by("ps.id", "desc"); 
		$query = $this->db->get();
		$data = $query->result();
    	$this->db->trans_complete();
    	return $data;
    }

    function getProduct($id = 0)
    {
    	$this->db->trans_start();
    	$this->db->select('*,ps.id as product_id');
		$this->db->from('product_service as ps');
		$this->db->join('product_service_category as psc', 'psc.id = ps.category_id','left');
		$this->db->where('ps.status','active');
		$this->db->where('ps.id',$id);
		
		$query = $this->db->get();
		$product_data = array();
		foreach($query->result() as $row)
		{
			$product_data = array(
							'product_id'=>$row->product_id,
							'category_name'=>$row->category_name,
							'product_name'=>$row->product_name,
							'product_description'=>$row->description,
							'category_id'=>$row->category_id,
							);
		}
    	$this->db->trans_complete();

    	$this->db->trans_start();
    	$this->db->select('*');
		$this->db->from('media as m');
		$this->db->where('m.product_id',$id); 
		$query = $this->db->get();
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = array(
							'image_path'=>$row->image_path,
							'main'=>$row->main,
							'type'=>$row->type,
							'media_id'=>$row->media_id
							);
		}
    	$product_data['images'] = $data;
    	
    	$this->db->trans_complete();
    	return $product_data;
    }

    function editPscm($category_name,$id){
		
		$category_name = $category_name;
		$id = $id;

		$this->db->trans_start();
        $array = array('category_name' => $category_name);
        $this->db->where('id', $id);
		$res = $this->db->update('product_service_category', $array); 
		$this->db->trans_complete();
        return $res;
    }
	
    function deleteProducts($id){

		$id = $id;
		$this->db->trans_start();
		$this->db->where('id', $id);
		$res = $this->db->delete('product_service'); 
		$this->db->trans_complete();
        return $res;
    }
	
	function deleteMedia($id){

		$id = $id;
		$this->db->trans_start();
		
		$this->db->select('*');
		$this->db->from('media');
		$this->db->where('product_id',$id); 
		$query = $this->db->get();
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = array(
							'id'=>$row->media_id,
							'image_path'=>$row->image_path,
							);
		}
		$this->db->trans_complete();
		
		$this->db->trans_start();
		foreach($data as $d)
		{
			$this->db->where('media_id', $d['id']);
			$this->db->delete('media'); 
			unlink('uploads/products/'.$d['image_path']);
		}
		$this->db->trans_complete();
        return 1;
    }

    function deleteProductMedia($media_id){

		$this->db->trans_start();
		
		$this->db->select('*');
		$this->db->from('media');
		$this->db->where('media_id',$media_id); 
		$query = $this->db->get();
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = array(
							'id'=>$row->media_id,
							'image_path'=>$row->image_path,
							);
		}
		$this->db->trans_complete();
		
		$this->db->trans_start();
		foreach($data as $d)
		{
			$this->db->where('media_id', $d['id']);
			$this->db->delete('media'); 
			unlink('uploads/products/'.$d['image_path']);
		}
		$this->db->trans_complete();
        return 1;
    }
}