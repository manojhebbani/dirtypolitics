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
			
                     if(!isset($arrHeadres['Http-Security-Key']) || ($arrHeadres['Http-Security-Key'] != $CI->config->item('APP_SECURITY_KEY')))
			{
				$arrErrors[] = "Secret key is not passed or in-correct secret key."; 
			}
    	}
    	
    	return $arrErrors;
    }
}
?>