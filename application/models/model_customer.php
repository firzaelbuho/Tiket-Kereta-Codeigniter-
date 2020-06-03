<?php
class Model_customer extends CI_Model
{
    function tampil($table)
    {

        return $this->db->get($table);
    }

    function tampil2($table, $where)

    {
        $this->db->select('id_kereta');
        return $this->db->get_where($table, $where);
    }

    function tampil3($table, $where)

    {
        $this->db->select('*');
        return $this->db->get_where($table, $where);
    }

    function tampil4($table, $where)

    {
        $this->db->select('*');
        $this->db->join('stasiun', 'pemberhentian.no_stasiun = stasiun.no_stasiun');
        return $this->db->get_where($table, $where);
    }

    function hapus_data($table)
    {
        $this->db->empty_table($table);
    }

    function tampilJadwal($kereta)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('kereta', 'jadwal.id_kereta=kereta.id_kereta');

        for ($i = 0; $i < count($kereta); $i++) {
            $this->db->or_where('jadwal.id_kereta ', $kereta[$i]);
        }

        return  $this->db->get()->result();
    }

    function tampilPemberhentian($kereta, $id_stasiun)
    {

        $i = 0;
        $query = '(jadwal.id_kereta=' . $kereta[0];
        for ($i = 1; $i < count($kereta); $i++) {
            $query = $query . ' OR jadwal.id_kereta=' . $kereta[$i];
        }
        $query = $query . ')';

        $this->db->select('stasiun.nama_stasiun ,pemberhentian.waktu,stasiun.kd_stasiun');
        $this->db->from('jadwal');
        $this->db->join('pemberhentian', 'pemberhentian.id_kereta=jadwal.id_kereta');
        $this->db->join('stasiun', 'stasiun.no_stasiun=pemberhentian.no_stasiun');
        $this->db->where('stasiun.no_stasiun ', $id_stasiun);

        $this->db->where($query);



        return  $this->db->get()->result();
    }


    function tampilKursi($id_jadwal, $gerbong)
    {
        $this->db->select('*');
        $this->db->from('kursi');
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->where('no_gerbong', $gerbong);
        return  $this->db->get()->result();
    }

    function input_temp($table, $data)

    {
        $this->db->insert($table, $data);
    }
}
