<?php 
	/**
	 * 
	 */
	class NasProfile extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('NASModel');
		}
		function profile($id){
			$nas['data']=$this->NASModel->getNasProfile($id);
			$this->load->view("Layout/header");
			$this->load->view("Admin/nas_profile",$nas);
		}
	}
 ?>