<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('kendaraan_model');
 	}

	public function index(){
		$this->cek_session();
		$kendaraan_qset = $this->kendaraan_model->GetAll()->result();
		$data = array(
			'kendaraan_qset' => $kendaraan_qset
		);
		$this->load->view('base/header');
		$this->load->view('_admin/kendaraan', $data);
		$this->load->view('base/footer');
	}

	public function input(){
		 $this->cek_session();
		 $garasi_qset = $this->kendaraan_model->GetGarasiQset()->result_array();
		 $data = array(
			'garasi_qset' => $garasi_qset
		);
		 $this->load->view('base/header');
		 $this->load->view('_admin/kendaraan_input', $data);
		 $this->load->view('base/footer');
	 }

	public function save(){
		 if($this->input->post()){
		 	 $id_garasi 			= $this->input->post('id_garasi');
			 $no_mesin 			= $this->input->post('no_mesin');
			 $no_rangka 		= $this->input->post('no_rangka');
			 $no_polisi 		= $this->input->post('no_rangka');
			 $merk 				= $this->input->post('merk');
			 $jenis_kendaraan 	= $this->input->post('jenis_kendaraan');

			 $data = array(
			 	 'id_garasi'		=> $id_garasi,
				 'no_mesin'			=> $no_mesin,
				 'no_rangka'		=> $no_rangka,
				 'no_polisi'		=> $no_polisi,
				 'merk'				=> $merk,
				 'jenis_kendaraan'	=> $jenis_kendaraan
			 );

			 $result = $this->kendaraan_model->InsertData($data);
			 if($result){
				 redirect(base_url().'admin/kendaraan', 'refresh');
			 }
		 }
	}

	function edit($id){
		$where = array('id_kendaraan' => $id);
		$kendaraan = $this->kendaraan_model->EditData($where)->result_array();
		$garasi_qset = $this->kendaraan_model->GetGarasiQset()->result_array();
		$data = array(
			'kendaraan' => $kendaraan,
			'garasi_qset' => $garasi_qset
		);
		$this->load->view('base/header');
		$this->load->view('_admin/kendaraan_edit',$data);
		$this->load->view('base/footer');
	}

	 function delete($id){
		$where = array('id_kendaraan' => $id);
		$result = $this->kendaraan_model->DeleteData($where);
		if($result){
			 redirect(base_url().'admin/kendaraan', 'refresh');
		 }
	}

	function update($id){
		$id_garasi = $this->input->post('id_garasi');
		$no_mesin = $this->input->post('no_mesin');
		$no_rangka = $this->input->post('no_rangka');
		$no_polisi = $this->input->post('no_polisi');
		$merk = $this->input->post('merk');
		$jenis_kendaraan = $this->input->post('jenis_kendaraan');
	 
		$data = array(
			'id_garasi'		=> $id_garasi,
			'no_mesin' => $no_mesin,
			'no_rangka' => $no_rangka,
			'no_polisi' => $no_polisi,
			'merk' => $merk,
			'jenis_kendaraan' => $jenis_kendaraan
		);
		$where = array('id_kendaraan' => $id);
		$result = $this->kendaraan_model->UpdateData($data, $where);
		if($result){
			 redirect(base_url().'admin/kendaraan', 'refresh');
		 }
	}

	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'admin/login');
			exit(0);
		}
	}

}
