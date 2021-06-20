<?php

class KelolaAkun extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kelola_model');
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Admin-Kelola Akun';

		$data['tb_users'] = $this->Kelola_model->getdataUser();
		$this->load->view('layouts/head', $data);
		$this->load->view('admin/kelolaAkun', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Admin-Tambah Akun';

		$this->form_validation->set_rules('nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_users.username]', array('is_unique' => 'This Username has already registered!'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('bidang', 'Bidang', 'required');

		if ($this->form_validation->run() == FALSE) {
			// echo validation_errors();
			$this->load->view('layouts/head', $data);
			$this->load->view('admin/tambahAkun', $data);
		} else {
			$this->Kelola_model->tambahData();
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			redirect('admin/kelolaAkun');
		}
	}

	public function hapus($id)
	{
		$this->Kelola_model->hapusData($id);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		redirect('admin/kelolaAkun');
	}

	public function ubah($id)
	{
		$data['judul'] = 'Admin-Ubah Akun';
		$data['tb_users'] = $this->Kelola_model->getUserById($id);
		$data['bidang'] = ['Bidang IKP', 'Bidang Informatika', 'Bidang Statistik dan Persandian', 'Sekretariat'];

		$this->form_validation->set_rules('nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('bidang', 'Bidang', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/head', $data);
			$this->load->view('admin/ubahAkun', $data);
		} else {
			$this->Kelola_model->ubahData();
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			redirect('admin/kelolaAkun');
		}
	}
}
