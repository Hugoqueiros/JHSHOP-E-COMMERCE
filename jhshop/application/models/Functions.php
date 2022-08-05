<?php

class Functions extends CI_Model {

    public function alert($message, $url) {

        echo '<script>'
        . 'alert("' . $message . '");'
        . 'window.location.href="' . base_url() . $url . '";'
        . '</script>';
    }

    public function alert2($url) {

        echo '<script>'
        . 'window.location.href="' . base_url() . $url . '";'
        . '</script>';
    }

    public function get_clients() {
        $query_get_clients = $this->db->query("SELECT * FROM users WHERE user_admin=0 ORDER BY user_id");
        return $query_get_clients;
    }

    public function get_count_clients() {
        $query_get_count_clients = $this->db->query("SELECT COUNT(user_id) as nclients FROM users WHERE user_admin=0");
        return $query_get_count_clients;
    }

    public function get_count_orders() {
        $query_get_count_orders = $this->db->query("SELECT COUNT(order_id) as norders FROM orders");
        return $query_get_count_orders;
    }

    public function get_orders() {
        $query_get_orders = $this->db->query("SELECT * FROM orders as o LEFT JOIN users as u on o.user_id=u.user_id");
        return $query_get_orders;
    }

    public function get_count_products() {
        $query_get_count_products = $this->db->query("SELECT COUNT(product_id) as nproducts FROM product");
        return $query_get_count_products;
    }

    public function get_products() {
        $query_products = $this->db->query("SELECT * FROM product ORDER BY product_id");
        return $query_products;
    }

    public function get_cart() {
        $userdataid = $this->session->userdata('user_id');
        $query_cart = $this->db->query("SELECT * FROM cart WHERE user_id='$userdataid'");
        return $query_cart;
    }

    public function calcTotal_cart() {
        $userdataid = $this->session->userdata('user_id');
        $query_calc_Total_cart = $this->db->query("SELECT product_price, quantity FROM cart WHERE user_id='$userdataid'");
        $soma = 0;
        $totalprodutos = 0;
        if ($query_calc_Total_cart->num_rows() > 0) {
            foreach ($query_calc_Total_cart->result()as $row) {
                $quantity = $row->quantity;
                $product_price = $row->product_price;
                $totalprodutos += $product_price * $quantity;
            }
            $soma = $totalprodutos;
        }
        return $soma;
    }

    public function get_confirmed_order() {
        $userdataid = $this->session->userdata('user_id');
        $query_order = $this->db->query("SELECT TOP 1 percent order_id FROM orders WHERE user_id='$userdataid' ORDER BY order_id DESC");
        if ($query_order->num_rows() > 0) {
            foreach ($query_order->result()as $row) {
                $order_id = $row->order_id;
            }
        }
        $query_final = $this->db->query("SELECT * FROM orders as o LEFT JOIN order_product as op on o.order_id=op.order_id LEFT JOIN users as u on o.user_id=u.user_id LEFT JOIN product as p on op.product_id=p.product_id  WHERE o.order_id='$order_id' ORDER BY o.order_id  DESC");
        return $query_final;
    }

}
