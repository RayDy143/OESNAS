<?php 
	/**
	 * 
	 */
	class MyProfile extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function index(){
			$this->load->view('Layout/header');
			$this->load->view('Admin/user_profile_page');
		}
	}
 ?>