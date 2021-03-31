<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_film');
 
	}

	public function index()
	{
		$data['film'] = $this->M_film->getFilm()->result_array();

		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}
