<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function decrypt_password($password) {
        return base64_decode(substr($password, 2, -2));
    }

    public function match_password($email, $password) {
        //$password = $this->decrypt_password($password);
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("email", $email);
        $this->db->or_where("mobile", $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            if (password_verify($password, $result->password))
                return $result->pk_user_id;
            else
                return false;
        } else
            return false;
    }

    public function user_data($user_id) {
        $this->load->model("common_model","common");
        
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("pk_user_id", $user_id);
        $result = $this->db->get()->row();
        
        $addresses = $this->common->get_address($result->pk_user_id);
        $address = "";
        foreach($addresses as $key=>$value){
        	$address .= $key."{S;sr;R}".$value."{S;sr;R}";
        }

        $res = array(
            'user_id' => $this->encrypt->encode($result->pk_user_id),
            'name' => $result->name,
            'email' => $result->email,
            'mobile' => $result->mobile,
            //'address' => json_encode($this->common->get_address($result->pk_user_id))
            'address' => $address
        );
        return $res;
    }
    
    public function my_wallet($user_id){
        $user_id = $this->encrypt->decode($user_id);
        $this->db->select("wallet");
        $this->db->from("users");
        $this->db->where("pk_user_id",$user_id);
        $query = $this->db->get();
        $result = $query->row();
        
        if($result)
            return $result->wallet;
        else
            return false;
    }

}