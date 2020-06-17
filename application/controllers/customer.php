<?php

class customer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_customer');
        $this->load->helper('url');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    function index()
    {
        $this->load->view('customer');
    }

    function pesan()
    {
        $data['stasiun'] = $this->model_customer->tampil('stasiun')->result();
        $this->load->view('pesan', $data);
    }

    function cek_kereta()
    {
        $berangkat = $this->input->post('berangkat');
        $tujuan = $this->input->post('tujuan');
        $tanggal = $this->input->post('tanggal');

        //cari arah kereta
        $perjalanan = $tujuan - $berangkat;

        $temp_kereta = array();
        $temp_kereta2 = array();
        $kereta = array();

        if ($perjalanan < 0) {
            $arah = 'barat';
        } else {
            $arah = 'timur';
        }

        //$where = 

        // $temp = $this->model_customer->tampil2("pemberhentian", array(
        //     'no_stasiun' => $berangkat,

        // ))->row()->id_pemberhentian;

        //Cek kereta yg tersedia


        //cek yg melewati stasiun keberangkatan 

        $cek = $this->model_customer->tampil2("pemberhentian", array(
            'no_stasiun' => $berangkat,

        ))->result();

        //kereta yg lewat stasiun berangkat

        $i = 0;
        foreach ($cek as $u) {
            $temp_kereta[$i] = $u->id_kereta;
            $i++;
        }

        //cek yg melewati stasiun tujuan 
        $j = 0;
        for ($i = 0; $i < count($temp_kereta); $i++) {

            $cek2 = $this->model_customer->tampil2("pemberhentian", array(
                'no_stasiun' => $tujuan,
                'id_kereta' => $temp_kereta[$i],

            ))->num_rows();
            if ($cek2 > 0) {

                $temp_kereta2[$j] = $temp_kereta[$i];
                $j++;
            }
        }

        //cek kereta yg arahnya sesuai

        $j = 0;
        for ($i = 0; $i < count($temp_kereta2); $i++) {

            $cek3 = $this->model_customer->tampil2("kereta", array(
                'id_kereta' => $temp_kereta2[$i],
                'arah' => $arah,


            ))->num_rows();
            if ($cek3 > 0) {

                $kereta[$j] = $temp_kereta2[$i];
                $j++;
            }
        }

        //output pilihan kereta


        $hasil_kereta['data'] =   $this->model_customer->tampilJadwal($kereta, $tanggal);
        $hasil_berangkat =  $this->model_customer->tampilPemberhentian($kereta, $berangkat);
        $hasil_tujuan =  $this->model_customer->tampilPemberhentian($kereta, $tujuan);

        for ($i = 0; $i < count($hasil_kereta['data']); $i++) {
            $hasil_kereta['data'][$i]->stasiun_berangkat = $hasil_berangkat[$i]->nama_stasiun;
            $hasil_kereta['data'][$i]->id_penumpang_berangkat = $hasil_berangkat[$i]->id_pemberhentian;
            $hasil_kereta['data'][$i]->waktu_berangkat = $hasil_berangkat[$i]->waktu;
            $hasil_kereta['data'][$i]->kd_stasiun_berangkat = $hasil_berangkat[$i]->kd_stasiun;
            $hasil_kereta['data'][$i]->stasiun_tujuan = $hasil_tujuan[$i]->nama_stasiun;
            $hasil_kereta['data'][$i]->id_penumpang_tujuan = $hasil_tujuan[$i]->id_pemberhentian;
            $hasil_kereta['data'][$i]->waktu_tujuan = $hasil_tujuan[$i]->waktu;
            $hasil_kereta['data'][$i]->kd_stasiun_tujuan = $hasil_tujuan[$i]->kd_stasiun;
        }

        //cek jadwal

        //dapatkan data dari temp
        // var_dump($hasil_berangkat);
        //var_dump($hasil_kereta);


        $this->load->view('pilih_kereta', $hasil_kereta);
    }





    //fungsi pilih kereta
    function pilih_kereta()
    {
        $id_jadwal = $this->uri->segment('3');
        $_SESSION['id_jadwal'] = $id_jadwal;
        $_SESSION['berangkat'] = $this->uri->segment('4');
        $_SESSION['tujuan'] = $this->uri->segment('5');
        //var_dump($_SESSION['berangkat']);
        //var_dump($_SESSION['tujuan']);
        // echo 'aaa';
        // echo $id_kereta;

        $kursi['data'] = $this->model_customer->tampilKursi($id_jadwal);

        // var_dump($cek);

        $this->load->view('beli_tiket', $kursi);
    }
    function proses_tiket()
    {
        //var_dump($_SESSION['berangkat']);
        //var_dump($_SESSION['tujuan']);
        $id = $this->input->post('id');

        $_SESSION['nama_penumpang'] = $this->input->post('nama');
        $_SESSION['id_penumpang'] = $this->input->post('id');

        $kursi = $this->input->post('kursi');
        // echo 'aaa';
        // echo $id_kereta;
        $_SESSION['id_jadwal'];


        $where = array('id_kursi' => $kursi);

        $id_jadwal = $_SESSION['id_jadwal'];
        //    print_r($id_jadwal);

        $where = array('id_jadwal' => $id_jadwal);
        $jadwal = $this->model_customer->tampil_join('jadwal', 'kereta', $where, 'id_kereta')->row();
        //var_dump($jadwal);

        $where = array('id_pemberhentian' => $_SESSION['berangkat']);
        $berangkat = $this->model_customer->tampil_join('pemberhentian', 'stasiun', $where, 'no_stasiun')->row();

        $where = array('id_pemberhentian' => $_SESSION['tujuan']);
        $tujuan = $this->model_customer->tampil_join('pemberhentian', 'stasiun', $where, 'no_stasiun')->row();

        $where = array('id_kursi' => $kursi);
        $kursi = $this->model_customer->tampil_where('kursi', $where)->row();

        //var_dump($berangkat);
        //cari jadwal
        //var_dump($_SESSION['id_jadwal']);
        //$this->load->view('buat_transaksi', $tiket);
        $_SESSION['st_berangkat'] = $berangkat->nama_stasiun;
        $_SESSION['st_tujuan'] = $tujuan->nama_stasiun;
        $_SESSION['waktu_berangkat'] = $berangkat->waktu;
        $_SESSION['waktu_tujuan'] = $tujuan->waktu;
        $_SESSION['no_kursi'] = $kursi->no_kursi;
        $_SESSION['nama_kereta'] = $jadwal->nama_kereta;
        $_SESSION['tgl_berangkat'] = $jadwal->tanggal;
        $_SESSION['tarif'] = $jadwal->tarif;

        $this->load->view('detil_tiket');
    }
    function buat_transaksi()
    {
        $username = $this->session->userdata("nama");
        $where = array('username' => $username);
        $_SESSION['id_user'] = $this->model_customer->tampil_where('akun', $where)->row()->id;

        //var_dump($_SESSION['id_user']);

        print_r(date('y-m-d H:i:s', time()));
        $data = array(
            'id_pemesan' => $_SESSION['id_user'],
            'jml_tiket' => '1',
            'jml_bayar' =>  $_SESSION['tarif'],
            'tgl_pesan' => date('y-m-d H:i:s', time()),
            'tgl_pesan' => '-',
            'status' => 'belum bayar'
        );
        $this->model_customer->insert_data('transaksi', $data);
        $this->load->view('detil_transaksi');
    }
    function bayar()
    {
        //ubah status transaksi
        $id_trx = $this->model_customer->ambil_trx_terakhir($_SESSION['id_user'])->id_transaksi;
        //var_dump($id_trx);
        $data = array('status' => 'dibayar');
        $this->model_customer->update_data2('transaksi', $data, 'id_transaksi', $id_trx);

        //insert db tiket
        $kd_tiket = $this->randomKode();
        $data = array(
            'id_transaksi' => $id_trx,
            'id_jadwal' => $_SESSION['id_jadwal'],
            'id_kursi' => $_SESSION['no_kursi'],
            'kd_tiket' => $kd_tiket,
            'id_penumpang' => $_SESSION['id_penumpang'],
            'berangkat' => $_SESSION['st_berangkat'],
            'tujuan' => $_SESSION['st_tujuan'],
            'waktu_berangkat' => $_SESSION['waktu_berangkat'],
            'waktu_tujuan' => $_SESSION['waktu_tujuan'],
            'tarif' => $_SESSION['tarif']
        );
        $this->model_customer->insert_data('tiket', $data);

        //insert penumpang
        $data = array(
            'id_penumpang' => $_SESSION['id_penumpang'],
            'nama_penumpang' => $_SESSION['nama_penumpang'],
        );
        $this->model_customer->insert_data('penumpang', $data);

        //ubah status kursi
        $data = array('status' => 'penuh');
        $this->model_customer->update_data2('kursi', $data, 'no_kursi', $_SESSION['no_kursi']);

        //kurangi kapasitas
        $data = array('tersedia' => 'tersedia-1');
        $this->model_customer->update_data2('jadwal', $data, 'id_jadwal', $_SESSION['id_jadwal']);

        //kurangi kuota
        $data = array('kuota' => 'kuota+1');
        $this->model_customer->update_data2('akun', $data, 'id', $_SESSION['id_user']);

        //reset session

        print_r('Pembelian tiket berhasil !');
        $this->tiket_saya();
    }

    function tiket_saya()
    {
        //ambil id user
        $username = $this->session->userdata("nama");
        $where = array('username' => $username);
        $_SESSION['id_user'] = $this->model_customer->tampil_where('akun', $where)->row()->id;

        //ambil tiket yang dibeli user
        $myTiket['data'] =  $this->model_customer->tampil_tiket_saya($_SESSION['id_user']);
        //var_dump($myTiket);
        $this->load->view('tiket_saya', $myTiket);

        //kirim ke view tiket saya

    }

    function batal()
    {
        $_SESSION['batal_tiket'] = $this->uri->segment('3');
        $_SESSION['batal_transaksi'] = $this->uri->segment('4');
        //var_dump($id_tiket);
        //var_dump($id_transaksi);
        $where = array('id_tiket' => $_SESSION['batal_tiket']);
        $data['tiket'] = $this->model_customer->tampil_tiket_saya2($where);
        //var_dump($data);
        $this->load->view('batal_tiket', $data);
    }
    function proses_batal()
    {
        //var_dump($_SESSION['batal_transaksi']);
        $where = array('id_tiket' => $_SESSION['batal_tiket']);
        $tiket = $this->model_customer->tampil_tiket_saya2($where)[0];
        $tarif = $tiket->tarif;
        $id_jadwal = $tiket->id_jadwal;
        //jadwal <tersedia></tersedia>
        $data = array(
            'tersedia' => 'tersedia+1',

        );
        $this->model_customer->update_data2('jadwal', $data, 'id_jadwal', $id_jadwal);

        //kuota user -1
        //total bayar pd transaksi - tarif tiket


        //var_dump($tarif);
        $data = array(
            'jml_tiket' => 'jml_tiket-1',
            'jml_bayar' => 'jml_bayar-' . $tarif
        );
        $this->model_customer->update_data2('transaksi', $data, 'id_transaksi', $_SESSION['batal_transaksi']);
        //hapus tiket
        $where = array('id_tiket' => $_SESSION['batal_tiket']);
        $this->model_customer->delete_data('tiket', $where);
        print_r('Pembatalan tiket berhasil');
        $this->tiket_saya();
        //jika jml tiket dlm transaksi hanya 1 akan


    }
    function randomKode()
    {
        $str = array('DDFHD' . 'ADSFS', 'QERTYU', 'QESCC', 'DFMHJ', 'DDTHD' . 'FDSFS', 'QERTYU', 'QETYD', 'DFIHG', 'DBGHD' . 'ADSSS', 'QERTEU', 'QESCE', 'DFJHJ', 'CCTHD' . 'CDSFS', 'HERTRU', 'VESCD', 'DFGAG');
        $x = rand(0, 19);
        return $str[$x];
    }
}
