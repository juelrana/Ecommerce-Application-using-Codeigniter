<?php

class Checkout_Model extends CI_Model {

    //put your code here
    public function save_user_info($data) {
        $this->db->insert('tbl_customer', $data);
        $customer_id = $this->db->insert_id();
        //echo '------'.$customer_id;
        //exit();
        return $customer_id;
    }

    public function check_user_login($email_address, $password) {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('email_address', $email_address);
        $this->db->where('password', md5($password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function check_email_address($email_address) {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('email_address', $email_address);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function save_shipping_info($data) {
        $this->db->insert('tbl_shipping', $data);
        $shipping_id = $this->db->insert_id();
        //echo '------'.$customer_id;
        //exit();
        return $shipping_id;
    }
     public function save_payment_info($data)
    {
       $this->db->insert('tbl_payment',$data);
       $payment_id=$this->db->insert_id();
       $sdata=array();
       $sdata['payment_id']=$payment_id;
       $this->session->set_userdata($sdata);
    }
    
    public function save_order()
    {
        $data=array();
        $data['customer_id']=$this->session->userdata('customer_id');
        $data['shipping_id']=$this->session->userdata('shipping_id');
        $data['payment_id']=$this->session->userdata('payment_id');
        $data['order_total']=$this->cart->total();
        $date = date("Y-m-d");//"Mar 03, 2011";
        $date = strtotime($date);
        $date = strtotime("+7 day", $date);
        $data['delivary_date']=date('Y-m-d', $date);
        $this->db->insert('tbl_order',$data);
        $order_id=$this->db->insert_id();
        $sdata=array();
        $sdata['order_id']=$order_id;
        $this->session->set_userdata($sdata);
    }
    public function save_customer_category(){
        $data=array();
        $data['customer_id']=$this->session->userdata('customer_id');      
        $order_id=$this->session->userdata('order_id');
        $data['order_id']=$this->session->userdata('order_id');
        $order_total=$this->cart->total();
        
        
        $this->db->insert('tbl_customer_category',$data);
        if($order_total>=200000){
        $this->db->set('platinum_customer',1);
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_customer_category');
        
        }elseif ($order_total>=150000) {
        $this->db->set('diamond_customer',1);    
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_customer_category');
        
        
        }elseif ($order_total>=100000) {
        $this->db->set('gold_customer',1);    
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_customer_category');
        
        
        }elseif ($order_total>=75000) {
        $this->db->set('silver_customer',1);    
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_customer_category');
        
        }else {
        $this->db->set('normal_customer',1);    
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_customer_category');
        
        }
        
        $customer_category_id=$this->db->insert_id();
        $sdata=array();
        $sdata['customer_category_id']=$customer_category_id;
        $this->session->set_userdata($sdata);
        
    }

    public function save_order_details($odata)
    {
        $this->db->insert('tbl_order_details',$odata);
       /*$product_id=$this->db->insert_id();
       echo $product_id;
       exit();
       $sdata=array();
       $sdata['product_id']=$product_id;
       $this->session->set_userdata($sdata);*/
    }
    public function update_inventory($order_id)
    {
         $sql = "update tbl_product, tbl_order_details set tbl_product.product_quantity = tbl_product.product_quantity - tbl_order_details.product_sales_quantity where tbl_product.product_id = tbl_order_details.product_id and tbl_order_details.order_id = '$order_id' ";
         $this->db->query($sql);
    }
    public function select_customer_by_id($customer_id){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id', $customer_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_shipping_info_by_id($shipping_id){
        $this->db->select('*');
        $this->db->from('tbl_shipping');
        $this->db->where('shipping_id',$shipping_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function discount_price($order_id){
        $this->db->select('*');
        $this->db->from('tbl_customer_category');
        $this->db->where('order_id',$order_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
        
    }
    public function update_order_total($order_id,$discount){
        $discont_total=$this->cart->total()*$discount/100;
        $total=$this->cart->total()-$discont_total;
        $this->db->set('discount_amount',$discont_total);
        $this->db->set('order_total_amount',$total);    
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_order');

    }
    

}

?>