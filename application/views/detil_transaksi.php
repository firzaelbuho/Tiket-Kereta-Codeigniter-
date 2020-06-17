<html>

<head>
    <title>Detil Transaksi</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary">

    <div class="p-5 container bg-white">


        <br>
        <h3>Transaksi Berhasil Dibuat</h3>
        <br>
        <table>
            <tr>
                <td rowspan="">Informasi Tiket ===> </td>
                <td>Nama Penumpang</td>
                <td>:</td>
                <td><?= $_SESSION['nama_penumpang'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td>ID Penumpang</td>
                <td>:</td>
                <td><?= $_SESSION['id_penumpang'] ?></td>

            <tr>
                <td></td>
                <td>Nama Kereta</td>
                <td>:</td>
                <td><?= $_SESSION['nama_kereta'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Tanggal Berangkat</td>
                <td>:</td>
                <td><?= $_SESSION['tgl_berangkat'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Berangkat</td>
                <td>:</td>
                <td><?= $_SESSION['st_berangkat'] . ' (' . $_SESSION['waktu_berangkat'] . ')' ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Tujuan</td>
                <td>:</td>
                <td><?= $_SESSION['st_tujuan'] . ' (' . $_SESSION['waktu_tujuan'] . ')' ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Tarif</td>
                <td>:</td>
                <td><?= $_SESSION['tarif'] ?></td>
            </tr>
            </tr>
            <tr>
                <td></td>
                <td>No Kursi</td>
                <td>:</td>
                <td><?= $_SESSION['no_kursi'] ?></td>
            </tr>
        </table>
        <br>
        <h3>Total Transaksi = <?= $_SESSION['tarif'] ?></h3>
        <br>
        <a class="btn btn-primary" href="<?= base_url(); ?>customer/bayar">Bayar Sekarang</a>
        <br>
    </div>

</body>

</html>