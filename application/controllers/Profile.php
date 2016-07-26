<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('common_model', 'common');
        $data['user_addresses'] = $this->common->get_address(my_userid());

        $data['error'] = $this->session->flashdata('error');
        $data['success'] = $this->session->flashdata('success');

        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('profile/profile_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function my_orders() {
        $this->load->model("order_model", "order");
        $data['orders'] = $this->order->my_orders(my_userid());

        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('profile/my_orders_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function remove_address($id) {
        $id = $this->encrypt->decode($id);
        $update = array(
            'status' => 0
        );
        $this->db->where("fk_user_id", my_userid());
        $this->db->where("pk_address_id", $id);
        $this->db->update("addresses", $update);
        redirect(BASE_URL . 'profile');
    }

    public function change_password() {
        $this->form_validation->set_rules('cpassword', 'Current Password', 'required|trim|strip_tags');
        $this->form_validation->set_rules('npassword', 'Password', 'required|matches[rpassword]|min_length[6]|max_length[30]|trim|strip_tags');
        $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|trim|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $this->load->model('auth_model', 'auth');

            $cpassword = set_value('cpassword');
            $password = set_value('npassword');

            $this->db->select("password");
            $this->db->from("users");
            $this->db->where("pk_user_id", my_userid());
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $result = $query->row();
                if ($this->auth->match_password($cpassword, $result->password)) {
                    $update = array(
                        'password' => $this->auth->hash_password($password)
                    );
                    $this->db->where("pk_user_id", my_userid());
                    $this->db->update("users", $update);
                    $this->session->set_flashdata('success', 'Password changed successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Current password is wrong.');
                }
            } else {
                $this->session->set_flashdata('error', 'There has been some problem. Please retry later.');
            }
        }
        $this->index();
    }

    public function cancel_order($order_id) {
        $order_id = $this->encrypt->decode($order_id);
        if ($order_id) {
            $this->db->select("*");
            $this->db->from("orders");
            $this->db->where("fk_user_id", my_userid());
            $this->db->where("pk_order_id", $order_id);
            $this->db->where("order_status", 3);
            
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $result = $query->row();
                $amount = $result->amount;
                $start_date = $result->start_date;
                
                if($start_date < date("Ymd")){
                    $update1 = array("order_status"=>3);
                    $this->db->where("pk_order_id", $order_id);
                    $this->db->update("orders",$update1);
                    
                    $update2 = array("wallet"=>$amount);
                    $this->db->where("pk_user_id", my_userid());
                    $this->db->update("users",$update2);
                }
            }
        }
        $this->my_orders();
    }

}
