<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cronjob extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function flush_lunch() {
        //if (date('H') > 14 && date('H') < 16) {
            $update = array('is_checked' => 1);
            $this->db->where("end_date <=", date("Ymd"));
            $this->db->where("order_for", 1);
            $this->db->update("orders", $update);
        //}
    }

    public function flush_dinner() {
        //if (date('H') > 20 && date('H') < 22) {
            $update = array('is_checked' => 1);
            $this->db->where("end_date <=", date("Ymd"));
            $this->db->where("order_for", 0);

            $this->db->or_where("end_date <=", date("Ymd"));
            $this->db->where("order_for", 2);
            $this->db->update("orders", $update);
        //}
    }

}
