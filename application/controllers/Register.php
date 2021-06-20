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

		$username = strval($this->input->post('username'));
		$email  = strval($this->input->post('email'));

        $data = array(
            'Username' => strval($this->input->post('username')),
            'Password' => $this->input->post('password'),
            'Nama' => $this->input->post('nama'),
            'Email' => $this->input->post('email'),
            'HP' => intval($this->input->post('hp')),
            'TipeUser' => 'user',
            'Tanggal_Lahir' => $this->input->post('ttl'),
    	);

        //Error check - nomor HP tidak sesuai kriteria
        $this->form_validation->set_rules('hp', 'HP', 'required|min_length[9]|numeric');

        //Error Check - USER EXIST
        $cek = $this->User_model->cek_login("user", array('Username'=>$username, 'Email'=>$email));
        $userdata = $cek->result_array();

		if($this->form_validation->run() == false){
				$this->session->set_flashdata('status','Registrasi gagal, nomor hp tidak sesuai kriteria (12 digit)');
        	redirect(base_url('register'));
		}else {
			if($userdata[0]['Username'] == $data['Username']){
				$this->session->set_flashdata('status','Registrasi gagal, username sudah terdaftar');
	        	redirect(base_url('register'));
			} else if ($userdata[0]['Email'] == $data['Email']){
				$this->session->set_flashdata('status','Registrasi gagal, email sudah terdaftar');
	        	redirect(base_url('register'));
			}else {
				$this->User_model->insert('user', $data);
	    		$this->session->set_flashdata('status','Registrasi berhasil');
	        	redirect(base_url());
			}
		}
	}
}