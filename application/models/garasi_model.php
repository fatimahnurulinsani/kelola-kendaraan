<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class garasi_model extends CI_Model {
	/*
	Oleh Arie Haryana
	http://kalengharapan.com
	file : blog_model.php untuk load data dari database
	*/

	function GetAll(){
		return $this->db->get('garasi');
	}

	// function search_code($code){
	// 	return $this->db->query("select * from transaction_status where transaction_code = '$code'");
	// }

	public function InsertData($data){
		return $this->db->insert('garasi', $data);
	}

	function DeleteData($where){
		$this->db->where($where);
		return $this->db->delete('garasi');
	}

	function EditData($where){		
		return $this->db->get_where('garasi', $where);
	}

	public function UpdateData($data,$where){
		return $this->db->update('garasi',$data,$where);
	}
}
?>
