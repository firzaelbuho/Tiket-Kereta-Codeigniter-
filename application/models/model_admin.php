<?php
class Model_admin extends CI_Model
{

    function laporan_transaksi()
    {
        $this->db->select('id_transaksi, tgl_bayar,year(tgl_bayar) as tahun,month(tgl_bayar) as bulan,day(tgl_bayar) as tgl,count(id_transaksi) as jml_trx,sum(jml_bayar) as total_trx');
        $this->db->from('transaksi');
        $this->db->where('status', 'dibayar');
        $this->db->group_by('tgl_bayar');
        return $this->db->get()->result();
    }
    function laporan_penumpang()
    {
        $this->db->select('jadwal.id_jadwal,jadwal.tanggal,kereta.nama_kereta,kereta.tujuan,count(tiket.id_tiket) as jml_penumpang');
        $this->db->from('jadwal');
        $this->db->join('kereta', 'jadwal.id_kereta=kereta.id_kereta');
        $this->db->join('tiket', 'jadwal.id_jadwal=tiket.id_tiket');
        $this->db->group_by('tiket.id_jadwal');
        return $this->db->get()->result();
    }
    function laporan_tiket($key, $id)
    {
        $this->db->select('penumpang.id_penumpang,penumpang.nama_penumpang,tiket.id_kursi,tiket.berangkat,tiket.tujuan,jadwal.tanggal,kereta.nama_kereta');
        $this->db->from('tiket');
        $this->db->join('penumpang', 'penumpang.id_penumpang=tiket.id_penumpang');
        $this->db->join('transaksi', 'tiket.id_transaksi=transaksi.id_transaksi');
        $this->db->join('jadwal', 'jadwal.id_jadwal=tiket.id_jadwal');
        $this->db->join('kereta', 'jadwal.id_kereta=kereta.id_kereta');
        $this->db->where($key, $id);
        return $this->db->get()->result();
    }
    function laporan_trx($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('akun', 'akun.id=transaksi.id_pemesan');
        $this->db->where('tgl_bayar', $id);
        return $this->db->get()->result();
    }

    function tampil_jadwal()
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('kereta', 'jadwal.id_kereta=kereta.id_kereta');
        $this->db->order_by('jadwal.tanggal', 'desc');

        return $this->db->get()->result();
    }
    function tampil_pemberhentian()
    {
        $this->db->select('*');
        $this->db->from('pemberhentian');
        $this->db->join('kereta', 'pemberhentian.id_kereta=kereta.id_kereta');
        $this->db->join('stasiun', 'pemberhentian.no_stasiun=stasiun.no_stasiun');


        return $this->db->get()->result();
    }
    function tampil_kereta()
    {
        $this->db->select('*');
        $this->db->from('kereta');


        return $this->db->get()->result();
    }

    function tambah_jadwal()
    {
        $this->db->insertt('*');
        $this->db->to('jadwal');
        $this->db->join('kereta', 'jadwal.id_kereta=kereta.id_kereta');
        $this->db->order_by('jadwal.tanggal', 'desc');

        return $this->db->get()->result();
    }


    function ubah_jadwal()
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('kereta', 'jadwal.id_kereta=kereta.id_kereta');
        $this->db->order_by('jadwal.tanggal', 'desc');

        return $this->db->get()->result();
    }


    function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function select_all($table)
    {
        return $this->db->get($table)->result();
    }
    function select_data($table, $data)
    {
        return $this->db->get_where($table, $data)->result();
    }
    function update_data($table, $data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_jadwal', $id);
        $this->db->update($table);
    }
    function update_kereta($table, $data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_kereta', $id);
        $this->db->update($table);
    }
    function update_pemberhentian($table, $data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_pemberhentian', $id);
        $this->db->update($table);
    }
    function delete_data($table, $where)
    {
        $this->db->delete($table, $where);
    }
}
