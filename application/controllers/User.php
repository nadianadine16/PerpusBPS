<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('user_model');
            $this->load->library('form_validation');
    }
    public function index(){
        $data['title'] = 'Dashboard';

        $this->load->view("template/user/header",$data);
        $this->load->view("user/index",$data);
        $this->load->view("template/user/footer",$data);
        
    }
    
    public function kontakus(){
        $data['title'] = 'Contact Us';
        $this->load->view("template/user/header",$data);
        $this->load->view("user/contactus",$data);
        $this->load->view("template/user/footer",$data);
    }
    public function bukuTamu(){
        $data['title'] = 'Buku Tamu';
        $data['judulBuku'] = $this->user_model->getBuku();
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        $this->load->view("template/user/header",$data);
        $this->load->view("user/bukutamu",$data);
        $this->load->view("template/user/footer",$data);
    }
    public function tambahPengunjung(){
        $data['title'] = 'Buku Tamu';
        $data['judulBuku'] = $this->user_model->getBuku();
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('nama_pengunjung', 'nama_pengunjung', 'required');
        // $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telepon', 'telepon', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        // $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
        // $this->form_validation->set_rules('jam_masuk', 'jam_masuk', 'required');
        $this->form_validation->set_rules('id_buku', 'id_buku', 'required');


        if($this->form_validation->run() == FALSE) {
            $this->load->view("template/user/header",$data);
            $this->load->view("user/bukutamu",$data);
            $this->load->view("template/user/footer",$data);
        }
        else {
            $this->user_model->tambah_pengunjung();
            redirect('user/index','refresh');
        }
    }
    public function kritik(){
        $data['title'] = 'Kritik dan Saran';
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_rules('KritikSaran', 'KritikSaran', 'required');
        if($this->form_validation->run() == FALSE) {
            $this->load->view("template/user/header",$data);
            $this->load->view("kontakus",$data);
            $this->load->view("template/user/footer",$data);
        }
        else {
            $this->user_model->tambah_kritik();
            redirect('user/index','refresh');
        }
    }
    public function buku(){
        $data['title'] = 'Buku';
        $this->load->view("template/user/header",$data);
        $this->load->view("user/buku",$data);
        $this->load->view("template/user/footer",$data);
    }
}