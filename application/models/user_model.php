<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class user_model extends CI_Model {

        public function getBuku() {
            $query = $this->db->get('buku');
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
                // "jam_masuk" => $this->input->post('jam_masuk', true),
                "id_buku" => $this->input->post('id_buku', true)
            ];
            $this->db->set('jam_masuk', 'NOW()', FALSE);
            $this->db->insert('pengunjung', $data);
        }
        public function tambah_kritik(){
            $this->id_kritiksaran=uniqid();
            $data = [
                "nama" => $this->input->post('nama', true),
                "email" => $this->input->post('email', true),
                "subject" => $this->input->post('subject', true),
                "KritikSaran" => $this->input->post('KritikSaran', true),
            ];
            $this->db->insert('kritik_saran', $data);
        }
    }