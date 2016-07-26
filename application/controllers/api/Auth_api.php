<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('api_model', 'api');
        $this->load->model('common_model', 'common');
    }

    public function login() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $email = set_value('email');
            $password = set_value('password');
            $id = $this->api->match_password($email, $password);
            if ($id) {
                $res = $this->api->user_data($id);
                echo ajax_response(1, 'Success', json_encode($res));
            } else
                echo ajax_response(0, 'Invalid username or password.');
        } else {
            echo ajax_response(0, 'Form error.');
        }
    }

    public function register() {
        $this->form_validation->set_message('is_unique', '%s already exists.');
        $this->form_validation->set_message('matches', 'Passwords do not match.');
        $this->form_validation->set_message('exact_length', 'Enter 10 digit mobile number without 0 or +91.');

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[2]|max_length[20]|trim|strip_tags');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]|trim|strip_tags');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|trim|strip_tags');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric|exact_length[10]|is_unique[users.mobile]|trim|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            echo ajax_response(0, validation_errors());
        } else {
            $data['name'] = set_value('name');
            $data['email'] = set_value('email');
            $data['mobile'] = set_value('mobile');
            $data['password'] = set_value('password');

            $this->load->model("auth_model", "auth");
            $status = $this->auth->register($data);
            echo ajax_response(1, 'Registration Successful');
        }
    }

    public function add_address() {
        $this->form_validation->set_rules('user_id', 'user_id', 'required|trim');
        $this->form_validation->set_rules('address_line_1', 'Address Line 1', 'required|trim');
        $this->form_validation->set_rules('address_line_2', 'Address Line 2', 'trim');
        $this->form_validation->set_rules('region', 'Region', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');

        if ($this->form_validation->run()) {
            $set_data = array(
                'fk_user_id' => $this->encrypt->decode(set_value('user_id')),
                'address_line_1' => set_value('address_line_1'),
                'address_line_2' => set_value('address_line_2'),
                'fk_region_id' => $this->encrypt->decode(set_value('region')),
                'fk_city_id' => $this->encrypt->decode(set_value('city')),
                'fk_country_id' => $this->encrypt->decode(set_value('country'))
            );
            $status = $this->db->insert('addresses', $set_data);
            if ($status)
                echo ajax_response(1, 'Success');
            else
                echo ajax_response(0, 'Error', array());
        } else
            echo ajax_response(0, 'Error', validation_errors());
    }

    public function remove_address() {
        $this->form_validation->set_rules('address_id', 'address_id', 'required|trim');
        $this->form_validation->set_rules('user_id', 'user_id', 'required|trim');

        if ($this->form_validation->run()) {
            $id = $this->encrypt->decode(set_value('address_id'));
            $update = array(
                'status' => 0
            );
            $this->db->where("fk_user_id", $this->encrypt->decode(set_value('user_id')));
            $this->db->where("pk_address_id", $id);
            $this->db->update("addresses", $update);
            echo ajax_response(1, 'Success');
        } else
            echo ajax_response(0, 'Error', validation_errors());
    }

    public function order() {
        $this->form_validation->set_rules('user_id', 'user_id', 'required|trim');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required|numeric|exact_length[8]|trim|strip_tags');
        $this->form_validation->set_rules('end_date', 'End Date', 'required|numeric|exact_length[8]|trim|strip_tags');
        $this->form_validation->set_rules('order_for', 'Order For', 'required|numeric|exact_length[1]|less_than[3]|trim|strip_tags');
        $this->form_validation->set_rules('lunch_time', 'Lunch Time', 'required|trim');
        $this->form_validation->set_rules('lunch_address', 'Lunch Address', 'required|trim');
        $this->form_validation->set_rules('dinner_time', 'Dinner Time', 'required|trim');
        $this->form_validation->set_rules('dinner_address', 'Dinner Address', 'required|trim');
        $this->form_validation->set_rules('meal_type', 'Meal Type', 'required|trim');

        if ($this->form_validation->run()) {
            $start_date = set_value('start_date');
            $end_date = set_value('end_date');

            if ($end_date >= $start_date && $start_date >= date("Ymd")) {
                $order_for = set_value('order_for');
                $meals = meal_num($start_date, $end_date, $order_for);

                if ($meals > 0) {
                    $data = array(
                        'start_date' => "$start_date",
                        'end_date' => "$end_date",
                        'order_for' => "$order_for",
                        'lunch_time' => $this->encrypt->decode(set_value('lunch_time')),
                        'lunch_address' => $this->encrypt->decode(set_value('lunch_address')),
                        'dinner_time' => $this->encrypt->decode(set_value('dinner_time')),
                        'dinner_address' => $this->encrypt->decode(set_value('dinner_address')),
                        'meal_type' => $this->encrypt->decode(set_value('meal_type')),
                        'meals' => $meals
                    );

                    $data['lunch_address_text'] = $this->common->make_address($data['lunch_address']);
                    $data['dinner_address_text'] = $this->common->make_address($data['dinner_address']);
                    $data['cost_one_meal'] = $this->common->get_meal_cost($data['meal_type']);
                    
                    $total_amount = floor(($data['cost_one_meal'] * $data['meals']) - $this->api->my_wallet(set_value('user_id')));
                    $totalamount = floor(($data['cost_one_meal'] * $data['meals']));
                    $data['total_amount'] = "$total_amount";
                    $data['totalamount'] = "$totalamount";
                    $data['uniqid'] = uniqid();

                    $array = array(
                        'fk_user_id' => $this->encrypt->decode(set_value('user_id')),
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'order_for' => $order_for,
                        'lunch_time' => $this->encrypt->decode(set_value('lunch_time')),
                        'lunch_address' => $this->encrypt->decode(set_value('lunch_address')),
                        'dinner_time' => $this->encrypt->decode(set_value('dinner_time')),
                        'dinner_address' => $this->encrypt->decode(set_value('dinner_address')),
                        'meal_type' => $this->encrypt->decode(set_value('meal_type')),
                        'meals' => $meals,
                        'uniqid' => $data['uniqid'],
                        'order_status' => 0,
                        'create_time' => time(),
                        'amount' => $data['total_amount'],
                        'total_amount' => $data['totalamount']
                    );
                    $this->db->insert('orders', $array);

                    echo ajax_response(1, 'Success', json_encode($data));
                } else {
                    echo ajax_response(0, 'Error1', array());
                }
            } else {
                echo ajax_response(0, 'Error2', array());
            }
        } else
            echo ajax_response(0, 'Error3', validation_errors());
    }

    public function my_wallet() {
        $this->form_validation->set_rules('user_id', 'user_id', 'required|trim');
        if ($this->form_validation->run()) {
            $wallet = $this->api->my_wallet(set_value('user_id'));
            if ($wallet != NULL || $wallet != FALSE)
                echo ajax_response(1, 'Success', json_encode(array('wallet' => $wallet)));
            else {
                echo ajax_response(0, 'Error');
            }
        } else
            echo ajax_response(0, 'Error', validation_errors());
    }

    public function my_orders() {
        $this->form_validation->set_rules('user_id', 'user_id', 'required|trim');
        if ($this->form_validation->run()) {
            $this->load->model("order_model", "order");
            $user_id = $this->encrypt->decode(set_value('user_id'));
            $orders = $this->order->my_orders($user_id);
            if ($orders){
                $k = $orders['amount'];
            	$orders['amount'] = "$k";
            	            	//$orders['total_amount'] = "$orders['total_amount']";
                echo ajax_response(1, 'Success', json_encode($orders));
                
           }
            else {
                echo ajax_response(0, 'Error');
            }
        } else
            echo ajax_response(0, 'Error', validation_errors());
    }

    public function cod() {
        $this->form_validation->set_rules('user_id', 'user_id', 'required|trim');
        $this->form_validation->set_rules('uniqid', 'uniqid', 'required|trim');
        if ($this->form_validation->run()) {

            $user_id = $this->encrypt->decode(set_value('user_id'));
            $uniqid = set_value('uniqid');

            $this->db->where('fk_user_id', $user_id);
            $this->db->where('uniqid', $uniqid);
            $this->db->where('order_status', 0);
            $status = $this->db->update("orders", array('order_status' => 1));

            if ($status)
                echo ajax_response(1, 'Success');
            else {
                echo ajax_response(0, 'Error');
            }
        } else
            echo ajax_response(0, 'Error');
    }

    public function online_payment() {
        $this->form_validation->set_rules('user_id', 'user_id', 'required|trim');
        $this->form_validation->set_rules('firstname', 'firstname', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('phone', 'phone', 'required|trim');
        $this->form_validation->set_rules('uniqid', 'uniqid', 'required|trim');
        
        if ($this->form_validation->run()) {

            $uniqid = set_value('uniqid');
            $this->db->select("amount");
            $this->db->from("orders");
            $this->db->where("uniqid",$uniqid);
            $query = $this->db->get();
            $amount = $query->row()->amount;
            
            $post_data = array(
                'key' => MERCHANT_KEY,
                'txnid' => $uniqid,
                'amount' => "$amount",
                'productinfo' => 'meals',
                'firstname' => set_value('firstname'),
                'email' => set_value('email')
            );

            $hash_string = '';
            foreach ($post_data as $key => $value) {
                $hash_string .= $value;
                $hash_string .= '|';
            }
            $hash_string .= '||||||||||' . MERCHANT_SALT;
            $hash = hash('sha512', $hash_string);
            
            $post_data['phone'] = set_value('phone');
            $post_data['surl'] = BASE_URL . 'api/auth_api/success';
            $post_data['furl'] = BASE_URL . 'api/auth_api/failure';
            $post_data['service_provider'] = 'payu_paisa';
            $post_data['hash'] = $hash;
            $post_data['link'] = PAYU_BASE_URL . '_payment';

            echo ajax_response(1, 'Success', json_encode($post_data));
        } else
            echo ajax_response(0, 'Error');
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
            die('Invalid Transaction.');
        } else {

            $this->db->where("uniqid", $txnid);
            $this->db->where("order_status", 0);
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

                die("Thank You. Your order status is " . $status . "." . " Your Transaction ID for this transaction is " . $txnid . ".</h4>");
            } else
                die('Invalid Transaction.');
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
            die('Invalid Transaction.');
        } else {
            die("Your order status is <b>" . $status . "</b>. Your transaction id for this transaction is " . $txnid . ".");
        }
    }

}