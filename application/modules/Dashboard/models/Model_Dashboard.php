<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Dashboard extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	function getDataJmKeluar(){		
		$query =  $this->db->query("SELECT COUNT(no_urut) AS jml FROM tbl_surat_keluar");
		if($query->num_rows() == 0){
			return $pesan=array('status' => 'gagal');
		}else{
			return $pesan=array(
				'status' => 'berhasil',
				'data'	 => $query->result_array()
			);
		}
	}	
	
	function getDataJmlMasuk(){		
		$query =  $this->db->query("SELECT COUNT(no_urut) AS jml FROM tbl_surat_masuk");
		if($query->num_rows() == 0){
			return $pesan=array('status' => 'gagal');
		}else{
			return $pesan=array(
				'status' => 'berhasil',
				'data'	 => $query->result_array()
			);
		}
	}	
	
}



