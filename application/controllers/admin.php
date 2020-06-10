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

    function kereta()
    {
        $d = $this->model_admin->select_all('kereta');


        $data['kereta'] = $d;

        //var_dump($data);
        $this->load->view('kereta', $data);
    }

    function tambah_kereta()
    {
        $data['kereta'] = $this->model_admin->select_all('stasiun');
        $this->load->view('tambah_kereta', $data);
    }

    function proses_tambah_kereta()
    {
        $nama_kereta = $this->input->post('nama_kereta');
        $kelas = $this->input->post('kelas');
        $id_berangkat = $this->input->post('berangkat');
        $id_tujuan = $this->input->post('tujuan');
        $tarif = $this->input->post('tarif');
        $arah = 'barat';



        //cari arah
        $stasiun1 = $this->model_admin->select_data('stasiun', array('no_stasiun' => $id_berangkat));
        $berangkat = $stasiun1[0]->nama_stasiun;
        //var_dump($berangkat);
        $stasiun2 = $this->model_admin->select_data('stasiun', array('no_stasiun' => $id_tujuan));
        $tujuan = $stasiun1[0]->nama_stasiun;
        //var_dump($berangkat);
        if (($stasiun2[0]->no_stasiun - $stasiun1[0]->no_stasiun) > 0) {
            $arah = 'timur';
        }
        //var_dump($arah);

        //hitung jml_stasiun

        $jml_stasiun = $stasiun2[0]->no_stasiun - $stasiun1[0]->no_stasiun + 1;
        if ($jml_stasiun < 0) {
            $jml_stasiun *= -1;
        }
        //var_dump($jml_stasiun);


        $data = array(
            'nama_kereta' => $nama_kereta,
            'kelas' => $kelas,
            'berangkat' => $berangkat,
            'tujuan' => $tujuan,
            'tarif_normal' => $tarif,
            'arah' => $arah,
            'jml_stasiun' => $jml_stasiun
        );
        $this->model_admin->insert_data('kereta', $data);
        print_r('Data Berhasil Ditambahkan');
        $this->kereta();
    }

    function ubah_kereta()
    {
        $id_kereta = $this->uri->segment('3');
        $where = array('id_kereta' => $id_kereta);







        $data['kereta'] = $this->model_admin->select_data('kereta', $where);
        $data['stasiun'] = $this->model_admin->select_all('stasiun');

        //var_dump($data);
        $this->load->view('ubah_kereta', $data);
    }

    function proses_ubah_kereta()
    {
        $id_kereta = $this->input->post('id_kereta');
        $nama_kereta = $this->input->post('nama_kereta');
        $kelas = $this->input->post('kelas');
        $id_berangkat = $this->input->post('berangkat');
        $id_tujuan = $this->input->post('tujuan');
        $tarif = $this->input->post('tarif');
        $arah = 'barat';



        //cari arah
        $stasiun1 = $this->model_admin->select_data('stasiun', array('no_stasiun' => $id_berangkat));
        $berangkat = $stasiun1[0]->nama_stasiun;
        //var_dump($berangkat);
        $stasiun2 = $this->model_admin->select_data('stasiun', array('no_stasiun' => $id_tujuan));
        $tujuan = $stasiun1[0]->nama_stasiun;
        //var_dump($berangkat);
        if (($stasiun2[0]->no_stasiun - $stasiun1[0]->no_stasiun) > 0) {
            $arah = 'timur';
        }
        //var_dump($arah);

        //hitung jml_stasiun

        $jml_stasiun = $stasiun2[0]->no_stasiun - $stasiun1[0]->no_stasiun + 1;
        if ($jml_stasiun < 0) {
            $jml_stasiun *= -1;
        }
        //var_dump($jml_stasiun);



        $data = array(
            'nama_kereta' => $nama_kereta,
            'kelas' => $kelas,
            'berangkat' => $berangkat,
            'tujuan' => $tujuan,
            'tarif_normal' => $tarif,
            'arah' => $arah,
            'jml_stasiun' => $jml_stasiun
        );

        $this->model_admin->update_kereta('kereta', $data, $id_kereta);
        print_r('berhasil ubah data');
        $this->kereta();
    }

    function hapus_kereta()
    {
        $id = $this->uri->segment('3');
        //var_dump($id);
        $where = array('id_kereta' => $id);
        $this->model_admin->delete_data('kereta', $where);


        print_r('berhasil menghapus');
        $this->kereta();
    }




    function pemberhentian()
    {
        $d = $this->model_admin->tampil_pemberhentian();


        $data['data'] = $d;

        //var_dump($data);
        $this->load->view('pemberhentian', $data);
    }

    function tambah_pemberhentian()
    {
        $data['stasiun'] = $this->model_admin->select_all('stasiun');
        $data['kereta'] = $this->model_admin->select_all('kereta');

        $this->load->view('tambah_pemberhentian', $data);
    }

    function proses_tambah_pemberhentian()
    {
        $id_kereta = $this->input->post('kereta');
        $no_stasiun = $this->input->post('stasiun');
        $waktu = $this->input->post('waktu');






        $data = array(
            'id_kereta' => $id_kereta,
            'no_stasiun' => $no_stasiun,
            'waktu' => $waktu,

        );
        $this->model_admin->insert_data('pemberhentian', $data);
        print_r('Data Berhasil Ditambahkan');
        $this->pemberhentian();
    }

    function ubah_pemberhentian()
    {
        $id_pemberhentian = $this->uri->segment('3');
        $where = array('id_pemberhentian' => $id_pemberhentian);







        $data['pemberhentian'] = $this->model_admin->select_data('pemberhentian', $where);
        $data['stasiun'] = $this->model_admin->select_all('stasiun');
        $data['kereta'] = $this->model_admin->select_all('kereta');

        //var_dump($data);
        $this->load->view('ubah_pemberhentian', $data);
    }

    function proses_ubah_pemberhentian()
    {
        $id_kereta = $this->input->post('kereta');
        $id_pemberhentian = $this->input->post('id_pemberhentian');
        $no_stasiun = $this->input->post('stasiun');
        $waktu = $this->input->post('waktu');






        $data = array(
            'id_kereta' => $id_kereta,
            'no_stasiun' => $no_stasiun,
            'waktu' => $waktu,

        );

        $this->model_admin->update_pemberhentian('pemberhentian', $data, $id_pemberhentian);
        print_r('berhasil ubah data');
        $this->pemberhentian();
    }

    function hapus_pemberhentian()
    {
        $id = $this->uri->segment('3');
        //var_dump($id);
        $where = array('id_pemberhentian' => $id);
        $this->model_admin->delete_data('pemberhentian', $where);


        print_r('berhasil menghapus');
        $this->pemberhentian();
    }
}
