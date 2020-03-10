<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Surat_Masuk extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	public $_table = "tbl_surat_masuk";
	public $nama_file = "default.jpg";
	public $no_urut, $no_surat,$tgl_pengirim,$tgl_terima,
	$pengirim,$penerima,$unit_pengelola,$perihal,$disposisi,$keterangan;
	

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
	}
	public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no_surat" => $id])->row();
	}
	public function save()
    {
		$data = array(
			"no_urut" 				=> $this->input->post("no_urut"),
			"no_surat" 				=> $this->input->post("no_surat"),
			"tgl_pengirim" 			=> $this->input->post("tgl_pengirim"),
			"tgl_terima" 			=> $this->input->post("tgl_terima"),
			"pengirim"				=> $this->input->post("pengirim"),
			"penerima"				=> $this->input->post("penerima"),
			"unit_pengelola"		=> $this->input->post("unit_pengelola"),
			"perihal"				=> $this->input->post("perihal"),
			"disposisi"				=> $this->input->post("disposisi"),
			"keterangan"			=> $this->input->post("keterangan"),
			"nama_file"				=> $this->input->post("nama_file")
		  );
		  $insert = $this->db->insert('tbl_surat_masuk', $data); 
		  	if ($insert) {
				return $pesan=array('status' => 'berhasil');
			} else {
				return $pesan=array('status' => 'gagal', 502);
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
	public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}



