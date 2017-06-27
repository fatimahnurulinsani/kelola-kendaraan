<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungikami extends CI_Controller {

	public function index()
	{
		$this->load->view('base/header');
		$this->load->view('_front/hubungikami');
		$this->load->view('base/footer');
	}
}
