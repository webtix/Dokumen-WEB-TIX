<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		if(empty($this->session->userdata('nama'))){
			redirect(base_url('login'));
		}

		if($this->session->userdata('TipeUser') != 'manager'){
			redirect(base_url('home'));
		}

		$this->load->model('Film_model');
		$this->load->model('Bioskop_model');
		$this->load->model('Pesanan_model');
	}

	public function index()
	{
		$data['bioskop'] = $this->Bioskop_model->getData(null, 'bioskop')->result_array();

		$this->load->view('templates/header');
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
	}

	public function export()
	{
		$IDBioskop = $this->input->get('IDBioskop');

		$query = "
			SELECT
				B.Tanggal,
				COUNT(A.IDOrder) AS JumlahPenonton,
				COUNT(A.IDOrder) * 50000 AS JumlahPendapatan
			FROM
				pemesanan A
			INNER JOIN
				jadwal B
				ON B.IDJadwal = A.IDJadwal
			INNER JOIN
				bioskop C
				ON C.IDBioskop = B.IDBioskop
			WHERE
				C.IDBioskop = $IDBioskop
			GROUP BY
				B.Tanggal
		";

		$query = $this->db->query($query);
		$data['pemesanan'] = $query->result_array();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-penjualan.pdf";
		$this->pdf->load_view('laporan/pdf', $data);

		// $pdf = new \TCPDF();
  //       $pdf->AddPage();
  //       $pdf->SetFont('', 'B', 20);
  //       $pdf->Cell(115, 0, "Laporan Penjualan", 0, 1, 'L');
  //       $pdf->SetAutoPageBreak(true, 0);

  //       // Add Header
  //       $pdf->Ln(10);
  //       $pdf->SetFont('', 'B', 12);
  //       $pdf->Cell(10, 8, "No", 1, 0, 'C');
  //       $pdf->Cell(40, 8, "Tanggal", 1, 0, 'C');
  //       $pdf->Cell(70, 8, "Jumlah Penonton", 1, 0, 'C');
  //       $pdf->Cell(70, 8, "Jumlah Pendapatan", 1, 0, 'C');
  //       $pdf->SetFont('', '', 12);

  //       foreach($data as $key => $val) {
  //           $this->addRow($pdf, $key + 1, $val);
  //       }

  //       $tanggal = date('d-m-Y');
  //       $pdf->Output('Pembelian - '.$tanggal.'.pdf'); 
	}

	private function addRow($pdf, $no, $val)
	{
		$pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(40, 8, $val['Tanggal'], 1, 0, 'C');
        $pdf->Cell(70, 8, $val['JumlahPenonton'], 1, 0, 'C');
        $pdf->Cell(70, 8, $val['JumlahPendapatan'], 1, 0, 'C');
        // $pdf->Cell(50, 8, "Rp. ".number_format($val['total'], 2, ',' , '.'), 1, 1, 'L');
	}
}