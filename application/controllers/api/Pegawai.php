<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

const CHANGE_NAMA_LENGKAP = 750;
const CHANGE_TEMPAT_LAHIR = 751;
const CHANGE_USERNAME = 752;
const CHANGE_PASSWORD = 753;
const CHANGE_JENIS_KELAMIN = 754;
const CHANGE_TANGGAL_LAHIR = 755;
const CHANGE_IMAGE = 756;

class Pegawai extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_admin');
    }

    public function index_get()
    {
        $id = $this->get('id');

        $pegawai = $this->M_admin->select_where('pegawai', ['id' => $id]);

        if ($pegawai->num_rows() > 0) {

            $this->response([
                'status' => true,
                'message' => 'Ambil data berhasil',
                'data' => [
                    $pegawai->row_array()
                ]
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Pegawai tidak ditemukan',
                'data' => []
            ], 404);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $flag = $this->put('flag');
        $data = $this->put('data');

        switch ($flag) {
            case CHANGE_NAMA_LENGKAP:
                $this->db->set('full_name', $data);
                $this->db->where('id', $id);
                $this->db->update('pegawai');
                break;

            case CHANGE_JENIS_KELAMIN:
                $this->db->set('jenkel', $data);
                $this->db->where('id', $id);
                $this->db->update('pegawai');
                break;

            case CHANGE_TEMPAT_LAHIR:
                $this->db->set('tempat_lhr', $data);
                $this->db->where('id', $id);
                $this->db->update('pegawai');
                break;

            case CHANGE_TANGGAL_LAHIR:
                $time = strtotime($data);
                $data = date('Y-m-d', $time);

                $this->db->set('tanggal_lhr', $data);
                $this->db->where('id', $id);
                $this->db->update('pegawai');
                break;

            case CHANGE_USERNAME:
                $this->db->set('username', $data);
                $this->db->where('id', $id);
                $this->db->update('pegawai');
                break;

            case CHANGE_PASSWORD:
                $this->db->set('password', md5($data));
                $this->db->where('id', $id);
                $this->db->update('pegawai');
                break;

            case CHANGE_IMAGE:
                //Upload image
                $image_name = md5(uniqid(rand(), true)) . '.jpg';
                file_put_contents(APPPATH . '../assets/img/pegawai/' . $image_name, base64_decode($data));

                //Unlink old image
                $pegawai = $this->db->query("SELECT photo FROM pegawai WHERE id = '$id'")->row_array();
                unlink(APPPATH . '../assets/img/pegawai/' . $pegawai['photo']);

                //Update DB
                $this->db->set('photo', $image_name);
                $this->db->where('id', $id);
                $this->db->update('pegawai');
                break;
        }

        if ($this->db->affected_rows() > 0) {
            $this->response([
                'status' => true,
                'message' => 'Update data berhasil',
                'data' => [
                    $flag
                ]
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Update data gagal',
                'data' => []
            ], 400);
        }
    }
}
