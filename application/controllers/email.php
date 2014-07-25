<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('email');
}

    public function index() {
        redirect('email/send_email');
    }

    public function sendEmail(){			
		// Email configuration
		$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'smtp.yourdomainname.com.',
			  'smtp_port' => 465,
			  'smtp_user' => 'marvingiffordoclima@gmail.com', // change it to yours
			  'smtp_pass' => 'mgoc52393xirxaux', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
		);	
	
		$this->load->library('email', $config);
		$this->email->from('marvingiffordoclima@gmail.com', "Admin Team");
		$this->email->to("marvinjsow@gmail.com");
		$this->email->cc("marvin@justsimplyoutsourcing.com");
		$this->email->subject("This is test subject line");
		$this->email->message("Mail sent test message...");
			
		$data['message'] = "Sorry Unable to send email...";	
		if($this->email->send()){					
			$data['message'] = "Mail sent...";			
		}	
		 				
		// forward to index page
		//$this->load->view('index', $data);		
	}
}
