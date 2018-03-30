<?php 
$CI = & get_instance();
//print_r($_SERVER['REQUEST_URI']);

function login()
{
	global $CI;
	$controller_name = $CI->uri->segment(1);
	$controller_name1 = $CI->uri->segment(2);
	if($controller_name != 'admin')
	{
		$CI->output->cache(15);
	}
	if($controller_name == "admin" && $controller_name1 != "login" && $CI->session->userdata('email') == '' && $CI->session->userdata('password') == '')
	{
		redirect('admin/login');
	}
}

function isLoginRedirect()
{
	global $CI;
	$redirect_to = "?redirect_to=".urlencode($_SERVER['REQUEST_URI']);
	if ($CI->session->userdata('logged_in') == '' && $CI->uri->segment(1) != "login")
	{ 
		redirect(base_url().'login'.$redirect_to);
	}
	
}



function roleAccessRedirect()
{
	global $CI;
	$controller_name = $CI->uri->segment(1);
	
	$role_id = @$CI->session->userdata['logged_in']['role_id'];
	$data = array();
	if(isset($role_id)  && $controller_name != "login")
	{
		$CI->db->trans_start();
		$CI->db->select('role_access.*');
		$CI->db->from('role_access');
		$CI->db->where('role_id',$role_id);
		$query = $CI->db->get();
		//$CI->output->enable_profiler(TRUE);
		foreach ($query->result() as $row){
			array_push($data,$row->controller);
		}
		$CI->db->trans_complete();
		if(!in_array($controller_name, $data))
		{
			if($role_id == 1)
			{
				redirect(base_url().'dashboard');				
			}else if($role_id == 3 || $role_id == 4)
			{
				redirect(base_url().'timesheet');
			}

		}		
	}

}
?>