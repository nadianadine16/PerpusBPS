<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('login_model');
            $this->load->library('form_validation');
        }
        public function index(){
            $this->load->view("login/index");
        }

    public function prosesLogin()
    {
        $data['title'] = 'Dashboard | Login';

        $username=htmlspecialchars($this->input->post('uname1'));
        $password=htmlspecialchars($this->input->post('pwd1'));
            
        $cek_login = $this->login_model->login($username,$password);

        if($cek_login) {
            foreach ($cek_login as $row);
                $this->session->set_userdata('user', $row->username);
                $this->session->set_userdata('id_user', $row->id_user);
                $this->session->set_userdata('nama', $row->nama);
                $this->session->set_userdata('status', $row->status);
                $this->session->set_userdata('nip', $row->nip);
                $this->session->set_userdata('jenis_kelamin', $row->jenis_kelamin);
                $this->session->set_userdata('telepon', $row->telepon);


                if($this->session->userdata('status') == 1) {
                    redirect('admin');
                }
                else if($this->session->userdata('status') == 2) {
                    redirect('supervisor');
                }
            }
        else {
            $data['pesan'] = 'Username dan Password Anda Salah';
            $data['title'] = 'Login';
            $this->load->view('login/index', $data);
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('user/index','refresh');
    }

}

/* End of file Admin.php */

?>