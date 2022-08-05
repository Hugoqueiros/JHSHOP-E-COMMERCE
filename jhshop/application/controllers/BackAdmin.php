<?php

class BackAdmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Functions');
    }

    public function index() {
        $this->load->view('head');
        $this->load->view('/template/admin/admin_login');
    }
}
