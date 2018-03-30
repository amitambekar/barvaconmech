<?php

class Textconfig_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function updateTextConfig($post){
        
		$this->db->trans_start();
        $this->db->select('*');
		$this->db->from('text_configurations');
		$query = $this->db->get();
		$data = $query->result();
		$full_array = array();
		foreach($post as $post_key=>$post_value)
		{
			$array = array("type"=>$post_key,"data"=>$post_value,"status"=>"active","created_date"=>date("Y-m-d"));
			array_push($full_array,$array);
		}
		if(count($data) > 0)
		{
			foreach($full_array as $fa)
			{
				$this->db->where('type', $fa["type"]);
				$res = $this->db->update('text_configurations', $fa); 	
			}
		}else{
			
			foreach($full_array as $fa)
			{
				$this->db->set($fa);
				$this->db->insert('text_configurations');
			}
		}
		$this->db->trans_complete();
    }

    function getTextConfiguration()
    {
    	$this->db->trans_start();
    	$this->db->select('*');
		$this->db->from('text_configurations');
		$this->db->where('status','active');
		$query = $this->db->get();
		$data = $query->result();
    	$this->db->trans_complete();
    	$reponse = array();
    	foreach($data as $d)
    	{
    		$response[$d->type] = (array)$d;
    	}
    	return $response;
    }

    function getPscm($id = 0)
    {
    	$this->db->trans_start();
    	$this->db->select('*');
		$this->db->from('product_service_category');
		$this->db->where('status','active');
		$this->db->where('id',$id);
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get();
		$data = array();
		foreach($query->result() as $row)
		{
			$data = array(
							'id'=>$row->id,
							'category_name'=>$row->category_name,
							'status'=>$row->status,
							);
		}
    	$this->db->trans_complete();
    	return $data;
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
	
    function deletePscm($id){

		$id = $id;
		$this->db->trans_start();
		$this->db->where('id', $id);
		$res = $this->db->delete('product_service_category'); 
		$this->db->trans_complete();
        return $res;
       
    }
	
}