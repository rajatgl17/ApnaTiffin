<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('is_logged_in')) {

    function is_logged_in() {
        $CI = & get_instance();
        return $CI->session->userdata('is_logged_in');
    }

}

if (!function_exists('my_name')) {

    function my_name() {
        $CI = & get_instance();
        $user_details = $CI->session->userdata('user_details');
        return $user_details['name'];
    }

}

if (!function_exists('my_userid')) {

    function my_userid() {
        $CI = & get_instance();
        $user_details = $CI->session->userdata('user_details');
        return $user_details['id'];
    }

}

if (!function_exists('my_email')) {

    function my_email() {
        $CI = & get_instance();
        $user_details = $CI->session->userdata('user_details');
        return $user_details['email'];
    }

}

if (!function_exists('my_mobile')) {

    function my_mobile() {
        $CI = & get_instance();
        $user_details = $CI->session->userdata('user_details');
        return $user_details['mobile'];
    }

}

if (!function_exists('my_wallet')) {

    function my_wallet() {
        $CI = & get_instance();
        $user_details = $CI->session->userdata('user_details');
        return $user_details['wallet'];
    }

}
