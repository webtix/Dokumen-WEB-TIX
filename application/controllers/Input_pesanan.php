<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_pesanan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		if(empty($this->session->userdata('nama'))){
			redirect(base_url('login'));
		}

		if($this->session->userdata('TipeUser') != 'user'){
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
			'pemesanan.Status'
		];

		$where = [
			'pemesanan.IDUser' => $this->session->userdata('id')
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
		$this->load->view('input_pesanan/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$data['bioskop'] = $this->Bioskop_model->getData(null, 'bioskop')->result_array();
		$data['film'] = $this->Film_model->getData(null, 'film')->result_array();

		$this->load->view('templates/header');
		$this->load->view('input_pesanan/add', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$data = [
			'IDFilm' => $this->input->post('IDFilm'),
			'IDJadwal' => $this->input->post('IDJadwal'),
			'IDUser' => $this->session->userdata('id'),
			'Status' => 'Belum dibayar'
		];

		$this->Pesanan_model->insert('pemesanan', $data);

		redirect(base_url('input_pesanan'));
	}

	public function bayar($id)
	{
		$data['id'] = $id;

		$this->load->view('templates/header');
		$this->load->view('input_pesanan/bayar', $data);
		$this->load->view('templates/footer');
	}

	public function store_bayaran($id)
	{
		$data = [
			'Status' => 'Pembayaran sedang di-verifikasi',
			'TipePembayaran' => $this->input->post('TipePembayaran'),
		];

		$where = [
			'IDOrder' => $id
		];

		$this->Pesanan_model->update($where, $data, 'pemesanan');

		redirect(base_url('input_pesanan'));
	}

	public function delete($id)
	{
		$where = array('IDOrder' => $id);
		$this->Pesanan_model->delete($where, 'pemesanan');

		redirect(base_url('input_pesanan'));
	}

	public function export($id) {
        $select = [
			'pemesanan.IDOrder',
			'jadwal.Tanggal',
			'film.NamaFilm',
			'bioskop.NamaBioskop',
			'pemesanan.Status',
			'user.Nama',
		];

		$where = [
			'pemesanan.IDOrder' => $id
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

		$data = $this->Pesanan_model->getData($select, 'pemesanan', null, $where, $join)->result_array();
 
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Cetak hasil pembayaran", 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);

        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);

        $pdf->Cell(80, 8, "Nama Film : ", 1, 0, 'C');
        $pdf->Cell(80, 8, $data[0]['NamaFilm'], 1, 1, 'C');

        $pdf->Cell(80, 8, "Nama Bioskop : ", 1, 0, 'C');
        $pdf->Cell(80, 8, $data[0]['NamaBioskop'], 1, 1, 'C');

        $pdf->Cell(80, 8, "Tanggal : ", 1, 0, 'C');
        $pdf->Cell(80, 8, $data[0]['Tanggal'], 1, 1, 'C');

        $pdf->Cell(80, 8, "Nama Pembeli : ", 1, 0, 'C');
        $pdf->Cell(80, 8, $data[0]['Nama'], 1, 1, 'C');

        $pdf->Cell(80, 8, "Status Pembayaran : ", 1, 0, 'C');
        $pdf->Cell(80, 8, $data[0]['Status'], 1, 1, 'C');
        
        $tanggal = date('d-m-Y');
        $pdf->Output('Pembelian - '.$data[0]['Tanggal'].'.pdf'); 
    }
}