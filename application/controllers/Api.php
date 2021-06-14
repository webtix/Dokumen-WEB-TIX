<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Film_model');
		$this->load->model('Pesanan_model');
		$this->load->model('Jadwal_model');
	}

	public function get_jadwal($id_bioskop, $id_film)
	{
		$where = [
			'IDBioskop' => $id_bioskop,
			'IDFilm' => $id_film
		];

		$data = $this->Jadwal_model->getData(null, 'jadwal', null, $where)->result();

		echo json_encode($data);
	}
}