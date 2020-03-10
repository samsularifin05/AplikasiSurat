<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratMasuk extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('upload');
		$this->load->model("Model_Surat_Masuk", "surat_masuk_model");
        $this->load->library('form_validation');
	}
	function index(){
		$data["SudatMasuk"] = $this->surat_masuk_model->getAll();
		$this->template->display('SuratMasuk/index_surat_masuk',$data);
	}

	function tambahsurat()
	{
		$this->template->display('SuratMasuk/tambah_surat_masuk');
	}

	function SimpanSuratMasuk(){
		$data["no_urut"] 				= $this->input->post("no_urut");
		$data["no_surat"] 				= $this->input->post("no_surat");
		$data["tgl_pengirim"] 			= $this->input->post("tgl_pengirim");
		$data["tgl_terima"] 			= $this->input->post("tgl_terima");
		$data["pengirim"] 				= $this->input->post("pengirim");
		$data["penerima"] 				= $this->input->post("penerima");
		$data["unit_pengelola"]			= $this->input->post("unit_pengelola");
		$data["perihal"]				= $this->input->post("perihal");
		$data["disposisi"]				= $this->input->post("disposisi");
		$data["keterangan"]				= $this->input->post("keterangan");
		$data["nama_file"]				= $this->input->post("nama_file");
		
		var_dump($this->input->post("nama_file"));
		die();
		$config['quality'] = '50%';
		$config['width'] = 600;
		$config['height'] = 400;
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
		$nmfile =  $this->input->post("nama_file");
		$config['file_name']            = $nmfile;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		if($_FILES['nama_file']){
			$this->upload->do_upload('nama_file');	
		}

		$insert = $this->surat_masuk_model->save($data);
		if($insert['status'] == "berhasil"){
			$this->session->set_flashdata('alert', success('Data Berhasil Disimpan'));
        }else{
			$this->session->set_flashdata('alert', error('Data Gagal Disimpan !!!'));
        }
		redirect('SuratMasuk/index');
	}


}