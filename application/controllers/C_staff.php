<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_staff extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_staff');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('templates/header-staff');
		$this->load->view('home/index-staff');
		$this->load->view('templates/footer');
	}

	public function tambahfilm()
    {
        $data['judul'] = 'Film Baru';
        
        $this->form_validation->set_rules('NamaFilm','namafilm','required|numeric');
        $this->form_validation->set_rules('Durasi','durasi','required');
        $this->form_validation->set_rules('RatingUmur','RatingUmur','required');
        $this->form_validation->set_rules('Sinopsis','Sinopsis','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header-staff');
            $this->load->view('staff/tambahfilm');
            $this->load->view('templates/footer');
        }else{
            $config['upload_path']          = './upload/film/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2048; 
            $config['file_name']            = $_FILES['foto']['name'];
            $this->load->library('upload',$config);

            if (!$this->upload->do_upload('foto')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('staff/tambahfilm',$data);
            }else{
                $foto = $this->upload->data('file_name');
                $this->M_staff->tambahDataDokter($foto);
                $this->session->set_flashdata('flash','ditambahkan');
                redirect('Dokter');
            }
        }
    }
}
