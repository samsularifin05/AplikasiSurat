<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Surat_Keluar extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	public $_table = "tbl_surat_keluar";


	public function getAll()
    {
        return $this->db->get($this->_table)->result();
	}
	public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no_surat" => $id])->row();
	}
	public function save($data)
    {
		   $insert = $this->db->insert($this->_table, $data); 
		  	if ($insert) {
				return $pesan=array('status' => 'berhasil');
			} else {
				return $pesan=array('status' => 'gagal');
			}

	}
	
	public function update()
    {
        $post = $this->input->post();
		$this->id 				= $post["id"];
		$this->no_urut 			= $post["no_urut"];
        $this->no_surat 		= $post["no_surat"];
        $this->tgl_pengirim 	= $post["tgl_pengirim"];
        $this->tgl_terima 		= $post["tgl_terima"];
        $this->pengirim 		= $post["pengirim"];
        $this->penerima 		= $post["penerima"];
        $this->unit_pengelola 	= $post["unit_pengelola"];
        $this->perihal 			= $post["perihal"];
        $this->disposisi 		= $post["disposisi"];
        $this->keterangan 		= $post["keterangan"];
        $this->nama_file 		= $post["nama_file"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
	}
	
	public function detail($id)
    {
	
		$query =  $this->db->query("SELECT * FROM ".$this->_table." WHERE no_surat=".$id."");
		
		if($query->num_rows() == 1){
			return $pesan=array(
				'status' => 'berhasil',
				'data'	 => $query->result_array()
			);
		}else{
			return $pesan=array('status' => 'gagal');
		}
		

	}
	public function UbahData($id, $data)
    {
		$this->db->where($id);
        $this->db->update($this->_table, $data);
		$query = $this->db->affected_rows();
		if($query) {
			return $pesan=array('status' => 'berhasil');
		} else {
			return $pesan=array('status' => 'gagal');
		}
	}
	
	public function delete($id)
    {
		$query = $this->db->delete($this->_table, array('no_surat' => $id)); 
		if ($query) {
			return $pesan=array('status' => 'berhasil');
		} else {
			return $pesan=array('status' => 'gagal');
		}
    }
}



