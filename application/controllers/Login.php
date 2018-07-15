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
		$this->load->model('UserAccountModel');
		$this->load->model('UserVerificationCodeModel');
	}
	function index(){
		if(isset($_SESSION['Email'])){
			if($_SESSION['Status']=="Verified"){
				header('location:'.base_url('index.php/Admin'));
			}else{
				$this->load->view('Login_view');
			}
		}else{
			$this->load->view('Login_view');
		}
	}
	function authenticate(){
		$fields = array('Email' => $this->input->post('Email'),'Password' => $this->input->post('Password') );
		$datas['data']=$this->UserAccountModel->Authenticate($fields);
		$data['success']=false;
		if($datas['data']){
			$this->session->set_userdata($datas['data'][0]);
			$data['success']=true;
			$data['Status']=$datas['data'][0]['Status'];
			if($datas['data'][0]['Status']!="Verified"){
				$this->SendCode();
			}
		}
		echo json_encode($data);
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	function checkCodeValidity(){
		$fields = array('UserID' => $_SESSION['UserID'],'Code'=>$this->input->post('Code'));
		$datas['data']=$this->UserVerificationCodeModel->CheckCodeValidity($fields);
		$data['success']=false;
		if($datas['data']){
			$data['success']=true;
			$this->validateAccount($_SESSION['UserID']);
		}
		echo json_encode($data);
	}
	function validateAccount($userid){
		$fields = array('Status' => 'Verified');
		$this->UserAccountModel->ValidateAccount($userid);
	}
	function SendCode(){
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'alfeche492@gmail.com', // change it to yours
		  'smtp_pass' => '09058456538', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
		$verifycode = uniqid();
		$to_email=$_SESSION['Email'];
		$data = array('Code' => $verifycode,'UserID'=>$_SESSION['UserID'] );
		$this->UserVerificationCodeModel->InsertCode($data);
		$this->email->initialize($config);
     	$this->email->set_newline("\r\n");
		$this->email->from('alfeche492@gmail.com', 'Raymundo Alfeche');
		$this->email->to($to_email);

		$this->email->subject('Kapasar lage ta salig lang');
		$this->email->message($verifycode);

		$this->email->send();
	}
}
 ?>