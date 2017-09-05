<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
	    // Construct our parent class
	    parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('commonmodel');

	}
	public function index()
	{
		$strSessKey = md5(date("Y-m-d")."-".$this->session->userdata('HOSPCODE'));
		if ( (isset($_COOKIE["AUTHCOOKIE"])) && ( $this->session->userdata('IsLoggedIn') == true ) && ( $this->session->userdata('SESSKEY') === $strSessKey ) ) {
			redirect(base_url().'index.php/dashboard', 'refresh');
		}
		$m_arrData = array(
				'LoginErrorMessage' => '',
		);
		$this->load->view('login', $m_arrData);
	}

	public function login()
  {

		if(count($_POST))
        {

            $strStoreCode = trim($this->input->post('strHospCode'));

            $strPassword = md5(trim($this->input->post('strPassword')));

	           $this->load->model("commonmodel");

	           $response = (array)$this->commonmodel->HospitalLogin($strStoreCode,$strPassword);

                if(count($response) > 0)
                {

										$strSessKey = md5(date("Y-m-d")."-".$response[0]['IdUser']);

										setcookie('AUTHCOOKIE', $strStoreCode, strtotime('today 23:59'), '/');

          					$this->session->set_userdata('IsLoggedIn',1);

          					$this->session->set_userdata('HOSPCODE', $response[0]['IdUser']);

										$this->session->set_userdata('HOSPUSERNAME', $strStoreCode);

										$this->session->set_userdata('SESSKEY', $strSessKey);

										$this->session->set_userdata('DISPLAYNAME', $response[0]['DisplayName']);

                    echo json_encode(array('Status' => true, 'response' => ''));
               }
               else
               {
                    echo json_encode(array('Status' => false, 'response' => 'Invalid Credentials'));
               }
            }
            else
            {
               echo json_encode(array('Status' => false, 'response' => 'Invalid Credentilas'));
            }
		}

		public function logout(){
			unset($_COOKIE['AUTHCOOKIE']);
			setcookie('AUTHCOOKIE', '', time()-3600, '/', false);
			$this->session->sess_destroy();
			header('Location: ' . base_url().'index.php/login');
		}
}
?>
