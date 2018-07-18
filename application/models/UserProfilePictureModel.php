<?php 
	/**
	 * 
	 */
	class UserProfilePictureModel extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function insertProfilePic($fields){
			$this->db->insert('userprofilepicture',$fields);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>