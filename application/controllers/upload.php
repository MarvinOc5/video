<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

	if($this->_submit_validate()===FALSE){
		
		$this->load->view('upload_form', $error);
	}
	else{
		
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
		}	
			$data = array('upload_data' => $this->upload->data());
	}
	}
	
	
	private function _submit_validate(){
			
	return $this->form_validation->run();
			
	}
}
?>
