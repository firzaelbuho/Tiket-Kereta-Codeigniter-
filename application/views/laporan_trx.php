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

            <hr>

            <br><br><br>
            <h3>Detail Transaksi Masuk <?= 'Tanggal  ' . $trx[0]->tgl_bayar ?></h3>
            <br> <br>





            <table class="table-bordered text-center" width="100%">
                <thead class="text-center p-2 text-light bg-primary">
                    <td>ID Transaksi</td>
                    <td>Nama Customer</td>
                    <td>Jumlah Tiket</td>
                    <td>Harga Total</td>
                </thead>
                <?php foreach ($trx as $x) { ?>
                    <tr>
                        <td><?= $x->id ?></td>
                        <td><?= $x->nama ?></td>
                        <td><?= $x->jml_tiket ?></td>
                        <td><?= $x->jml_bayar ?></td>
                    </tr>




                <?php } ?>
            </table>
            <br><br>


        </div>
</body>

</html>