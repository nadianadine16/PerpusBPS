<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function hitung_buku() {
        return $this->db->count_all('buku');
    }

    public function hitung_pengunjung() {
        return $this->db->count_all('pengunjung');
    }

    public function hitung_kategori_buku() {
        return $this->db->count_all('kategori_buku');
    }

    public function hitung_admin() {
        return $this->db->get_where('user', array('status' => '1'))->num_rows();
    }

    public function hitung_supervisor() {
        return $this->db->get_where('user', array('status' => '2'))->num_rows();
    }
    
    public function tambah_data_admin() {
        $this->id_user = uniqid();
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "telepon" => $this->input->post('telepon', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "status" => $this->input->post('status')
        ];
        $this->db->insert('user', $data);
    }

    public function getAllAdmin() {
        $status = 1;
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array('status'=>$status));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAdminById($id) {
        $query=$this->db->get_where('user',array('id_user'=>$id));
        return $query->row_array();
    }

    public function edit_data_admin($id) {
        $post=$this->input->post();
        $this->id_user = $post["id_user"];
        $this->nama = $post["nama"];
        $this->nip = $post["nip"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->telepon = $post["telepon"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = $post["status"];
        
        $this->db->update('user',$this, array('id_user' => $post['id_user']));
    }

    public function hapus_data_admin($id) {
        return $this->db->delete('user',array("id_user"=>$id));
    }

    public function getAllSupervisor() {
        $status = 2;
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array('status'=>$status));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_data_supervisor() {
        $this->id_user = uniqid();
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "telepon" => $this->input->post('telepon', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "status" => $this->input->post('status')
        ];
        $this->db->insert('user', $data);
    }

    public function getSupervisorById($id) {
        $query=$this->db->get_where('user',array('id_user'=>$id));
        return $query->row_array();
    }

    public function edit_data_supervisor($id) {
        $post=$this->input->post();
        $this->id_user = $post["id_user"];
        $this->nama = $post["nama"];
        $this->nip = $post["nip"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->telepon = $post["telepon"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = $post["status"];
        
        $this->db->update('user',$this, array('id_user' => $post['id_user']));
    }

    public function hapus_data_supervisor($id) {
        return $this->db->delete('user',array("id_user"=>$id));
    }

    public function getAllPengunjung() {
        $this->db->select('*');
        $this->db->from('pengunjung');
        $this->db->join('buku', 'buku.id_buku = pengunjung.id_buku');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllBuku() {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategori_buku', 'buku.id_kategori = kategori_buku.id_kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_data_buku() {
        $this->id_buku = uniqid();
        $data = [
            "judul_buku" => $this->input->post('judul_buku', true),
            "nomor_katalog" => $this->input->post('nomor_katalog', true),
            "isbn" => $this->input->post('isbn', true),
            "tahun_rilis" => $this->input->post('tahun_rilis', true),
            "id_kategori" => $this->input->post('id_kategori', true),
            "letak" => $this->input->post('letak', true),
            "jumlah_halaman" => $this->input->post('jumlah_halaman', true),
            "status" => $this->input->post('status'),
            "cover" => $this->uploadCoverBuku()
        ];
        $this->db->insert('buku', $data);
    }

    public function uploadCoverBuku() {
        $config['upload_path'] = './upload/buku/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->id_buku;
        $config['overwrite'] = true;
        // $config['max_size'] = 1024;

        $this->upload->initialize($config);
        $this->load->library('upload',$config);
        if($this->upload->do_upload('cover')) {
            return $this->upload->data("file_name");
        }
    }

    public function getAllKategoriBuku() {
        $query = $this->db->get('kategori_buku');
        return $query->result_array();
    }

    public function getBukuById($id) {
        $query=$this->db->get_where('buku',array('id_buku'=>$id));
        return $query->row_array();
    }

    public function edit_data_buku($id) {
        $post=$this->input->post();
        $this->id_buku = $post["id_buku"];
        $this->judul_buku = $post["judul_buku"];
        $this->nomor_katalog = $post["nomor_katalog"];
        $this->isbn = $post["isbn"];
        $this->tahun_rilis = $post["tahun_rilis"];
        $this->id_kategori = $post["id_kategori"];
        $this->letak = $post["letak"];
        $this->jumlah_halaman = $post["jumlah_halaman"];
        $this->status = $post["status"];
        $this->cover = $this->uploadCoverBuku();
        
        $this->db->update('buku',$this, array('id_buku' => $post['id_buku']));
    }

    public function hapus_data_buku($id) {
        return $this->db->delete('buku',array("id_buku"=>$id));
    }

    public function tambah_data_kategori_buku() {
        $this->id_kategori = uniqid();
        $data = [
            "nama_kategori" => $this->input->post('nama_kategori', true),
        ];
        $this->db->insert('kategori_buku', $data);
    }

    public function getKategoriBukuById($id) {
        $query=$this->db->get_where('kategori_buku',array('id_kategori'=>$id));
        return $query->row_array();
    }

    public function edit_data_kategori_buku($id) {
        $post=$this->input->post();
        $this->id_kategori = $post["id_kategori"];
        $this->nama_kategori = $post["nama_kategori"];

        $this->db->update('kategori_buku',$this, array('id_kategori' => $post['id_kategori']));
    }

    public function hapus_data_kategori_buku($id) {
        return $this->db->delete('kategori_buku',array("id_kategori"=>$id));
    }

    public function pengunjung_keluar($id) {
        date_default_timezone_set('Asia/Jakarta');
        $data = date('Y-m-d H:i:s', time());

        $this->db->set('jam_keluar',$data);
        $this->db->where('id_pengunjung',$id);
        
        $this->db->update("pengunjung");
    }
}

/* End of file Admin_model.php */

?>