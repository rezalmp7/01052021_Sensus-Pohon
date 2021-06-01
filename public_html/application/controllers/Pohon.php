<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pohon extends CI_Controller {

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
    function get_baris(){
        $id=$this->input->post('id');
        $where = array('blok' => $id, );
        $data=$this->M_admin->distinct_select_select_where('baris', 'pohon', $where)->result();
        echo json_encode($data);
    }
    function get_no_pohon(){
        $post=$this->input->post();
        $where = array(
            'blok' => $post['blok'],
            'baris' => $post['id']
        );
        $data=$this->M_admin->distinct_select_select_where('no_pohon', 'pohon', $where)->result();
        echo json_encode($data);
    }
	public function index()
	{
        $header['page'] = 'pohon';

        $data['pohon'] = $this->M_admin->select_all('pohon')->result();
        $data['blok'] = $this->M_admin->distinct_select_select('blok', 'pohon')->result();

        $max_id = $this->M_admin->select_select('max(id) as id', 'pohon')->row();

        if($max_id->id != null)
        {
            $data['id'] = $max_id->id+1;
        }
        else {
            $data['id'] = 1;
        }

        $this->load->view('layout/header', $header);
		$this->load->view('pohon', $data);
        $this->load->view('layout/footer');
	}
    function tambah_aksi()
    {
        $post = $this->input->post();

        $where_cek_pohon = array(
            'blok' => $post['blok'],
            'baris' => $post['baris'],
            'no_pohon' => $post['no_pohon']
        );
        $cek_pohon = $this->M_admin->select_where("pohon", $where_cek_pohon)->num_rows();

        if($cek_pohon > 0)
        {
            redirect(base_url('pegawai?error=blok, baris, no pohon sudah terpakai'));
        }
        else {

            $qrcode = $this->qrcode($post['id'], $post['kode']);

            $data = array(
                'id' => $post['id'],
                'kode' => $post['kode'],
                'blok' => $post['blok'],
                'baris' => $post['baris'],
                'no_pohon' => $post['no_pohon'],
                'qrcode' => $qrcode
            );

            $this->M_admin->insert_data('pohon', $data);

            redirect(base_url('pohon?success=pohon berhasil di tambahkan'));
        }
    }
    public function qrcode($id, $kode)
    {
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/img/qrcode/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/img/qrcode/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/img/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $kode; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        return $image_name;
 
        echo "<img src='../assets/img/qrcode/".$image_name."'>";
    }
    public function edit()
    {
        $header['page'] = 'pohon';

        $get = $this->input->get();

        $where = array('id' => $get['id'], );
        
        $data['pohon'] = $this->M_admin->select_where('pohon', $where)->row();

        $this->load->view('layout/header', $header);
        $this->load->view('pohon_edit', $data);
        $this->load->view('layout/footer');
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        $where_cek = array('kode' => $post['kode'], );
        $cek = $this->M_admin->select_where('pohon', $where_cek)->num_rows();

        if($cek > 0)
        {
            redirect(base_url('pohon?error=kode, blok/baris/no pohon sudah terpakai'));
        }
        else {
            $where = array('id' => $post['id'], );

            $qrcode = $this->qrcode($post['id'], $post['kode']);

            $set = array(
                'kode' => $post['kode'],
                'blok' => $post['blok'],
                'baris' => $post['baris'],
                'no_pohon' => $post['no_pohon'] 
            );

            $this->M_admin->update_data('pohon', $set, $where);

            redirect(base_url('pohon?success=pohon berhasil di update'));
        } 
    }
    public function info()
    {
        $header['page'] = 'pohon';

        $get = $this->input->get();

        $where = array('id' => $get['id'], );
        $pohon = $this->M_admin->select_where('pohon', $where)->row();

        $where_laporan = array('kode_pohon' => $pohon->kode, );

        $data['pohon'] = $pohon;

        $data['laporan'] = $this->M_admin->select_where('laporan', $where_laporan)->result();

        $this->load->view('layout/header', $header);
        $this->load->view('pohon_info', $data);
        $this->load->view('layout/footer');
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $pohon = $this->M_admin->select_where('pohon', $where)->row_array();

        if($pohon['id'] != null)
        {
            $where = array('id' => $get['id'], );
            $where_laporan = array('kode_pohon' => $pohon['kode'], );

            $laporan = $this->M_admin->select_where('laporan', $where_laporan)->result();
        
            $this->M_admin->delete_data('pohon', $where);
            $this->M_admin->delete_data('laporan', $where_laporan);

            foreach ($laporan as $a) {
                unlink('./assets/img/laporan/'.$a->foto);
            }
            unlink('./assets/img/qrcode/'.$pohon['id'].'.png');
            
            redirect(base_url('pohon?success=Pohon berhasil di hapus'));
        }
        else {
            redirect(base_url('pohon?error=Pohon tidak ditemukan'));
        }
        
    }
    function download()
    {
        $get = $this->input->get();
        $post = $this->input->post();

        if($get != null)
        {
            force_download('./assets/img/qrcode/'.$get['id'].'.png', NULL);
        }
        if($post != null)
        {
            $this->load->library('zip');
            $images = $this->input->post('images');
            foreach($post['id'] as $a)
            {
                $this->zip->read_file('./assets/img/qrcode/'.$a.'.png');
            }
            $this->zip->download('QR Code Sensus Pohon'.date('dmYHis').'.zip');
        }
    }
    function cetak_filter()
    {
        $blok = $this->input->post('blok');
        $baris = $this->input->post('baris');
        $no_pohon = $this->input->post('no_pohon');

        if($blok == 'all')
        {
            $qr = $this->M_admin->select_select('qrcode', 'pohon')->result();
        }
        elseif($blok != 'all' && $baris == 'all') {
            $where = array(
                'blok' => $blok, 
            );
            $qr = $this->M_admin->select_select_where('qrcode', 'pohon', $where)->result();
        }
        elseif($blok != 'all' && $baris != 'all' && $no_pohon == 'all') {
            $where = array(
                'blok' => $blok, 
                'baris' => $baris 
            );
            $qr = $this->M_admin->select_select_where('qrcode', 'pohon', $where)->result();
        }
        else {
            $where = array(
                'blok' => $blok,
                'baris' => $baris,
                'no_pohon' => $no_pohon
            );
            $qr = $this->M_admin->select_select_where('qrcode', 'pohon', $where)->result();
        }

        $this->load->library('zip');
        print_r($qr);
        foreach($qr as $a)
        {
            echo $a->qrcode;
            $this->zip->read_file('./assets/img/qrcode/'.$a->qrcode);
        }
        $this->zip->download('QR Code Sensus Pohon'.date('dmYHis').'.zip');
    }
}
