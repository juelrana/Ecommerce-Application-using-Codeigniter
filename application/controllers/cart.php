<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model('application_model');
    }

    public function add_to_cart($product_id) {
        $data = array();
        $product_info = $this->application_model->select_product_by_id($product_id);
        if($product_info->product_quantity>0){
        $data = array(
            'id' => $product_id,
            'qty' =>1,
            'price' => $product_info->product_price,
            'name' => $product_info->product_name,
        );
        
        $this->cart->insert($data);
        redirect("cart/show_cart");
        }else{
             $sdata = array();
        $sdata['error_msg'] = "Product not Avaiable!";
        $this->session->set_userdata($sdata);
        redirect("cart/show_cart");
        }
    }

    public function show_cart() {
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('show_cart', $data, true);
        $this->load->view('master', $data);
    }

    public function update_cart($rowid_and_product_id) {
        
        $data = array();
        $sarray=explode('-',$rowid_and_product_id);
        $rowid=$sarray[0];
        $product_id=$sarray[1];
        //echo "$rowid<br>";
        //echo $product_id;
        //exit();
         $product_info = $this->application_model->select_product_by_id($product_id);
         $qty=$this->input->post('qty', true);
        if($qty<=$product_info->product_quantity){
        $data = array(
            'rowid' => $rowid,
            'qty' => $this->input->post('qty', true)
        );

        $this->cart->update($data);
        redirect("cart/show_cart");
        }else{
             $sdata = array();
        $sdata['error_msg'] = "Product Stock not Avaiable!</br></br>Total $product_info->product_quantity pcs $product_info->product_name  is avaiable";
        $this->session->set_userdata($sdata);
        redirect("cart/show_cart");
        }
    }

    public function remove_tocart($rowid) {
        $data = array();
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($data);
        redirect("cart/show_cart");
    }

}

?>
