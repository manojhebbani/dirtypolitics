<?php

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
		    $this->load->helper(array('form', 'url'));
		    $this->load->library('form_validation');
        $this->IsUserLoggedIn();
    }

    function IsUserLoggedIn() {

        $strSessKey = md5(date("Y-m-d")."-".$this->session->userdata('HOSPCODE'));
        if ((isset($_COOKIE["AUTHCOOKIE"])) && ($this->session->userdata('IsLoggedIn') == true) && ($this->session->userdata('SESSKEY') === $strSessKey))
            return true;
        else {
        			$m_arrData = array(
        				'LoginErrorMessage' => 'Session has expired!',
        			);
        			$return = $this->load->view('login', $m_arrData, TRUE);
        			exit($return);

        }
    }

}
