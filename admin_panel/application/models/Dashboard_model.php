<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function change_password($user) {
        $this->db->select("password");
        $this->db->from("admin_users");
        $this->db->where("pk_user_id", $user['user_id']);
        $query = $this->db->get();
        $result = $query->row();

        if (!$result)
            return false;

        if (password_verify($user['cpassword'], $result->password)) {
            $update = array('password' => password_hash($user['password'], PASSWORD_DEFAULT));
            $this->db->where("pk_user_id", $user['user_id']);
            return $this->db->update("admin_users", $update);
        } else {
            return false;
        }
    }

    public function get_registered_users() {
        $this->db->select("*");
        $this->db->from("users");
        $query = $this->db->get();
        return $query->result();
    }

    public function make_address($address_id) {
        $this->db->select(
                "CONCAT(ad.address_line_1, ', ',ad.address_line_2,', ', re.region, ', ',ci.city, ', ',co.country) as address"
                , FALSE);
        $this->db->from("addresses as ad");
        $this->db->join("mst_regions as re", "ad.fk_region_id = re.pk_region_id", "left");
        $this->db->join("mst_cities as ci", "ad.fk_city_id = ci.pk_city_id", "left");
        $this->db->join("mst_countries as co", "ad.fk_country_id = co.pk_country_id", "left");
        $this->db->where("ad.pk_address_id", $address_id);

        $query = $this->db->get(); 
        return $query->row()->address;
    }

    public function all_orders(){
        $this->db->select("u.name as name,"
                . " u.mobile as mobile,"
                . " o.order_for as order_for,"
                . "o.lunch_address as lunch_address,"
                . "o.dinner_address as dinner_address,"
                . "mlt.time as lunch_time,"
                . "mdt.time as dinner_time,"
                . "mt.name as meal_type,"
                . "o.meals as meals,"
                . "o.start_date as start_date,"
                . "o.end_date as end_date,"
                . "o.total_amount as total_amount,"
                . "o.amount as amount,"
                . "o.create_time as create_time,"
                . "o.order_status as order_status");
        $this->db->from("orders as o");
        $this->db->join("users as u","o.fk_user_id = u.pk_user_id","inner");
        $this->db->join("mst_tiffins as mt","o.meal_type = mt.pk_tiffin_id","inner");
        $this->db->join("mst_lunch_time as mlt","o.lunch_time = mlt.pk_lunch_time_id","inner");
        $this->db->join("mst_dinner_time as mdt","o.dinner_time = mdt.pk_dinner_time_id","inner");
        $this->db->where("o.order_status",1);
        //$this->db->where("o.is_checked",0);
        
        $this->db->or_where("o.order_status",3);
        //$this->db->where("o.is_checked",0);
        
        $this->db->order_by("create_time","desc");
        
        
        $query = $this->db->get();
        $result = $query->result();
        
        foreach($result as $key=>$value){
            if($value->order_for == 0){
                $value->order_for = 'Both lunch and dinner';
                $value->lunch_address = $this->make_address($value->lunch_address);
                $value->dinner_address = $this->make_address($value->dinner_address);
            } else if($value->order_for == 1){
                $value->order_for = 'Only lunch';
                $value->lunch_address = $this->make_address($value->lunch_address);
                $value->dinner_address = '-';
                $value->dinner_time = '-';
            } else if($value->order_for == 2){
                $value->order_for = 'Only dinner';
                $value->lunch_address = '-';
                $value->dinner_address = $this->make_address($value->dinner_address);
                $value->lunch_time = '-';
            }
            
            if($value->order_status == 1){
                $value->amount = 'COD (Rs. '.$value->amount.')';
            } else if($value->order_status == 3){
                $value->amount = 'Online Payment';
            }
            
            $value->start_date = date_format(date_create_from_format('Ymd', $value->start_date), 'd F, y');
            $value->end_date = date_format(date_create_from_format('Ymd', $value->end_date), 'd F, y');
        } 
        return $result;
    }
    
    public function new_orders(){
        $this->db->select("u.name as name,"
                . " u.mobile as mobile,"
                . " o.order_for as order_for,"
                . "o.lunch_address as lunch_address,"
                . "o.dinner_address as dinner_address,"
                . "mlt.time as lunch_time,"
                . "mdt.time as dinner_time,"
                . "mt.name as meal_type,"
                . "o.meals as meals,"
                . "o.start_date as start_date,"
                . "o.end_date as end_date,"
                . "o.total_amount as total_amount,"
                . "o.amount as amount,"
                . "o.create_time as create_time,"
                . "o.order_status as order_status");
        $this->db->from("orders as o");
        $this->db->join("users as u","o.fk_user_id = u.pk_user_id","inner");
        $this->db->join("mst_tiffins as mt","o.meal_type = mt.pk_tiffin_id","inner");
        $this->db->join("mst_lunch_time as mlt","o.lunch_time = mlt.pk_lunch_time_id","inner");
        $this->db->join("mst_dinner_time as mdt","o.dinner_time = mdt.pk_dinner_time_id","inner");
        $this->db->where("o.order_status",1);
        $this->db->where("o.is_checked",0);
        
        $this->db->or_where("o.order_status",3);
        $this->db->where("o.is_checked",0);
        
        $this->db->order_by("create_time","desc");
        
        
        $query = $this->db->get();
        $result = $query->result();
        
        foreach($result as $key=>$value){
            if($value->order_for == 0){
                $value->order_for = 'Both lunch and dinner';
                $value->lunch_address = $this->make_address($value->lunch_address);
                $value->dinner_address = $this->make_address($value->dinner_address);
            } else if($value->order_for == 1){
                $value->order_for = 'Only lunch';
                $value->lunch_address = $this->make_address($value->lunch_address);
                $value->dinner_address = '-';
                $value->dinner_time = '-';
            } else if($value->order_for == 2){
                $value->order_for = 'Only dinner';
                $value->lunch_address = '-';
                $value->dinner_address = $this->make_address($value->dinner_address);
                $value->lunch_time = '-';
            }
            
            if($value->order_status == 1){
                $value->amount = 'COD (Rs. '.$value->amount.')';
            } else if($value->order_status == 3){
                $value->amount = 'Online Payment';
            }
            
            $value->start_date = date_format(date_create_from_format('Ymd', $value->start_date), 'd F, y');
            $value->end_date = date_format(date_create_from_format('Ymd', $value->end_date), 'd F, y');
        } 
        return $result;
    }
}
