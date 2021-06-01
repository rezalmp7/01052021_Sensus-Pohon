<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

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
        $header['page'] = 'pengumuman';

        $max_id_slide = $this->M_admin->select_select('max(id) as max_id', 'foto')->row_array();

        if($max_id_slide['max_id'] == null)
        {
            $data['id_slide'] = 1;
        }
        else {
            $data['id_slide'] = $max_id_slide['max_id']+1;
        }

        $data['foto'] = $this->M_admin->select_all('foto')->result();
        $where_profil = array('id' => 1, );
        $data['profil'] = $this->M_admin->select_where('website', $where_profil)->row();
        $data['pengumuman'] = $this->M_admin->select_select_orderBy('pengumuman, create_at, id', 'pengumuman', 'create_at', 'DESC')->result();

        $this->load->view('layout/header', $header);
		$this->load->view('pengumuman', $data);
        $this->load->view('layout/footer');
	}
    function upload_photo_slide($nama)
    {
        $config['upload_path'] = './assets/img/slide/'; 
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '100000';
        $config['file_name'] = $nama;
        $config['overwrite'] = true;
        
        $this->load->library('upload',$config); 

        $this->upload->initialize($config);
            
        if($this->upload->do_upload('gambar')){
            $uploadData = $this->upload->data();
            return $uploadData['file_name'];
        
        }
        else {
            return 'gagal';
        }
    }
    function tambah_slide()
    {
        $post = $this->input->post();

        $upload_photo = $this->upload_photo_slide($post['id']);

        if($upload_photo == 'gagal')
        {
            redirect(base_url('pengumuman?error=gambar gagal diupload'));
        }
        else {
            $data = array(
                'id' => $post['id'],
                'src' => $upload_photo 
            );
            $this->M_admin->insert_data('foto', $data);
            redirect(base_url('pengumuman?success=gambar berhasil di upload'));
        }
    }
    function hapus_slide()
    {
        $get = $this->input->get();

        unlink('./assets/img/slide/'.$get['gmb']);
        
        $where = array('id' => $get['id'], );
        $this->M_admin->delete_data('foto', $where);

        redirect(base_url('pengumuman?success=gambar berhasil di hapus'));
    }
    function update_profil()
    {
        $post = $this->input->post();

        $where = array('id' => 1, );
        $set = array(
            'profil' => $post['profil'], 
        );
        $this->M_admin->update_data('website', $set, $where);
        redirect(base_url('pengumuman?success=profil berhasil diupdate'));
    }
    function tambah_pengumuman()
    {
        $post = $this->input->post();

        $data = array(
            'pengumuman' => $post['pengumuman'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_akhir' => $post['tgl_selesai']
        );
        $this->M_admin->insert_data('pengumuman', $data);

        redirect(base_url('pengumuman?success=pengumuman berhasil ditambahkan'));
    }
    public function edit()
    {
        $header['page'] = 'pengumuman';

        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $data['pengumuman'] = $this->M_admin->select_where('pengumuman', $where)->row();

        $this->load->view('layout/header', $header);
        $this->load->view('pengumuman_edit', $data);
        $this->load->view('layout/footer');
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        $where = array('id' => $post['id'], );

        $set = array(
            'pengumuman' => $post['pengumuman'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_akhir' => $post['tgl_selesai']
        );

        $this->M_admin->update_data('pengumuman', $set, $where);

        redirect(base_url('pengumuman?success=pengumuman berhasil diupdate'));
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $this->M_admin->delete_data('pengumuman', $where);

        redirect(base_url('pengumuman?success=pengumuman berhasil di hapus'));
    }
}
