<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
        $header['page'] = 'laporan';

        $data['blok'] = $this->M_admin->distinct_select_select('blok', 'pohon')->result();

        $data['laporan'] = $this->M_admin->select_all('laporan')->result();

        $this->load->view('layout/header', $header);
		$this->load->view('laporan', $data);
        $this->load->view('layout/footer');
	}
    function get_baris(){
        $id=$this->input->post('id');
        $where = array('blok' => $id, );
        $data=$this->M_admin->distinct_select_select_where('baris', 'pohon', $where)->result();
        echo json_encode($data);
    }
    public function info()
    {
        $header['page'] = 'laporan';

        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $data['laporan'] = $this->M_admin->select_where('laporan', $where)->row();

        $this->load->view('layout/header', $header);
        $this->load->view('laporan_info', $data);
        $this->load->view('layout/footer');
    }
    function cetak()
    {
        $post = $this->input->post();

        if($post['blok'] == 'all')
        {
            $select = "laporan.id, laporan.kode_pohon, laporan.jml_buah, laporan.buah_rusak, laporan.buah_sp_pn, laporan.sisa, laporan.status, laporan.foto, laporan.laporan_by, laporan.create_at";
            $where = "laporan.create_at BETWEEN '".$post['date_first']."' AND '".$post['date_second']."'";

            $data['date_first'] = $post['date_first'];
            $data['date_second'] = $post['date_second'];
            $data['blok'] = 'all';
            $data['baris'] = 'all';
            $data['no_pohon'] = 'all';
            $data['laporan'] = $this->M_admin->select_laporan_pohon($select, 'laporan', 'pohon', 'laporan.kode_pohon = pohon.kode', $where)->result();
        }
        elseif($post['blok'] != 'all' && $post['baris'] == 'all') {
            $select = "laporan.id, laporan.kode_pohon, laporan.jml_buah, laporan.buah_rusak, laporan.buah_sp_pn, laporan.sisa, laporan.status, laporan.foto, laporan.laporan_by, laporan.create_at";
            $where = "pohon.blok = '".$post['blok']."' AND laporan.create_at BETWEEN '".$post['date_first']."' AND '".$post['date_second']."'";

            $data['date_first'] = $post['date_first'];
            $data['date_second'] = $post['date_second'];
            $data['blok'] = $post['blok'];
            $data['baris'] = 'all';
            $data['no_pohon'] = 'all';
            $data['laporan'] = $this->M_admin->select_laporan_pohon($select, 'laporan', 'pohon', 'laporan.kode_pohon = pohon.kode', $where)->result();
        }
        elseif($post['blok'] != 'all' && $post['baris'] != 'all' && $post['no_pohon'] == 'all') {
            $select = "laporan.id, laporan.kode_pohon, laporan.jml_buah, laporan.buah_rusak, laporan.buah_sp_pn, laporan.sisa, laporan.status, laporan.foto, laporan.laporan_by, laporan.create_at";
            $where = "pohon.blok = '".$post['blok']."' AND pohon.baris = '".$post['baris']."' AND laporan.create_at BETWEEN '".$post['date_first']."' AND '".$post['date_second']."' ORDER BY create_at DESC";

            $data['date_first'] = $post['date_first'];
            $data['date_second'] = $post['date_second'];
            $data['blok'] = $post['blok'];
            $data['baris'] = $post['baris'];
            $data['no_pohon'] = 'all';
            $data['laporan'] = $this->M_admin->select_laporan_pohon($select, 'laporan', 'pohon', 'laporan.kode_pohon = pohon.kode', $where)->result();
        }
        else {
            $select = "laporan.id, laporan.kode_pohon, laporan.jml_buah, laporan.buah_rusak, laporan.buah_sp_pn, laporan.sisa, laporan.status, laporan.foto, laporan.laporan_by, laporan.create_at";
            $where = "pohon.blok = '".$post['blok']."' AND pohon.baris = '".$post['baris']."' AND pohon.no_pohon = '".$post['no_pohon']."' AND laporan.create_at BETWEEN '".$post['date_first']."' AND '".$post['date_second']."' ORDER BY create_at DESC";

            $data['date_first'] = $post['date_first'];
            $data['date_second'] = $post['date_second'];
            $data['blok'] = $post['blok'];
            $data['baris'] = $post['baris'];
            $data['no_pohon'] = $post['no_pohon'];
            $data['laporan'] = $this->M_admin->select_laporan_pohon($select, 'laporan', 'pohon', 'laporan.kode_pohon = pohon.kode', $where)->result();
        }
        
        $this->load->view('laporan_cetak', $data);
    }
    
}
