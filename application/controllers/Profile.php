<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		if(empty($this->session->userdata('nama'))){
			redirect(base_url('home'));
		}

		$this->load->model('User_model');
	}

	public function index()
	{
		$data['user'] = $this->session->flashdata('data_user');

        $this->load->view('templates/header');
        $this->load->view('profile', $data);
        $this->load->view('templates/footer');
	}
}