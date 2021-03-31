<?php 
 
class M_film extends CI_Model{	
    
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function getFilm(){
		return $this->db->get('film');
	}


}