<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pengguna extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->model('pengguna_model');
 }

	public function index(){
		$this->cek_session();
		$users = $this->pengguna_model->GetUsers()->result();
		$data = array(
			'users' => $users
		);
		$this->load->view('base/header');
		$this->load->view('_admin/data_pengguna', $data);
		$this->load->view('base/footer');
	}

	public function input(){
		 $this->cek_session();
		 $this->load->view('base/header');
		 $this->load->view('_admin/pengguna_input');
		 $this->load->view('base/footer');
	 }

	 public function save(){
		 if($this->input->post()){
			 $nama 			= $this->input->post('nama_pengguna');
			 $password 		= md5($this->input->post('password'));
			 $hak_akses 		= $this->input->post('hak_akses');
			 $no_hp 				= $this->input->post('no_hp');

			 $data = array(
				 'nama_pengguna'			=> $nama,
				 'password'		=> $password,
				 'hak_akses'		=> $hak_akses,
				 'no_hp'				=> $no_hp
			 );

			 $result = $this->pengguna_model->InsertData($data);
			 if($result){
				 redirect(base_url().'admin/data_pengguna', 'refresh');
			 }
		 }
	}

	function edit($id){
		$where = array('id_pengguna' => $id);
		$pengguna = $this->pengguna_model->EditData($where)->result_array();
		$data = array(
			'pengguna' => $pengguna
		);
		$this->load->view('base/header');
		$this->load->view('_admin/pengguna_edit',$data);
		$this->load->view('base/footer');
	}

	 function delete($id){
		$where = array('id_pengguna' => $id);
		$result = $this->pengguna_model->DeleteData($where);
		if($result){
			 redirect(base_url().'admin/data_pengguna', 'refresh');
		 }
	}

	function update($id){
		$nama 			= $this->input->post('nama_pengguna');
		$password 		= md5($this->input->post('password'));
		$hak_akses 		= $this->input->post('hak_akses');
		$no_hp 				= $this->input->post('no_hp');

		$data = array(
		 'nama_pengguna'			=> $nama,
		 'password'		=> $password,
		 'hak_akses'		=> $hak_akses,
		 'no_hp'				=> $no_hp
		);
		$where = array('id_pengguna' => $id);
		$result = $this->pengguna_model->UpdateData($data, $where);
		if($result){
			 redirect(base_url().'admin/data_pengguna', 'refresh');
		 }
	}

	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'admin/login');
			exit(0);
		}
	}

}
