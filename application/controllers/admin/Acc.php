<?php

class Acc extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Admin-Berkas Acc';
		$data['datapengajuan'] = $this->Admin_model->getdataAcc();
		if ($this->session->userdata('role_id') == 2) {
			return redirect('bidang/acc');
		}
		$this->load->view('layouts/head', $data);
		$this->load->view("admin/acc", $data);
	}
}
