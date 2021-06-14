<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		if(!empty($this->session->userdata('nama'))){
			redirect(base_url('home'));
		}

		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = [
			'username' => $username,
			'password' => $password
		];

		$cek = $this->User_model->cek_login("user", $where);
		$userdata = $cek->result_array();

		if($cek->num_rows() > 0)
		{
			$dataSession = array(
				'is_logged' => true,
				'id' => $userdata[0]['IDUser'],
				'nama' => $userdata[0]['Nama'],
				'username' => $userdata[0]['Username'],
				'email' => $userdata[0]['Email'],
				'hp' => $userdata[0]['HP'],
				'tipe_user' => $userdata[0]['TipeUser'],
				'tanggal_lahir' => $userdata[0]['Tanggal_Lahir'],
				'TipeUser' => $userdata[0]['TipeUser']
			);


			$this->session->set_userdata($dataSession);
			$this->session->set_flashdata('data_user', $userdata[0]);

			redirect(base_url('home'));
		}else{
			redirect(base_url('login'));
		}
	}
}