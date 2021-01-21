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
            $this->load->library('pagination');

    }
    public function index(){
        $data['title'] = 'Dashboard';

        $this->load->view("template/user/header",$data);
        $this->load->view("user/index",$data);
        $this->load->view("template/user/footer",$data);
        
    }
    
    public function contactus(){
        $data['title'] = 'Contact Us';
        $data['pengunjung'] = $this->user_model->getPengunjung();

        $this->load->view("template/user/header",$data);
        $this->load->view("user/contactus",$data);
        $this->load->view("template/user/footer",$data);
    }
    public function bukuTamu(){
        $data['title'] = 'Buku Tamu';
        $data['judulBuku'] = $this->user_model->getBuku();
        $data['kategori'] = $this->user_model->getKategori();
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        
        $this->load->view("template/user/header",$data);
        $this->load->view("user/bukutamu",$data);
        
    }
    // public function tambahPengunjung(){
    //     $data['title'] = 'Buku Tamu';
    //     $data['judulBuku'] = $this->user_model->getBuku();
    //     $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

    //     $this->form_validation->set_rules('nama_pengunjung', 'nama_pengunjung', 'required');
    //     // $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
    //     $this->form_validation->set_rules('alamat', 'alamat', 'required');
    //     $this->form_validation->set_rules('telepon', 'telepon', 'required');
    //     $this->form_validation->set_rules('email', 'email', 'required');
    //     // $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
    //     // $this->form_validation->set_rules('jam_masuk', 'jam_masuk', 'required');
    //     $this->form_validation->set_rules('id_buku', 'id_buku', 'required');


    //     if($this->form_validation->run() == FALSE) {
    //         $this->load->view("template/user/header",$data);
    //         $this->load->view("user/bukutamu",$data);
    //         $this->load->view("template/user/footer",$data);
    //     }
    //     else {
    //         $cek = $this->db->query("SELECT * FROM pengunjung where email='".$this->input->post('email')."'")->num_rows();
    //         if ($cek<=0){
    //             $this->user_model->tambah_pengunjung();
    //             redirect('user/index','refresh');   
    //         }
    //         else{
    //         $data['pesan'] = 'Email anda telah digunakan';
    //         $this->load->view("template/user/header",$data);
    //         $this->load->view("user/bukutamu",$data);
    //         $this->load->view("template/user/footer",$data);
    //         }
    //     }
    // }
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
            $cek = $this->db->query("SELECT * FROM pengunjung where email='".$this->input->post('email')."'")->num_rows();
            if ($cek<=0){
                $this->user_model->tambah_pengunjung();
                redirect('user/index','refresh');   
            }
            else{
            $data['pesan'] = 'Email anda telah digunakan';
            $this->load->view("template/user/header",$data);
            $this->load->view("user/bukutamu",$data);
            $this->load->view("template/user/footer",$data);
            }
        }
    }
    public function prosesKritik()
    {
        $data['title'] = 'Dashboard | kritik';
     
        $this->form_validation->set_rules('id_pengunjung', 'id_pengunjung', 'required');
        $this->form_validation->set_rules('KritikSaran', 'KritikSaran', 'required');   
        
        // $cek_email = $this->user_model->cek_email($email);
        if($this->form_validation->run() == FALSE) {
            redirect('user/contactus','refresh');
        }
        else {
            $this->user_model->tambah_kritik();
            redirect('user/index','refresh');
        }
    }
    public function buku(){
        $config['base_url'] = site_url('user/buku'); //site url
        $config['total_rows'] = $this->db->count_all('buku'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['title'] = 'Buku';
        $data['dataBuku'] = $this->user_model->getBuku($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view("template/user/header",$data);
        $this->load->view("user/buku",$data);
        $this->load->view("template/user/footer",$data);
    }
    public function detail_buku($id){
        $data['title'] = 'Detail Buku';
        $data['dataBuku'] = $this->user_model->detail_buku($id);
        $this->load->view("template/user/header",$data);
        $this->load->view("user/detail_buku",$data);
        $this->load->view("template/user/footer",$data);
    }
    public function cari(){
        $data['title'] = 'Buku Search';
        $data['dataBuku'] = $this->user_model->getBukuAll();
        if($this->input->post('submit')){
            $keyword=  $this->input->post('keyword');
            $data['dataBuku'] = $this->user_model->search();
        }
        $this->load->view("template/user/header",$data);
        $this->load->view("user/search",$data);
        $this->load->view("template/user/footer",$data);
        
    }
}