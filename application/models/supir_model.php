<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class supir_model extends CI_Model {
	/*
	Oleh Arie Haryana
	http://kalengharapan.com
	file : blog_model.php untuk load data dari database
	*/

	function GetAll(){
		return $this->db->get('supir');
	}

	public function InsertData($data){
		return $this->db->insert('supir', $data);
	}

	function DeleteData($where){
		$this->db->where($where);
		return $this->db->delete('supir');
	}

	function EditData($where){		
		return $this->db->get_where('supir', $where);
	}

	public function UpdateData($data,$where){
		return $this->db->update('supir',$data,$where);
	}
}
?>
