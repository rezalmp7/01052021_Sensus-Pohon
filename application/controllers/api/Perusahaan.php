<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Perusahaan extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_admin');
    }

    public function index_get()
    {
        $foto = $this->M_admin->select_all('foto')->result();
        $profile = $this->M_admin->select_where('website', ['id' => 1])->row();
        $pengumuman = $this->M_admin->select_select_orderBy('pengumuman, create_at, id', 'pengumuman', 'create_at', 'DESC')->result();

        foreach ($foto as $f) {
            $list_foto[] = $f->src;
        }

        foreach ($pengumuman as $p) {
            $list_pengumuman[] = $p->pengumuman;
        }
        $this->response([
            'status' => true,
            'message' => 'Ambil data berhasil',
            'data' => [[
                'foto' => $list_foto,
                'profile' => $profile->profil,
                'pengumuman' => $list_pengumuman
            ]]
        ], 200);
    }
}
