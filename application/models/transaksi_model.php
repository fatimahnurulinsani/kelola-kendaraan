<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_model extends CI_Model {
	/*
	Oleh Arie Haryana
	http://kalengharapan.com
	file : blog_model.php untuk load data dari database
	*/

	function GetAll(){
		return $this->db->query("SELECT id_transaksi, merk, tanggal, status, transaksi.kode, nama, no_polisi
								from ((transaksi INNER JOIN kendaraan ON transaksi.id_kendaraan=kendaraan.id_kendaraan)
									INNER JOIN supir ON transaksi.id_supir=supir.id_supir)");
	}

	public function InsertData($data){
		return $this->db->insert('transaksi', $data);
	}

	function GetSupir($where){		
		return $this->db->get_where('supir', $where);
	}

	function GetSupirQset(){
		return $this->db->query("select * from supir group by kode");
	}

	function GetKendaraanQset(){
		return $this->db->query("select * from kendaraan group by no_polisi");
	}

	function DeleteData($where){
		$this->db->where($where);
		return $this->db->delete('transaksi');
	}

	function EditData($where){		
		return $this->db->get_where('transaksi', $where);
	}

	public function UpdateData($data,$where){
		return $this->db->update('transaksi',$data,$where);
	}
}
?>
