<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

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
}

/* End of file Admin_model.php */

?>