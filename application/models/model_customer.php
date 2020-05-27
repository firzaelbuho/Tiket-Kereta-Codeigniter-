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





    function input_temp($table, $data)

    {
        $this->db->insert($table, $data);
    }
}
