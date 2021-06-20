<?php

class TambahPengajuan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengajuan_model');
		$this->load->library('form_validation');
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Bidang-Tambah Pengajuan';
		if ($this->session->userdata('role_id') == 1) {
			return redirect('admin/pengajuan');
		}
		$this->load->view('layouts/head', $data);
		$this->load->view("bidang/tambahPengajuan");
	}

	public function upload()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		// $this->form_validation->set_rules('filename', 'Document', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/head');
			$this->load->view("bidang/tambahPengajuan");
			// redirect('bidang/TambahPengajuan');
		} else {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'doc|docx|pdf|xlsx';
			$config['max_size']             = 0;
			$config['encrypt_name'] = true;
			$config['overwrite'] = false;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('filename')) {
				$this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '
          </div>');
				redirect('bidang/Pengajuan');
			} else {
				$file = $this->upload->data();
				$data = [
					'id_user' => $this->session->id,
					'judul' => htmlspecialchars($this->input->post('judul', true)),
					'file' => $file['file_name'],
					'status' => 'Menunggu pengecekan',
					'created_at_pengajuan' => date("Y-m-d H:i:s"),
				];
				$this->db->insert('pengajuan', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Surat Berhasil di ajukan
          </div>');
				// $this->load->view("bidang/pengajuan");
				redirect('bidang/Pengajuan');
			}
		}
	}
}
