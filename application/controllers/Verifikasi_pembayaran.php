<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_pembayaran extends CI_Controller 
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
		$this->load->model('Bioskop_model');
		$this->load->model('Pesanan_model');
	}

	public function index()
	{
		$select = [
			'pemesanan.IDOrder',
			'jadwal.Tanggal',
			'film.NamaFilm',
			'bioskop.NamaBioskop',
			'user.Nama',
			'pemesanan.Status'
		];

		$where = [
			'pemesanan.Status' => 'Pembayaran sedang di-verifikasi'
		];

		$join = [
			[
				'table' => 'film',
				'on' => 'film.IDFilm = pemesanan.IDFilm'
			],
			[
				'table' => 'jadwal',
				'on' => 'jadwal.IDJadwal = pemesanan.IDJadwal'
			],
			[
				'table' => 'bioskop',
				'on' => 'bioskop.IDBioskop = jadwal.IDBioskop'
			],
			[
				'table' => 'user',
				'on' => 'user.IDUser = pemesanan.IDUser'
			]
		];

		$data['pesanan'] = $this->Pesanan_model->getData($select, 'pemesanan', null, $where, $join)->result_array();

		$this->load->view('templates/header');
		$this->load->view('verifikasi_pembayaran/index', $data);
		$this->load->view('templates/footer');
	}

	public function store_verifikasi($id)
	{
		$data = [
			'Status' => 'Pembayaran selesai di-verifikasi'
		];

		$where = [
			'IDOrder' => $id
		];

		$this->Pesanan_model->update($where, $data, 'pemesanan');

		redirect(base_url('verifikasi_pembayaran'));
	}
}