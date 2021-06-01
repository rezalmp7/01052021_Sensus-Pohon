<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
        $header['page'] = 'pegawai';

        $data['pegawai'] = $this->M_admin->select_all('pegawai')->result();

        $max_id = $this->M_admin->select_select('max(id) as id', 'pegawai')->row_array();

        if($max_id['id'] != null)
        {
            $data['id'] = $max_id['id']+1;
        }
        else {
            $data['id'] = 1;
        }

        $this->load->view('layout/header', $header);
		$this->load->view('pegawai', $data);
        $this->load->view('layout/footer');
	}
    function upload_photo($nama)
    {
        $config['upload_path'] = './assets/img/pegawai/'; 
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '1000000';
        $config['file_name'] = $nama;
        $config['overwrite'] = true;
        
        $this->load->library('upload',$config); 

        $this->upload->initialize($config);
            
        if($this->upload->do_upload('photo')){
            $uploadData = $this->upload->data();
            return $uploadData['file_name'];
        }
        else {
            return "gagal";
            echo $this->upload->display_errors();
        }
    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $where_cek_username = array(
            'username' => $post['username']
        );
        $cek_username = $this->M_admin->select_where("pegawai", $where_cek_username)->num_rows();

        if($cek_username > 0)
        {
            redirect(base_url('pegawai?error=username sudah terpakai'));
        }
        else {
            $nama = $post['id'];
            $photo = $this->upload_photo($nama);

            echo $photo;

            if($photo == 'gagal')
            {
                redirect(base_url('pegawai?error=photo gagal di Upload dengan Pegawai tidak berhasil di Tambahkan'));
            }
            else {
                $password = md5($post['password']);
                $create_at = date('Y-m-d H:i:s');

                $data = array(
                    'full_name' => $post['nama'],
                    'jenkel' => $post['jenkel'],
                    'no_hp' => $post['no_hp'],
                    'username' => $post['username'],
                    'password' => $password,
                    'tempat_lhr' => $post['tmp_lahir'],
                    'tanggal_lhr' => $post['tgl_lahir'],
                    'create_at' => $create_at,
                    'photo' => $photo
                );
                $this->M_admin->insert_data('pegawai', $data);
                redirect(base_url('pegawai?success=pegawai berhasil di tambahkan'));
            }


        }
    }
    public function edit()
    {
        $header['page'] = 'pegawai';

        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $data['pegawai'] = $this->M_admin->select_where('pegawai', $where)->row();

        $this->load->view('layout/header', $header);
        $this->load->view('pegawai_edit', $data);
        $this->load->view('layout/footer');
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        if($post['password'] != null)
        {
            $password = md5($post['password']);
        }
        else {
            $password = $post['password_lama'];
        }

        if($_FILES['photo']['name'])
        {
            $nama = $post['id'];
            $photo = $this->upload_photo($nama);
        }
        else {
            $photo = $post['photo_lama'];
        }
        
        if($post['username_lama'] == $post['username'])
        {
            if($photo == 'gagal')
            {
                redirect(base_url('pegawai/edit?error=Pegawai gagal diupdate karena photo gagal diupload'));
            }
            else {
                $where = array(
                    'id' => $post['id'], 
                );
                $set = array(
                    'full_name' => $post['nama'],
                    'jenkel' => $post['jenkel'],
                    'no_hp' => $post['no_hp'],
                    'username' => $post['username'],
                    'password' => $password,
                    'tempat_lhr' => $post['tmp_lahir'],
                    'tanggal_lhr' => $post['tgl_lahir'],
                    'create_at' => $create_at,
                    'photo' => $photo
                );
                $this->M_admin->update_data('pegawai', $set, $where);

                redirect(base_url('pegawai?success=pegawai behasil diedit'));
            }
        }
        else {
            $where_cek_username = array('username' => $post['username'], );
            $cek_username = $this->M_admin->select_where('pegawai', $where_cek_username)->num_rows();
            if($cek_username > 0)
            {
                redirect(base_url('pegawai/edit?id='.$post['id'].'&error=username sudah terpakai'));
            }
            else {
                if($photo == 'gagal')
                {
                    redirect(base_url('pegawai/edit?error=Pegawai gagal diupdate karena photo gagal diupload'));
                }
                else {
                    $where = array(
                        'id' => $post['id'], 
                    );
                    $set = array(
                        'full_name' => $post['nama'],
                        'jenkel' => $post['jenkel'],
                        'no_hp' => $post['no_hp'],
                        'username' => $post['username'],
                        'password' => $password,
                        'tempat_lhr' => $post['tmp_lahir'],
                        'tanggal_lhr' => $post['tgl_lahir'],
                        'photo' => $photo,
                        'create_at' => $create_at
                    );
                    $this->M_admin->update_data('pegawai', $set, $where);

                    redirect(base_url('pegawai?success=Pegawai behasil diedit'));
                }
            }
        }
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $pegawai = $this->M_admin->select_where('pegawai', $where)->row();

        if($pegawai->id != null)
        {
            unlink('./assets/img/pegawai/'.$pegawai->photo);
            $this->M_admin->delete_data('pegawai', $where);
            
            redirect(base_url('pegawai?success=Pegawai berhasil di hapus'));
        }
        else {
            redirect(base_url('pegawai?error=Data Pegawai Tidak Ditemukan'));
        }
    }
}
