<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Admin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('UserAccountModel');
			$this->load->model('DepartmentModel');
		}
		function index(){
			if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/FirstTimeLogin'));
					}else{
						$data['datas']=$this->UserAccountModel->getAllUsers();
						$data['deps']=$this->DepartmentModel->getAllDepartment();
						$this->load->view("admin_page",$data);
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
			
		}
		public function deleteUser(){
			$query=$this->UserAccountModel->DeleteUser($this->input->post('UserID'));
			$data['success']=false;
			if($query){
				$data['success']=true;
			}
			echo json_encode($data);
		}
		public function getAllUsers(){
			$data=$this->UserAccountModel->getAllUsers();
			/*$data['success']=false;
			if($data){
				$data['success']=true;
			}*/
			echo json_encode($data);
		}
		public function getUserByType(){
			$data=$this->UserAccountModel->getUserByType($this->input->post('ID'));
			/*$data['success']=false;
			if($data){
				$data['success']=true;
			}*/
			echo json_encode($data);
		}
		public function AddNewUser(){
			$datas = array('Email' => $this->input->post('Email'),'Password'=>$this->input->post('Email'),'DepartmentID' => $this->input->post('cmbDepartment'),'UserTypeID'=>$this->input->post('UserTypeID'));
			$query['data']=$this->UserAccountModel->AddNewUser($datas);
			$data['success']=false;
			if($query['data']){
				$data['success']=true;
			}
			echo json_encode($data);
		}
	}
 ?>