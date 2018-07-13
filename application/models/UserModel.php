<?php 
	/**
	 * 
	 */
	class UserModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function getAllUsers(){
			$this->db->where('Status!=','Deleted');
			$query=$this->db->get('user');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function CreateUser($data){
			$query=$this->db->insert('user',$data);
			if($query){
				return true;
			}else{
				return false;
			}
		}
		public function DeleteUser($userid){
			$this->db->where('UserID',$userid);
			$this->db->delete('user');
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function Authenticate($data){
			$this->db->where($data);
			$query=$this->db->get('user');
			if($query){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function AddNewUser($data){
			$query=$this->db->insert('user',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>