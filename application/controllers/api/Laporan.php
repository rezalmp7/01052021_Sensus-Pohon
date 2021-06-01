<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;


class Laporan extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_admin');
    }

    public function index_post()
    {
        $laporan = $this->post('laporan');
        $laporan = json_decode($laporan, true);

        //Upload image
        if ($laporan['foto'] !== '') {
            $image_name = md5(uniqid(rand(), true)) . '.jpg';
            file_put_contents(APPPATH . '../assets/img/laporan/' . $image_name, base64_decode($laporan['foto']));
        } else {
            $image_name = '';
        }

        //insert
        $id = $laporan['id'];
        $laporan = array(
            'kode_pohon' => $laporan['kode_pohon'],
            'jml_buah' => $laporan['jml_buah'],
            'buah_rusak' => $laporan['buah_rusak'],
            'buah_sp_pn' => $laporan['buah_sp_pn'],
            'sisa' => $laporan['sisa'],
            'status' => $laporan['status'],
            'foto' => $image_name,
            'laporan_by' => $laporan['laporan_by']
        );

        $this->M_admin->insert_data('laporan', $laporan);

        if ($this->db->affected_rows() > 0) {
            $this->response([
                'status' => true,
                'message' => 'Upload laporan berhasil',
                'data' => [
                    $id
                ]
            ], 200);
        } else {
            $this->response([
                'status' => true,
                'message' => 'Upload laporan gagal',
                'data' => []
            ], 400);
        }
    }


    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $query = $this->M_admin->select_all('laporan');
        } else {
            $query = $this->M_admin->select_where('laporan', ['laporan_by' => $id]);
        }

        $laporan = [];
        foreach ($query->result_array() as $row) {
            $laporan[] = [
                'id' => $row['id'],
                'kode_pohon' => $row['kode_pohon'],
                'tanggal' => date('d/m/Y', strtotime($row['create_at'])),
                'status' => $row['status']
            ];
        }

        $this->response([
            'status' => true,
            'message' => 'Ambil data berhasil',
            'data' => $laporan
        ], 200);
    }
}
