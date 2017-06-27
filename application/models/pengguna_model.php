<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengguna_model extends CI_Model {
	/*
	Oleh Arie Haryana
	http://kalengharapan.com
	file : blog_model.php untuk load data dari database
	*/

	function GetUsers(){
		return $this->db->get('pengguna');
	}

	function GetUser($nama_pengguna, $password){
		$password = md5($password);
		return $this->db->query("select * from pengguna where nama_pengguna='$nama_pengguna' and password='$password'");
	}

	public function InsertData($data){
		return $this->db->insert('pengguna', $data);
	}

	function DeleteData($where){
		$this->db->where($where);
		return $this->db->delete('pengguna');
	}

	function EditData($where){		
		return $this->db->get_where('pengguna', $where);
	}

	public function UpdateData($data,$where){
		return $this->db->update('pengguna',$data,$where);
	}
}
?>
