<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_countries() {
        $this->db->select("pk_country_id as id, country");
        $this->db->from("mst_countries");
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key => $value)
            $value->id = $this->encrypt->encode($value->id);
        return $result;
    }

    public function get_regions() {
        $this->db->select("pk_region_id as id, region");
        $this->db->from("mst_regions");
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key => $value)
            $value->id = $this->encrypt->encode($value->id);
        return $result;
    }

    public function get_cities() {
        $this->db->select("pk_city_id as id, city");
        $this->db->from("mst_cities");
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key => $value)
            $value->id = $this->encrypt->encode($value->id);
        return $result;
    }
    
    public function get_lunch_time() {
        $this->db->select("pk_lunch_time_id as id, time");
        $this->db->from("mst_lunch_time");
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key => $value)
            $value->id = $this->encrypt->encode($value->id);
        return $result;
    }
    
    public function get_dinner_time() {
        $this->db->select("pk_dinner_time_id as id, time");
        $this->db->from("mst_dinner_time");
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key => $value)
            $value->id = $this->encrypt->encode($value->id);
        return $result;
    }
    
    public function make_address($address_id){
        $this->db->select(
                "CONCAT(ad.address_line_1, ', ',ad.address_line_2,', ', re.region, ', ',ci.city, ', ',co.country) as address"
                ,FALSE);
        $this->db->from("addresses as ad");
        $this->db->join("mst_regions as re","ad.fk_region_id = re.pk_region_id","left");
        $this->db->join("mst_cities as ci","ad.fk_city_id = ci.pk_city_id","left");
        $this->db->join("mst_countries as co","ad.fk_country_id = co.pk_country_id","left");
        $this->db->where("ad.pk_address_id",$address_id);
        $this->db->where("ad.status",1);
        
        $query = $this->db->get();
        return $query->row()->address;
    }
    
    public function get_home_banners(){
        $this->db->select("path");
        $this->db->from("mst_banners");
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key => $value)
            $value->path = BASE_URL.'assets/images/banners'.$value->path;
        return $result;
    }
    
    public function get_tiffins(){
        $this->db->select("pk_tiffin_id as id, name, price");
        $this->db->from("mst_tiffins");
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key => $value){
            $value->menu = $this->get_food_menu($value->id);
            $value->id = $this->encrypt->encode($value->id);
        }
        return $result;
    }
    
    public function get_food_menu($id){
        if($id == 8){
            $value['mon_l'] = '5 Butter Roti, Paneer Butter Masala, Dal, Sabji, Pulav, Bundi Raita, Salad, Sweet';
            $value['mon'] = BASE_URL.'assets/images/food/special_meal.jpg';
             return $value;
        }
        
        $this->db->select("mon_l,tue_l,wed_l,thu_l,fri_l,sat_l,sun_l,mon_d,tue_d,wed_d,thu_d,fri_d,sat_d,sun_d,mon,tue,wed,thu,fri,sat,sun");
        $this->db->from("mst_food_menu");
        $this->db->where("fk_tiffin_id", $id);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key => $value){
            $value->mon = BASE_URL.'assets/images/food/'.$value->mon;
            $value->tue = BASE_URL.'assets/images/food/'.$value->tue;
            $value->wed = BASE_URL.'assets/images/food/'.$value->wed;
            $value->thu = BASE_URL.'assets/images/food/'.$value->thu;
            $value->fri = BASE_URL.'assets/images/food/'.$value->fri;
            $value->sat = BASE_URL.'assets/images/food/'.$value->sat;
            $value->sun = BASE_URL.'assets/images/food/'.$value->sun;
        }
        return $result;
    }
    
    public function get_address($user_id){
        $this->db->select("pk_address_id as id");
        $this->db->from("addresses");
        $this->db->where("fk_user_id", $user_id);
        $this->db->where("status", 1);
        $query = $this->db->get();
        $result = $query->result();
        
        $res = array();
        foreach ($result as $key => $value){
            $res[$this->encrypt->encode($value->id)] = $this->make_address($value->id);
        }
        return $res;
    }
    
    public function get_meal_cost($id){
        $this->db->select("price");
        $this->db->from("mst_tiffins");
        $this->db->where("pk_tiffin_id",$id);
        
        $query = $this->db->get();
        return $query->row()->price;
    }

}
