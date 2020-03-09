<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_logged_in() {
	$ci =& get_instance();
	$user = $ci->session->userdata('nama');
		if (!isset($user)) { 
			redirect('Auth'); 
		}else{ 
		return true;
	} 
}
