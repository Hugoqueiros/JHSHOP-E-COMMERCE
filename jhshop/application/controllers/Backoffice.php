<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Functions');
        if ($this->session->userdata('user_admin') != TRUE) {
            redirect();
        }
    }

    public function dashboard() {
        $this->load->view('head_admin');
        $this->load->view('template/admin/admin_navigation');
        $data_total["get_count_clients"] = $this->Functions->get_count_clients();
        $data_total["get_count_orders"] = $this->Functions->get_count_orders();
        $data_total["get_count_products"] = $this->Functions->get_count_products();
        $this->load->view('template/admin/mid_admin', $data_total);
        $this->load->view('footer_admin');
    }

    public function add_products_view() {
        $this->load->view('head_admin');
        $this->load->view('template/admin/admin_navigation');
        $this->load->view('template/admin/mid_admin_add_products');
        $this->load->view('footer_admin');
    }

    public function manage_clients() {
        $this->load->view('head_admin');
        $this->load->view('template/admin/admin_navigation');
        $data_get_clients["get_clients"] = $this->Functions->get_clients();
        $this->load->view('template/admin/mid_admin_manage_clients', $data_get_clients);
        $this->load->view('footer_admin');
    }

    public function manage_orders() {
        $this->load->view('head_admin');
        $this->load->view('template/admin/admin_navigation');
        $data_get_orders["get_orders"] = $this->Functions->get_orders();
        $this->load->view('template/admin/mid_admin_manage_orders', $data_get_orders);
        $this->load->view('footer_admin');
    }

    public function add_products() {
        $url = "assets/images/";
        $product_name = $this->input->post('name_product_admin');
        $product_price = $this->input->post('price_product_admin');
        $product_size = $this->input->post('size_product_admin');
        $product_color = $this->input->post('color_product_admin');
        $product_brand = $this->input->post('brand_product_admin');
        $product_image = $this->input->post('my_file');
        $product_image_final = $url . $product_image;

        $array = array(
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_size' => $product_size,
            'product_color' => $product_color,
            'product_brand' => $product_brand,
            'product_image' => $product_image_final
        );

        $insert = $this->db->insert('product', $array);
        if ($insert == TRUE) {
            $query = $this->db->get('product');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $value_query) {
                    $product_name = $value_query->product_name;
                    $product_price = $value_query->product_price;
                    $product_size = $value_query->product_size;
                    $product_color = $value_query->product_color;
                    $product_brand = $value_query->product_brand;
                    $product_image = $value_query->product_image;
                }
                echo '<script>alert("Produto adicionado com sucesso!");</script>';
                echo '<script>window.location.href="' . base_url() . 'Backoffice/add_products_view";</script>';
            } else {
                echo '<script>alert("Ocorreu um erro. Tente novamente!");</script>';
                echo '<script>window.location.href="' . base_url() . 'Backoffice/add_products_view";</script>';
            }
        } else {
            echo '<script>alert("Ocorreu um erro com o ficheiro inserido. Tente novamente!");</script>';
            echo '<script>window.location.href="' . base_url() . 'Backoffice/add_products_view";</script>';
        }
    }

}
