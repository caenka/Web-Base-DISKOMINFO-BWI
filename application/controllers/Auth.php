<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $this->load->view('auth/template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/template/auth_header');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_users', array('username' => $username))->row_array();
        // var_dump(($user));
        // die;
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'name' => $user['name'],
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                    ];
                    // print_r($data);
                    // die;
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin/Dashboard');
                    } else {
                        redirect('bidang/Dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong password!!
          </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            This Username has not been activated!!
          </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username is not registered!
          </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_users.username]', array('is_unique' => 'This Username has already registered!'));
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password', 'required|trim|matches[password]',);


        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registration';
            $this->load->view('auth/template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('auth/template/auth_header');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('tb_users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account has been created
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logout!
      </div>');
        redirect('auth');
    }
}
