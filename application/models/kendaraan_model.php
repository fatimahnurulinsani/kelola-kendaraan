<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kendaraan_model extends CI_Model {
	/*
	Oleh Arie Haryana
	http://kalengharapan.com
	file : blog_model.php untuk load data dari database
	*/

	function GetAll(){
		return $this->db->query("SELECT id_kendaraan, no_mesin, no_rangka, no_polisi, merk, jenis_kendaraan, no_garasi, jenis_garasi
								from kendaraan INNER JOIN garasi ON kendaraan.id_garasi=garasi.id_garasi");
	}

	// function search_code($code){
	// 	return $this->db->query("select * from transaction_status where transaction_code = '$code'");
	// }

	public function InsertData($data){
		return $this->db->insert('kendaraan', $data);
	}

	function DeleteData($where){
		$this->db->where($where);
		return $this->db->delete('kendaraan');
	}

	function EditData($where){		
		return $this->db->get_where('kendaraan', $where);
	}

	public function UpdateData($data,$where){
		return $this->db->update('kendaraan',$data,$where);
	}

	function GetGarasiQset(){
		return $this->db->query("select * from garasi group by no_garasi");
	}
}
?>
