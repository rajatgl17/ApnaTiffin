<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function change_password($user){
        $this->db->select("password");
        $this->db->from("admin_users");
        $this->db->where("pk_user_id",$user['user_id']);
        $query = $this->db->get();
        $result = $query->row();
        
        if(!$result)
            return false;
        
        if(password_verify($user['cpassword'], $result->password)){
            $update = array('password' => password_hash($user['password'], PASSWORD_DEFAULT ));
            $this->db->where("pk_user_id",$user['user_id']);
            return $this->db->update("admin_users",$update);
        } else {
            return false;
        }
    }
}
