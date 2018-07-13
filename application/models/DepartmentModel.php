<?php 
	/**
	 * 
	 */
	class DepartmentModel extends CI_Model
	{
		public function getAllDepartment(){
			$query=$this->db->get('department');
			if($query){
				return $query->result_array();
			}else{
				return false;
			}
		}
	}
 ?>