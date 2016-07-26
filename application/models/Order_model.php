<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function my_orders($user_id) {
        $this->db->select("o.pk_order_id as order_id,o.order_for as order_for, o.start_date as sd, o.end_date as ed, o.meal_type as type, o.amount as amount, o.order_status as status, mt.name as name, o.meals as meals");
        $this->db->from("orders as o");
        $this->db->join("mst_tiffins as mt", "o.meal_type = mt.pk_tiffin_id", "inner");
        $this->db->where("o.fk_user_id", $user_id);
        $this->db->where("o.order_status", "1");

        $this->db->or_where("o.order_status", "3");
        $this->db->where("o.fk_user_id", $user_id);
        $this->db->where("o.is_checked", 0);
        $this->db->limit(50);
        $this->db->order_by("o.create_time", "desc");

        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key => $value) {
            $value->cancellable = 0;
            if ($value->sd < date("Ymd") && $value->status == 3) {
                $value->cancellable = 1;
            }

            $value->order_id = $this->encrypt->encode($value->order_id);
            switch ($value->order_for) {
                case 0:
                    $value->order_for = 'Both Lunch and Dinner';
                    break;
                case 1:
                    $value->order_for = 'Only Lunch';
                    break;
                case 2:
                    $value->order_for = 'Only Dinner';
                    break;
            }
            $value->sd = date_format(date_create_from_format('Ymd', $value->sd), 'd F, Y');
            $value->ed = date_format(date_create_from_format('Ymd', $value->ed), 'd F, Y');
            switch ($value->status) {
                case 1:
                    $value->status = 'COD';
                    break;
                case 2:
                    $value->status = 'Pending';
                    break;
                case 3:
                    $value->status = 'Online Payment';
                    break;
            }
        }
        return $result;
    }

}
