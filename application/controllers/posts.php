<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
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
		if($_GET){

				if( isset( $_GET['page'] ) && is_numeric( $_GET['page'] ) )
					$Offset = (int)( $_GET['page'] - 1 ) * 10;
				else
					$Offset = 0;

				if( isset( $_GET['_search'] ) && $_GET['_search'] !== "" )
						$search = $_GET['_search'];
				else
						$search = "";

				$arrPosts = $this->commonmodel->Posts(10,$Offset,$search);
		}else
				$arrPosts = $this->commonmodel->Posts();
		$m_arrData = array(
				'Page' => 'Posts',
				'Posts' => $arrPosts,
				'RecentPosts'	=> $this->commonmodel->RecentPosts(),
				'RecentComments'	=> $this->commonmodel->RecentComments()
		);
		$this->load->view('posts',$m_arrData);
	}

	public function postdetails( $IdPost = "" ){

		if( is_numeric( $IdPost ) )
			$IdPost = (int)$IdPost;
		else
			$IdPost = 0;

		$m_arrData = array(
				'Page' => 'PostDetails',
				'PostDetails' => $this->commonmodel->PostDetails( $IdPost ),
				'Comments'	=> $this->commonmodel->Comments( $IdPost ),
				'RecentPosts'	=> $this->commonmodel->RecentPosts(),
				'RecentComments'	=> $this->commonmodel->RecentComments()
		);

		$this->load->view('postdetails',$m_arrData);
	}

	public function addcomment(){
		if($_POST){
			echo $this->commonmodel->AddComment();
		}
	}

	public function addcontact(){
		if($_POST){
			echo $this->commonmodel->AddContact();
		}
	}

	public function about(){
		$m_arrData = array();
		$this->load->view('about',$m_arrData);
	}
	public function contact(){
		$m_arrData = array();
		$this->load->view('contact',$m_arrData);
	}

	public function views(){
		if($_POST)
			$this->commonmodel->Views();
	}

}
?>
