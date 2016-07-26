<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function register($data) {
        $data['password'] = $this->hash_password($data['password']);
        $data['is_activated'] = 1;
        $data['create_time'] = time();
        if (!$this->db->insert("users", $data))
            return false;

        //$this->load->model('email_model');
        //$this->email_model->verification_email($data['email'], $data['name']);
        return true;
    }

    public function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function match_password($password, $hash_password) {
        return password_verify($password, $hash_password);
    }

    public function verify_account($email) {
        $update = array('is_activated' => 1);
        $this->db->where("email", $email);
        $this->db->where("is_activated", 0);
        return $this->db->update("users", $update);
    }

    public function login($data) {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("email", $data['email']);
        $this->db->or_where("mobile", $data['email']);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            if($this->match_password($data['password'], $result->password)){
                if($result->is_activated == 1){
                    $user_data = array(
                        'is_logged_in' => true,
                        'user_details' => array(
                            'id' => $result->pk_user_id,
                            'name' => $result->name,
                            'email' => $result->email,
                            'mobile' => $result->mobile,
                            'wallet' => $result->wallet
                        )
                    );
                    $this->set_session($user_data);
                    return true;
                }else{
                    $this->session->set_flashdata('login_message', 'Your email acoount has not been verified yet.');
                    redirect(BASE_URL.'register/resend_verification_email');
                }
            }
        } else
            return false;
    }
    
    private function set_session($user_data){
        $this->session->set_userdata($user_data);
    }
}
    