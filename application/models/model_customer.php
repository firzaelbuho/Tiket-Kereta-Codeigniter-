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

    function tampilJadwal($kereta, $tanggal)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('kereta', 'jadwal.id_kereta=kereta.id_kereta');

        $i = 0;
        $query = '(jadwal.id_kereta=' . $kereta[0];
        for ($i = 1; $i < count($kereta); $i++) {
            $query = $query . ' OR jadwal.id_kereta=' . $kereta[$i];
        }
        $query = $query . ')';

        $this->db->where('jadwal.tanggal', $tanggal);
        $this->db->where($query);


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

        $this->db->select('pemberhentian.id_pemberhentian,stasiun.nama_stasiun ,pemberhentian.waktu,stasiun.kd_stasiun');
        $this->db->from('jadwal');
        $this->db->join('pemberhentian', 'pemberhentian.id_kereta=jadwal.id_kereta');
        $this->db->join('stasiun', 'stasiun.no_stasiun=pemberhentian.no_stasiun');
        $this->db->where('stasiun.no_stasiun ', $id_stasiun);

        $this->db->where($query);



        return  $this->db->get()->result();
    }


    function tampilKursi($id_jadwal)
    {
        $this->db->select('*');
        $this->db->from('kursi');
        $this->db->where('id_jadwal', $id_jadwal);

        return  $this->db->get()->result();
    }

    function input_temp($table, $data)

    {
        $this->db->insert($table, $data);
    }

    function tampil_where($table, $where)

    {
        return $this->db->get_where($table, $where);
    }


    function tampil_join($table1, $table2, $where, $on)

    {
        $this->db->join($table2, $table1 . '.' . $on . '=' . $table2 . '.' . $on);
        return $this->db->get_where($table1, $where);
    }

    function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function update_data($table, $data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_jadwal', $id);
        $this->db->update($table);
    }
    function update_data2($table, $data, $where, $id)
    {
        $this->db->set($data);
        $this->db->where($where, $id);
        $this->db->update($table);
    }

    function ambil_trx_terakhir($id_user)
    {
        $this->db->select('id_transaksi');
        $this->db->from('transaksi');
        $this->db->where('id_pemesan', $id_user);
        $this->db->order_by('id_transaksi', 'desc');
        return   $this->db->get()->row();
    }

    function tampil_tiket_saya($x)
    {
        $this->db->select('*');
        $this->db->from('tiket');
        $this->db->join('transaksi', 'tiket.id_transaksi = transaksi.id_transaksi');
        $this->db->join('jadwal', 'tiket.id_jadwal = jadwal.id_jadwal');
        $this->db->join('kereta', 'jadwal.id_kereta = kereta.id_kereta');
        $this->db->join('penumpang', 'tiket.id_penumpang = penumpang.id_penumpang');
        $this->db->join('kursi', 'tiket.id_kursi = kursi.id_kursi');
        $this->db->where('transaksi.id_pemesan', $x);

        return   $this->db->get()->result();
    }

    function tampil_tiket_saya2($x)
    {
        $this->db->select('*');
        $this->db->from('tiket');
        $this->db->join('transaksi', 'tiket.id_transaksi = transaksi.id_transaksi');
        $this->db->join('jadwal', 'tiket.id_jadwal = jadwal.id_jadwal');
        $this->db->join('kereta', 'jadwal.id_kereta = kereta.id_kereta');
        $this->db->join('penumpang', 'tiket.id_penumpang = penumpang.id_penumpang');
        $this->db->join('kursi', 'tiket.id_kursi = kursi.id_kursi');
        $this->db->where($x);

        return   $this->db->get()->result();
    }

    //tampil pemberhentian X stasiun


    function delete_data($table, $where)
    {
        $this->db->delete($table, $where);
    }
}
