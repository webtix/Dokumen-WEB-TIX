<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_home');
        $this->load->model('M_login');
        $this->load->library('session');
	}

	public function index()
	{
		$data['preview'] = $this->db->query("SELECT * FROM film LIMIT 1;")->result_array();

		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

    public function profile()
    {
        $data['user'] = $this->session->flashdata('data_user');
        #echo print_r($user,true);
        
        $this->load->view('templates/header');
        $this->load->view('profile', $data);
        $this->load->view('templates/footer');
    }

    public function booking($id)
    {   
        $data['detailfilm'] = $this->M_home->getFilmById($id);
        $this->load->view('templates/header');
        $this->load->view('home/bookingfilm',$data);
        $this->load->view('templates/footer');
    }

    public function view_film()
    {
        $data['film'] = $this->M_home->getFilm();
        #echo print_r($user,true);
        
        $this->load->view('templates/header');
        $this->load->view('film', $data);
        $this->load->view('templates/footer');
    }
}