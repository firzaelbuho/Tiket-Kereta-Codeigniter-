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
            $temp_kereta[$i++] = $u->id_kereta;
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


        // $this->db->select('*');
        // $this->db->from('kereta');
        // for ($i = 0; $i < count($kereta); $i++) {
        //     $this->db->or_where('id_kereta ', $kereta[$i]);
        // }

        // $hasil_kereta =  $this->db->get()->result();
        for ($i = 0; $i < count($kereta); $i++) {

            $hasil_kereta = $this->model_customer->tampil3("kereta", array(
                'id_kereta' => $kereta[$i],

            ))->row();

            $hasil_berangkat = $this->model_customer->tampil4("pemberhentian", array(
                'id_kereta' => $kereta[$i],
                'pemberhentian.no_stasiun' => $berangkat,
                //'no_stasiun' => $berangkat,

            ))->row();

            $hasil_tujuan = $this->model_customer->tampil4("pemberhentian", array(
                'id_kereta' => $kereta[$i],
                'pemberhentian.no_stasiun' => $tujuan,
                //'no_stasiun' => $tujuan,

            ))->row();


            //input ke tabel temp

            $dataInput = array(
                'id_kereta' => $hasil_kereta->id_kereta,
                'berangkat' => $hasil_berangkat->nama_stasiun,
                'tujuan' => $hasil_tujuan->nama_stasiun,
                'waktu_berangkat' => $hasil_berangkat->waktu,
                'waktu_tujuan' => $hasil_tujuan->waktu,
                'nama_kereta' => $hasil_kereta->nama_kereta,
                'tarif' => $hasil_kereta->tarif,
                'kelas' => $hasil_kereta->kelas,
                'kd_berangkat' => $hasil_berangkat->kd_stasiun,
                'kd_tujuan' => $hasil_tujuan->kd_stasiun,
            );





            $this->model_customer->input_temp('temp', $dataInput);
        }







        //dapatkan data dari temp
        $hasil_temp['data'] =  $this->model_customer->tampil('temp')->result();
        $this->model_customer->hapus_data('temp');


        $this->load->view('pilih_kereta', $hasil_temp);
    }





    //fungsi pilih kereta
    function pilih_kereta()
    {
        $id_kereta = $this->uri->segment('3');
        // echo 'aaa';
        // echo $id_kereta;

        $cek = $this->model_customer->tampil3("kereta", array(
            'id_kereta' => $id_kereta,

        ))->result();

        var_dump($cek);
    }
}
