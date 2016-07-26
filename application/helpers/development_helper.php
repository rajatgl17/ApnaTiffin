<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('prd')) {

    function prd($param) {
        print_r($param);
        die;
    }

}

function ajax_response($s, $m, $d = array()) {
    header('Content-type: application/json');
    echo json_encode(array('msg' => $m, 'data' => $d, 'status' => $s));
    exit;
}

function meal_num($start_date, $end_date, $order_for) {
    $start_date_u = strtotime(date_format(date_create_from_format('Ymd', $start_date), 'Y-m-d'));
    $end_date_u = strtotime(date_format(date_create_from_format('Ymd', $end_date), 'Y-m-d'));

    $days = floor($end_date_u - $start_date_u) / (60 * 60 * 24);
    if ($order_for == 0)
        $days = $days * 2;
    if ($start_date == date("Ymd")) {
        $order_time = time();
        if ($order_for == 1 || $order_for == 0) { 
            $max_lunch_time = strtotime(date("Y-m-d").' '.LUNCH_BEFORE);
            if($max_lunch_time > $order_time)
                $days++;
        }
        if ($order_for == 2 || $order_for == 0) {
            $max_dinner_time = strtotime(date("Y-m-d").' '.DINNER_BEFORE);
            if($max_dinner_time > $order_time)
                $days++;
        }
    } else {
    	if($order_for == 0)
    		$days = $days + 2;
   	else
   		$days++;
    }
    return $days;
}
