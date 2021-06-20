<?php

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Adminprofil_model');
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['judul'] = 'Admin-Profil';
		if ($this->session->userdata('role_id') == 2) {
			return redirect('bidang/profil');
		}
		$this->db->where('id', $this->session->userdata('id'));
		$data['user'] = $this->db->get('tb_users')->result_array();
		$this->load->view('layouts/head', $data);
		$this->load->view("admin/profil", $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('fullname', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_users.username]', array('is_unique' => 'This username has already registered!'));
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[konfirm]');
		$this->form_validation->set_rules('konfirm', 'Password', 'required|trim|matches[password]',);

		$data = [
			'name' => htmlspecialchars($this->input->post('fullname', true)),
			'username' => htmlspecialchars($this->input->post('username', true)),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];
		$this->db->where('id', $id);
		$this->db->update('tb_users', $data);


		redirect('admin/profil');
	}
}
