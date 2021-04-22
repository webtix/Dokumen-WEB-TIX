<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_staff extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_staff');
        $this->load->model('M_login');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('home/index-staff');
	}

	function tambahfilm(){
		$this->load->view('staff/tambahfilm');
	}

	
}
