<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $header['page'] = 'user';

        $data['user'] = $this->M_admin->select_all('user')->result();

        $this->load->view('layout/header', $header);
		$this->load->view('user', $data);
        $this->load->view('layout/footer');
	}
    public function tambah()
    {
        $header['page'] = 'user';

        $max_id = $this->M_admin->select_select('max(id) as id', 'user')->row_array();

        if($max_id['id'] != null)
        {
            $data['id'] = $max_id['id']+1;
        }
        else {
            $data['id'] = 1;
        }

        $this->load->view('layout/header', $header);
        $this->load->view('user_tambah', $data);
        $this->load->view('layout/footer');
    }
    
    function upload_photo($nama)
    {
        $config['upload_path'] = './assets/img/user/'; 
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
        $cek_username = $this->M_admin->select_where("user", $where_cek_username)->num_rows();

        if($cek_username > 0)
        {
            redirect(base_url('user/tambah?error=username sudah terpakai'));
        }
        else {
            $nama_photo = $post['id'];
            $photo = $this->upload_photo($nama_photo);

            if($photo == "gagal")
            {
                redirect(base_url('pegawai/tambah?error=Tambah Gagal karena kesalahan dalam upload photo'));
            }
            else {
                $password = md5($post['password']);

                $data = array(
                    'full_name' => $post['nama'],
                    'username' => $post['username'],
                    'password' => $password,
                    'photo' => $photo
                );

                $this->M_admin->insert_data('user', $data);

                redirect(base_url('user?success=user berhasil di tambahkan'));
            }
        }
    }
    public function edit()
    {
        $header['page'] = 'user';

        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $data['user'] = $this->M_admin->select_where('user', $where)->row();

        $this->load->view('layout/header', $header);
        $this->load->view('user_edit', $data);
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
                redirect(base_url('user/tambah?error=user gagal diedit karena gagal upload photo'));
            }
            else {
                
                $where = array(
                    'id' => $post['id'], 
                );
                $set = array(
                    'full_name' => $post['nama'],
                    'username' => $post['username'],
                    'password' => $password,
                    'photo' => $photo
                );
                $this->M_admin->update_data('user', $set, $where);

                redirect(base_url('user?success=user behasil diedit'));
            }
        }
        else {
            $where_cek_username = array('username' => $post['username'], );
            $cek_username = $this->M_admin->select_where('user', $where_cek_username)->num_rows();
            if($cek_username > 0)
            {
                redirect(base_url('user/edit?error=username sudah terpakai'));
            }
            else {
                if($photo == 'gagal')
                {
                    redirect(base_url('user/tambah?error=user gagal diedit karena gagal upload photo'));
                }
                else {
                        
                    $where = array(
                        'id' => $post['id'], 
                    );
                    $set = array(
                        'full_name' => $post['nama'],
                        'username' => $post['username'],
                        'password' => $password,
                        'photo' => $photo
                    );
                    $this->M_admin->update_data('user', $set, $where);

                    redirect(base_url('user?success=user behasil diedit'));
                }
            }
        }
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $user = $this->M_admin->select_where('user', $where)->row();

        if($user->id != null)
        {
            $this->M_admin->delete_data('user', $where);
            unlink('./assets/img/user/'.$user->photo);
            
            redirect(base_url('user?success=user berhasil di hapus'));

        }
        else {
            redirect(base_url('user?error=Gagal Menghapus User'));
        }
        
    }
}
