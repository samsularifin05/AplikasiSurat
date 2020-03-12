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
		$sql = "SELECT * FROM ".$this->_table." WHERE (tgl_terima BETWEEN '".$tgl_dari."' AND '".$tgl_sampai."') ";
		$query =  $this->db->query($sql);
		if($query){
			return $pesan=array(
				'status' => 'berhasil',
				'data'	 => $query->result_array()
			);
		}else{
			return $pesan=array('status' => 'gagal');
		}
	}
	
}



