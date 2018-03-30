<?php
$CI =& get_instance();
function dump($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function send_email($data = array()) {
	global $CI;
	$CI->load->library('email');
	$to = $data['to'];
	$subject = $data['subject'];
	$html = $data['html'];
	if(isset($data['from']) && $data['from'] != '')
	{
		$from = $data['from']['email'];
		$name = $data['from']['name'];			
	}else{
		$from = "sales@barvaconmech.com";
		$name = "Barva ConMech";						
	}

	
$config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'html';
	$config['useragent']           = "CodeIgniter";
    $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
    $config['protocol']            = "smtp";
    $config['smtp_host']           = "localhost";
    $config['smtp_port']           = "25";

    $CI->email->initialize($config);
	
    $CI->email->from($from, $name);
    $CI->email->to($to);

    $CI->email->subject($subject);
    $CI->email->message($html);

    if($_SERVER['SERVER_NAME'] != 'localhost')
	{
		$CI->email->send();	
	}
    /*echo "SUCCESS";
    print_r($CI->email->print_debugger());
    
    print_r($data);*/
}

function responseObject($response = array())
{
	header('Content-type: application/json');
	return json_encode($response);
}

function product_image($path,$width = 70,$height=70)
{
	return base_url('timthumb.php?src='.base_url('uploads/products/'.$path).'&w='.$width.'&h='.$height);
}

//$CI->output->enable_profiler(TRUE);
?>