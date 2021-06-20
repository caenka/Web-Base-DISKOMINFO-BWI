<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

	public function index()
	{

		$data['judul'] = 'Bidang-Dashboard';
		$data['tb_users'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('role_id') == 1) {
			return redirect('admin/dashboard');
		}
		$revisi = $this->Dashboard_model->revisi();
		// var_dump($revisi);
		// die;
		$id = $this->session->userdata('id');

		$data['iki'] = $this->Dashboard_model->getCountData($id);
		$this->load->view('layouts/head', $data);
		$this->load->view("bidang/dashboard", $data, $revisi);
	}
}
