<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Super_Admin extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) {
            redirect("admin_login", "refresh");
        }
        $this->load->model('super_admin_model', 'sa_model', true);
        $this->load->model('application_model');
        $this->load->model('checkout_model');
        $this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ck_editor',
            'path' => 'js/ckeditor',
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "600px", //Setting a custom width
                'height' => '200px', //Setting a custom height
            ),
        );
        $this->load->model('application_Model');
    }

    public function index() {
        $data = array();
        $data['title'] = "Dashboard";
        $data['report_info'] = $this->sa_model->select_report_info();
        $data['total_sales_info'] = $this->sa_model->total_select_count_info();
        $data['today_order_info'] = $this->sa_model->today_total_order_info();
        $data['total_product'] = $this->sa_model->total_product_sales_info();
        $data['cancel_order_info'] = $this->sa_model->total_cancel_order_info();
        $data['month_report_info'] = $this->sa_model->month_select_report_info();
        $data['most_view_product'] = $this->sa_model->select_popular_product();
        $data['admin_maincontent'] = $this->load->view('admin/dashboard', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function logout() {
        $this->session->unset_userdata('admin_full_name');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('login_status');
        session_destroy();
        $sdata = array();
        $sdata['message'] = "You are Successfully Logout !";
        $this->session->set_userdata($sdata);
        redirect("admin_login", "refresh");
    }

    public function add_category() {
        $data = array();
        $data['title'] = "Manage Categories";

        $data['admin_maincontent'] = $this->load->view('admin/category_form', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_category() {
        $data = array();
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['publication_status'] = $this->input->post('publication_status', true);
        $this->sa_model->save_category_info($data);
        $sdata = array();
        $sdata['message'] = "Save category Successfully!";
        $this->session->set_userdata($sdata);
        redirect("super_admin/add_category");
    }

    public function add_product() {
        $data = array();
        $data['title'] = "Manage product";
        $data['editor'] = $this->data;

        $data['all_category'] = $this->application_model->select_all_category();
        $data['admin_maincontent'] = $this->load->view('admin/product_form', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_product() {

        $config['upload_path'] = './images/product/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $fdata = array();
        $error = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('product_image')) {
            $error = array('error' => $this->upload->display_errors());

            echo '<pre>';
            print_r($error);
            exit();
            //$this->load->view('upload_form', $error);
        } else {
            $fdata = $this->upload->data();
            /* echo '<pre>';
              print_r($fdata);
              exit(); */
            $data = array();
            $data['product_name'] = $this->input->post('product_name', true);
            $data['category_id'] = $this->input->post('category_id', true);
            $data['product_price'] = $this->input->post('product_price', true);
            $data['product_quantity'] = $this->input->post('product_quantity', true);
            $data['product_sku'] = $this->input->post('serial_no', true);
            $data['product_short_description'] = $this->input->post('short_description', true);
            $data['product_long_description'] = $this->input->post('long_description', true);
            $data['product_status'] = $this->input->post('publication_status', true);
            $data['product_image'] = 'images/product/' . $fdata['file_name'];
            $this->sa_model->save_product_info($data);
            $sdata = array();
            $sdata['message'] = "Save Product Successfully!";
            $this->session->set_userdata($sdata);
            redirect("super_admin/add_product");
        }
    }

    public function all_product() {
        $data = array();
        $data['title'] = "Manage product";

        $data['all_product'] = $this->sa_model->select_all_product();
        $all_product = $this->sa_model->select_all_product();
        foreach ($all_product as $v_product) {
            if ($v_product->product_quantity <= 18) {

                /* ---------Start Email---------------- */
                $mdata = array();
                $mdata['from_address'] = "juelrana0@gmail.com";
                $mdata['admin_full_name'] = "Ecommerce";
                $mdata['to_address'] = 'juelrana0@gmail.com';
                $mdata['subject'] = 'this product stock very low';
                $mdata['product_name'] = $v_product->product_name;
                $this->load->model('mailer_model');
                $this->mailer_model->sendeEmail_for_low_stock($mdata, 'stock_low_message');
                /* ---------End Email------------------- */
            }
        }
        $data['admin_maincontent'] = $this->load->view('admin/all_product', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublish_product($product_id) {
        $this->sa_model->unpublish_product_by_id($product_id);
        redirect("super_admin/all_product");
    }

    public function publish_product($product_id) {
        $this->sa_model->publish_product_by_id($product_id);
        redirect("super_admin/all_product");
    }

    public function delete_product($product_id) {
        $this->sa_model->delete_product_by_id($product_id);
        redirect("super_admin/all_product");
    }

    public function view_edit_product($product_id) {
        $data = array();
        $data['editor'] = $this->data;
        $data['title'] = "Manage product";

        $data['product_info'] = $this->sa_model->select_product_by_id($product_id);
        $data['all_category'] = $this->application_Model->select_all_category();
        $data['admin_maincontent'] = $this->load->view('admin/edit_product_form', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_product() {
        $config['upload_path'] = './images/product/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $fdata = array();
        $error = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('product_image')) {
            
            $data['product_image'] = $this->input->post('product_images', true);
            /* echo '<pre>';
              print_r($fdata);
              exit(); */
            goto step2;
            $error = array('error' => $this->upload->display_errors());

            echo '<pre>';
            print_r($error);
            exit();
            //$this->load->view('upload_form', $error);
        } else {
            $fdata = $this->upload->data();
            /* echo '<pre>';
              print_r($fdata);
              exit(); */
                $path=$this->input->post('product_images', true);
//                echo "$path";
//                echo '<pre>';
                  unlink("$path");
           
                $data = array();
                $data['product_image'] = 'images/product/' . $fdata['file_name'];
                  step2: {
                $product_id = $this->input->post('product_id', true);
                $data['product_name'] = $this->input->post('product_name', true);
                $data['category_id'] = $this->input->post('category_id', true);
                $data['product_price'] = $this->input->post('product_price', true);
                $data['product_quantity'] = $this->input->post('product_quantity', true);
                $data['product_sku'] = $this->input->post('serial_no', true);
                $data['product_short_description'] = $this->input->post('short_description', true);
                $data['product_long_description'] = $this->input->post('long_description', true);
                $data['product_status'] = $this->input->post('publication_status', true);
                
                $this->sa_model->update_product_info($data, $product_id);
                $sdata = array();
                $sdata['message'] = "update Product Successfully!";
                $this->session->set_userdata($sdata);
                redirect("super_admin/all_product");
            }
        }
    }

    public function view_category() {
        $data = array();
        $data['title'] = "Manage Categories";
        $data['category_info'] = $this->sa_model->select_category();
        $data['admin_maincontent'] = $this->load->view('admin/all_category', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublish_category($category_id) {
        $this->sa_model->unpublish_category_by_id($category_id);
        redirect("super_admin/view_category");
    }

    public function publish_category($category_id) {
        $this->sa_model->publish_category_by_id($category_id);
        redirect("super_admin/view_category");
    }

    public function delete_category($category_id) {
        $this->sa_model->delete_category_by_id($category_id);
        redirect("super_admin/view_category");
    }

    public function view_edit_category($category_id) {
        $data = array();
        $data['title'] = "Manage Categories";
        $data['category_info'] = $this->sa_model->select_category_by_id($category_id);
        //echo '<pre>';
        //print_r($data);
        $data['admin_maincontent'] = $this->load->view('admin/edit_category_form', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_category() {
        //echo '<pre>';
        // print_r($_POST);
        $data = array();
        $category_id = $this->input->post('category_id', true);
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['publication_status'] = $this->input->post('publication_status', true);
        $this->sa_model->update_category_info($data, $category_id);
        $sdata = array();
        $sdata['message'] = "update category Successfully!";
        $this->session->set_userdata($sdata);
        redirect("super_admin/view_category");
    }

    public function ajax_category_search($search_text = null) {
        $data = array();
        $data['category_info'] = $this->sa_model->ajax_category_search_info($search_text);
        echo $this->load->view('admin/category_grid', $data, true);
    }

    public function ajax_product_search($search_text = null) {
        $data = array();
        $data['product_info'] = $this->sa_model->ajax_product_search_info($search_text);
        echo $this->load->view('admin/product_grid', $data, true);
    }

    public function view_all_order() {

        $data = array();
        $data['title'] = "Manage Order";
        $data['all_order'] = $this->sa_model->select_all_order();
        //echo '<pre>';
        // print_r($data);
        //  exit();
        $data['admin_maincontent'] = $this->load->view('admin/view_order', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function order_detail($order_and_customer_id_and_shipping_id) {
        $data = array();
        $data['title'] = "Manage Order";
        $sarray = explode('-', $order_and_customer_id_and_shipping_id);
        $order_id = $sarray[0];
        $customer_id = $sarray[1];
        $shipping_id = $sarray[2];
        //echo $shipping_id;
        // exit();
        $data['order_details'] = $this->sa_model->select_order_details_by_id($order_id);
        $data['order_info'] = $this->sa_model->select_order_by_id($order_id);
        $data['customer_info'] = $this->checkout_model->select_customer_by_id($customer_id);
        $data['admin_maincontent'] = $this->load->view('admin/order_detals', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function view_invoice($order_and_customer_id_and_shipping_id) {
        $data = array();
        $data['title'] = "Invoice";
        $sarray = explode('-', $order_and_customer_id_and_shipping_id);
        $order_id = $sarray[0];
        $customer_id = $sarray[1];
        $shipping_id = $sarray[2];
        $data['order_details'] = $this->sa_model->select_order_details_by_id($order_id);
        $data['order_info'] = $this->sa_model->select_order_by_id($order_id);
        $data['customer_info'] = $this->checkout_model->select_customer_by_id($customer_id);
        $data['shipping_info'] = $this->checkout_model->select_shipping_info_by_id($shipping_id);
        /* echo '<pre>';
          print_r($data);
          exit(); */
        $data['admin_maincontent'] = $this->load->view('admin/invoice', $data, true);
        /* $body=$this->load->view('admin/invoice', $data, true);
          $this->load->helper(array('dompdf', 'file'));
          $file_name=pdf_create($body, 'body');
          echo $file_name; */
        $this->load->view('admin/admin_master', $data);
    }

    public function send_discount_newslater() {
        $data = array();
        $email_address = $this->sa_model->selcet_newslater_subcriber();
        /* ---------Start Email---------------- */
        $mdata = array();
        $mdata['from_address'] = "juelrana0@yahoo.com";
        $mdata['admin_full_name'] = "Ecommerce";
        //foreach ($email_address as $v_email_address) {
        foreach ($email_address as $key => $value) {
            $mdata['to_address' . $key] = "$value->email_address";
        }
        $mdata['subject'] = 'Discount offer';
        $mdata['all_product'] = $this->application_model->select_all_discount_product();
        $this->load->model('mailer_model');
        $this->mailer_model->sende_newslater_Email($mdata, $key, 'discount_newslater');
        /* ---------End Email------------------- */
    }

    public function cancel_order($order_id) {
        $data = array();
        $data['title'] = "Manage order";
        $data['order_details'] = $this->sa_model->select_order_details_by_id($order_id);
        $data['order_info'] = $this->sa_model->select_order_by_id($order_id);
        $data['all_order'] = $this->sa_model->select_all_order();
        $this->sa_model->cancel_order_by_id($order_id);
        redirect('super_admin/view_all_order');
    }

    public function view_all_platinum_customer() {
        $data = array();
        $data['title'] = "Customer Category ";
        $data['all_customer'] = $this->sa_model->select_platinium_customer();
        /* echo '<pre>';
          print_r($data);
          exit(); */
        $data['admin_maincontent'] = $this->load->view('admin/view_all_customer', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function view_all_diamond_customer() {

        $data = array();
        $data['title'] = "Customer Category ";
        $data['all_customer'] = $this->sa_model->select_diamond_customer();
        $data['admin_maincontent'] = $this->load->view('admin/view_all_customer', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function view_all_gold_customer() {
        $data = array();
        $data['title'] = "Customer Category ";
        $data['all_customer'] = $this->sa_model->select_gold_customer();

        $data['admin_maincontent'] = $this->load->view('admin/view_all_customer', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function view_all_silver_customer() {

        $data = array();
        $data['title'] = "Customer Category ";
        $data['all_customer'] = $this->sa_model->select_silver_customer();
        $data['admin_maincontent'] = $this->load->view('admin/view_all_customer', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function view_all_normal_customer() {

        $data = array();
        $data['title'] = "Customer Category ";
        $data['all_customer'] = $this->sa_model->select_normal_customer();
        $data['admin_maincontent'] = $this->load->view('admin/view_all_customer', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function show_customer_message() {
        $data = array();
        $data['title'] = "Customer Message ";
        $data['contact_info'] = $this->sa_model->select_all_customer_message();
        $data['admin_maincontent'] = $this->load->view('admin/view_customer_message', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function show_all_customer() {
        $data = array();
        $data['title'] = "Customer List ";
        $data['customer_info'] = $this->sa_model->select_all_customer();
        $data['admin_maincontent'] = $this->load->view('admin/view_customer_list', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function delete_customer_by_id($customer_id) {
        $data = array();
        $data['title'] = "Customer List ";
        $data['customer_info'] = $this->sa_model->delete_customer_by_id($customer_id);
        redirect('super_admin/show_all_customer');
    }

    public function daily_sales_report() {
        $data = array();
        $data['title'] = "Today Sales Report";

        $data['all_order'] = $this->sa_model->select_all_sales_by_dates();
        $data['admin_maincontent'] = $this->load->view('admin/view_order', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function weekly_sales_report() {
        $data = array();
        $data['title'] = "Today Sales Report";
        $e_date = date("Y-m-d"); //"Mar 03, 2011";
        $date = date("Y-m-d");
        $date = strtotime($date);
        $date = strtotime("-7 day", $date);
        $s_date = date('Y-m-d', $date);
        $data['all_order'] = $this->sa_model->select_all_sales_by_week($s_date, $e_date);
        $data['admin_maincontent'] = $this->load->view('admin/view_order', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function custom_sales_report() {
        $data = array();
        $data['title'] = "Date wise Sales Report";
        $data['admin_maincontent'] = $this->load->view('admin/custom_date_form', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function custom_date_search() {
        $data = array();
        $data['title'] = "Date wise Sales Report";
        $s_date = $this->input->post('s_date', TRUE);
        $e_date = $this->input->post('e_date', TRUE);
        $data['all_order'] = $this->sa_model->select_all_sales_by_custom_date($s_date, $e_date);
        $data['admin_maincontent'] = $this->load->view('admin/view_order', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

}

?>
