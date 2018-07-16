<?php 
	/**
	 * 
	 */
	class FirstTimeLogin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("UserInfoModel");
			$this->load->model("UserAccountModel");
		}
		function index(){
			if(isset($_SESSION['Email'])){
				if($_SESSION['IsFirstLogin']=="1"){
					$this->load->view("FirstTimeLogin_page");
				}else{
					header('location'.base_url('index.php/Login'));
				}
			}else{
				header('location'.base_url('index.php/Login'));
			}
		}
		function InsertInfo(){
			$fields = array('Firstname' => $this->input->post('Firstname'),'Middlename' => $this->input->post('Middlename'),'Lastname' => $this->input->post('Lastname'),'Address' => $this->input->post('Address'),'Birthdate' => $this->input->post('Birthdate'),'Gender' => $this->input->post('Gender'), 'ContactNumber' => $this->input->post('ContactNumber'),'UserID' => $_SESSION['UserID']);
			$data['data']=$this->UserInfoModel->InsertInfo($fields);
			$data['success']=false;
			if($data){
				$where = array('UserID' => $_SESSION['UserID'] );
				$updateFieldFirstTimeLogin = array('IsFirstLogin' => 0 );
				$updateFieldChangePass = array('Password' =>$this->input->post('Password'));
				$this->UserAccountModel->FirstTimeLogin($where,$updateFieldFirstTimeLogin);
				$this->UserAccountModel->ChangePassword($where,$updateFieldChangePass);
				$this->session->sess_destroy();
				$data['success']=true;
			}
			echo json_encode($data);
		}
	}
 ?>