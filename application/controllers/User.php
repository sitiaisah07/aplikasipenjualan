<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user');
        $this->load->model('Model_cabang');
    }
    function index()
    {
        $data['user'] = $this->Model_user->getDatauser()->result();
		$this->template->load('template/template', 'user/view_user', $data);
    }

    function inputuser()
	{
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
		$this->load->view('user/input_user', $data);
	}

    function simpanuser()
	{
		$id_user = $this->input->post('id_user');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $cabang = $this->input->post('cabang');
        

		$data = array(
			'id_user' => $id_user,
			'nama_lengkap' => $nama_lengkap,
			'no_hp' => $no_hp,
            'username' => $username,
            'password' => $password,
            'level' => $level,
            'kode_cabang' => $cabang
		);

		$simpan = $this->Model_user->insertUser($data);
		if($simpan ==1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
			Data Berhasil Di Simpan
		  </div>');
			redirect("user");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
			<i class="fa fa-close"></i>
			Data Gagal Di Simpan
		  </div>');
			redirect("user");
		}
	}

    function edituser()
	{
		$id_user = $this->uri->segment(3);
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
		$data['user'] = $this->Model_user->getUser($id_user)->row_array();
		$this->load->view('user/edit_user', $data);
	}

    function hapususer()
	{
		$id_user = $this->uri->segment(3);
		$hapus= $this->Model_user->deleteUser($id_user);
		if($hapus == 1) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
			Data Berhasil Di Hapus
		  </div>');
			redirect("user");
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
			<i class="fa fa-close"></i>
			Data Gagal Di Hapus
		  </div>');
			redirect("user");
		}
	}
}