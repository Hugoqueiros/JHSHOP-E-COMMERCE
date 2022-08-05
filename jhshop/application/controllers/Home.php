<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Functions');
    }

    public function index() {
        $this->load->view('head');
        $data_cart["get_cart"] = $this->Functions->get_cart();
        $data_cart["soma"] = $this->Functions->calcTotal_cart();
        $this->load->view('template/navigation', $data_cart);
        $this->load->view('template/slider');
        $this->load->view('template/mid');
        $data_products["get_products"] = $this->Functions->get_products();
        $this->load->view('template/new_products', $data_products);
        $this->load->view('footer');
    }

}
