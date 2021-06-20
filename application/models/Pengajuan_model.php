<?php
class Pengajuan_model extends CI_Model
{
    public function getpengajuan()
    {
        $status = array('Menunggu pengecekan', 'Revisi');
        $this->db->where_in('status', $status);
        $this->db->where('pengajuan.id_user', $this->session->userdata('id'));
        $query = $this->db->get('pengajuan');
        return $query->result();
    }

    public function getdataacc()
    {
        return $this->db->from('tb_users')
            ->join('pengajuan', 'pengajuan.id_user=tb_users.id')
            ->join('tb_acc', 'tb_acc.id_pengajuan=pengajuan.id_pengajuan')
            ->where('pengajuan.status', 'Acc')
            ->where('pengajuan.id_user', $this->session->userdata('id'))
            ->get()
            ->result();
    }

    public function edit_databidang($id)
    {
        $id_user = $this->session->userdata('id');
        return $this->db
            ->select('pengajuan.*, tb_revisi.id_revisi, tb_revisi.keterangan')
            ->from('pengajuan')
            ->join('tb_revisi', 'pengajuan.id_pengajuan=tb_revisi.id_pengajuan', 'left')
            ->where('pengajuan.id_pengajuan', $id)
            ->where('pengajuan.id_user', $id_user)
            ->get()
            ->result();
    }

    public function update_databidang($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapusPengajuan($id)
    {
        $this->db->delete('pengajuan', array('id_pengajuan' => $id));
    }
}
