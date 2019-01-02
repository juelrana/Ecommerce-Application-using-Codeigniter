<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Application extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('application_model');
       $this->load->model('super_admin_model','sa_model',true);
    }

    public function index() {
        $data = array();
        $data['slider'] = 1;
        $data['all_category'] = $this->application_model->select_all_category();
        $data['all_product'] = $this->application_model->select_all_pub_product();
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('home_post', $data, true);
        $this->load->view('master', $data);
    }

    public function product() {
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['all_product'] = $this->application_model->select_all_pub_product();
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('home_post', $data, true);
        $this->load->view('master', $data);
    }

    public function about() {
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('about', '', true);
        $this->load->view('master', $data);
    }

    public function faqs() {
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('faqs', '', true);
        $this->load->view('master', $data);
    }

    public function checkout() {
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('checkout', '', true);
        $this->load->view('master', $data);
    }

    public function contact() {
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('contact', '', true);
        $this->load->view('master', $data);
    }

    public function productdetail($product_and_category_id) {
        $sdata = array();
        $sdata = explode('-', $product_and_category_id);
        $product_id = $sdata[0];
        $category_id = $sdata[1];
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['product_info'] = $this->application_model->select_product_by_id($product_id);
        $data['all_product'] = $this->application_model->select_all_product_by_category_id_order_by_9($category_id);
        $this->application_model->update_product_view_status_by_id($product_id);
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('productdetail', $data, true);
        $this->load->view('master', $data);
    }

    public function product_by_category($category_id) {

        $data = array();
        $data['slider'] = 1;
        $data['all_category'] = $this->application_model->select_all_category();
        $data['all_product'] = $this->application_model->select_all_product_by_category_id($category_id);
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('home_post', $data, true);
        $this->load->view('master', $data);
    }
    public function save_cantact_info(){
        $data = array();
        $data['name']=$this->input->post('name',true);
        $data['email']=$this->input->post('email',true);
        $data['subject']=$this->input->post('subject',true);
        $data['message']=$this->input->post('message',true);
        $this->application_model->save_conact_info($data);
        $sdata = array();
        $sdata['customer_id'] = $customer_id;
        $sdata['message'] = "save information succesfully";
        $this->session->set_userdata($sdata);
        redirect("application/contact");
    }

}

?>
