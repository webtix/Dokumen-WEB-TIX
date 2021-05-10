<?php 
 
class M_regist extends CI_Model{	
    
	public function tambahDataUser($data)
    {
    	//mendapatkan jumlah data didalam tabel untuk menentukan IDUser baru

        $this->db->insert('user',$data);
    }
}