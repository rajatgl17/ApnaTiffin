<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user_roles(){
        $this->db->select("pk_user_type_id as id, alias");
        $this->db->from("mst_user_type");
        $query = $this->db->get();
        $result = $query->result();
        
        foreach($result as $key=>$value)
            $value->id = $this->encrypt->encode($value->id);
        return $result;
    }
    
    public function add_user($values){
        $values['fk_user_type_id'] = $this->encrypt->decode($values['fk_user_type_id']);
        $values['password'] = password_hash($values['password'], PASSWORD_DEFAULT );
        return $this->db->insert('admin_users',$values);
    }
    
    public function get_user_list(){
        $this->db->select("users.pk_user_id as user_id, users.username, users.email, users.status, mut.alias as alias, users.fk_user_type_id as user_type");
        $this->db->from("admin_users as users");
        $this->db->join("mst_user_type as mut","users.fk_user_type_id = mut.pk_user_type_id","left");
        $query = $this->db->get();
        $result = $query->result();
        foreach($result as $key=>$value)
            $value->user_id = $this->encrypt->encode($value->user_id);
        return $result;
    }
    
    public function change_user_status($user_id,$status){
        $update = array('status'=>$status);
        $this->db->where("pk_user_id",$user_id);
        $this->db->update("admin_users",$update);
    }
}
