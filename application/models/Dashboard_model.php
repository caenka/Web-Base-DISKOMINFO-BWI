<?php
class Dashboard_model extends CI_Model
{
    public function revisi()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('pengajuan a');
        $this->db->join('tb_revisi b', 'b.id_pengajuan=a.id_pengajuan', 'left');
        $this->db->where('a.id_user', $id);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getCountData($id)
    {
        $table1 = 'pengajuan';
        $table2 = 'tb_revisi';
        $table3 = 'tb_acc';
        $arr  = array();

        $data1 = $this->db->select('*')->from($table1)->where('id_user', $id)->where('status', 'Menunggu pengecekan')->get()->result_array();
        $data2 = $this->db->select('*')->from($table1)->join('tb_revisi b', 'b.id_pengajuan=pengajuan.id_pengajuan')->where('pengajuan.id_user', $id)->get()->result_array();
        $data3 = $this->db->select('*')->from($table1)->join('tb_acc b', 'b.id_pengajuan=pengajuan.id_pengajuan')->where('pengajuan.id_user', $id)->get()->result_array();
        array_push($arr, count($data1), count($data2), count($data3));


        return $arr;
    }
}
