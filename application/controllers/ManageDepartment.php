<?php 
	/**
	 * 
	 */
	class ManageDepartment extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('DepartmentModel');
		}
		function index(){
			if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/FirstTimeLogin'));
					}else{
						$this->load->view("Layout/header");
						$this->load->view("Admin/manage_department_page");
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
		}
		function getAllDepartment(){
			$data=$this->DepartmentModel->getAllDepartment();
			echo json_encode($data);
		}
		function AddDepartment(){
			$fields = array('DepartmentName' => $this->input->post('Department') );
			$data['data']=$this->DepartmentModel->AddDepartment($fields);
			echo json_encode($data);
		}
		public function deleteUser(){
			$query=$this->DepartmentModel->DeleteDepartment($this->input->post('ID'));
			$data['success']=false;
			if($query){
				$data['success']=true;
			}
			echo json_encode($data);
		}
	}
 ?>