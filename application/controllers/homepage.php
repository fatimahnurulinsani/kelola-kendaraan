<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->model('pengguna_model');
  }


	public function index()
	{
		$this->load->view('_front/header');
		$this->load->view('_front/homepage');
		$this->load->view('_front/footer');
	}

	public function search_code(){
		 $code = $this->input->post('code');
		 $status = $this->admin_model->Search_code($code)->result_array();

		 echo json_encode($status);
	}
}
