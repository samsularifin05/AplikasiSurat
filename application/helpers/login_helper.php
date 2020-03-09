<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_logged_in() {
	$ci =& get_instance();
	$user = $ci->session->userdata('nama');
		if (!isset($user)) { 
			$ci->session->set_flashdata('Pesan', '<div class="alert alert-danger text-center" role="alert">
			Anda Harus Login Terlebih Dahulu !!</div>');
			redirect('Auth'); 
		}else{ 
		return true;
	} 
}
