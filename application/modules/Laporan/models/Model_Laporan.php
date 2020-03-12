<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Laporan extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	public $_table = "tbl_surat_masuk";


	public function export($data)
    {
		$tgl_dari   = $data['tgl_dari'];
		$tgl_sampai = $data['tgl_sampai'];
		// $sql = "";
		$query =  $this->db->query("SELECT * FROM ".$this->_table." WHERE (tgl_terima BETWEEN '".$tgl_dari."' AND '".$tgl_sampai."')");

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



