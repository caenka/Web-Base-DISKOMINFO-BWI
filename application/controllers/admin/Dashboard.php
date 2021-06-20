<?php

class Dashboard extends CI_Controller
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
		$data['judul'] = 'Admin-Dashboard';
		$data['tb_users'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();
		$data['tb_users'] = $this->db->query("SELECT role_id FROM tb_users WHERE role_id='2'");
		$data['pengajuan'] = $this->db->query("SELECT status FROM pengajuan WHERE status='Menunggu pengecekan'");
		$data['tb_revisi'] = $this->db->query("SELECT * FROM tb_revisi");
		$data['tb_acc'] = $this->db->query("SELECT * FROM tb_acc");


		// var_dump($data);
		// die;
		if ($this->session->userdata('role_id') == 2) {
			return redirect('bidang/dashboard');
		}
		$this->load->view('layouts/head', $data);
		$this->load->view("admin/dashboard", $data);
	}
}
