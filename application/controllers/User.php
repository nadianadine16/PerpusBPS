<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function index(){
        $data['title'] = 'Dashboard';

        $this->load->view("template/user/header",$data);
        $this->load->view("user/index",$data);
        $this->load->view("template/user/footer",$data);
        
    }
    public function login(){
        $this->load->view("login/index");
    }
    public function kontakus(){
        $data['title'] = 'Contact Us';
        $this->load->view("template/user/header",$data);
        $this->load->view("user/contactus",$data);
        $this->load->view("template/user/footer",$data);
    }
    public function bukuTamu(){
        $data['title'] = 'Buku Tamu';
        $this->load->view("template/user/header",$data);
        $this->load->view("user/bukutamu",$data);
        $this->load->view("template/user/footer",$data);
    }
}