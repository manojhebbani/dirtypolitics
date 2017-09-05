<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Apis
{  
	//
    function validateHeaders($p_arrHeaders = "")
    {
    	$CI =& get_instance();
    	
    	$arrErrors = array();
    	
    	if($p_arrHeaders == "" || !$p_arrHeaders)
    	{
    		$arrErrors[] = "Invalid Data"; 
    	}else
    	{
    		$arrHeadres = $p_arrHeaders;
			
			if(!isset($arrHeadres["HTTP_UUID"]))
			{
				$arrErrors[] = "Device ID is not passed."; 
			}elseif(!isset($arrHeadres['HTTP_SECURITY_KEY']) || ($arrHeadres['HTTP_SECURITY_KEY'] != $CI->config->item('APP_SECURITY_KEY')))
			{
				$arrErrors[] = "Secret key is not passed or in-correct secret key."; 
			}elseif(!isset($arrHeadres['DEVICEOS']))
			{
				$arrErrors[] = "Invalid request. There is no device os parameter."; 
			}
    	}
    	
    	return $arrErrors;
    }
}
?>