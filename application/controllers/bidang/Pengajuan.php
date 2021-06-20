<?php

class Pengajuan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengajuan_model');
		$this->load->helper('file');
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Bidang-Berkas Pengajuan';
		$data['pengajuan'] = $this->Pengajuan_model->getpengajuan();
		if ($this->session->userdata('role_id') == 1) {
			return redirect('admin/pengajuan');
		}
		$this->load->view('layouts/head', $data);
		$this->load->view("bidang/pengajuan", $data);
	}

	public function edit($id)
	{
		$data['pengajuan'] = $this->Pengajuan_model->edit_databidang($id);
		$data['judul'] = 'Bidang-Edit Pengajuan';
		$this->load->view('layouts/head', $data);
		$this->load->view('bidang/editpengajuan', $data);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = $this->db->get_where('pengajuan', array('id_pengajuan' => $id))->row();
		if (isset($data->file) && file_exists('./uploads/' . $data->file)) {
			unlink('./uploads/' . $data->file);
		}

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
			$where = ['id_pengajuan' => $id];
			$data = [
				// 'id_user' => $this->session->id,
				// 'judul' => htmlspecialchars($this->input->post('judul', true)),
				'file' => $file['file_name'],
				'status' => 'Menunggu pengecekan',
				'created_at_pengajuan' => date("Y-m-d H:i:s"),
			];
			$this->Pengajuan_model->update_databidang($where, $data, 'pengajuan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			    Data Surat Berhasil di Update
			  </div>');
			redirect('bidang/pengajuan');
		}
	}

	public function hapus($id)
	{
		$this->Pengajuan_model->hapusPengajuan($id);
		redirect('bidang/pengajuan');
	}
}
