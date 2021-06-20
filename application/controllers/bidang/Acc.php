<?php

class Acc extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengajuan_model');
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Bidang-Berkas Acc';
		$data['pengajuan'] = $this->Pengajuan_model->getdataacc();
		if ($this->session->userdata('role_id') == 1) {
			return redirect('admin/acc');
		}
		$this->load->view('layouts/head', $data);
		$this->load->view("bidang/acc", $data);
	}
}
