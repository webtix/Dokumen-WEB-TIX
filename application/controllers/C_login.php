<?php

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
				'nama' => $username,
				'status' => "login"
				);

 			
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('data_user',$userdata[0]);

			$verif = $this->M_Login->confirm_login($userdata[0]['Email']);
			#echo '<br>'.print_r($userdata, true);
			#echo '<br>'.$userdata[0]['Email'];

 			redirect(base_url("C_email"),$verif);
 			#redirect(base_url("C_home"));

		}else{
			echo "Username dan password salah !";
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
			$rows = $query->result_array();

			// $name = $this->input->post('username',true);
			// echo $name;

			
	        $data = [	
	            'username' => $this->input->post('username',true),
	            'password' => password_hash($this->input->post('password',true), PASSWORD_DEFAULT),
	            'Nama' =>$this->input->post('nama',true),
	            'email' =>$this->input->post('email',true),
	            'HP' =>$this->input->post('hp',true),
	            'TipeUser' =>'user',
	            'TTL' =>$this->input->post('ttl',true),
        	];
            $this->M_regist->tambahDataUser($data);
            redirect(base_url());
        }	
    }
}