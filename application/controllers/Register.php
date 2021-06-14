<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller 
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
		$this->load->view('register');
	}

	public function store()
	{
		$query = $this->db->get('user');
		$rows = $query->num_rows();

        $data = array(
            'Username' => strval($this->input->post('username')),
            'Password' => $this->input->post('password'),
            'Nama' => $this->input->post('nama'),
            'Email' => $this->input->post('email'),
            'HP' => intval($this->input->post('hp')),
            'TipeUser' => 'user',
            'Tanggal_Lahir' => $this->input->post('ttl'),
    	);

        $this->User_model->insert('user', $data);
        redirect(base_url());
	}
}