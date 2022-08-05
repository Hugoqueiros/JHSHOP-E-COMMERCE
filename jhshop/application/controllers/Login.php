<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Functions');
    }

    public function index() {
        
    }

    public function logar_admin() {

        $email = $this->input->post('admin_email');
        $password = do_hash($this->input->post('admin_password'));
        $admin = TRUE;

        $this->db->where(array(
            'user_email' => $email,
            'user_password' => $password,
            'user_admin' => $admin
        ));

        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value_query) {
                $user_name = $value_query->user_name;
                $user_address = $value_query->user_address;
                $user_phone = $value_query->user_phone;
                $user_password = $value_query->user_password;
                $user_place = $value_query->user_place;
                $user_postal_code1 = $value_query->user_postal_code1;
                $user_postal_code2 = $value_query->user_postal_code2;
                $user_nif = $value_query->user_nif;
                $user_admin = $value_query->user_admin;
            }
            $this->session->set_userdata(array(
                'user_name' => $user_name,
                'user_address' => $user_address,
                'user_password' => $user_password,
                'user_place' => $user_place,
                'user_postal_code1' => $user_postal_code1,
                'user_postal_code2' => $user_postal_code2,
                'user_nif' => $user_nif,
                'user_phone' => $user_phone,
                'user_admin' => $user_admin
            ));
            echo '<script>window.location.href="' . base_url() . 'Backoffice/dashboard";</script>';
        } else {
            echo '<script>alert("Dados do admin incorretos");</script>';
            echo '<script>window.location.href="' . base_url() . '";</script>';
        }
    }

    public function deslogar_admin() {
        $userdataid = $this->session->userdata('user_id');
        $this->db->query("DELETE FROM cart WHERE user_id='$userdataid'");
        $this->session->sess_destroy();
        echo '<script>window.location.href="' . base_url() . 'BackAdmin";</script>';
    }

    public function logar() {

        $email = $this->input->post('email_login');
        $password = do_hash($this->input->post('password_login'));

        $array = $this->db->where(array(
            'user_email' => $email,
            'user_password' => $password
        ));

        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value_query) {
                $user_id = $value_query->user_id;
                $user_name = $value_query->user_name;
                $user_email = $value_query->user_email;
                $user_address = $value_query->user_address;
                $user_phone = $value_query->user_phone;
                $user_place = $value_query->user_place;
                $user_postal_code1 = $value_query->user_postal_code1;
                $user_postal_code2 = $value_query->user_postal_code2;
                $user_nif = $value_query->user_nif;
                $user_admin = $value_query->user_admin;
            }
            $this->session->set_userdata(array(
                'user_id' => $user_id,
                'user_name' => $user_name,
                'user_email' => $user_email,
                'user_address' => $user_address,
                'user_place' => $user_place,
                'user_postal_code1' => $user_postal_code1,
                'user_postal_code2' => $user_postal_code2,
                'user_nif' => $user_nif,
                'user_phone' => $user_phone,
                'user_admin' => $user_admin
            ));
            echo '<script>window.location.href="' . base_url() . '";</script>';
        } else {
            echo '<script>alert("Dados incorretos");</script>';
            echo '<script>window.location.href="' . base_url() . '";</script>';
        }
    }

    public function deslogar() {
        $userdataid = $this->session->userdata('user_id');
        $this->db->query("DELETE FROM cart WHERE user_id='$userdataid'");
        $this->session->sess_destroy();
        redirect();
    }

    public function createaccount() {
        $user_admin = FALSE;
        $array = array(
            'user_name' => $this->input->post('name_register'),
            'user_email' => $this->input->post('email_register'),
            'user_password' => do_hash($this->input->post('password_register')),
            'user_admin' => $user_admin
        );
//echo "<script>console.log('" . json_encode($array) . "');</script>";
        $user_email = $this->input->post('email_register');
        $insert = $this->db->insert('users', $array);
        if ($insert == TRUE) {
            $query = $this->db->query("SELECT * FROM users WHERE user_email='$user_email'");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $value_query) {
                    $user_id = $value_query->user_id;
                    $user_name = $value_query->user_name;
                    $user_email = $value_query->user_email;
                    $user_address = $value_query->user_address;
                    $user_phone = $value_query->user_phone;
                    $user_place = $value_query->user_place;
                    $user_postal_code1 = $value_query->user_postal_code1;
                    $user_postal_code2 = $value_query->user_postal_code2;
                    $user_nif = $value_query->user_nif;
                    $user_admin = $value_query->user_admin;
                }
                $this->session->set_userdata(array(
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'user_email' => $user_email,
                    'user_address' => $user_address,
                    'user_place' => $user_place,
                    'user_postal_code1' => $user_postal_code1,
                    'user_postal_code2' => $user_postal_code2,
                    'user_nif' => $user_nif,
                    'user_phone' => $user_phone,
                    'user_admin' => $user_admin
                ));
                echo '<script>window.location.href="' . base_url() . '";</script>';
            } else {
                echo '<script>alert("Dados incorretos, tente novamente.");</script>';
                echo '<script>window.location.href="' . base_url() . '";</script>';
            }
        }
    }

    public function updateaccount() {

        $user_id = $this->session->userdata('user_id');
        $user_email = $this->session->userdata('user_email');
        $user_name = $this->session->userdata('user_name');

        if ($this->session->userdata('user_nif')) {
            $user_nif = $this->session->userdata('user_nif');
        } else {
            $user_nif = $this->input->post('user_nif');
        }

        $user_address = $this->input->post('user_address');
        $user_place = $this->input->post('user_place');
        $user_postal_code1 = $this->input->post('user_postal_code1');
        $user_postal_code2 = $this->input->post('user_postal_code2');
        $user_phone = $this->input->post('user_phone');

        //GRAVAR NOVOS DADOS

        $array = array(
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_address' => $user_address,
            'user_place' => $user_place,
            'user_postal_code1' => $user_postal_code1,
            'user_postal_code2' => $user_postal_code2,
            'user_nif' => $user_nif,
            'user_phone' => $user_phone
        );
        $this->db->where('user_id', $user_id);
        $update = $this->db->update('users', $array);

        if ($update == TRUE) {
            $this->session->set_userdata(array(
                'user_name' => $user_name,
                'user_email' => $user_email,
                'user_address' => $user_address,
                'user_place' => $user_place,
                'user_postal_code1' => $user_postal_code1,
                'user_postal_code2' => $user_postal_code2,
                'user_nif' => $user_nif,
                'user_phone' => $user_phone
            ));
        }
    }

}
