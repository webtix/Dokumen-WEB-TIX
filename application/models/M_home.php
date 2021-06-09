<?php 
 
class M_home extends CI_Model{	
    
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function getFilm(){ # mengambil data film dari database
		return $this->db->get('film')->result_array();
	}

	function getFilmById($id) # mengambil data film dari database
    {
        return $this->db->get_where('film',['IDFilm' => $id])->row_array();
    }

}