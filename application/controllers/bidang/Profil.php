<?php

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Bidang-Profil';
		if ($this->session->userdata('role_id') == 1) {
			return redirect('admin/profil');
		}
		$this->db->where('id', $this->session->userdata('id'));
		$data['user'] = $this->db->get('tb_users')->result_array();
		$this->load->view('layouts/head', $data);
		$this->load->view("bidang/profil", $data);
	}
}
