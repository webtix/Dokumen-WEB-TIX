<?php 
 
class M_film extends CI_Model{	
    
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function getFilm(){
		return $this->db->get('film')->result_array();
	}

	public function tambahDataFilm($poster)
    {
        $data = [
            'NamaFilm' => $this->input->post('nama',true),
            'Durasi' => $this->input->post('durasi',true),
            'RatingUmur' => $this->input->post('ratingumur',true),
            'Sinopsis' => $this->input->post('sinopsis',true),
            'foto' => $poster
        ];

        $this->db->insert('obat',$data);
    }

}