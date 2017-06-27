<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {


	public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
	}

	public function index()
	{

	$city = $this->admin_model->GetCity()->result_array();
	$data = array(
		 'kota' => $city
	 );

		$this->load->view('base/header');
		$this->load->view('_front/tarif_layanan', $data);
		$this->load->view('base/footer');
	}
}
