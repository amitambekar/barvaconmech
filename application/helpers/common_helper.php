<?php
$CI =& get_instance();
function getConfigurationsData($type = '')
{
	global $CI;
	$CI->load->model('Common_model');
	$result = $CI->Common_model->getConfigurationsData($type);
	return $result;
}

function getProducts()
{
	global $CI;
	$CI->load->model('Common_model');
	$result = $CI->Common_model->getProducts();
	return $result;	
}

function getProductList()
{
	global $CI;
	$CI->load->model('Common_model');
	$result = $CI->Common_model->getProductList();
	return $result;	
}

function getCategoryProductList()
{
	global $CI;
	$CI->load->model('Common_model');
	$result = $CI->Common_model->getCategoryProductList();
	return $result;		
}

//$CI->output->enable_profiler(TRUE);
?>