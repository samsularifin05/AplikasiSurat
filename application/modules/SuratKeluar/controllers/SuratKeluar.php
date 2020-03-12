<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratKeluar extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('upload');
		$this->load->model("Model_Surat_Keluar", "surat_keluar_model");
        $this->load->library('form_validation');
	}
	function index(){
		$data["SudatKeluar"] = $this->surat_keluar_model->getAll();
		$this->template->display('SuratKeluar/index_surat_keluar',$data);
	}

	function tambahsurat()
	{
		$this->template->display('SuratKeluar/tambah_surat_Keluar');
	}

	function SimpanSuratKeluar(){
		$namafile 						= $this->input->post("no_surat");
		$info = pathinfo($_FILES['nama_file']['name']);
		$ext = $info['extension'];
		$config['quality'] 				= '50%';
		$config['width'] 				= 600;
		$config['height'] 				= 400;
		$config['upload_path']			= './uploads/';
		$config['allowed_types'] 		= 'jpeg|gif|jpg|png|pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] 		= TRUE; //Enkripsi nama yang terupload
		$nmfile 						=  $this->input->post("no_surat");
		$config['file_name']            = $nmfile;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		if($_FILES['nama_file']){
			$this->upload->do_upload('nama_file');	
		}

		$data["no_urut"] 				= $this->input->post("no_urut");
		$data["no_surat"] 				= $this->input->post("no_surat");
		$data["tgl_surat"] 				= $this->input->post("tgl_surat");
		$data["perihal"]				= $this->input->post("perihal");
		$data["sifat_surat"] 			= $this->input->post("sifat_surat");
		$data["tujuan"] 				= $this->input->post("tujuan");
		$data["alamat"] 				= $this->input->post("alamat");
		$data["tembusan"]				= $this->input->post("tembusan");
		$data["keterangan"]				= $this->input->post("keterangan");
		$data["nama_file"]				= $namafile.'.'.$ext;
		var_dump($data);
		$insert = $this->surat_keluar_model->save($data);
		if($insert['status'] == "berhasil"){
			$this->session->set_flashdata('alert', success('Data Berhasil Disimpan'));
        }else{
			$this->session->set_flashdata('alert', error('Data Gagal Disimpan !!!'));
        }
		redirect('SuratKeluar/index');
	}
	function Edit($id){
		$Detail['SuratKeluar'] = $this->surat_keluar_model->detail($id);
		// $feedback = json_decode($Detail);
		if($Detail['SuratKeluar']['status']=="berhasil"){
			$this->template->display('SuratKeluar/EditSuratKeluar',$Detail);
		}else{
			$this->session->set_flashdata('alert', error('Data Gagal Ditampilkan !!!'));
		}
	}

	function UpdateData(){

		$nmf							= $_FILES['nama_file'];
		$nmf2							= $this->input->post("file_name");
		if($nmf == ""){
			$data["nama_file"]			= $this->input->post("file_name");
		}else if($nmf == "" && $nmf2 == ""){
			$config['quality'] 				= '50%';
			$config['width'] 				= 600;
			$config['height'] 				= 400;
			$config['upload_path']			= './uploads/';
			$config['allowed_types'] 		= 'jpeg|gif|jpg|png|pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
			// $config['encrypt_name'] 		= TRUE; //Enkripsi nama yang terupload
			$nmfile 						=  $this->input->post("no_surat");

			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if($_FILES['nama_file']){
				$this->upload->do_upload('nama_file');	
			}
			$data["nama_file"]				= $_FILES['nama_file']['name'];
		}else{
			$config['quality'] 				= '50%';
			$config['width'] 				= 600;
			$config['height'] 				= 400;
			$config['upload_path']			= './uploads/';
			$config['allowed_types'] 		= 'jpeg|gif|jpg|png|pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
			// $config['encrypt_name'] 		= TRUE; //Enkripsi nama yang terupload
			$nmfile 						=  $this->input->post("no_surat");

			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if($_FILES['nama_file']){
				$this->upload->do_upload('nama_file');	
			}
			$data["nama_file"]				= $_FILES['nama_file']['name'];
		}

	
		$data["no_urut"] 				= $this->input->post("no_urut");
		$data["no_surat"] 				= $this->input->post("no_surat");
		$data["tgl_surat"] 				= $this->input->post("tgl_surat");
		$data["perihal"]				= $this->input->post("perihal");
		$data["sifat_surat"] 			= $this->input->post("sifat_surat");
		$data["tujuan"] 				= $this->input->post("tujuan");
		$data["alamat"] 				= $this->input->post("alamat");
		$data["tembusan"]				= $this->input->post("tembusan");
		$data["keterangan"]				= $this->input->post("keterangan");

		$update = $this->surat_keluar_model->UbahData(array('no_surat'=> $this->input->post("no_surat")), $data);
		if($update['status']=="berhasil"){
			$this->session->set_flashdata('alert', success('Data Berhasil Diubah'));
		}else{
			$this->session->set_flashdata('alert', error('Data Gagal Ditampilkan !!!'));
		}
		redirect('SuratKeluar/index');
	}
	 function deletesurat($id)
	{

		$delete = $this->surat_keluar_model->delete($id);
		if($delete['status'] == "berhasil"){
			$this->session->set_flashdata('alert', success('Data Berhasil Dihapus'));
        }else{
			$this->session->set_flashdata('alert', error('Data Gagal Dihapus !!!'));
        }
		redirect('SuratKeluar/index');

	}

	

}
