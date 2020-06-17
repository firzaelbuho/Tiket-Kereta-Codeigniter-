<!DOCTYPE html>

<head>
    <title>Batalkan Tiket</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary">
    <br><br>
    <div class="p-5 container bg-white">
        <br>
        <br>
        <h3>Apa anda ingin membatalkan tiket berikut ?</h3>
        <br>
        <table>
            <tr>
                <td>Nama Penumpang</td>
                <td>:</td>
                <td><?= $tiket[0]->nama_penumpang ?></td>
            </tr>
            <tr>
                <td>ID Penumpang</td>
                <td>:</td>
                <td><?= $tiket[0]->id_penumpang ?></td>

            <tr>
                <td>Nama Kereta</td>
                <td>:</td>
                <td><?= $tiket[0]->nama_kereta ?></td>
            </tr>
            <tr>
                <td>Tanggal Berangkat</td>
                <td>:</td>
                <td><?= $tiket[0]->tanggal ?></td>
            </tr>
            <tr>
                <td>Berangkat</td>
                <td>:</td>
                <td><?= $tiket[0]->berangkat ?> <?= ' ( ' . substr($tiket[0]->waktu_berangkat, 0, 5)  . ' )' ?></td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>:</td>
                <td><?= $tiket[0]->tujuan ?> <?= ' ( ' . substr($tiket[0]->waktu_tujuan, 0, 5) . ' )' ?></td>
            </tr>
            <tr>
                <td>Tarif</td>
                <td>:</td>
                <td><?= $tiket[0]->tarif ?></td>
            </tr>
            </tr>
            <tr>
                <td>No Kursi</td>
                <td>:</td>
                <td><?= $tiket[0]->no_kursi ?></td>
            </tr>
        </table>
        <br>
        <a class="btn btn-primary" href="<?php echo base_url('customer/proses_batal'); ?>">Ya</a><a class=" m-2 btn btn-primary" href="<?php echo base_url('customer/tiket_saya'); ?>">Tidak</a>
    </div>
</body>

</html>