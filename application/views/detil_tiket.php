<html>

<head>
    <title>Detil Tiket</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary">

    <div class="p-5 container bg-white">


        <br>
        <h3>Detail Tiket</h3>
        <br>
        <table>
            <tr>
                <td>Nama Penumpang</td>
                <td>:</td>
                <td><?= $_SESSION['nama_penumpang'] ?></td>
            </tr>
            <tr>
                <td>ID Penumpang</td>
                <td>:</td>
                <td><?= $_SESSION['id_penumpang'] ?></td>

            <tr>
                <td>Nama Kereta</td>
                <td>:</td>
                <td><?= $_SESSION['nama_kereta'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Berangkat</td>
                <td>:</td>
                <td><?= $_SESSION['tgl_berangkat'] ?></td>
            </tr>
            <tr>
                <td>Berangkat</td>
                <td>:</td>
                <td><?= $_SESSION['st_berangkat'] . ' (' . $_SESSION['waktu_berangkat'] . ')' ?></td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>:</td>
                <td><?= $_SESSION['st_tujuan'] . ' (' . $_SESSION['waktu_tujuan'] . ')' ?></td>
            </tr>
            <tr>
                <td>Tarif</td>
                <td>:</td>
                <td><?= $_SESSION['tarif'] ?></td>
            </tr>
            </tr>
            <tr>
                <td>No Kursi</td>
                <td>:</td>
                <td><?= $_SESSION['no_kursi'] ?></td>
            </tr>
        </table>


        <br>
        <a class="btn btn-primary" href="<?= base_url(); ?>customer/buat_transaksi">Beli Tiket</a>
        <br>
    </div>

</body>

</html>