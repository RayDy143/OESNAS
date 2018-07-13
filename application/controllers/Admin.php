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
			$this->load->model('UserModel');
			$this->load->model('DepartmentModel');
		}
		function index(){
			if(isset($_SESSION['Email'])){
				$data['datas']=$this->UserModel->getAllUsers();
				$data['deps']=$this->DepartmentModel->getAllDepartment();
				$this->load->view("admin_page",$data);
			}else{
				header('location:'.base_url());
			}
			
		}
		public function deleteUser(){
			$query=$this->UserModel->DeleteUser($this->input->post('UserID'));
			$data['success']=false;
			if($query){
				$data['success']=true;
			}
			echo json_encode($data);
		}
		public function getAllUsers(){
			$data=$this->UserModel->getAllUsers();
			/*$data['success']=false;
			if($data){
				$data['success']=true;
			}*/
			echo json_encode($data);
		}
		public function AddNewUser(){
			$datas = array('Email' => $this->input->post('txtEmail'),'DepartmentID' => $this->input->post('cmbDepartment'));
			$query['data']=$this->UserModel->AddNewUser($datas);
			$data['success']=false;
			if($query['data']){
				$data['success']=true;
			}
			echo json_encode($data);
		}
	}
 ?>