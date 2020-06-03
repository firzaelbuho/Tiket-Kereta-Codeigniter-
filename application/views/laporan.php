<html>

<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <br> <br>

    <div class="container">

        <br>
        <div class="">
            <h3>Laporan Transaksi Masuk</h3> <br>

            <table class="table-bordered text-center" width="100%">
                <thead class="text-center p-2 text-light bg-primary">
                    <td>Tanggal</td>
                    <td>Total Transaksi</td>
                    <td>Total Pemasukan</td>
                    <td>Aksi</td>
                </thead>
                <?php foreach ($trx as $x) { ?>
                    <tr>
                        <td><?= $x->tgl_bayar ?></td>
                        <td><?= $x->jml_trx ?></td>
                        <td><?= $x->total_trx ?></td>
                        <td><a class="btn btn-primary text-light" href="<?php echo base_url(); ?>admin/detil_transaksi/<?= $x->tahun . '/' . $x->bulan . '/' . $x->tgl; ?>">Detil</a></td>
                    </tr>




                <?php } ?>
            </table>
            <hr>

            <br><br><br>
            <h3>Laporan Penumpang</h3>
            <br>


            <table class="table-bordered text-center" width="100%">
                <thead class="text-center p-2 text-light bg-primary">
                    <td>Tanggal</td>
                    <td>Nama Kereta</td>
                    <td>Tujuan</td>
                    <td>Jumlah Penumpang</td>
                    <td>Aksi</td>
                </thead>
                <?php foreach ($penumpang as $x) { ?>
                    <tr>
                        <td><?= $x->tanggal ?></td>
                        <td><?= $x->nama_kereta ?></td>
                        <td><?= $x->tujuan ?></td>
                        <td><?= $x->jml_penumpang ?></td>
                        <td><a class="btn btn-primary text-light" href="<?php echo base_url(); ?>admin/detil_penumpang/<?= $x->id_jadwal; ?>">Detil</a></td>
                    </tr>




                <?php } ?>
            </table>
            <br><br>


        </div>
</body>

</html>