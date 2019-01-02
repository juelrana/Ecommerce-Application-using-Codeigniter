<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Super_Admin_Model extends CI_Model {

    public function save_category_info($data) {
        $this->db->insert('tbl_category', $data);
    }

    public function save_product_info($data) {
        $this->db->insert('tbl_product', $data);
    }

    public function select_all_product() {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function unpublish_product_by_id($product_id) {
        $this->db->set('product_status', 0);
        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product');
    }

    public function publish_product_by_id($product_id) {
        $this->db->set('product_status', 1);
        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product');
    }

    public function delete_product_by_id($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->delete('tbl_product');
    }

    public function select_product_by_id($product_id) {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id', $product_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_product_info($data, $product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product', $data);
    }

    public function select_category() {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function unpublish_category_by_id($category_id) {
        $this->db->set('publication_status', 0);
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category');
    }

    public function publish_category_by_id($category_id) {
        $this->db->set('publication_status', 1);
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category');
    }

    public function delete_category_by_id($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->delete('tbl_category');
    }

    public function select_category_by_id($category_id) {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_category_info($data, $category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category', $data);
    }

    public function ajax_product_search_info($search_text) {
        $sql = "SELECT * FROM tbl_product WHERE product_name LIKE '%$search_text%' ";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function ajax_category_search_info($search_text) {
        $sql = "SELECT * FROM tbl_category WHERE category_name LIKE '%$search_text%' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_all_order() {
        /* $this->db->select('*');
          $this->db->from('tbl_order');
          $this->db->where('cancel_order', 0);
          $query_result = $this->db->get();
          $result = $query_result->result();
          return $result; */
        //SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate FROM Orders INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
        $sql = "select tbl_order.order_id,tbl_order.customer_id,tbl_order.shipping_id,tbl_order.payment_id,
            tbl_order.discount_amount,tbl_order.order_total_amount,tbl_order.ordered_date,tbl_order.delivary_date,
            tbl_customer.full_name,tbl_order.order_total from tbl_order 
            inner join tbl_customer on tbl_order.customer_id=tbl_customer.customer_id              
            where tbl_order.cancel_order=0
          ORDER BY tbl_order.ordered_date asc 
        ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        // echo '<pre>';
        // print_r($result);
        // exit();
        return $result;
    }

    public function select_order_details_by_id($order_id) {
        $this->db->select('*');
        $this->db->from('tbl_order_details');
        $this->db->where('order_id', $order_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function select_order_by_id($order_id) {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('order_id', $order_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function selcet_newslater_subcriber() {
        $this->db->select('email_address');
        $this->db->from('tbl_subscriber');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function cancel_order_by_id($order_id) {
        $this->db->set('cancel_order', 1);
        $this->db->where('order_id', $order_id);
        $this->db->update('tbl_order');
        $order = $this->select_order_details_by_id($order_id);
        /* echo '<pre>';
          print_r($order);
          exit(); */
        foreach ($order as $v_order) {
            $product_id = $v_order->product_id;
            $product = $this->select_product_by_id($product_id);
            $product_quantity = $product->product_quantity;
            $this->db->set('product_quantity', $product_quantity + $v_order->product_sales_quantity);
            $this->db->where('product_id', $product_id);
            $this->db->update('tbl_product');
        }
    }

    public function select_platinium_customer() {

        $sql = "select tbl_customer.customer_id,tbl_customer.full_name,tbl_customer.email_address,
            tbl_customer.mobile_no,tbl_customer_category.platinum_customer,
            tbl_order.order_total,tbl_order.discount_amount,tbl_order.ordered_date
            from tbl_customer 
            inner join tbl_customer_category on tbl_customer_category.customer_id=tbl_customer.customer_id 
            inner join tbl_order on tbl_customer_category.order_id=tbl_order.order_id
        where tbl_customer_category.platinum_customer=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        // echo '<pre>';
        //print_r($result);
        //exit();
        return $result;
    }

    public function select_diamond_customer() {
        $sql = "select tbl_customer.customer_id,tbl_customer.full_name,tbl_customer.email_address,
            tbl_customer.mobile_no,tbl_customer_category.diamond_customer,
            tbl_order.order_total,tbl_order.discount_amount,tbl_order.ordered_date
            from tbl_customer 
            inner join tbl_customer_category on tbl_customer_category.customer_id=tbl_customer.customer_id 
            inner join tbl_order on tbl_customer_category.order_id=tbl_order.order_id
        where tbl_customer_category.diamond_customer=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_gold_customer() {

        $sql = "select tbl_customer.customer_id,tbl_customer.full_name,tbl_customer.email_address,
            tbl_customer.mobile_no,tbl_customer_category.gold_customer,
            tbl_order.order_total,tbl_order.discount_amount,tbl_order.ordered_date
            from tbl_customer 
            inner join tbl_customer_category on tbl_customer_category.customer_id=tbl_customer.customer_id 
            inner join tbl_order on tbl_customer_category.order_id=tbl_order.order_id
        where tbl_customer_category.gold_customer=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_silver_customer() {

        $sql = "select tbl_customer.customer_id,tbl_customer.full_name,tbl_customer.email_address,
            tbl_customer.mobile_no,tbl_customer_category.silver_customer,
            tbl_order.order_total,tbl_order.discount_amount,tbl_order.ordered_date
            from tbl_customer 
            inner join tbl_customer_category on tbl_customer_category.customer_id=tbl_customer.customer_id 
            inner join tbl_order on tbl_customer_category.order_id=tbl_order.order_id
        where tbl_customer_category.silver_customer=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_normal_customer() {

        $sql = "select tbl_customer.customer_id,tbl_customer.full_name,tbl_customer.email_address,
            tbl_customer.mobile_no,tbl_customer_category.normal_customer,
            tbl_order.order_total,tbl_order.discount_amount,tbl_order.ordered_date
            from tbl_customer 
            inner join tbl_customer_category on tbl_customer_category.customer_id=tbl_customer.customer_id 
            inner join tbl_order on tbl_customer_category.order_id=tbl_order.order_id
        where tbl_customer_category.normal_customer=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_all_customer_by_id($customer_id) {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id', $customer_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function sum_product_sales_by_id($order_id) {
        $order_details_info = $this->select_order_details_by_id($order_id);
        foreach ($order_details_info as $v_order_details_info) {
            $product_id = $v_order_details_info->product_id;
            $product_info = $this->select_product_by_id($product_id);
            $this->db->set('product_total_sales_quantity', $product_info->product_total_sales_quantity + $v_order_details_info->product_sales_quantity);
            $this->db->where('product_id', $product_id);
            $this->db->update('tbl_product');
        }
    }

    public function select_all_customer_message() {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_report_info() {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function month_select_report_info() {

        $this->db->select('*');
        $this->db->from('tbl_order');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_customer() {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function delete_customer_by_id($customer_id) {
        $this->db->where('customer_id', $customer_id);
        $this->db->delete('tbl_customer');
    }

    public function select_customer_by_id($customer_id) {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id', $customer_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_all_sales_by_dates() {
        $sql = "select tbl_order.order_id,tbl_order.customer_id,tbl_order.shipping_id,tbl_order.payment_id,
            tbl_order.discount_amount,tbl_order.order_total_amount,tbl_order.ordered_date,tbl_order.delivary_date,
            tbl_customer.full_name,tbl_order.order_total from tbl_order 
            inner join tbl_customer on tbl_order.customer_id=tbl_customer.customer_id              
            
             where tbl_order.cancel_order=0 
            AND
            tbl_order.ordered_date > CURDATE()";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_all_sales_by_week($s_date, $e_date) {
        $sql = "select tbl_order.order_id,tbl_order.customer_id,tbl_order.shipping_id,tbl_order.payment_id,
            tbl_order.discount_amount,tbl_order.order_total_amount,tbl_order.ordered_date,tbl_order.delivary_date,
            tbl_customer.full_name,tbl_order.order_total from tbl_order 
            inner join tbl_customer on tbl_order.customer_id=tbl_customer.customer_id                         
             
            WHERE DATE(tbl_order.ordered_date) between 
            '$s_date' 
            AND 
            '$e_date'
             AND   
            tbl_order.cancel_order=0
                ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        // echo '<pre>';
        // print_r($result);
        //  exit();
        return $result;
    }

    public function total_select_count_info() {
        $result = $this->db->count_all('tbl_order');
        return $result;
    }

    public function total_product_sales_info() {

        $this->db->select_sum('product_total_sales_quantity');
        $query_result = $this->db->get('tbl_product');
        $result = $query_result->row();
        // print_r($result);
        //exit();
        return $result;
    }

    public function today_total_order_info() {
        $num_result = mysql_query("SELECT count(*) as total_count from tbl_order WHERE ordered_date > CURDATE() ");
        $row = mysql_fetch_object($num_result);
        $result = $row->total_count;
        return $result;
    }

    public function total_cancel_order_info() {
        $num_result = mysql_query("SELECT count(*) as total_count from tbl_order WHERE cancel_order=1 ");
        $row = mysql_fetch_object($num_result);
        $result = $row->total_count;
        return $result;
    }

    public function select_popular_product() {

        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->order_by("product_view_status", "DESC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_sales_by_custom_date( $s_date, $e_date){
        $sql = "select tbl_order.order_id,tbl_order.customer_id,tbl_order.shipping_id,tbl_order.payment_id,
            tbl_order.discount_amount,tbl_order.order_total_amount,tbl_order.ordered_date,tbl_order.delivary_date,
            tbl_customer.full_name,tbl_order.order_total from tbl_order 
            inner join tbl_customer on tbl_order.customer_id=tbl_customer.customer_id                         
             
            WHERE DATE(tbl_order.ordered_date) between 
            '$s_date' 
            AND 
            '$e_date'
             AND   
            tbl_order.cancel_order=0
                ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
         // '<pre>';
         //print_r($result);
         // exit();
        return $result;
    }

}

?>
