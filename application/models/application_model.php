<?php

class Application_Model extends CI_Model {

    //put your code here
    public function select_all_category() {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_pub_product() {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_product_by_category_id($category_id) {

        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_status', 1);
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_product_by_id($product_id) {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_status', 1);
        $this->db->where('product_id', $product_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_all_product_by_category_id_order_by_9($category_id) {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_status', 1);
        $this->db->where('category_id', $category_id);
        $this->db->order_by("product_id", "desc");
        $this->db->limit(9, 0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_discount_product() {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('discount_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_best_product_info(){
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->order_by("product_total_sales_quantity", "desc");
        $this->db->limit(6, 0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function save_conact_info($data){
        $this->db->insert('tbl_contact', $data);
    }
    public function update_product_view_status_by_id($product_id){
        $this->db->set('product_view_status','product_view_status+1',FALSE);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }

}

?>
