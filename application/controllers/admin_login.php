<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();

class Admin_Login extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_login_model');
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id != NULL) {
            redirect("super_admin", "refresh");
        }
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function check_admin_login() {
        $admin_email_address = $this->input->post('admin_email_address', true);
        $admin_password = $this->input->post('admin_password', true);
        $result = $this->admin_login_model->admin_login_check($admin_email_address, $admin_password);
        //echo '----'.$admin_email_address.'---'.$admin_password;
        /* echo '<pre>';
          print_r($result);
          exit(); */
        if ($result) {
            $sdata = array();
            $sdata['admin_full_name'] = $result->admin_full_name;
            $sdata['admin_id'] = $result->admin_id;
            $sdata['login_status'] = TRUE;
            $this->session->set_userdata($sdata);
            redirect('super_admin', 'refresh');
        } else {
            $sdata = array();
            $sdata['message'] = "Email / password Invalide !";
            $this->session->set_userdata($sdata);
            redirect('admin_login', 'refresh');
        }
    }

}

?>
