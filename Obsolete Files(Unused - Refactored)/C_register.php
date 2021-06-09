<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'D:\xampp\composer\vendor\autoload.php';

class C_register extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_regist');
		$this->load->library('form_validation');
	}

	public function index(){
		$this->load->helper('url');
        $this->load->view("V_register");
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

	        $user_baru = array(
	        	'IDUser' => intval($rows + 1),
	            'Username' => strval($this->input->post('username')),
	            'Password' => $this->input->post('password'),
	            #password_hash(, PASSWORD_DEFAULT),
	            
	            'Nama' =>$this->input->post('nama'),
	            'Email' =>$this->input->post('email'),
	            'HP' => intval($this->input->post('hp')),
	            'TipeUser' =>'user',
	            'TTL' =>$this->input->post('ttl'),
	            'foto_profil' => 'default.png'
	            
        	);
        	#echo print_r($user_baru,true);
            $this->M_regist->tambahDataUser($user_baru);
            redirect(base_url());
        }	
    }
}