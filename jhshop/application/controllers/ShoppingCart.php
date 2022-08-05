<?php

class ShoppingCart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Functions');
        if (!$this->session->userdata('user_id')) {
            redirect();
        }
    }

    public function checkout() {
        $this->load->view('head');
        $data_cart["get_cart"] = $this->Functions->get_cart();
        $data_cart["soma"] = $this->Functions->calcTotal_cart();
        $this->load->view('template/checkout', $data_cart);
        $this->load->view('footer');
    }

    public function checkout_delivery_payment() {
        $this->load->view('head');
        $data_cart["soma"] = $this->Functions->calcTotal_cart();
        $this->load->view('template/checkout_dp', $data_cart);
        $this->load->view('footer');
    }

    public function confirm_order() {
        $this->load->view('head');
        $data_order["get_confirmed_order"] = $this->Functions->get_confirmed_order();
        $this->load->view('template/confirm_order', $data_order);
        $this->load->view('footer');
    }

    public function addproduct() {

//BUSCAR O ID DO UTILIZADOR COM SESSÃO INICIADA

        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
            echo $user_id;
        }

//QUANTIDADE DO PRODUTO
        $quantity = 1;
        echo $quantity;

//BUSCAR O ID DO PRODUTO SELECIONADO
        if ($this->input->post('product_id')) {
            $product_id = $this->input->post('product_id');
            echo $product_id;
        }

//BUSCAR O NOME DO PRODUTO SELECIONADo
        if ($this->input->post('product_name')) {
            $product_name = $this->input->post('product_name');
            echo $product_name;
        }

//BUSCAR O PREÇO DO PRODUTO SELECIONADO
        if ($this->input->post('product_price')) {
            $product_price = $this->input->post('product_price');
            echo $product_price;
        }
//BUSCAR O TAMANHO DO PRODUTO SELECIONADO
        if ($this->input->post('product_size')) {
            $product_size = $this->input->post('product_size');
            echo $product_size;
        }
//BUSCAR A COR DO PRODUTO SELECIONADO
        if ($this->input->post('product_color')) {
            $product_color = $this->input->post('product_color');
            echo $product_color;
        }
//BUSCAR A MARCA DO PRODUTO SELECIONADO
        if ($this->input->post('product_brand')) {
            $product_brand = $this->input->post('product_brand');
            echo $product_brand;
        }
