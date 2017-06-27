<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function index()
	{

		$this->load->view('base/header');
		$this->load->view('_front/tentang');
		$this->load->view('base/footer');
	}
}
