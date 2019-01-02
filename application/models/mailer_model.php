<?php



class Mailer_Model extends CI_Model {

    function sendeEmail($data, $templateName) {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->bcc('topu_18_26@yahoo.com'); 
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailscripts/' . $templateName, $data, true);
      
       /* $this->load->helper(array('dompdf', 'file'));
        $file_name=pdf_create($body, 'body');
        echo $file_name;*/



       echo $body;exit;
        $this->email->message($body);
        // $this->email->send();
        $this->email->clear();
    }
    function sendeEmail_to_customer($data, $templateName) {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->bcc('topu_18_26@yahoo.com'); 
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailscripts/' . $templateName, $data, true);
      
       /* $this->load->helper(array('dompdf', 'file'));
        $file_name=pdf_create($body, 'body');
        echo $file_name;*/



       //echo $body;exit;
        $this->email->message($body);
        // $this->email->send();
        $this->email->clear();
    }
    function sende_newslater_Email($data,$key, $templateName){
       /* echo '<pre>';
        echo $key;
        print_r($data);
        exit();*/
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address']);
        $this->email->to($data['to_address'.$key]);
        $this->email->bcc('topu_18_26@yahoo.com'); 
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailscripts/' . $templateName, $data, true);
      
       /* $this->load->helper(array('dompdf', 'file'));
        $file_name=pdf_create($body, 'body');
        echo $file_name;*/
        echo $body;exit;
        $this->email->message($body);
        // $this->email->send();
        $this->email->clear();
        
    }
    public function sendeEmail_for_low_stock($data, $templateName){     
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);       
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailscripts/' . $templateName, $data, true);
      
        //echo $body;exit;
        $this->email->message($body);
        // $this->email->send();
        $this->email->clear();
    }
}

?>
