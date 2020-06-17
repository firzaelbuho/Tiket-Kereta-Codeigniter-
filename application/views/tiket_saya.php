<html>

<head>
    <title>Tiket Saya</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary ">
    <a href="<?php echo base_url('login/logout'); ?>">Logout</a>
    <div class="bg-white text-center container  text-dark p-5 center justify-content-center">
        <br>
        <br>
        <h3>Tiket Saya</h3>
        <br><br>
        <table class="table wy-table-stripped">
            <tr class="bg-primary text-white">
                <td>Kode Tiket</td>
                <td>ID Penumpang</td>
                <td>Nama Penumpang</td>
                <td>Kereta</td>
                <td>No Kursi</td>
                <td>Tanggal Keberangkatan</td>
                <td>Berangkat</td>
                <td>Tujuan</td>
                <td>Tarif</td>
                <td>Opsi</td>


            </tr>

            <?php foreach ($data as $x) { ?>
                <tr>
                    <td><?= $x->kd_tiket ?> </td>
                    <td><?= $x->id_penumpang ?> </td>
                    <td><?= $x->nama_penumpang ?> </td>
                    <td><?= $x->nama_kereta ?> </td>
                    <td><?= $x->no_kursi ?></td>
                    <td><?= $x->tanggal ?> </td>
                    <td><?= $x->berangkat ?> </td>
                    <td><?= $x->tujuan ?> </td>
                    <td><?= $x->tarif ?> </td>
                    <td><a class="m-1 btn btn-primary text-white">Check in </a><a class="btn btn-danger m-1" href="<?php echo base_url('customer/batal/' . $x->id_tiket . '/' . $x->id_transaksi); ?>">Batal</a></td>
                </tr>

            <?php } ?>

        </table>



        <br><br>
        <div class="row">
            <div class="col-4">

            </div>

        </div>



        <br>
        <br>
    </div>

</body>

</html>