<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanSuratMasuk extends MX_Controller {
	private $nama;
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('upload');
		$this->load->model("Model_Laporan", "laporan");
		$this->load->library('form_validation');
		$this->nama = $this->session->userdata("nama");
	}
	function index(){
		$this->template->display('Laporan/LaporanSuratMasuk/laporan_surat_masuk');
	}


	function ExportLaporanSuratMasuk()
	{
		$data["tgl_dari"] 				= $this->input->post("tgl_dari");
		$data["tgl_sampai"] 		    = $this->input->post("tgl_sampai");
		$insert = $this->laporan->export($data);

		if($insert['status']=="berhasil"){
			// Load plugin PHPExcel nya
			include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

			// Panggil class PHPExcel nya
			$excel = new PHPExcel();
	
			// Settingan awal fil excel
			$excel->getProperties()->setCreator($this->nama)
				->setLastModifiedBy($this->nama)
				->setTitle("Laporan Surat Masuk")
				->setKeywords("Laporan Surat Masuk");
	
			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = array(
				'font' => array('bold' => true), // Set font nya jadi bold
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				)
			);

			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				)
			);
	
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN SURAT MASUK"); // Set kolom A1 dengan tulisan "DATA Member"
			$excel->setActiveSheetIndex(0)->setCellValue('A2', "".$data['tgl_dari']." s/d ".$data['tgl_sampai']." "); 

			$excel->getActiveSheet()->mergeCells('A1:L1'); // Set Merge Cell pada kolom A1 sampai E1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
			
			$excel->getActiveSheet()->mergeCells('A2:L2'); // Set Merge Cell pada kolom A1 sampai E1
			$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
			$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
			$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			// Buat header tabel nya pada baris ke 3
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('B3', "NO URUT"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('C3', "NO SURAT"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('D3', "TANGGAL PENGIRIM"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('E3', "TANGGAL TERIMA"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('F3', "PENGIRIM"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('G3', "PENERIMA"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('H3', "UNIT PENGELOLA"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('I3', "PERIHAL"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('J3', "DISPOSISI"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('K3', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('L3', "NAMA FILE"); // Set kolom E3 dengan tulisan "ALAMAT"
	
			// Apply style header yang telah kita buat tadi ke masing-masing kolom header
			$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
	
			// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	
			$no = 1; // Untuk penomoran tabel, di awal set dengan 1
			$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
			foreach ($insert['data'] as $data) { // Lakukan looping pada variabel Member
				if($data['nama_file']==null){
					$file = $data['nama_file'];
				}else{
					$file = 'http://localhost/AplikasiSurat/uploads/'.$data['nama_file'];
				}
				$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['no_urut']);
				$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['no_surat']);
				$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['tgl_pengirim']);
				$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['tgl_terima']);
				$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data['pengirim']);
				$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data['penerima']);
				$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data['unit_pengelola']);
				$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data['perihal']);
				$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data['disposisi']);
				$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data['keterangan']);
				$excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $file);
	
				// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
				$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
	
				$no++; // Tambah 1 setiap kali looping
				$numrow++; // Tambah 1 setiap kali looping
			}
	
			// Set width kolom
			$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);// Set width kolom A
			$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
			$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true); // Set width kolom E
			$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true); // Set width kolom E
	
			// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	
			// Set orientasi kertas jadi LANDSCAPE
			$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	
			// Set judul file excel nya
			$excel->getActiveSheet(0)->setTitle("Laporan Data Surat Masuk");
			$excel->setActiveSheetIndex(0);
	
			// Proses file excel
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Laporan Surat Masuk.xlsx"'); // Set nama file excel nya
			header('Cache-Control: max-age=0');
	
			$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			$write->save('php://output');
		}else{
			$this->session->set_flashdata('alert', error('Laporan Kosong !!!'));
		}
		redirect('Laporan/LaporanSuratMasuk');


	}
	
	

}
