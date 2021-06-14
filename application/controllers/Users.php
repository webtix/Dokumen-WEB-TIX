<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		if(empty($this->session->userdata('nama'))){
			redirect(base_url('login'));
		}

		if($this->session->userdata('TipeUser') != 'manager'){
			redirect(base_url('home'));
		}

		$this->load->model('User_model');
	}

	public function index()
	{
		$data['users'] = $this->User_model->getData(null, 'user')->result_array();

		$this->load->view('templates/header');
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$this->load->view('templates/header');
		$this->load->view('users/add');
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$data = [
			'Username' => $this->input->post('Username'),
			'Password' => $this->input->post('Password'),
			'Nama' => $this->input->post('Nama'),
			'Email' => $this->input->post('Email'),
			'HP' => $this->input->post('HP'),
			'TipeUser' => $this->input->post('TipeUser'),
			'Tanggal_Lahir' => $this->input->post('Tanggal_Lahir')
		];

		$this->User_model->insert('user', $data);

		redirect(base_url('users'));
	}

	public function edit($id)
	{
		$where = array('IDUser' => $id);
		$data['users'] = $this->User_model->edit($where, 'user')->result_array();

		$this->load->view('templates/header');
		$this->load->view('users/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update($id)
	{
		$data = [
			'Username' => $this->input->post('Username'),
			'Password' => $this->input->post('Password'),
			'Nama' => $this->input->post('Nama'),
			'Email' => $this->input->post('Email'),
			'HP' => $this->input->post('HP'),
			'TipeUser' => $this->input->post('TipeUser'),
			'Tanggal_Lahir' => $this->input->post('Tanggal_Lahir')
		];

		$where = [
			'IDUser' => $id
		];

		$this->User_model->update($where, $data, 'user');

		redirect(base_url('users'));
	}

	public function delete($id)
	{
		$where = array('IDUser' => $id);
		$this->User_model->delete($where, 'user');

		redirect(base_url('users'));
	}
}