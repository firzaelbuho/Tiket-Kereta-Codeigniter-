<?php

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_admin');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    function index()
    {
        $this->load->view('admin');
    }
    function laporan()
    {
        $data_trx = $this->model_admin->laporan_transaksi();
        $data_penumpang = $this->model_admin->laporan_penumpang();

        $data['trx'] = $data_trx;
        $data['penumpang'] = $data_penumpang;

        //var_dump($data);
        $this->load->view('laporan', $data);
    }


    function detil_penumpang()
    {
        $id = $this->uri->segment('3');

        $data_tiket = $this->model_admin->laporan_tiket('jadwal.id_jadwal', $id);
        $data['tiket'] = $data_tiket;
        //var_dump($data);
        $this->load->view('laporan_penumpang', $data);
    }
    function detil_transaksi()
    {
        $id = $this->uri->segment('3');
        $id = $id . '/' . $this->uri->segment('4');
        $id = $id . '/' . $this->uri->segment('5');
        //var_dump($id);


        $data_tiket = $this->model_admin->laporan_trx($id);
        $data['trx'] = $data_tiket;
        //var_dump($data);
        $this->load->view('laporan_trx', $data);
    }
    function penjadwalan()
    {
        $d = $this->model_admin->tampil_jadwal();


        $data['jadwal'] = $d;

        //var_dump($data);
        $this->load->view('penjadwalan', $data);
    }

    function tambah_jadwal()
    {
        $id = $this->uri->segment('3');


        $data['jadwal'] = $this->model_admin->tampil_kereta();

        $this->load->view('tambah_jadwal', $data);
    }

    function proses_tambah()
    {
        $id_kereta = $this->input->post('id_kereta');
        $tanggal = $this->input->post('tanggal');
        $where = array('id_kereta' => $id_kereta);

        $kereta =  $this->model_admin->select_data('kereta', $where);

        $data = array(
            'id_kereta' => $id_kereta,
            'tanggal' => $tanggal,
            'tarif' => $kereta[0]->tarif_normal,
            'kapasitas' => 160,
            'tersedia' => 160,
        );
        $this->model_admin->insert_data('jadwal', $data);
        print_r('Data Berhasil Ditambahkan');
        $this->penjadwalan();
    }

    function ubah_jadwal()
    {
        $id_jadwal = $this->uri->segment('3');
        $where = array('id_jadwal' => $id_jadwal);







        $data['jadwal'] = $this->model_admin->select_data('jadwal', $where);
        $data['id_jadwal'] = $id_jadwal;

        //var_dump($data);
        $this->load->view('ubah_jadwal', $data);
    }

    function proses_ubah()
    {
        $tarif = $this->input->post('tarif');
        $id_jadwal = $this->input->post('id_jadwal');
        $tanggal = $this->input->post('tanggal');
        $data = array(
            'tarif' => $tarif,
            'tanggal' => $tanggal,

        );
        $this->model_admin->update_data('jadwal', $data, $id_jadwal);
        print_r('berhasil ubah data');
        $this->penjadwalan();
    }

    function hapus_jadwal()
    {
        $id = $this->uri->segment('3');
        //var_dump($id);
        $where = array('id_jadwal' => $id);
        $this->model_admin->delete_data('jadwal', $where);


        print_r('berhasil menghapus');
        $this->penjadwalan();
    }
}
