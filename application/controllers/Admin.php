<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Admin_model->hitung_buku();
        $data['pengunjung_datang'] = $this->Admin_model->hitung_pengunjung_datang();
        $data['pengunjung_pulang'] = $this->Admin_model->hitung_pengunjung_pulang();
        $data['admin'] = $this->Admin_model->hitung_admin();
        $data['supervisor'] = $this->Admin_model->hitung_supervisor();
        $data['kategori_buku'] = $this->Admin_model->hitung_kategori_buku();
        $data['kritik_saran'] = $this->Admin_model->hitung_kritik_saran();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function data_admin() {
        $data['title'] = 'Data Admin | Perpustakaan BPS Kota Malang';
        $data['admin'] = $this->Admin_model->getAllAdmin();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_admin',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function tambah_data_admin() {
        $data['title'] = 'Tambah Data Admin | Perpustakaan BPS Kota Malang';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/tambah_data_admin',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->Admin_model->tambah_data_admin();
            redirect('Admin/data_admin','refresh');
        }
    }

    public function edit_data_admin($id) {
        $data['title'] = 'Edit Data Admin | Perpustakaan BPS Kota Malang';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        $data['admin'] = $this->Admin_model->getAdminById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/edit_data_admin', $data);
            $this->load->view('template/admin/footer');
        }
        else {
            $this->Admin_model->edit_data_admin($id);
            redirect('admin/data_admin','refresh');
        }
    }

    public function hapus_data_admin($id) {
        $this->Admin_model->hapus_data_admin($id);
        redirect('Admin/data_admin','refresh');
    }

    public function data_supervisor() {
        $data['title'] = 'Data Supervisor | Perpustakaan BPS Kota Malang';
        $data['supervisor'] = $this->Admin_model->getAllSupervisor();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_supervisor',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function tambah_data_supervisor() {
        $data['title'] = 'Tambah Data Supervisor | Perpustakaan BPS Kota Malang';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/tambah_data_supervisor',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->Admin_model->tambah_data_supervisor();
            redirect('Admin/data_supervisor','refresh');
        }
    }

    public function edit_data_supervisor($id) {
        $data['title'] = 'Edit Data Supervisor | Perpustakaan BPS Kota Malang';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        $data['admin'] = $this->Admin_model->getSupervisorById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/edit_data_supervisor', $data);
            $this->load->view('template/admin/footer');
        }
        else {
            $this->Admin_model->edit_data_supervisor($id);
            redirect('Admin/data_supervisor','refresh');
        }
    }

    public function hapus_data_supervisor($id) {
        $this->Admin_model->hapus_data_supervisor($id);
        redirect('Admin/data_supervisor','refresh');
    }

    public function data_pengunjung_datang() {
        $data['title'] = 'Data Pengunjung Datang | Perpustakaan BPS Kota Malang';
        $data['pengunjung'] = $this->Admin_model->getAllPengunjung();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_pengunjung_datang',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function data_pengunjung_pulang() {
        $data['title'] = 'Data Pengunjung Pulang | Perpustakaan BPS Kota Malang';
        $data['pengunjung'] = $this->Admin_model->getAllPengunjungPulang();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_pengunjung_pulang',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function pengunjung_keluar($id) {
        $this->Admin_model->pengunjung_keluar($id);
        redirect('Admin/data_pengunjung_datang', 'refresh');
    }

    public function data_buku() {
        $data['title'] = 'Data Buku | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Admin_model->getAllBuku();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_buku',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function tambah_data_buku() {
        $data['title'] = 'Tambah Data Buku | Perpustakaan BPS Kota Malang';
        $data['kategori'] = $this->Admin_model->getAllKategoriBuku();
        $data['status'] = ['Tersedia Softcopy', 'Belum Tersedia Softcopy'];

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('nomor_katalog', 'Nomor Katalog', 'required');
        $this->form_validation->set_rules('tahun_rilis', 'Tahun', 'required');
        $this->form_validation->set_rules('id_kategori', 'Katgeori Buku', 'required');
        $this->form_validation->set_rules('letak', 'letak', 'required');
        $this->form_validation->set_rules('jumlah_halaman', 'Jumlah Halaman', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/tambah_data_buku',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->Admin_model->tambah_data_buku();
            redirect('Admin/data_buku','refresh');
        }
    }

    public function edit_data_buku($id) {
        $data['title'] = 'Edit Data Buku | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Admin_model->getBukuById($id);
        $data['kategori'] = $this->Admin_model->getAllKategoriBuku();
        $data['status'] = ['Tersedia Softcopy', 'Belum Tersedia Softcopy'];

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('nomor_katalog', 'Nomor Katalog', 'required');
        $this->form_validation->set_rules('tahun_rilis', 'Tahun', 'required');
        $this->form_validation->set_rules('id_kategori', 'Katgeori Buku', 'required');
        $this->form_validation->set_rules('letak', 'letak', 'required');
        $this->form_validation->set_rules('jumlah_halaman', 'Jumlah Halaman', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/edit_data_buku', $data);
            $this->load->view('template/admin/footer');
        }
        else {
            $this->Admin_model->edit_data_buku($id);
            redirect('Admin/data_buku','refresh');
        }
    }

    public function hapus_data_buku($id) {
        $this->Admin_model->hapus_data_buku($id);
        redirect('Admin/data_buku','refresh');
    }

    public function data_kategori_buku() {
        $data['title'] = 'Data Kategori Buku | Perpustakaan BPS Kota Malang';
        $data['kategori'] = $this->Admin_model->getAllKategoriBuku();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_kategori_buku',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function detail_buku($id) {
        $data['title'] = 'Detail Buku | Perpustakaan BPS Kota Malang';
        $data['buku'] = $this->Admin_model->detail_buku($id);

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/detail_buku',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function tambah_data_kategori_buku() {
        $data['title'] = 'Tambah Data Kategori Buku | Perpustakaan BPS Kota Malang';

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/tambah_data_kategori_buku',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->Admin_model->tambah_data_kategori_buku();
            redirect('Admin/data_kategori_buku','refresh');
        }
    }

    public function edit_data_kategori_buku($id) {
        $data['title'] = 'Edit Data Kategori Buku | Perpustakaan BPS Kota Malang';
        $data['kategori_buku'] = $this->Admin_model->getKategoriBukuById($id);
        
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header',$data);
            $this->load->view('admin/edit_data_kategori_buku',$data);
            $this->load->view('template/admin/footer',$data);
        }
        else {
            $this->Admin_model->edit_data_kategori_buku($id);
            redirect('Admin/data_kategori_buku','refresh');
        }
    }

    public function hapus_data_kategori_buku($id) {
        $this->Admin_model->hapus_data_kategori_buku($id);
        redirect('Admin/data_kategori_buku','refresh');
    }

    public function form_export() {
        $data['title'] = 'Form Export Data Pengunjung | Perpustakaan BPS Kota Malang';
        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/form_export',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function cetak() {
        $data['title'] = 'Cetak Data Pengunjung | Perpustakaan BPS Kota Malang';
        $tgl_awal = $this->input->post('tanggal_awal');
        $tgl_akhir = $this->input->post('tanggal_akhir');

        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if($tgl_awal != "" && $tgl_akhir != "") {
            include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			$excel = new PHPExcel();

			$excel->getProperties()->setCreator('Perpustakaan BPS Kota Malang')
			->setLastModifiedBy('Perpustakaan BPS Kota Malang')
			->setTitle("Data Pengunjung Perpustakaan BPS Kota Malang")
			->setSubject("Admin")
			->setDescription("Data Pengunjung")
            ->setKeywords("Data Pengunjung Perpustakaan BPS Kota Malang");
            
            $style_col = array(
				'font' => array('bold' => true), 
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
				)
            );
            
            $style_row = array(
				'alignment' => array(
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
				)
            );
            
            $filename = "Data Buku Tamu\"$tgl_awal - $tgl_akhir.xlsx";
            $judul = "Buku Tamu $tgl_awal - $tgl_akhir";
            
            $excel->setActiveSheetIndex(0)->setCellValue('A1', $judul); 
			$excel->getActiveSheet()->mergeCells('A1:J1'); 
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); 
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

			$excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
			$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Pengunjugn"); 
			$excel->setActiveSheetIndex(0)->setCellValue('C3', "Jenis Kelamin"); 
			$excel->setActiveSheetIndex(0)->setCellValue('D3', "Alamat"); 
			$excel->setActiveSheetIndex(0)->setCellValue('E3', "Telepon"); 
			$excel->setActiveSheetIndex(0)->setCellValue('F3', "Email"); 
			$excel->setActiveSheetIndex(0)->setCellValue('G3', "Pekerjaan"); 
			$excel->setActiveSheetIndex(0)->setCellValue('H3', "Tanggal Kunjung"); 
			$excel->setActiveSheetIndex(0)->setCellValue('I3', "Jam Masuk"); 
            $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jam Keluar");
            $excel->setActiveSheetIndex(0)->setCellValue('K3', "Buku");

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

            $pengunjung= $this->Admin_model->cetak($tgl_awal,$tgl_akhir)->result();

            $no = 1; 
            $numrow = 4;
            foreach($pengunjung as $data){ 
				$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_pengunjung);
				$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->jenis_kelamin);
				$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->alamat);
				$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->telepon);
				$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->email);
				$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->pekerjaan);
				$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->tanggal);
				$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->jam_masuk);
                $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->jam_keluar);
                $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->judul_buku);
				
				$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
				
				$no++; 
				$numrow++; 
            }
            
            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); 
			$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
            $excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
            $excel->getActiveSheet()->getColumnDimension('K')->setWidth(25);

            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

			$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

			$excel->getActiveSheet(0)->setTitle("Data Pengunjung");
            $excel->setActiveSheetIndex(0);
            
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
			header("Content-Disposition: attachment; filename=\"$filename\""); 
			header("Cache-Control: max-age=0");

			$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			$write->save('php://output');
        }
        else {

        }
    }

    public function data_kritik_saran() {
        $data['title'] = 'Data Kritik dan Saran | Perpustakaan BPS Kota Malang';
        $data['kritik_saran'] = $this->Admin_model->data_kritik_saran();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_kritik_saran',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Login/index','refresh');
    }
}

/* End of file Admin.php */

?>