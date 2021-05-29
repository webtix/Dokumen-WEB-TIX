<?php

class M_staff extends CI_model 
{
    public function getAllFilm()
    {
        return $this->db->get('film')->result_array();
    }


    private function _uploadImage(){
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }
    private function _deleteImage($id){
        $product = $this->getById($id);
        if ($product->image != "default.jpg") {
            $filename = explode(".", $product->image)[0];
            return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
        }
    }

    public function tambahDataFilm($poster) #untuk melakukan penambahan datafilm
    {
        $data = [
            'NamaFilm' => $this->input->post('nama',true), #mengambil data nama film dari input
            'Durasi' => $this->input->post('durasi',true), #mengambil data Durasi film dari input
            'RatingUmur' => $this->input->post('ratingumur',true), #mengambil data Rating film dari input
            'Sinopsis' => $this->input->post('sinopsis',true), #mengambil data sinopsis film dari input
            'foto' => $poster #mengambil data poster film dari input
        ];

        $this->db->insert('film',$data);
    }
}