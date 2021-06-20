<?php

class Pengajuan extends CI_Controller
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
		$data['judul'] = 'Admin-Berkas Pengajuan';
		$data['pengajuan'] = $this->Admin_model->getdatapengajuan();
		// print_r($data);
		// die;
		if ($this->session->userdata('role_id') == 2) {
			return redirect('bidang/pengajuan');
		}
		$this->load->view('layouts/head', $data);
		$this->load->view("admin/pengajuan", $data);
	}

	public function edit($id)
	{
		$data['judul'] = 'Admin-Edit Pengajuan';
		$where = array('id_pengajuan' => $id);
		$data['pengajuan'] = $this->Admin_model->edit_data($where, 'pengajuan')->result();
		$data['status'] = ['Acc', 'Menunggu pengecekan'];

		$this->load->view('layouts/head', $data);
		$this->load->view("admin/editPengajuan", $data);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		// print_r($status);
		// die;
		if ($status == 'Acc') {
			$data = [
				'status' => $status,
			];

			$where = [
				'id_pengajuan' => $id
			];
			$this->Admin_model->update_data($where, $data, 'pengajuan');
			$this->db->delete('tb_revisi', array('id_pengajuan' => $id));

			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'doc|docx|pdf|xlsx';
			$config['max_size']             = 0;
			$config['encrypt_name'] = true;
			$config['overwrite'] = false;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('filename')) {
				// $this->form_validation->set_rules('filename', 'Document', 'trim|required');
			} else {
				$file = $this->upload->data();
				$data = [
					'id_pengajuan' => $id,
					'filebaru' => $file['file_name'],
					'created_at_acc' => date("Y-m-d H:i:s"),
				];
				$this->db->insert('tb_acc', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Surat Berhasil di Acc
			  </div>');
				// $this->load->view("bidang/pengajuan");
				redirect('admin/Pengajuan');
			}
		} elseif ($status == 'Revisi') {
			$data = [
				'status' => $status,
			];

			$where = [
				'id_pengajuan' => $id
			];
			$this->Admin_model->update_data($where, $data, 'pengajuan');

			$keterangan = $this->input->post('comment');
			$data = [
				'id_pengajuan' => $id,
				'keterangan' => $keterangan,
				'created_at_revisi' => date("Y-m-d H:i:s")
			];
			$this->db->insert('tb_revisi', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Surat Berhasil di Revisi
			  </div>');
			redirect('admin/Pengajuan');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Anda Belum Mengganti status pengajuan
			  </div>');
			redirect('admin/Pengajuan');
		}
		// redirect('admin/Pengajuan');
	}

	public function revisi($id)
	{
		$data['judul'] = 'Admin-Edit Pengajuan';
		$where = array('id_pengajuan' => $id);
		$data['pengajuan'] = $this->Admin_model->edit_data($where, 'pengajuan')->result();
		$data['status'] = ['Revisi', 'Menunggu pengecekan'];

		$this->load->view("admin/revisipengajuan", $data);
	}
}
