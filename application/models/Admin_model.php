<?php
class Admin_model extends CI_Model
{

    public function getdatapengajuan()
    {
        $status = array('Menunggu pengecekan', 'Revisi');
        return $this->db->from('tb_users')
            ->join('pengajuan', 'pengajuan.id_user=tb_users.id')
            ->where_in('pengajuan.status', $status)
            ->get()
            ->result();
    }

    public function getdataAcc()
    {
        return $this->db->from('tb_users')
            ->join('pengajuan', 'pengajuan.id_user=tb_users.id')
            ->join('tb_acc', 'tb_acc.id_pengajuan=pengajuan.id_pengajuan')
            ->where('pengajuan.status', 'Acc')
            ->get()
            ->result();
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteRevisi($id_pengajuan) {
        $this->db->delete('tb_revisi',array('id_pengajuan'=>$id_pengajuan));
        
    }
}
