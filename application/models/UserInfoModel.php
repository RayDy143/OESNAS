<?php 
	/**
	 * 
	 */
	class UserInfoModel extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function InsertInfo($data){
			$this->db->insert('userinfo',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		function getUserInfo($id){
			$query=$this->db->query("Select * from userprofilepicture RIGHT join useraccount on userprofilepicture.UserID=useraccount.UserID INNER join userinfo on useraccount.UserID=userinfo.UserID where useraccount.UserID='$id'");
			if($query){
				return $query->result_array();
			}else{
				return false;
			}
		}
		function editInfo($fields,$where){
			$this->db->where($where);
			$this->db->update('userinfo',$fields);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>