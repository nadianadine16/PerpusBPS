<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('administrator_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Perpustakaan BPS Kota Malang';

        $this->load->view('template/admin/header_admin',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('template/admin/footer_admin',$data);
    }

}

/* End of file Admin.php */

?>