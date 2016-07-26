<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Static_pages extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function contact_us() {
        $data['success_message'] = '';

        $this->form_validation->set_rules('name', 'Name', 'required|trim|strip_tags');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|strip_tags|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim|strip_tags');
        $this->form_validation->set_rules('message', 'Message', 'required|trim|strip_tags');

        if ($this->form_validation->run()) {
            $values['name'] = set_value('name');
            $values['email'] = set_value('email');
            $values['subject'] = set_value('subject');
            $values['message'] = set_value('message');
            $values['timestamp'] = time();

            $this->db->insert("contact_us", $values);
            $data['success_message'] = 'Thanks for contacting us. We will get back to you soon.';
        }

        $data['css_files'] = array();
        $data['js_files'] = array('map.js');
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('static/contact_us_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function about_us() {
        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('static/about_us_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }
    
    public function test(){
        $data['css_files'] = array();
        $data['js_files'] = array();
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('main/empty_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

	public function terms_and_conditions(){
		$data['css_files'] = array();
        	$data['js_files'] = array();
        	$data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        	$data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        	$data['main_content'] = $this->load->view('static/terms_conditions_view', $data, true);
        	$data['footer'] = $this->load->view('footers/footer_view', $data, true);
        	$this->load->view('templates/main_template_view', $data);
	}
}
