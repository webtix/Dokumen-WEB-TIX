<?php 
 
class M_home extends CI_Model{	
    
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function getFilm(){ # mengambil data film dari database
		return $this->db->get('film')->result_array();
	}

	public function tambahDataFilm($poster) #untuk melakukan penambahan datafilm
    {
        $data = [
            'NamaFilm' => $this->input->post('nama',true), #mengambil data nama film pada database
            'Durasi' => $this->input->post('durasi',true), #mengambil data Durasi film pada database
            'RatingUmur' => $this->input->post('ratingumur',true), #mengambil data Rating film pada database
            'Sinopsis' => $this->input->post('sinopsis',true), #mengambil data sinopsis film pada database
            'foto' => $poster #mengambil data poster film pada database
        ];

        $this->db->insert('film',$data);
    }

}