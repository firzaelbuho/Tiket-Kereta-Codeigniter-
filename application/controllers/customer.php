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


        $hasil_kereta['data'] =   $this->model_customer->tampilJadwal($kereta);
        $hasil_berangkat =  $this->model_customer->tampilPemberhentian($kereta, $berangkat);
        $hasil_tujuan =  $this->model_customer->tampilPemberhentian($kereta, $tujuan);

        for ($i = 0; $i < count($hasil_kereta['data']); $i++) {
            $hasil_kereta['data'][$i]->stasiun_berangkat = $hasil_berangkat[$i]->nama_stasiun;
            $hasil_kereta['data'][$i]->waktu_berangkat = $hasil_berangkat[$i]->waktu;
            $hasil_kereta['data'][$i]->kd_stasiun_berangkat = $hasil_berangkat[$i]->kd_stasiun;
            $hasil_kereta['data'][$i]->stasiun_tujuan = $hasil_tujuan[$i]->nama_stasiun;
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
        // echo 'aaa';
        // echo $id_kereta;

        $kursi['data'] = $this->model_customer->tampilKursi($id_jadwal, 1);

        // var_dump($cek);

        $this->load->view('beli_tiket', $kursi);
    }
}
