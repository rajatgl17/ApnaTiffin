<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($user){
        $this->db->select("*");
        $this->db->from("admin_users");
        $this->db->where("email",$user['email']);
        $this->db->where("status",1);
        
        $query = $this->db->get();
        $result = $query->row();
        if(!$result)
            return false;
        if(password_verify($user['password'], $result->password)){
            $session_details = array(
                'logged_in' => true,
                'username' => $result->username,
                'email' => $result->email,
                'user_id' => $result->pk_user_id,
                'user_type' => $result->fk_user_type_id
            );
            $this->session->set_userdata($session_details);
            redirect(BASE_URL);
        } else
            return false;
    }
}
