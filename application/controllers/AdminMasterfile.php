<?php 
	/**
	 * 
	 */
	class AdminMasterfile extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index(){
			if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/FirstTimeLogin'));
					}else{
						$this->load->view("Layout/Header");
						$this->load->view("Admin/admin_masterfile_page");
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
		}
	}
 ?>