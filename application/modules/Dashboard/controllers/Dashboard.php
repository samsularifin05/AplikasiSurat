<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	function index(){
		$this->template->display('Dashboard/index_dashboard');
	}


}
