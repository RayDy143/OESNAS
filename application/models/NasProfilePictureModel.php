<?php 
	/**
	 * 
	 */
	class NasProfilePictureModel extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function insertProfile($fields){
			$this->db->insert('nasprofilepicture',$fields);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>