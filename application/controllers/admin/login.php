<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 public function __construct(){
			 parent::__construct();
			 $this->load->model('pengguna_model');
	}

	public function index(){
		$this->load->view('_front/header');
		$this->load->view('_admin/login');
		$this->load->view('_front/footer');
	}

	function proses(){
		if($_POST){

			$username = addslashes($_POST['username']);
			$password = addslashes($_POST['password']);

			$temp = $this->pengguna_model->GetUser($username, $password)->result_array();

			if($temp){
				$data = array(
					'id'				=> $temp[0]['id'],
					'firstname' => $temp[0]['firstname'],
					'lastname' 	=> $temp[0]['lastname'],
					'email' 		=> $temp[0]['email']
				);
				$this->session->set_userdata('login',$data);
				session_start();

				header('location:'.base_url().'admin');
			}else{
				header('location:'.base_url().'admin/login');
			}
		}else{
			$this->load->view('admin/404',array('title' => 'Dashboard - Kendaraan'));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		session_destroy();
		header('location:'.base_url().'admin/login');
	}


}
