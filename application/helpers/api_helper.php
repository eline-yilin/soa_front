<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_api_request'))
{
    function my_api_request($url , $method = 'get', $param = array())
    {
    	$CI =& get_instance();
    	$api_url  = config_item('api_url');
    	$final_url = $api_url . $url;
    	$username = config_item('api_username');
    	$password = config_item('api_password');
    	$current_user = null;
    	if($CI->session){
    		$current_user = $CI->session->userdata('user');
    	}
    	$user_id = 0;
    	if($current_user){
    		$user_id = $current_user['id'];
    	}
    	$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		 
		$method = strtolower($method);
		switch ($method){
			case 'get':
				$final_url .= "?user_id=$user_id";
				if(count($param))
				{
					$final_url .= '&' . http_build_query($param) ;
				}
				
				break;
    		case 'post':
    			curl_setopt($ch, CURLOPT_POST, 1);
    			curl_setopt($ch, CURLOPT_POSTFIELDS,$param);
    			break;
			default: break;
		}
		
		curl_setopt ( $ch, CURLOPT_URL,  $final_url );
		// 执行并获取HTML文档内容
		$output = curl_exec ( $ch );
		// 释放curl句柄
		curl_close ( $ch );
		//var_dump($output);die;
		return $output;
       
    }   
}