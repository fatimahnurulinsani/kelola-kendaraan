<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->model('pengguna_model');
 }

	public function index(){
		$this->cek_session();
		$this->load->view('base/header');
		$this->load->view('_admin/admin');
		$this->load->view('base/footer');
	}

	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'admin/login');
			exit(0);
		}
	}

}
