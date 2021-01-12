<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supervisor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Supervisor Perpustakaan';

        $this->load->view('template/admin/header',$data);
        $this->load->view('supervisor/index',$data);
        $this->load->view('template/admin/footer',$data);
    }

}

/* End of file Admin.php */

?>