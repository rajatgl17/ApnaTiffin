<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (is_logged_in())
            redirect(BASE_URL);
    }

    public function index($msg = '') {
        $data['msg'] = $msg;
        $data['name_session'] = $this->session->flashdata('name');
        $data['email_session'] = $this->session->flashdata('email');
        $data['mobile_session'] = $this->session->flashdata('mobile');

        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('account/register_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function register() {
        $this->form_validation->set_message('is_unique', '%s already exists.');
        $this->form_validation->set_message('matches', 'Passwords do not match.');
        $this->form_validation->set_message('exact_length', 'Enter 10 digit mobile number without 0 or +91.');

        $this->form_validation->set_rules('accept', 'accept', 'callback_accept_check|trim|strip_tags');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[2]|max_length[20]|trim|strip_tags');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]|min_length[6]|max_length[30]|trim|strip_tags');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|trim|strip_tags');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|trim|strip_tags');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric|exact_length[10]|is_unique[users.mobile]|trim|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('name', set_value('name'));
            $this->session->set_flashdata('email', set_value('email'));
            $this->session->set_flashdata('mobile', set_value('mobile'));
            $this->index();
        } else {
            $data['name'] = set_value('name');
            $data['email'] = set_value('email');
            $data['mobile'] = set_value('mobile');
            $data['password'] = set_value('password');

            $this->load->model("auth_model", "auth");
            $status = $this->auth->register($data);
            if ($status)
                $this->index('Your account has been successfully created. You may now login to place order.');
            else
                show_error('There has benn some error. Please retry later', 500);
        }
    }

    function verify_account($email = '') {
        $email = $this->encrypt->decode($email);
        if ($email == '') {
            $data['error'] = 'Invalid or no e-mail address.';
        } else {
            $this->load->model("auth_model", "auth");
            $status = $this->auth->verify_account($email);
            if ($status) {
                $data['msg'] = 'Account verification successful. Please login to continue.';
                $this->load->model('email_model');
                $this->email_model->account_verified_email($email);
            } else
                $data['error'] = 'Either the account is already activated or account do not exists.';
        }

        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('main/empty_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function resend_verification_email() {
        $msg = $this->session->flashdata('login_message');

        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('main/empty_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function accept_check($str) {
        if ($str == 'accept') {
            return true;
        } else {
            $this->form_validation->set_message('accept_check', 'Please accept Terms and Conditions before proceeding.');
            return false;
        }
    }

    public function forgot_password() {
        $data['success_message'] = $this->session->flashdata('success_message');
        $data['error_message'] = $this->session->flashdata('error_message');

        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('account/forgot_password_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function reset_password() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|strip_tags');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric|trim|strip_tags');

        if ($this->form_validation->run()) {
            $email = set_value("email");
            $mobile = set_value("mobile");

            $this->db->select("pk_user_id");
            $this->db->from("users");
            $this->db->where("email", $email);
            $this->db->where("mobile", $mobile);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $this->load->model("auth_model","auth");
                $this->load->model("email_model");
                $result = $query->row();
                $user_id = $result->pk_user_id;
                
                $password = uniqid();
                $update = array("password"=>$this->auth->hash_password($password));
                $this->db->where("pk_user_id",$user_id);
                $this->db->update("users",$update);
                $this->email_model->password_reset_email($email,$password);
                
                $this->session->set_flashdata('success_message', 'Your new password has been sent to your email-account. If you can\'t find the mail check your spam messages.');
                
            } else{
                $this->session->set_flashdata('error_message', 'Invalid account details.');
            }
        }
        $this->forgot_password();
    }

}
