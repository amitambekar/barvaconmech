<?php

class Pscm_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function addPscm($category_name){
        
		$category_name = $category_name;
		$this->db->trans_start();
        $array = array('category_name' => $category_name, 'created_date' => date("Y-m-d H:i:s"),'status'=>'active');
		$this->db->set($array);
		$this->db->insert('product_service_category');
		$last_inserted_id = $this->db->insert_id();
		$this->db->trans_complete();
        return $last_inserted_id;
    }

    function getPscmList()
    {
    	$this->db->trans_start();
    	$this->db->select('*');
		$this->db->from('product_service_category');
		$this->db->where('status','active');
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get();
		$data = $query->result();
    	$this->db->trans_complete();
    	return $data;
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