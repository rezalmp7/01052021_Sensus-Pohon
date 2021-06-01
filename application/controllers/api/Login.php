<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Login extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_admin');
    }

    public function index_post()
    {
        $username = $this->post('username');
        $password = $this->post('password');

        $login_data = array(
            'username' => $username,
            'password' => md5($password)
        );

        $login = $this->M_admin->select_where('pegawai', $login_data);

        if ($login->num_rows() > 0) {
            $row = $login->row_array();

            $this->response([
                'status' => true,
                'message' => 'Login Berhasil',
                'data' => [
                    $row['id']
                ]
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Username atau password salah',
                'data' => []
            ], 400);
        }
    }
}
