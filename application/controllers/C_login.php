<?php

class C_login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_Login');
		$this->load->model('M_email');
		$this->load->library('form_validation');
	}

	public function index(){
		$this->load->helper('url');
        $this->load->view("login");
	}

	#LOGIN.
	#note : CHECKING USERTYPE still NOT FINISHED
	function login_user(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->M_Login->cek_login("user",$where);
		if($cek->num_rows() > 0){
 			//Cek USER TYPE (Placeholder, DONT FORGET TO EDIT. VERY IMPORTANTE)
 			#$usertype = mysqel_fetch_row($cek);

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
			$verif = $this->M_email->confirm_login();
 			redirect(base_url("C_email"),$verif);

		}else{
			echo "Username dan password salah !";
		}
	}

	function verifikasi(){
		$kode = $this->input->post('code');

		redirect(base_url("C_home"));
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('C_login'));
	}
}