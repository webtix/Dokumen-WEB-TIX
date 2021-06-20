<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		if(empty($this->session->userdata('nama'))){
			redirect(base_url('login'));
		}

		if($this->session->userdata('TipeUser') != 'staff'){
			redirect(base_url('home'));
		}

		$this->load->model('Film_model');
	}

	public function index()
	{
		$data['films'] = $this->Film_model->getData('film')->result_array();

		$this->load->view('templates/header');
		$this->load->view('film/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$this->load->view('templates/header');
		$this->load->view('film/add');
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$data = [
			'NamaFilm' => $this->input->post('NamaFilm'),
			'Durasi' => $this->input->post('Durasi'),
			'RatingUmur' => $this->input->post('Rating'),
			'Sinopsis' => $this->input->post('Sinopsis'),
			'poster' => $_FILES['poster']['name'],
		];

		$config['upload_path']          = FCPATH . 'assets\upload';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 4096; 

        //error handling
        $checker = $this->Film_model->cek_film("film", array('NamaFilm' => $data['NamaFilm']))->result_array();
        #$checker = $this->db->query('SELECT * FROM `film` WHERE (NamaFilm= "'.$data['NamaFilm'].'")')->result_array();

		if ($data['Durasi'] > 120){
        	$this->session->set_flashdata('statusfilm','gagal menambahkan film, durasi film lebih dari 2 jam');
        	redirect(base_url('film'));
        } else if ($data['NamaFilm'] == $checker['NamaFilm']){
        	$this->session->set_flashdata('statusfilm','gagal menambahkan film, durasi film lebih dari 2 jam');
        	redirect(base_url('film'));
        } else {
	        	$this->load->library('upload', $config);
			if ($this->upload->do_upload('poster')){
				$this->Film_model->insert('film', $data);

				redirect(base_url('film'));
			}else{
				redirect(base_url('film/add'));
			}
        }
	}

	public function edit($id)
	{
		$where = array('IDFilm' => $id);
		$data['film'] = $this->Film_model->edit($where, 'film')->result_array();

		$this->load->view('templates/header');
		$this->load->view('film/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update($id)
	{
		if(!empty($_FILES['poster']['name'])){
			$data = [
				'NamaFilm' => $this->input->post('NamaFilm'),
				'Durasi' => $this->input->post('Durasi'),
				'RatingUmur' => $this->input->post('Rating'),
				'Sinopsis' => $this->input->post('Sinopsis'),
				'poster' => $_FILES['poster']['name'],
			];

			$where = [
				'IDFilm' => $id
			];

			$config['upload_path']          = FCPATH . 'assets\upload';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 4096; 

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('poster')){
				$this->Film_model->update($where, $data, 'film');

				redirect(base_url('film'));
			}else{
				redirect(base_url('film/edit/'.$id));
			}
		}else{
			$data = [
				'NamaFilm' => $this->input->post('NamaFilm'),
				'Durasi' => $this->input->post('Durasi'),
				'RatingUmur' => $this->input->post('Rating'),
				'Sinopsis' => $this->input->post('Sinopsis'),
			];

			$where = [
				'IDFilm' => $id
			];

			$this->Film_model->update($where, $data, 'film');

			redirect(base_url('film'));
		}
	}

	public function delete($id)
	{
		$where = array('IDFilm' => $id);
		$this->Film_model->delete($where, 'film');

		redirect(base_url('film'));
	}
}