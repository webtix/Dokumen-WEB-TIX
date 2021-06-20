<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		if(empty($this->session->userdata('nama'))){
			redirect(base_url('login'));
		}

		$this->load->model('Film_model');	
        $this->load->model('User_model');
	}

	public function index()
	{
		$data['preview'] = $this->Film_model->getData('film', null,  2)->result_array();

		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}