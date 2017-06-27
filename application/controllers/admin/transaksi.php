<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->model('transaksi_model');
 }

 public function index(){
	 $this->cek_session();
	 $transaksi_qset = $this->transaksi_model->GetAll()->result();
	 $data = array(
		 'transaksi_qset' 	=> $transaksi_qset
	 );

	 $this->load->view('base/header');
	 $this->load->view('_admin/transaksi', $data);
	 $this->load->view('base/footer');
 }

 public function input(){
	 $this->cek_session();
	 $kendaraan_qset = $this->transaksi_model->GetKendaraanQset()->result_array();
	 $supir_qset = $this->transaksi_model->GetSupirQset()->result_array();
	 $data = array(
		 'kendaraan_qset' 	=> $kendaraan_qset,
		 'supir_qset'		=> $supir_qset
	 );
	 $this->load->view('base/header');
	 $this->load->view('_admin/transaksi_input', $data);
	 $this->load->view('base/footer');
 }

	public function save(){
	 if($this->input->post()){
	 	 $tgl_str 		= $this->input->post('tanggal');
		 $tanggal 		=$date= date('Y-m-d h:i',strtotime($tgl_str));
		 $status 		= $this->input->post('status');
		 $id_kendaraan 	= $this->input->post('id_kendaraan');
		 $id_supir 		= $this->input->post('id_supir');
		 $kode 			= $this->code($id_supir);

		 $data = array(
			 'kode'			=> $kode,
			 'tanggal'		=> $tanggal,
			 'status'		=> $status,
			 'id_kendaraan'	=> $id_kendaraan,
			 'id_supir'		=> $id_supir
		 );

		 $result = $this->transaksi_model->InsertData($data);
		 if($result){
			 redirect(base_url().'admin/transaksi', 'refresh');
		 }
	 }
	}

	function edit($id){
		$where = array('id_transaksi' => $id);
		$transaksi = $this->transaksi_model->EditData($where)->result_array();
		$kendaraan_qset = $this->transaksi_model->GetKendaraanQset()->result_array();
		$supir_qset = $this->transaksi_model->GetSupirQset()->result_array();
		$data = array(
		 'transaksi'		=> $transaksi,
		 'kendaraan_qset' 	=> $kendaraan_qset,
		 'supir_qset'		=> $supir_qset
		);
		$this->load->view('base/header');
		$this->load->view('_admin/transaksi_edit',$data);
		$this->load->view('base/footer');
	}

	 function delete($id){
		$where = array('id_transaksi' => $id);
		$result = $this->transaksi_model->DeleteData($where);
		if($result){
			 redirect(base_url().'admin/transaksi', 'refresh');
		 }
	}

	function update($id){
		$tanggal 		= $this->input->post('tanggal');
		$status 		= $this->input->post('status');
		$id_kendaraan 	= $this->input->post('id_kendaraan');
		$id_supir 		= $this->input->post('id_supir');

		$data = array(
		 'tanggal'		=> $tanggal,
		 'status'		=> $status,
		 'id_kendaraan'	=> $id_kendaraan,
		 'id_supir'		=> $id_supir
		);
		$where = array('id_transaksi' => $id);
		$result = $this->transaksi_model->UpdateData($data, $where);
		if($result){
			 redirect(base_url().'admin/transaksi', 'refresh');
		 }
	}

	public function code($id_supir){
		$where = array('id_supir' => $id_supir);
		$supir = $this->transaksi_model->GetSupir($where)->result();
		$random_id_length = 5;
		$nama_supir = substr($supir[0]->nama, 0, 3);
		$rnd_id = uniqid(rand(),1);
		$rnd_id = strip_tags(stripslashes($rnd_id));
		$rnd_id = str_replace(".","",$rnd_id);
		$rnd_id = strrev(str_replace("/","",$rnd_id));
		$rnd_id = substr($rnd_id,0,$random_id_length);
		$rnd_id = strtoupper($nama_supir.$rnd_id);
		return $rnd_id;
	}


	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'admin/login');
			exit(0);
		}
	}

}
