<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model','auth');        
    }

    public function index() {
        if($this->session->userdata('logged_in'))
            redirect(BASE_URL);
        $data['error_message'] = $this->session->flashdata('error_message');
        $data['css'] = array();
        $data['js'] = array();
        $data['main'] = $this->load->view('main/login_view', $data,true);
        $this->load->view('templates/basic_template_view', $data);
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(BASE_URL);
    }
    
    public function login(){
        if($this->session->userdata('logged_in'))
            redirect(BASE_URL);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run()) {
            $user['email'] = set_value('email');
            $user['password'] = set_value('password');
            $status = $this->auth->login($user);
            if(!$status){
                $this->session->set_flashdata('error_message', 'Invalid credentials.');
            }                
        }
        $this->index();
    }
}
