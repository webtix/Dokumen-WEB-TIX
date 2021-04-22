<?php

class M_staff extends CI_model 
{
    public function getAllFilm()
    {
        return $this->db->get('film')->result_array();
    }

    public function tambahDatafilm($foto)
    {
        $data = [
            'NamaFilm' => $this->input->post('id_dokter',true),
            'Durasi' => $this->input->post('nama',true),
            'RatingUmur' => $this->input->post('spesialis',true),
            'Sinopsis' =>$this->input->post('ktp/kk',true),

        ];
        $this->db->insert('film',$data);
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
}