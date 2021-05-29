<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'D:\xampp\composer\vendor\autoload.php';

class C_login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_Login');
		$this->load->model('M_email');
		$this->load->model('M_regist');
		$this->load->library('form_validation');
	}

	public function index(){
		$this->load->helper('url');
        $this->load->view("login");
	}

	#LOGIN.
	#note : CHECKING USERTYPE still NOT FINISHED
	public function login_user(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$where = array(
			'username' => $username,
			'password' => $password
			);

		$cek = $this->M_Login->cek_login("user",$where);
		$userdata = $cek->result_array();
		if($cek->num_rows() > 0){
 			//Cek USER TYPE (Placeholder, DONT FORGET TO EDIT. VERY IMPORTANT)
 			#$usertype = mysqel_fetch_row($cek);

			$data_session = array(
				'nama' => $userdata[0]['Nama'],
				'email' => $userdata[0]['Email'],
				'hp' => $userdata[0]['HP'],
				'TTL' => $userdata[0]['TTL'],
				'status' => "login"
			);
 			
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('data_user',$userdata[0]);

			#$verif = $this->M_Login->confirm_login();
			#echo '<br>'.print_r($userdata, true);
			#echo '<br>'.$data_session['email'];

 			#redirect(base_url("C_email"),$verif);
 			if($userdata[0]['TipeUser'] == 'admin'){
 				redirect(base_url('C_Staff'));
 			}
 			else if($userdata[0]['TipeUser'] == 'user'){
 				redirect(base_url("C_home"));	
 			}
 			

		}else{
			redirect(base_url());
		}
	}

	function verifikasi_login(){
		$kode = $this->input->post('code');

		redirect(base_url("C_home"));
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('C_login'));
	}

	public function register(){
		$this->load->view('V_register');
	}

	public function tambah_user(){

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('nama','Nama','required');

        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('hp','Hp','required|numeric');
        $this->form_validation->set_rules('ttl','TTL','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('V_register');
			$this->load->view('templates/footer');
        }else{
        	$query = $this->db->get('user');
			$rows = $query->num_rows();

			// $name = $this->input->post('username',true);
			// echo $name;

	        $user_baru = [
	            'Username' => $this->input->post('username',true),
	            'Password' => password_hash($this->input->post('password',true), PASSWORD_DEFAULT),
	            'Nama' =>$this->input->post('nama',true),

	            'Email' =>$this->input->post('email',true),
	            'HP' =>$this->input->post('hp',true),
	            'TipeUser' =>'user',
	            'TTL' =>$this->input->post('ttl',true),
	            'foto_profil' => 'default.png'
        	];
        	#echo print_r($user_baru,true);
            $this->M_Login->tambahDataUser($user_baru);
            redirect(base_url());
        }	
    }
}