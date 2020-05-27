<?php
class Model_login extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    // function cek_role(){
    //     return $this->db->get()->result()->row('name');
    // }
}
