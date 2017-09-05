<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
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

			$m_arrData = array(
					'Posts'			=> 	$this->commonmodel->GetPosts()
			);
			$this->load->view('dashboard', $m_arrData);

	}
}
