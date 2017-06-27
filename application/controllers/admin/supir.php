<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supir extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('supir_model');
 	}

	public function index(){
		$this->cek_session();
		$supir_qset = $this->supir_model->GetAll()->result();
		$data = array(
			'supir_qset' => $supir_qset
		);
		$this->load->view('base/header');
		$this->load->view('_admin/supir', $data);
		$this->load->view('base/footer');
	}

	public function input(){
		 $this->cek_session();
		 $this->load->view('base/header');
		 $this->load->view('_admin/supir_input');
		 $this->load->view('base/footer');
	 }

	public function save(){
		 if($this->input->post()){
		 	 $kode 		= $this->input->post('kode');
			 $nama 		= $this->input->post('nama');
			 $no_ktp 	= $this->input->post('no_ktp');
			 $no_hp 	= $this->input->post('no_hp');
			 $alamat 	= $this->input->post('alamat');

			 $data = array(
			 	 'kode'		=> $kode,
				 'nama'		=> $nama,
				 'no_ktp'	=> $no_ktp,
				 'no_hp'	=> $no_hp,
				 'alamat'	=> $alamat
			 );

			 $result = $this->supir_model->InsertData($data);
			 if($result){
				 redirect(base_url().'admin/supir', 'refresh');
			 }
		 }
	}

	function edit($id){
		$where = array('id_supir' => $id);
		$supir = $this->supir_model->EditData($where)->result_array();
		$data = array(
			'supir' => $supir
		);
		$this->load->view('base/header');
		$this->load->view('_admin/supir_edit',$data);
		$this->load->view('base/footer');
	}

	 function delete($id){
		$where = array('id_supir' => $id);
		$result = $this->supir_model->DeleteData($where);
		if($result){
			 redirect(base_url().'admin/supir', 'refresh');
		 }
	}

	function update($id){
		$kode 		= $this->input->post('kode');
		$nama 		= $this->input->post('nama');
		$no_ktp 	= $this->input->post('no_ktp');
		$no_hp 	= $this->input->post('no_hp');
		$alamat 	= $this->input->post('alamat');

		$data = array(
			 'kode'		=> $kode,
		 'nama'		=> $nama,
		 'no_ktp'	=> $no_ktp,
		 'no_hp'	=> $no_hp,
		 'alamat'	=> $alamat
		);
		$where = array('id_supir' => $id);
		$result = $this->supir_model->UpdateData($data, $where);
		if($result){
			 redirect(base_url().'admin/supir', 'refresh');
		 }
	}

	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'admin/login');
			exit(0);
		}
	}

}
