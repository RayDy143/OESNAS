<?php 
	/**
	 * 
	 */
	class FirstTimeLogin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function index(){
			$this->load->view("FirstTimeLogin_page");
		}
	}
 ?>