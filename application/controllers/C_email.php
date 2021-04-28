<?php

	class C_email extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_email');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->helper('url');
        $this->load->view("verification");
	}

	#verifikasi login
	function verifikasi(){
		$kode = $this->input->post('code');

		if ($kode == $verif) {
			redirect(base_url("C_home"));	
		}
	}


	function resend(){
		$baru = $this->
	}
	#email berisikan informasi tiket
	#function sendemail(){

	
}
	