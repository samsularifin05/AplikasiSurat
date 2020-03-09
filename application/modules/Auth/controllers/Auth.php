<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_Login",'Authentifikasi');

	}
	function index(){
		//Validasi Login
		$this->form_validation->set_rules('username', 'username', 'required|trim', [
			'required' => 'Username Tidak Boleh Kosong'
		]);

		$this->form_validation->set_rules('password', 'UserId', 'required|trim', [
			'required' => 'Password Tidak Boleh Kosong'
		]);

		//Cek Validasi
		if($this->form_validation->run() == false){
			$this->load->view('Auth/index_login');
		}else{
			$this->__login();
		}
	}

	private function __login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// $remember = $this->input->post('remember');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->Authentifikasi->cek_login("users",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("/Dashboard/index"));
 
		}else{
			$this->session->set_flashdata('Pesan', '
				<div class="alert alert-danger text-center" role="alert">
				Username dan Password Salah !!!
				</div>');
			redirect('Auth');
		}
	}

	function logout(){
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('Pesan', '<div class="alert alert-success text-center" role="alert">
					Anda Telah Logout !!</div>');
			redirect('Auth');
	}
}