//BUSCAR A IMAGEM DO PRODUTO SELECIONADO
        if ($this->input->post('product_image')) {
            $product_image = $this->input->post('product_image');
            echo $product_image;
        }

        $array = array(
            'user_id' => $user_id,
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_size' => $product_size,
            'product_color' => $product_color,
            'product_brand' => $product_brand,
            'product_image' => $product_image,
            'quantity' => $quantity
        );

        //echo "<script>console.log('" . json_encode($array) . "');</script>";
        //VERIFICAR SE O PRODUTO SELECIONADO J�? ESTA NA BASE DE DADOS
        $userdataid = $this->session->userdata('user_id');
        $query2 = $this->db->query("SELECT quantity FROM cart WHERE user_id='$userdataid' AND product_id='$product_id' AND product_price='$product_price'");
        //SE ESTIVER UPDATE QUANTITY DO PRODUTO
        if ($query2->num_rows() > 0) {
            foreach ($query2->result()as $row) {
                $quantity = $row->quantity + 1;
                $this->db->query("UPDATE cart SET quantity='$quantity' WHERE user_id='$userdataid' AND product_id='$product_id' AND product_price='$product_price'");
            }
        } else {
            //SE NÃO ESTIVER INSERT PRODUTO
            $insert = $this->db->insert('cart', $array);
            if ($insert == TRUE) {
                $query = $this->db->get('cart');
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $value_query) {
                        $user_id = $value_query->user_id;
                        $product_id = $value_query->product_id;
                        $product_name = $value_query->product_name;
                        $product_price = $value_query->product_price;
                        $product_size = $value_query->product_size;
                        $product_color = $value_query->product_color;
                        $product_brand = $value_query->product_brand;
                        $product_image = $value_query->product_image;
                        $quantity = $value_query->quantity;
                    }
                    $this->session->set_userdata(array(
                        'user_id' => $user_id,
                        'product_id' => $product_id,
                        'product_name' => $product_name,
                        'product_price' => $product_price,
                        'product_size' => $product_size,
                        'product_color' => $product_color,
                        'product_brand' => $product_brand,
                        'product_image' => $product_image
                    ));
                }
            }
        }
    }

    public function removeproduct() {
        if ($this->input->post('cart_id')) {
            $cart_id = $this->input->post('cart_id');
            echo $cart_id;
        }
        $this->db->where('cart_id', $cart_id);
        $this->db->delete('cart');
    }

    public function changequantity() {

        if ($this->input->post('quantity')) {
            $quantity = $this->input->post('quantity');
            echo $quantity;
        }
        if ($this->input->post('cart_id')) {
            $cart_id = $this->input->post('cart_id');
            echo $cart_id;
        }

        $userdataid = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT quantity FROM cart WHERE user_id='$userdataid' AND cart_id='$cart_id'");
        //UPDATE QUANTITY DO PRODUTO
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $this->db->query("UPDATE cart SET quantity='$quantity' WHERE user_id='$userdataid' AND cart_id='$cart_id'");
            }
        }
    }

    public function purchase() {

        $userdataid = $this->session->userdata('user_id');
        $date = date("Y/m/d");
        $hour = date("H:i:sa");

        if ($this->input->post('total_price')) {
            $total_price = $this->input->post('total_price');
            echo $total_price;
        }

        if ($this->input->post('type_delivery')) {
            $type_delivery = $this->input->post('type_delivery');
            echo $type_delivery;
        }

        if ($this->input->post('type_payment')) {
            $type_payment = $this->input->post('type_payment');
            echo $type_payment;
        }

        $array = array(
            'user_id' => $userdataid,
            'date' => $date,
            'hour' => $hour,
            'total_price' => $total_price,
            'type_delivery' => $type_delivery,
            'type_payment' => $type_payment
        );


        $insert = $this->db->insert('orders', $array);
        if ($insert == TRUE) {
            $query = $this->db->get('orders');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $value_query) {
                    $userdataid = $value_query->user_id;
                    $date = $value_query->date;
                    $hour = $value_query->hour;
                    $total_price = $value_query->total_price;
                    $type_delivery = $value_query->type_delivery;
                    $type_payment = $value_query->type_payment;
                }
            }
        }

        $query2 = $this->db->query("SELECT TOP 1 percent order_id FROM orders WHERE user_id='$userdataid' ORDER BY order_id DESC");
        $order_id = $query2->row()->order_id;

        $query3 = $this->db->query("SELECT product_id, quantity, product_price FROM cart WHERE user_id='$userdataid'");

        if ($query3->num_rows() > 0) {
            foreach ($query3->result() as $value_query) {
                $product_id = $value_query->product_id;
                $quantity_product = $value_query->quantity;
                $product_price = $value_query->product_price;
                $subtotal_product = $quantity_product * $product_price;

                $array_product = array(
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'quantity_product' => $quantity_product,
                    'subtotal_product' => $subtotal_product
                );
                $insert_product = $this->db->insert('order_product', $array_product);
                if ($insert_product == TRUE) {
                    $query4 = $this->db->get('order_product');
                    if ($query4->num_rows() > 0) {
                        foreach ($query4->result() as $value_query) {
                            $order_id = $value_query->order_id;
                            $product_id = $value_query->product_id;
                            $quantity_product = $value_query->quantity_product;
                            $subtotal_product = $value_query->subtotal_product;
                        }
                    }
                }
            }
        }

        $this->db->query("DELETE FROM cart WHERE user_id='$userdataid'");
    }

}
