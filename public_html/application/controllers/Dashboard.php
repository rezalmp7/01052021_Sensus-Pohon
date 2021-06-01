<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

        if($this->session->userdata('status_sensuspohon') != 'login_sensus' || $this->session->userdata('level_sensuspohon') != 'admin_sensus')
        {
            redirect(base_url('login?error=status login error'));
        }
	}
	public function index()
	{
        $header['page'] = 'dashboard';

        $date_now = date('Y-m-d');
        
        $data['jumlah_pohon'] = $this->M_admin->select_all('pohon')->num_rows();
        $data['jumlah_buah_rusak'] = $this->M_admin->select_select('SUM(buah_rusak) as jml_buah_rusak', 'laporan')->row();
        $data['jumlah_siap_panen'] = $this->M_admin->select_select('SUM(buah_sp_pn) as jml_sp_pn', 'laporan')->row();
        $data['laporan_hari_ini'] = $this->M_admin->select_select_beetween('*', 'laporan', 'create_at', $date_now)->result();

        $this->load->view('layout/header', $header);
		$this->load->view('dashboard', $data);
        $this->load->view('layout/footer');
	}
}
