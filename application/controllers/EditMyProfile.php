<?php 
	/**
	 * 
	 */
	class EditMyProfile extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->Model("UserInfoModel");
		}
		function index(){
			if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/FirstTimeLogin'));
					}else{
						$this->load->view('Layout/header');
						$this->load->view('Admin/edit_user_profile_page');
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
			
		}
		function edit(){
			$where = array('UserID' => $_SESSION['UserID'] );
			$fields = array('Firstname' => $this->input->post('Firstname'),
							'Middlename' => $this->input->post('Middlename'),
							'Lastname' => $this->input->post('Lastname'),
							'Gender'=> $this->input->post('Gender'),
							'Address' => $this->input->post('Address'),
							'Birthdate' => $this->input->post('Birthdate'),
							'ContactNumber' => $this->input->post('ContactNumber'));
			$query=$this->UserInfoModel->editInfo($fields,$where);
			if($query){
				$sess['data']=$this->UserInfoModel->getUserInfo($_SESSION['UserID']);
				$this->session->set_userdata($sess['data'][0]);
				header("location:".base_url('index.php/MyProfile'));
			}else{
				echo "Error Occured";
			}
		}
	}
 ?>