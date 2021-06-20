<?php
class Adminprofil_model extends CI_Model
{
    public function getById($id)
    {
        return $this->db->get_where('tb_users', ["id" => $id])->row();
    }

    public function update($data,$id)
    {
        
        $this->db->where('id',$id);
        $this->db->update('tb_users', $data);
    }
}
