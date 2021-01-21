<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class user_model extends CI_Model {

    public function getBuku($limit, $start) {
        $query = $this->db->get('buku', $limit, $start);
        return $query->result_array();
    }
    public function getBukuAll() {
        $query = $this->db->get('buku');
        return $query->result_array();
    }
    public function getKategori() {
        $query = $this->db->get('kategori_buku');
        return $query->result_array();
    }

    public function tambah_pengunjung(){
        $this->id_pengunjung=uniqid();
        $data = [
            "nama_pengunjung" => $this->input->post('nama_pengunjung', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "telepon" => $this->input->post('telepon', true),
            "email" => $this->input->post('email', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "id_buku" => $this->input->post('id_buku', true)
        ];
        $this->db->set('tanggal', 'NOW()', FALSE);
        $this->db->set('jam_masuk', 'NOW()', FALSE);
        $this->db->insert('pengunjung', $data);
    }
    public function getPengunjung() {
        $query = $this->db->get('pengunjung');
        return $query->result_array();
    }
    public function tambah_kritik(){
        $this->id_kritiksaran=uniqid();
        $data = [
            "KritikSaran" => $this->input->post('KritikSaran', true),
            "id_pengunjung" => $this->input->post('id_pengunjung', true)
        ];
        $this->db->insert('kritik_saran', $data);
    }
    public function detail_buku($id){
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori');
        $this->db->where('buku.id_buku', $id);
        return $this->db->get()->result_array();
    }
    public function search(){
        $keyword=$this->input->post('keyword');
        $this->db->like('judul_buku', $keyword);
        return $this->db->get('buku')->result_array();
    }
}