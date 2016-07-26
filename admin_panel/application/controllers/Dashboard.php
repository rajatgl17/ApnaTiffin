<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in'))
            redirect(BASE_URL . 'auth');
        $this->load->model("dashboard_model", "dashboard");
    }

    public function index() {
        $this->new_orders();
    }

    public function new_orders() {
        $data['orders'] = $this->dashboard->new_orders();
        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('dashboard/new_orders', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function registered_users() {
        $data['registered_users'] = $this->dashboard->get_registered_users();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('dashboard/registered_users_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function contact_queries() {
        $data['contact_queries'] = $this->db->order_by('timestamp', 'DSC')->get_where("contact_us", array('status' => 1))->result();

        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('dashboard/contact_queries_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function delete_contact_query($id = '') {
        if ($id != '') {
            $id = $this->encrypt->decode($id);
            $this->db->where("pk_contact_id", $id);
            $this->db->update("contact_us", array('status' => 0));
        }
        redirect(BASE_URL . 'dashboard/contact_queries');
    }

    public function all_orders() {
        $data['orders'] = $this->dashboard->all_orders();
        $data['css'] = array('jquery.dataTables.min.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.responsive.js', 'pages/datatables.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('dashboard/all_orders', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function download_all_orders() {
        $orders = $this->dashboard->all_orders();
        header('Content-Disposition: attachment; filename=Orders.xls');
        header('Content-type: application/force-download');
        header('Content-Transfer-Encoding: binary');
        header('Pragma: public');

        echo 'Name' . "\t" . 'Mobile' . "\t" . 'Order For' . "\t" . 'Lunch address' . "\t" . 'Dinner Address' . "\t" . 'Lunch time' . "\t" . 'Dinner Time' . "\t" . 'Meal type' . "\t" . 'Number of Meals' . "\t" . 'Start Date' . "\t" . 'End Date' . "\t" . 'Total Amount' . "\t" . 'Amount to be Paid' . "\t" . 'Create Time' . "\t" . 'Order Status' . "\n\n";
        foreach ($orders as $key => $value) {
            foreach ($value as $k => $v)
                echo $v . "\t";
            echo "\n";
        }
    }

    public function add_user_info($user_id) {
        $user_id = $this->encrypt->decode($user_id);
        if ($user_id) {
            $data['user_id'] = $user_id;
            $data['css'] = array();
            $data['js'] = array();
            $data['header'] = $this->load->view('headers/header_view', $data, true);
            $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
            $data['main'] = $this->load->view('dashboard/add_user_info', $data, true);
            $this->load->view('templates/main_template_view', $data);
        } else
            redirect(BASE_URL);
    }

}
