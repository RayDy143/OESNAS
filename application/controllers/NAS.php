<?php 
	/**
	 * 
	 */
	class NAS extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('DepartmentModel');
			$this->load->model('NASModel');
			$this->load->model('NasProfilePictureModel');
		}
		function index(){
			if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/FirstTimeLogin'));
					}else{
						$data['deps']=$this->DepartmentModel->getAllDepartment();
						$this->load->view("Layout/Header");
						$this->load->view("Admin/nas_page",$data);
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
		}
		function uploadProfilePic($file,$id){
			$config['upload_path']= './assets/uploads/NasPicture';
            $config['allowed_types']= 'gif|jpg|png|jpeg';
            $this->load->library('upload',$config);
            if($this->upload->do_upload($file)){
           	    $upload = $this->upload->data();
            	$fields = array('Filename' => $upload['file_name'],'NasID'=> $id);
				$this->NasProfilePictureModel->insertProfile($fields);
            	return true;
            }else{
            	return false;
            }
		}
		public function AddNas(){
			$fields = array('IDNumber' => $this->input->post('IDNumber'),'Firstname'=>$this->input->post('Firstname'),'Middlename'=>$this->input->post('Middlename'),'Lastname'=>$this->input->post('Lastname'),'Email'=>$this->input->post('Email'),'Address'=>$this->input->post('Address'),'Birthdate'=>$this->input->post('Birthdate'),'ContactNumber'=>$this->input->post('ContactNumber'),'DepartmentID'=>$this->input->post('DepartmentID'));
			$query=$this->NASModel->AddNas($fields);
			$data['success']=false;
			if($query){
				$this->uploadProfilePic('NasPicture',$query);
				$data['success']=true;
			}
			echo json_encode($data);
		}
		public function deleteNas(){
			$where = array('NasID' => $this->input->post('ID') );
			$query=$this->NASModel->deleteNas($where);
			$data['success']=false;
			if($query){
				$data['success']=true;
			}
			echo json_encode($data);
		}
		public function getAllNas(){
			$data['data']=$this->NASModel->getNas();
			$data['success']=false;
			if($data){
				$data['success']=true;
			}
			echo json_encode($data);
		}
	}
 ?>