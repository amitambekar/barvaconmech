<?php 
class Login_model extends CI_Model {
   	function login($email = '',$password=''){
      	$this->db->trans_start();
      	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',sha1($password));
      	$query = $this->db->get();
      	if($query->num_rows() ==  1){
      		$data = array();
      		foreach ($query->result() as $row){
      			$data = array(
      						'userid'=>$row->id,
      						'email'=>$email,
      						'password'=>$password,
      						'firstname'=>ucfirst($row->firstname),
      						'lastname'=>ucfirst($row->lastname),
      						'profile_img'=>$row->profile_img,
      						'created_date'=>$row->created_date,
      						);
      		}
      		return $data;
      	}
      	$this->db->trans_complete();
   	}
}
?>