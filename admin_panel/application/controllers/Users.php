<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model','user');
        if(!$this->session->userdata('logged_in'))
            redirect(BASE_URL.'auth');
        
        if($this->session->userdata('user_type') != 1)
            redirect(BASE_URL);
    }

    public function index() {
        $data['user_list'] = $this->user->get_user_list();
        $data['css'] = array('jquery.dataTables.min.css','dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js','dataTables.responsive.js','pages/users.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/users_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function add_user() {
        $data['success_message'] = $this->session->flashdata('success_message');
        $data['error_message'] = $this->session->flashdata('error_message');
        
        $data['user_roles'] = $this->user->get_user_roles();
        
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/add_user_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function add_new_user() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Username', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|trim|valid_email');
        $this->form_validation->set_rules('user_role', 'User Role', 'required|trim');

        if ($this->form_validation->run()) {
            $values['username'] = set_value('name');
            $values['email'] = set_value('email');
            $values['password'] = set_value('password');
            $values['fk_user_type_id'] = set_value('user_role');
            
            $status = $this->user->add_user($values);
            if($status)
                $this->session->set_flashdata('success_message', 'User added successfully');
            else
                $this->session->set_flashdata('error_message', 'There has been some error. please retry later.');
        }
        $this->add_user();
    }
    
    public function activate_user($user_id=''){
        $user_id = $this->encrypt->decode($user_id);
        if($user_id != ''){
            $this->user->change_user_status($user_id,1);
        }
        redirect(BASE_URL.'users');
    }
    
    public function deactivate_user($user_id=''){
        $user_id = $this->encrypt->decode($user_id);
        if($user_id != ''){
            $this->user->change_user_status($user_id,0);
        }
        redirect(BASE_URL.'users');
    }

}
