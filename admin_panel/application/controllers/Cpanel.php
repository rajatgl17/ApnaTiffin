<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cpanel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in'))
            redirect(BASE_URL . 'auth');

        if ($this->session->userdata('user_type') != 1)
            redirect(BASE_URL);
    }

    public function country() {
        $data['countries'] = $this->db->get_where('mst_countries', array('status' => 1))->result();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/country_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function city() {
        $data['cities'] = $this->db->get_where('mst_cities', array('status' => 1))->result();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/city_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function region() {
        $data['regions'] = $this->db->get_where('mst_regions', array('status' => 1))->result();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/region_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function add_country() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required|trim');
        if ($this->form_validation->run()) {
            $this->db->insert("mst_countries", array('country' => set_value('country')));
        }
        redirect(BASE_URL . 'cpanel/country');
    }

    public function add_city() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('city', 'city', 'required|trim');
        if ($this->form_validation->run()) {
            $this->db->insert("mst_cities", array('city' => set_value('city')));
        }
        redirect(BASE_URL . 'cpanel/city');
    }

    public function add_region() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('region', 'region', 'required|trim');
        if ($this->form_validation->run()) {
            $this->db->insert("mst_regions", array('region' => set_value('region')));
        }
        redirect(BASE_URL . 'cpanel/region');
    }

    public function delete_country($id = '') {
        if ($id != '') {
            $id = $this->encrypt->decode($id);
            $this->db->where("pk_country_id", $id);
            $this->db->update("mst_countries", array('status' => 0));
        }
        redirect(BASE_URL . 'cpanel/country');
    }

    public function delete_city($id = '') {
        if ($id != '') {
            $id = $this->encrypt->decode($id);
            $this->db->where("pk_city_id", $id);
            $this->db->update("mst_cities", array('status' => 0));
        }
        redirect(BASE_URL . 'cpanel/city');
    }

    public function delete_region($id = '') {
        if ($id != '') {
            $id = $this->encrypt->decode($id);
            $this->db->where("pk_region_id", $id);
            $this->db->update("mst_regions", array('status' => 0));
        }
        redirect(BASE_URL . 'cpanel/region');
    }

    public function lunch_time() {
        $data['lunch_time'] = $this->db->get_where('mst_lunch_time', array('status' => 1))->result();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/lunch_time_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function dinner_time() {
        $data['dinner_time'] = $this->db->get_where('mst_dinner_time', array('status' => 1))->result();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/dinner_time_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function add_lunch_time() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lunch_time', 'lunch_time', 'required|trim');
        if ($this->form_validation->run()) {
            $this->db->insert("mst_lunch_time", array('time' => set_value('lunch_time')));
        }
        redirect(BASE_URL . 'cpanel/lunch_time');
    }

    public function add_dinner_time() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('dinner_time', 'dinner_time', 'required|trim');
        if ($this->form_validation->run()) {
            $this->db->insert("mst_dinner_time", array('time' => set_value('dinner_time')));
        }
        redirect(BASE_URL . 'cpanel/dinner_time');
    }

    public function delete_lunch_time($id = '') {
        if ($id != '') {
            $id = $this->encrypt->decode($id);
            $this->db->where("pk_lunch_time_id", $id);
            $this->db->update("mst_lunch_time", array('status' => 0));
        }
        redirect(BASE_URL . 'cpanel/lunch_time');
    }

    public function delete_dinner_time($id = '') {
        if ($id != '') {
            $id = $this->encrypt->decode($id);
            $this->db->where("pk_dinner_time_id", $id);
            $this->db->update("mst_dinner_time", array('status' => 0));
        }
        redirect(BASE_URL . 'cpanel/dinner_time');
    }

    public function banners() {
        $data['banners'] = $this->db->get_where('mst_banners', array('status' => 1))->result();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/banners_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function delete_banner($id = '') {
        if ($id != '') {
            $id = $this->encrypt->decode($id);
            $this->db->where("pk_banner_id", $id);
            $this->db->update("mst_banners", array('status' => 0));
        }
        redirect(BASE_URL . 'cpanel/banners');
    }

    public function add_banner() {
        $config['upload_path'] = FCPATH . '../assets/images/banners/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = true;
        $config['max_size'] = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload()) {
            $img_data = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] = $img_data['full_path'];
            $config['width'] = 1170;
            $config['height'] = 470;
            $config['maintain_ratio'] = false;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $this->db->insert('mst_banners', array('path' => $img_data['file_name']));
        }
        redirect(BASE_URL . 'cpanel/banners');
    }

    public function tiffin() {
        $data['tiffins'] = $this->db->get_where("mst_tiffins", array('status' => 1))->result();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/tiffin_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function add_tiffin() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('price', 'price', 'required|trim|integer');
        $this->form_validation->set_rules('is_menu_available', 'is_menu_available', 'required|trim|integer');

        if ($this->form_validation->run()) {
            $this->db->insert("mst_tiffins", array('name' => set_value('name'), 'price' => set_value('price'), 'is_menu_available' => set_value('is_menu_available')));
            if(set_value('is_menu_available')) {
                $id = $this->db->insert_id();
                $this->db->insert("mst_food_menu", array('fk_tiffin_id' => $id));
            }
        }
        redirect(BASE_URL . 'cpanel/tiffin');
    }

    public function delete_tiffin($id = '') {
        if ($id != '') {
            $id = $this->encrypt->decode($id);
            $this->db->where("pk_tiffin_id", $id);
            $this->db->update("mst_tiffins", array('status' => 0));
        }
        redirect(BASE_URL . 'cpanel/tiffin');
    }

    public function menu($id = '') {
        $dec_id = $this->encrypt->decode($id);
        if ($dec_id == '') {
            $res = $this->db->get_where("mst_tiffins", array('status' => 1,'is_menu_available'=>1))->row();
            $dec_id = $res->pk_tiffin_id;
            $id = $this->encrypt->encode($dec_id);
            redirect(BASE_URL . 'cpanel/menu/' . $id);
        }
        $data['selected_tiffin_id'] = $dec_id;
        $data['tiffins'] = $this->db->get_where("mst_tiffins", array('status' => 1,'is_menu_available'=>1))->result();
        $data['food_menu'] = $this->db->get_where("mst_food_menu", array('fk_tiffin_id' => $dec_id))->row();

        $data['css'] = array();
        $data['js'] = array('pages/menu.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/menu_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function change_menu() {
        $data['mon_l'] = $this->input->post('mon_l');
        $data['tue_l'] = $this->input->post('tue_l');
        $data['wed_l'] = $this->input->post('wed_l');
        $data['thu_l'] = $this->input->post('thu_l');
        $data['fri_l'] = $this->input->post('fri_l');
        $data['sat_l'] = $this->input->post('sat_l');
        $data['sun_l'] = $this->input->post('sun_l');

        $data['mon_d'] = $this->input->post('mon_d');
        $data['tue_d'] = $this->input->post('tue_d');
        $data['wed_d'] = $this->input->post('wed_d');
        $data['thu_d'] = $this->input->post('thu_d');
        $data['fri_d'] = $this->input->post('fri_d');
        $data['sat_d'] = $this->input->post('sat_d');
        $data['sun_d'] = $this->input->post('sun_d');

        $id = $this->encrypt->decode($this->input->post('tiffin_id'));
        $this->db->where("fk_tiffin_id", $id);
        $this->db->update("mst_food_menu", $data);
        $id = $this->encrypt->encode($id);
        redirect(BASE_URL . 'cpanel/menu/' . $id);
    }

    public function price($id = '') {
        $dec_id = $this->encrypt->decode($id);
        if ($dec_id == '') {
            $res = $this->db->get_where("mst_tiffins", array('status' => 1))->row();
            $dec_id = $res->pk_tiffin_id;
            $id = $this->encrypt->encode($dec_id);
            redirect(BASE_URL . 'cpanel/price/' . $id);
        }
        $data['selected_tiffin_id'] = $dec_id;
        $data['tiffins'] = $this->db->get_where("mst_tiffins", array('status' => 1))->result();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js', 'pages/price.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/price_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function change_price() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('price', 'price', 'required|trim|integer');
        $this->form_validation->set_rules('tiffin_id', 'tiffin_id', 'required|trim');
        if ($this->form_validation->run()) {
            $this->db->where('pk_tiffin_id', $this->encrypt->decode(set_value('tiffin_id')));
            $this->db->update("mst_tiffins", array('price' => set_value('price')));
        }
        redirect(BASE_URL . 'cpanel/price');
    }

    public function menu_image($id = '') {
        $dec_id = $this->encrypt->decode($id);
        if ($dec_id == '') {
            $res = $this->db->get_where("mst_tiffins", array('status' => 1,'is_menu_available'=>1))->row();
            $dec_id = $res->pk_tiffin_id;
            $id = $this->encrypt->encode($dec_id);
            redirect(BASE_URL . 'cpanel/menu_image/' . $id);
        }
        $data['selected_tiffin_id'] = $dec_id;
        $data['tiffins'] = $this->db->get_where("mst_tiffins", array('status' => 1,'is_menu_available'=>1))->result();
        $data['food_menu'] = $this->db->get_where("mst_food_menu", array('fk_tiffin_id' => $dec_id))->row();

        $data['css'] = array();
        $data['js'] = array('pages/menu_image.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/menu_image_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function change_menu_image() {

        $tiffin_id = $this->input->post('tiffin_id');
        $field = $this->input->post('field');

        $config['upload_path'] = FCPATH . '../assets/images/food/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = true;
        $config['max_size'] = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload()) {
            $img_data = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] = $img_data['full_path'];
            $config['width'] = 220;
            $config['height'] = 220;
            $config['maintain_ratio'] = false;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();


            $this->db->where("fk_tiffin_id", $tiffin_id);
            $this->db->update('mst_food_menu', array($field => $img_data['file_name']));
        }
        redirect(BASE_URL . 'cpanel/menu_image');
    }

    public function constants(){
        $data['constants'] = $this->db->get_where("mst_constants")->result();
        
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('cpanel/constants_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }
    
    public function change_constants(){
        foreach ($_POST as $key => $value) {
            $this->db->where("pk_id", $key);
            $this->db->update('mst_constants', array('value' => $this->input->post($key)));
        }
        redirect(BASE_URL . 'cpanel/constants');
    }
}
