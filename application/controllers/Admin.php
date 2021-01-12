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
        $data['pengunjung'] = $this->Admin_model->hitung_pengunjung();
        $data['admin'] = $this->Admin_model->hitung_admin();
        $data['supervisor'] = $this->Admin_model->hitung_supervisor();
        $data['kategori_buku'] = $this->Admin_model->hitung_kategori_buku();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('template/admin/footer',$data);
    }
    public function profile(){
        $data['title'] = 'Dashboard | Profile Admin';
        $this->load->view('template/admin/header_admin',$data);
        $this->load->view('admin/profile',$data);
        $this->load->view('template/admin/footer_admin',$data);
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

    public function data_pengunjung() {
        $data['title'] = 'Data Pengunjung | Perpustakaan BPS Kota Malang';
        $data['pengunjung'] = $this->Admin_model->getAllPengunjung();

        $this->load->view('template/admin/header',$data);
        $this->load->view('admin/data_pengunjung',$data);
        $this->load->view('template/admin/footer',$data);
    }

    public function pengunjung_keluar($id) {
        $this->Admin_model->pengunjung_keluar($id);
        redirect('Admin/data_pengunjung', 'refresh');
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

    
}

/* End of file Admin.php */

?>