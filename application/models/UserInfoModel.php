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
	}
 ?>