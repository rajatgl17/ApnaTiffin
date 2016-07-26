<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model', 'common');
    }

    public function get_countries() {
        $result = $this->common->get_countries();
        if ($result)
            echo ajax_response (1, 'Success', $result);
        else
            echo ajax_response (1, 'There has been some error');
    }

    public function get_cities() {
        $result = $this->common->get_cities();
        if ($result)
            echo ajax_response (1, 'Success', $result);
        else
            echo ajax_response (1, 'There has been some error');
    }
    
    public function get_regions() {
        $result = $this->common->get_regions();
        if ($result)
            echo ajax_response (1, 'Success', $result);
        else
            echo ajax_response (1, 'There has been some error');
    }
    
    public function get_lunch_time() {
        $result = $this->common->get_lunch_time();
        if ($result)
            echo ajax_response (1, 'Success', $result);
        else
            echo ajax_response (1, 'There has been some error');
    }
    
    public function get_dinner_time() {
        $result = $this->common->get_dinner_time();
        if ($result)
            echo ajax_response (1, 'Success', $result);
        else
            echo ajax_response (1, 'There has been some error');
    }
    
    public function get_home_banners(){
        $result = $this->common->get_home_banners();
        if ($result)
            echo ajax_response (1, 'Success', $result);
        else
            echo ajax_response (1, 'There has been some error');
    }
    
    public function get_tiffins(){
        $result = $this->common->get_tiffins();
        $result['is_discount_available'] = IS_DISCOUNT_AVAILABLE;
        $result['discount'] = DISCOUNT;
        
        if ($result)
            echo ajax_response (1, 'Success', $result);
        else
            echo ajax_response (1, 'There has been some error');
    }
}
