<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class C_register extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_regist');
	}
 
	public function index()
	{
		$this->load->view('V_register');
		$this->load->view('templates/footer');
	}
 
	public function proses()
	{
		$this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[16]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[12]');
		$this->form_validation->set_rules('nama', 'nama','trim|required|min_length[1]|max_length[32]');
		if ($this->form_validation->run()==true)
	   	{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama = $this->input->post('nama');
			$this->auth->register($username,$password,$nama);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			redirect('login');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('register');
		}
	}

	##Registrasi WIP
 	function tambah_user(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$hp = $this->input->post('hp');
 
		$data = array(
			'Username' => $username,
			'Password' => $password,
			'Nama' => $nama,
			'Email' => $email,
			'HP' => $hp
			);
		$this->m_login->regist($data,'user');
		redirect(base_url());
	}

}