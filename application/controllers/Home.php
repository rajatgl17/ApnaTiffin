<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['banners'] = $this->db->get_where("mst_banners",array('status'=>1))->result();
        $data['food_menu'] = $this->db->get_where("mst_tiffins",array('status'=>1,'is_menu_available'=>1))->result();
        foreach($data['food_menu'] as $key=>$value){
            $value->menu = $this->db->get_where("mst_food_menu",array('fk_tiffin_id'=>$value->pk_tiffin_id))->row();
        }        
        
        $data['css_files'] = array('owl.carousel.css');
        $data['js_files'] = array('owl.carousel.min.js','pages/home.js');
        $data['header_top'] = $this->load->view('headers/header_top_view', $data, true);
        $data['header_bottom'] = $this->load->view('headers/header_bottom_view', $data, true);
        $data['main_content'] = $this->load->view('main/home_view', $data, true);
        $data['footer'] = $this->load->view('footers/footer_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

}
