<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Model_Dashboard",'Dashboard');
	}
	function index(){
		$data['SuratMasuk']  = $this->Dashboard->getDataJmlMasuk();
		$data['SuratKeluar'] = $this->Dashboard->getDataJmKeluar();
		$this->template->display('Dashboard/index_dashboard',$data);
	}


}
