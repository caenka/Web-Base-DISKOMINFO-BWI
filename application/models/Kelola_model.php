<?php
class Kelola_model extends CI_Model
{

    public function getdataUser()
    {
        return $this->db->get_where('tb_users', ['role_id' => 2])->result_array();
    }
    public function tambahData()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'bidang' => htmlspecialchars($this->input->post('bidang', true)),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time(),
        ];

        $this->db->insert('tb_users', $data);
    }
    public function hapusData($id)
    {
        $this->db->delete('tb_users', ['id' => $id]);
    }
    public function getUserById($id)
    {
        return $this->db->get_where('tb_users', ['id' => $id])->row_array();
    }
    public function ubahData()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'bidang' => htmlspecialchars($this->input->post('bidang', true)),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time(),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_users', $data);
    }
}
