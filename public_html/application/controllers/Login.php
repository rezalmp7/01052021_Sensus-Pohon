<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
	}
	public function index()
	{
		$this->load->view('login');
	}
	function login_aksi()
	{
		$post = $this->input->post();

		$password = md5($post['password']);

		$where_cek_login = array(
			'username' => $post['username'],
			'password' => $password 
		);

		$cek_login = $this->M_admin->select_where('user', $where_cek_login)->num_rows();

		if($cek_login > 0)
		{
			$data_login = $this->M_admin->select_where('user', $where_cek_login)->result_array();
			foreach($data_login as $a)
			{
				$id_user = $a['id'];
				$nama = $a['full_name'];
				$photo = $a['photo'];
			}
			$data_session = array(
				'status_sensuspohon' => "login_sensus",
				'nama_sensuspohon' => $nama,
				'id_sensuspohon' => $id_user,
				'level_sensuspohon' => 'admin_sensus',
				'photo_sensuspohon' => $photo
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('dashboard?success=Berhasil Login'));
		}
		else {
			redirect(base_url('login?error=Username dan Password Tidak Ditemukan'));
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login?error=logout berhasil'));
	}
}
