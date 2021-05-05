<?php
	/**
	 * @author Pieter
	 */
	class C_email extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_email');
		$this->load->library('form_validation');
	}

	/**
	 * @access public
	 * @todo initiate page view
	 */
	public function index()
	{
		$this->load->helper('url');
        $this->load->view("verification");
	}

	/**
	 * @todo verifikasi saat login
	 */
	function verifikasi(){
		$kode = $this->input->post('code');

		if ($kode == $verif) {
			redirect(base_url("C_home"));	
		}
	}

	/**
	 * @todo mengirimkan ulang kode verifikasi
	 */
	function resend(){
		#$email= $this->db->)
		$baru = $this->M_email->confirm_login($email);
	}

}
	