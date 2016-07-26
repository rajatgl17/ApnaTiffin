<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!is_logged_in())
            redirect(BASE_URL . 'login');
        $this->load->model('common_model', 'common');
    }

    public function index() {
        $data['success_message'] = $this->session->flashdata('success_message');
        $data['countries'] = $this->common->get_countries();
        $data['regions'] = $this->common->get_regions();
        $data['cities'] = $this->common->get_cities();
        $data['dinner_timings'] = $this->common->get_dinner_time();
        $data['lunch_timings'] = $this->common->get_lunch_time();
        $data['user_addresses'] = $this->common->get_address(my_userid());
        $data['meal_types'] = $this->db->get_where("mst_tiffins", array('status' => 1))->result();

        $data['css_files'] = array('daterangepicker.css');
        $data['js_files'] = array('moment.min.js', 'daterangepicker.js', 'pages/order.js');
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('main/order_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function save_address() {
        $this->form_validation->set_rules('address_line_1', 'Address Line 1', 'required|trim');
        $this->form_validation->set_rules('address_line_2', 'Address Line 2', 'trim');
        $this->form_validation->set_rules('region', 'Region', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');

        if ($this->form_validation->run()) {
            $set_data = array(
                'fk_user_id' => my_userid(),
                'address_line_1' => set_value('address_line_1'),
                'address_line_2' => set_value('address_line_2'),
                'fk_region_id' => $this->encrypt->decode(set_value('region')),
                'fk_city_id' => $this->encrypt->decode(set_value('city')),
                'fk_country_id' => $this->encrypt->decode(set_value('country'))
            );
            $status = $this->db->insert('addresses', $set_data);
            if ($status)
                $this->session->set_flashdata('success_message', 'Address Saved Successfully.');
        }
        $this->index();
    }

    public function confirm_your_order() {

        $this->form_validation->set_rules('start_date', 'Start Date', 'required|numeric|exact_length[8]|trim|strip_tags');
        $this->form_validation->set_rules('end_date', 'End Date', 'required|numeric|exact_length[8]|trim|strip_tags');
        $this->form_validation->set_rules('order_for', 'Order For', 'required|numeric|exact_length[1]|less_than[3]|trim|strip_tags');
        $this->form_validation->set_rules('lunch_time', 'Lunch Time', 'required|trim');
        $this->form_validation->set_rules('lunch_address', 'Lunch Address', 'required|trim');
        $this->form_validation->set_rules('dinner_time', 'Dinner Time', 'required|trim');
        $this->form_validation->set_rules('dinner_address', 'Dinner Address', 'required|trim');
        $this->form_validation->set_rules('meal_type', 'Meal Type', 'required|trim');
        $this->form_validation->set_rules('number_of_orders', 'Number of Orders', 'numeric|trim');

        if ($this->form_validation->run()) {
            $start_date = set_value('start_date');
            $end_date = set_value('end_date');
            if (isset($_POST['number_of_orders']))
                $number_of_orders = set_value('number_of_orders');
            else {
                $number_of_orders = 1;
            }

            if ($end_date >= $start_date && $start_date >= date("Ymd")) {
                $order_for = set_value('order_for');
                $meals = meal_num($start_date, $end_date, $order_for);

                if ($meals > 0) {
                    $order_data = array(
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'order_for' => $order_for,
                        'lunch_time' => $this->encrypt->decode(set_value('lunch_time')),
                        'lunch_address' => $this->encrypt->decode(set_value('lunch_address')),
                        'dinner_time' => $this->encrypt->decode(set_value('dinner_time')),
                        'dinner_address' => $this->encrypt->decode(set_value('dinner_address')),
                        'meal_type' => $this->encrypt->decode(set_value('meal_type')),
                        'meals' => $meals * $number_of_orders
                    );
                    $this->session->set_tempdata($order_data, 60 * 30);
                    redirect(BASE_URL . 'order/confirm_order');
                }
            }
        }
        redirect(BASE_URL . 'order');
    }

    public function confirm_order() {
        $data = $this->session->tempdata();
        if ($data) {

            $data['lunch_address_text'] = $this->common->make_address($data['lunch_address']);
            $data['dinner_address_text'] = $this->common->make_address($data['dinner_address']);
            $data['cost_one_meal'] = $this->common->get_meal_cost($data['meal_type']);
            $data['total_amount'] = floor(($data['cost_one_meal'] * $data['meals']) - my_wallet());
            $data['totalamount'] = floor(($data['cost_one_meal'] * $data['meals']));
            $data['uniqid'] = uniqid();
            $this->session->set_tempdata($data, 60 * 30);

            $data['css_files'] = array('daterangepicker.css');
            $data['js_files'] = array('moment.min.js', 'daterangepicker.js', 'pages/order.js');
            $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
            $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
            $data['main_content'] = $this->load->view('main/confirm_order_view', $data, true);
            $data['footer'] = $this->load->view('footers/footer_view', $data, true);
            $this->load->view('templates/main_template_view', $data);
        } else
            redirect(BASE_URL . 'order');
    }

    public function cod($uniqid) {
        if ($uniqid != '' && $uniqid == $this->session->tempdata('uniqid')) {
            $data = $this->session->tempdata();
            $array = array(
                'fk_user_id' => my_userid(),
                'order_for' => $data['order_for'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'lunch_address' => $data['lunch_address'],
                'dinner_address' => $data['dinner_address'],
                'lunch_time' => $data['lunch_time'],
                'dinner_time' => $data['dinner_time'],
                'meal_type' => $data['meal_type'],
                'meals' => $data['meals'],
                'total_amount' => $data['totalamount'],
                'amount' => $data['total_amount'],
                'create_time' => time(),
                'order_status' => 1
            );
            $this->db->insert("orders", $array);
            $this->load->model("email_model");
            $this->email_model->admin_intimate();
            $this->session->unset_tempdata('uniqid');
            redirect(BASE_URL . 'profile/my_orders');
        } else {
            redirect(BASE_URL . 'order');
        }
    }

    public function online_payment($uniqid) {
        if ($uniqid != '' && $uniqid == $this->session->tempdata('uniqid')) {
            $data = $this->session->tempdata();
            $array = array(
                'fk_user_id' => my_userid(),
                'order_for' => $data['order_for'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'lunch_address' => $data['lunch_address'],
                'dinner_address' => $data['dinner_address'],
                'lunch_time' => $data['lunch_time'],
                'dinner_time' => $data['dinner_time'],
                'meal_type' => $data['meal_type'],
                'meals' => $data['meals'],
                'total_amount' => $data['totalamount'],
                'amount' => $data['total_amount'],
                'create_time' => time(),
                'order_status' => 2,
                'uniqid' => $uniqid
            );
            $this->db->insert("orders", $array);
            $id = $this->db->insert_id();
            $this->session->unset_tempdata('uniqid');

            //PAYUMONEY
            $post_data = array(
                'key' => MERCHANT_KEY,
                'txnid' => $uniqid,
                'amount' => $data['total_amount'],
                'productinfo' => $data['meals'] . 'meals',
                'firstname' => my_name(),
                'email' => my_email()
            );

            $hash_string = '';
            foreach ($post_data as $key => $value) {
                $hash_string .= $value;
                $hash_string .= '|';
            }
            $hash_string .= '||||||||||' . MERCHANT_SALT;
            $hash = hash('sha512', $hash_string);

            $post_data['phone'] = my_mobile();
            $post_data['surl'] = BASE_URL;
            $post_data['furl'] = BASE_URL;
            $post_data['service_provider'] = 'payu_paisa';
            $post_data['hash'] = $hash;
            $this->load->view('templates/curl_view', $post_data);
        } else {
            redirect(BASE_URL . 'order');
        }
    }

    public function success() {
        $status = $this->input->post("status");
        $firstname = $this->input->post("firstname");
        $amount = $this->input->post("amount");
        $txnid = $this->input->post("txnid");
        $posted_hash = $this->input->post("hash");
        $key = $this->input->post("key");
        $productinfo = $this->input->post("productinfo");
        $email = $this->input->post("email");
        $salt = MERCHANT_SALT;

        if (isset($_POST["additionalCharges"])) {
            $additionalCharges = $this->input->post("additionalCharges");
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {
            $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
            $this->invalid_transaction();
        } else {

            $this->db->where("uniqid", $txnid);
            $this->db->where("order_status", 2);
            $status = $this->db->update("orders", array('order_status' => 3));
            if ($status) {

                if (IS_DISCOUNT_AVAILABLE == 1) {
                    $this->db->select("fk_user_id, amount");
                    $this->db->from("orders");
                    $this->db->where("uniqid", $txnid);
                    $this->db->where("order_status", 3);
                    $query = $this->db->get();
                    $result = $query->row();

                    $cashback = floor(DISCOUNT * $result->amount / 100);
                    //$this->db->set("wallet", "`wallet + $cashback`", FALSE);
                    $this->db->where("pk_user_id", $result->fk_user_id);
                    $this->db->update("users", array('wallet' => $cashback));
                }

                $data['msg'] = "Thank You. Your order status is " . $status . "." . " Your Transaction ID for this transaction is " . $txnid . ".</h4>";
                $this->load->model("order_model", "order");
                $data['orders'] = $this->order->my_orders(my_userid());

                $this->load->model("email_model");
                $this->email_model->admin_intimate();

                $data['css_files'] = array();
                $data['js_files'] = array();
                $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
                $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
                $data['main_content'] = $this->load->view('profile/my_orders_view', $data, true);
                $data['footer'] = $this->load->view('footers/footer_view', $data, true);
                $this->load->view('templates/main_template_view', $data);
            } else
                $this->invalid_transaction();
        }
    }

    public function failure() {
        $status = $this->input->post("status");
        $firstname = $this->input->post("firstname");
        $amount = $this->input->post("amount");
        $txnid = $this->input->post("txnid");

        $posted_hash = $this->input->post("hash");
        $key = $this->input->post("key");
        $productinfo = $this->input->post("productinfo");
        $email = $this->input->post("email");
        $salt = MERCHANT_SALT;

        If (isset($_POST["additionalCharges"])) {
            $additionalCharges = $this->input->post("additionalCharges");
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {

            $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
            $this->invalid_transaction();
        } else {
            $data['emsg'] = "Your order status is <b>" . $status . "</b>. Your transaction id for this transaction is " . $txnid . ".";
            $data['css_files'] = array();
            $data['js_files'] = array();
            $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
            $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
            $data['main_content'] = $this->load->view('main/empty_view', $data, true);
            $data['footer'] = $this->load->view('footers/footer_view', $data, true);
            $this->load->view('templates/main_template_view', $data);
        }
    }

    public function invalid_transaction() {
        $data['emsg'] = 'Invalid Transaction. Please try again';
        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('main/empty_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function error() {
        $data['emsg'] = 'Due to very high traffic, we are not currently taking new orders. Please wait for few days, till we come back.';
        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('main/empty_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

}
