<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_film');
 
	}

	public function index()
	{
		$data['film'] = $this->M_film->getFilm();

		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
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
                $this->Obat_model->tambahDataFilm($foto);
                $this->session->set_flashdata('flash','ditambahkan');
                redirect('C_home');
            }
        }
    }
}
