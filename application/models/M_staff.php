<?php

class M_staff extends CI_model 
{
    public function getAllFilm()
    {
        return $this->db->get('film')->result_array();
    }

    public function tambahDataDokter($foto)
    {
        $data = [
            'NamaFilm' => $this->input->post('id_dokter',true),
            'Durasi' => $this->input->post('nama',true),
            'RatingUmur' => $this->input->post('spesialis',true),
            'Sinopsis' =>$this->input->post('ktp/kk',true),

        ];
        $this->db->insert('film',$data);
    }
}