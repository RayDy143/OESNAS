<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}
	function index(){
		if(isset($_SESSION['Email'])){
			header('location:'.base_url('index.php/Admin'));
		}else{
			$this->load->view('Login_view');
		}
	}
	function authenticate(){
		$fields = array('Email' => $this->input->post('Email'),'Password' => $this->input->post('Password'),'Status'=>'Verified' );
		$datas['data']=$this->UserModel->Authenticate($fields);
		$data['success']=false;
		if($datas['data']){
			$this->session->set_userdata($datas['data'][0]);
			$data['success']=true;
			$data['Status']=$datas['data'][0]['Status'];
		}
		echo json_encode($data);
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
 ?>