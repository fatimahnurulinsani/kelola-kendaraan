<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('garasi_model');
 	}

	public function index(){
		$this->cek_session();
		$garasi_qset = $this->garasi_model->GetAll()->result();
		$data = array(
			'garasi_qset' => $garasi_qset
		);
		$this->load->view('base/header');
		$this->load->view('_admin/garasi', $data);
		$this->load->view('base/footer');
	}

	public function input(){
		 $this->cek_session();
		 $this->load->view('base/header');
		 $this->load->view('_admin/garasi_input');
		 $this->load->view('base/footer');
	 }

	public function save(){
		 if($this->input->post()){
			 $no_garasi 		= $this->input->post('no_garasi');
			 $jenis_garasi 		= $this->input->post('jenis_garasi');

			 $data = array(
				 'no_garasi'		=> $no_garasi,
				 'jenis_garasi'		=> $jenis_garasi
			 );

			 $result = $this->garasi_model->InsertData($data);
			 if($result){
				 redirect(base_url().'admin/garasi', 'refresh');
			 }
		 }
	}

	function edit($id){
		$where = array('id_garasi' => $id);
		$garasi = $this->garasi_model->EditData($where)->result_array();
		$data = array(
			'garasi' => $garasi
		);
		$this->load->view('base/header');
		$this->load->view('_admin/garasi_edit',$data);
		$this->load->view('base/footer');
	}

	 function delete($id){
		$where = array('id_garasi' => $id);
		$result = $this->garasi_model->DeleteData($where);
		if($result){
			 redirect(base_url().'admin/garasi', 'refresh');
		 }
	}

	function update($id){
		$no_garasi 		= $this->input->post('no_garasi');
		$jenis_garasi 		= $this->input->post('jenis_garasi');

		$data = array(
		 'no_garasi'		=> $no_garasi,
		 'jenis_garasi'		=> $jenis_garasi
		);
		$where = array('id_garasi' => $id);
		$result = $this->garasi_model->UpdateData($data, $where);
		if($result){
			 redirect(base_url().'admin/garasi', 'refresh');
		 }
	}

	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'admin/login');
			exit(0);
		}
	}

}
