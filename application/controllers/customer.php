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


        $this->db->select('*');
        $this->db->from('jadwal');
        for ($i = 0; $i < count($kereta); $i++) {
            $this->db->or_where('id_kereta ', $kereta[$i]);
        }

        $hasil_kereta['data'] =  $this->db->get()->result();

        //cek jadwal

        //dapatkan data dari temp



        $this->load->view('pilih_kereta', $hasil_kereta);
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
