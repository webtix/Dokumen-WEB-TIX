<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_staff extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_staff');
        $this->load->model('M_login');
        $this->load->model('M_home');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['preview'] = $this->M_home->getFilm();
		$this->load->view('templates/header-staff');
		$this->load->view('staff/index-staff',$data);
		$this->load->view('templates/footer');
	}

	function tambahfilm(){
		$this->load->view('staff/tambahfilm');
	}

	public function tambah()
    {
        $this->form_validation->set_rules('NamaFilm','Nama Film','required');
        $this->form_validation->set_rules('Durasi','Durasi','required|numeric');
        $this->form_validation->set_rules('RatingUmur','Rating Umur','required');
        $this->form_validation->set_rules('Sinopsis','Sinopsis','required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('staff/tambahfilm');
            $this->load->view('templates/footer');
        }else{
            $config['upload_path']          = './upload/poster/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 4096; 
            $config['file_name']            = $_FILES['foto']['name'];
            $this->load->library('upload',$config);

            if (!$this->upload->do_upload('foto')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('staff/tambahfilm',$data);
            }else{
                $foto = $this->upload->data('file_name');
                $this->M_staff->tambahDataFilm($foto);
                $this->session->set_flashdata('flash','ditambahkan');
                redirect('C_staff');
            }
        }
    }
	
}
