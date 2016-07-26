<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($error = '') {
        if(is_logged_in())
            redirect(BASE_URL);
        $data['error'] = $error;
        
        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('account/login_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }
    
    public function login(){
        if(is_logged_in())
            redirect(BASE_URL);
        $this->form_validation->set_rules('email', 'Email or Mobile Number', 'required|trim|strip_tags');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else{
            $data['email'] = set_value('email');
            $data['password'] = set_value('password');
            
            $this->load->model("auth_model", "auth");
            $status = $this->auth->login($data);
            
            if($status){
                redirect(BASE_URL.'order');
            } else {
                $this->index('Invalid Login credentials');
            }
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(BASE_URL);
    }

}
