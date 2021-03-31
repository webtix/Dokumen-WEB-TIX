<?php

class C_login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_Login');
		$this->load->library('form_validation');
	}

	public function index()
	{
        $this->load->view("login");
	}

	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        $cek_user=$this->M_Login->log_user($username,$password);
        if($cek_user->num_rows() > 0){ //jika login sebagai dosen
            $data=$cek_user->row_array();
            $this->session->set_userdata('masuk',TRUE);
            if($data['TipeUser']=='manager'){ //Akses manager
                $this->session->set_userdata('akses','1');
                $this->session->set_userdata('ses_id',$data['IDUser']);
                $this->session->set_userdata('ses_nama',$data['nama']);
                redirect('c_home');
 
            }else if($data['TipeUser']=='admin'){ //akses admin
                $this->session->set_userdata('akses','2');
                $this->session->set_userdata('ses_id',$data['IDUser']);
                $this->session->set_userdata('ses_nama',$data['nama']);
                redirect('c_home');
            }else if($data['TipeUser']=='user'){ //akses admin
                $this->session->set_userdata('akses','3');
                $this->session->set_userdata('ses_id',$data['IDUser']);
                $this->session->set_userdata('ses_nama',$data['nama']);
                redirect('c_home');
 			}else{  // jika username dan password tidak ditemukan atau salah
                $url=base_url();
                echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                redirect($url);
            }                  
        }
    }
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('C_login'));
	}
}