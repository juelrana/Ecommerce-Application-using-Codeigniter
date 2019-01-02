<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkout extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        $this->load->model('checkout_model');
         $this->load->model('super_admin_model', 'sa_model', true);
        $this->load->model('application_model');
    }

    public function index() {
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('customer_form', $data, true);
        $this->load->view('master', $data);
    }

    public function check_customer_login() {
        $email_address = $this->input->post('email_address', true);
        $password = $this->input->post('password', true);
        $result = $this->checkout_model->check_user_login($email_address, $password);
        //echo '<pre>';
        //print_r($result);
        if ($result) {
            $sdata = array();
            $sdata['full_name'] = $result->full_name;
            $sdata['customer_id'] = $result->customer_id;
            $sdata['login_status'] = TRUE;
            $this->session->set_userdata($sdata);
            redirect('checkout/show_shipping_form');
        } else {
            $sdata = array();
            $sdata['error_msg'] = "Email / password Invalide !";
            $this->session->set_userdata($sdata);
            redirect('checkout');
        }
    }

    public function logout() {
        $this->session->unset_userdata('full_name');
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('login_status');
        $this->session->unset_userdata('shipping_id');
        $this->cart->destroy();
        session_destroy();
        $sdata = array();
        $sdata['message'] = "You are Successfully Logout!";
        $this->session->set_userdata($sdata);
        redirect("checkout");
    }

    public function ajax_email_check($email_address=null) {
        //$data=array();
        //echo "abc";
        $result = $this->checkout_model->check_email_address($email_address);
        if ($result) {
            echo "Alredy Registered";
        } else {
            echo 'Available';
        }
    }

    public function save_user_info() {
        $data = array();
        $data['full_name'] = $this->input->post('full_name', true);
        $data['email_address'] = $this->input->post('email_address', true);
        $password = $this->input->post('password', true);
        $data['password'] = md5($password);
        $data['company_name'] = $this->input->post('company_name', true);
        $data['address'] = $this->input->post('address', true);
        $data['mobile_no'] = $this->input->post('mobile_no', true);
        $data['city'] = $this->input->post('city', true);
        $data['country'] = $this->input->post('country', true);
        $data['zip_code'] = $this->input->post('zip_code', true);
        $customer_id = $this->checkout_model->save_user_info($data);
        /* ---------Start Email---------------- */
        $mdata = array();
        $mdata['from_address'] = "juelrana0@yahoo.com";
        $mdata['admin_full_name'] = "Ecommerce";
        $mdata['to_address'] = $data['email_address'];
        $mdata['subject'] = 'Registration Successfull';
        $mdata['customer_last_name'] = $data['full_name'];
        $mdata['password'] = $password;
        $this->load->model('mailer_model');
        $this->mailer_model->sendeEmail_to_customer($mdata, 'successfull_registration');
        /* ---------End Email------------------- */

        $sdata = array();
        $sdata['customer_id'] = $customer_id;
        $sdata['message'] = "save information succesfully";
        $this->session->set_userdata($sdata);
        redirect("cart/show_cart");
    }

    public function show_shipping_form() {

        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['full_name'] = $this->session->userdata('full_name');
        $data['customer_id'] = $this->session->userdata('customer_id');
        $data['best_product_info']=$this->application_model->select_best_product_info();
        $data['maincontent'] = $this->load->view('shipping_form', $data, true);
        $this->load->view('master', $data);
    }

    public function save_shipping_info() {
        $data = array();
        $data['customer_id'] = $this->session->userdata('customer_id');
        $data['full_name'] = $this->input->post('full_name', true);
        $data['phone_no'] = $this->input->post('phone_no', true);
        $data['city'] = $this->input->post('city', true);
        $data['country'] = $this->input->post('country', true);
        $data['zip_code'] = $this->input->post('zip_code', true);
        $data['address'] = $this->input->post('address', true);
        $shipping_id = $this->checkout_model->save_shipping_info($data);
        $sdata = array();
        $sdata['shipping_id'] = $shipping_id;
        $sdata['message'] = "shipping information save succesfully";
        $this->session->set_userdata($sdata);
        redirect("checkout/proced_to_payment");
    }

    public function proced_to_payment() {
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['full_name'] = $this->session->userdata('full_name');
        $data['customer_id'] = $this->session->userdata('customer_id');
        $data['maincontent'] = $this->load->view('payment_method', $data, true);
        $this->load->view('master', $data);
    }

    public function shipping_info_same_as_billing_info($customer_id) {
        $data = array();
        $billing_info = $this->checkout_model->select_customer_by_id($customer_id);
        $data['customer_id'] = $this->session->userdata('customer_id');
        $data['full_name'] = $billing_info->full_name;
        $data['phone_no'] = $billing_info->mobile_no;
        $data['city'] = $billing_info->city;
        $data['country'] = $billing_info->country;
        $data['zip_code'] = $billing_info->zip_code;
        $data['address'] = $billing_info->address;
        $shipping_id = $this->checkout_model->save_shipping_info($data);
        $sdata = array();
        $sdata['shipping_id'] = $shipping_id;
        $sdata['message'] = "shipping information save succesfully";
        $this->session->set_userdata($sdata);
        redirect("checkout/proced_to_payment");
    }

    public function confirm_order() {
         $payment_type = $this->input->post('payment_method', true);
        // echo $payment_type;
         //exit();
         
          $data = array();
          if ($payment_type == 'cash_on_delivery') 
              {
                $data['payment_status'] = 'Pending';
                $data['payment_type']='cash on delivery';
                $this->checkout_model->save_payment_info($data);
                $this->checkout_model->save_order();
                $this->checkout_model->save_customer_category();
                $odata = array();
                $odata['order_id'] = $this->session->userdata('order_id');
                $order_id = $this->session->userdata('order_id');
                $ordered_products = $this->cart->contents();
            //echo '<pre>';
            // print_r($ordered_products);
                foreach ($ordered_products as $v_oproducts) {
                    //$product_id = $v_oproducts['id'];                   
                    $odata['product_id'] = $v_oproducts['id'];
                    $odata['product_name'] = $v_oproducts['name'];
                    $odata['product_price'] = $v_oproducts['price'];
                    $odata['product_sales_quantity'] = $v_oproducts['qty'];
                    $this->checkout_model->save_order_details($odata);
                    
                }
           $this->sa_model->sum_product_sales_by_id($order_id);
          $this->checkout_model->update_inventory($odata['order_id']);
          } 
               
        if($payment_type=='paypal')
        {
            $data['payment_status']='Pending';
            $data['payment_type']='Paypal';
            $this->checkout_model->save_payment_info($data);
            $this->checkout_model->save_order();
            $this->checkout_model->save_customer_category();
            $odata=array();
            $odata['order_id']=$this->session->userdata('order_id');
            $order_id = $this->session->userdata('order_id');
            $ordered_products=$this->cart->contents();

            foreach($ordered_products as $v_oproducts)
            {
                $odata['product_id']=$v_oproducts['id'];
                $odata['product_name']=$v_oproducts['name'];
                $odata['product_price']=$v_oproducts['price'];
                $odata['product_sales_quantity']=$v_oproducts['qty'];
                $this->checkout_model->save_order_details($odata);
            }
            $this->sa_model->sum_product_sales_by_id($order_id);
           $this->checkout_model->update_inventory($odata['order_id']); 
           $this->load->view('htmlWebsiteStandardPayment.php');
           $this->sa_model->sum_product_sales_by_id($order_id);
        } 
        $order_id = $this->session->userdata('order_id');
        $discount=$this->checkout_model->discount_price($order_id);
        if($discount->platinum_customer==1){
            $discount=20;
        }elseif ($discount->diamond_customer==1) {
             $discount=15;
        }elseif ($discount->gold_customer==1) {
             $discount=10;
        }elseif ($discount->silver_customer==1) {
             $discount=5;
        }elseif ($discount->normal_customer==1) {
             $discount=0;
        }
        
       $this->checkout_model->update_order_total($order_id, $discount);
        /*echo '<pre>';
        print_r($discount);
        exit;*/
        $customer_id = $this->session->userdata('customer_id');
        $customer_info = $this->checkout_model->select_customer_by_id($customer_id);
        $mdata = array();
        $shipping_id = $this->session->userdata('shipping_id');
        $mdata['shipping_info'] = $this->checkout_model->select_shipping_info_by_id($shipping_id);
        /* ---------Start Email---------------- */
        $mdata['from_address'] = "juelrana0@yahoo.com";
        $mdata['admin_full_name'] = "Ecommerce";
        $mdata['to_address'] = $customer_info->email_address;
        $mdata['subject'] = 'Invoice Details';
        $mdata['customer_last_name'] = $customer_info->full_name;
        $mdata['phone_no'] = $customer_info->mobile_no;
        $mdata['address'] = $customer_info->address;
        $mdata['city'] = $customer_info->city;
        $mdata['country'] = $customer_info->country;
        $mdata['zip_code'] = $customer_info->zip_code;
        $mdata['discount'] = $discount;
        $this->load->model('mailer_model');
        //echo '<pre>';
        //print_r($mdata);
        $this->mailer_model->sendeEmail($mdata, 'invoice');
        /* ---------End Email------------------- */
        
        $data = array();
        $data['all_category'] = $this->application_model->select_all_category();
        $data['full_name'] = $this->session->userdata('full_name');
        $data['customer_id'] = $this->session->userdata('customer_id');
        $data['maincontent'] = "<h1>Your Order Successfully Placed!</h1>";
        $this->cart->destroy();
        $this->load->view('master', $data);
    }

}

?>
