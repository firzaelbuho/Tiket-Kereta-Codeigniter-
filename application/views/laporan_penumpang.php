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
            <h3>Detail Penumpang</h3>
            <br> <br>

            <table class="table-bordered text-center" width="100%">
                <thead class="text-center p-2 text-light bg-primary">
                    <td>ID</td>
                    <td>Nama Penumpang</td>
                    <td>Berangkat</td>
                    <td>Tujuan</td>
                    <td>Nomor Kursi</td>
                    <td>Tanggal</td>
                    <td>Kereta</td>

                </thead>
                <?php foreach ($tiket as $x) { ?>
                    <tr>
                        <td><?= $x->id_penumpang ?></td>
                        <td><?= $x->nama_penumpang ?></td>
                        <td><?= $x->berangkat ?></td>
                        <td><?= $x->tujuan ?></td>
                        <td><?= $x->id_kursi ?></td>
                        <td><?= $x->tanggal ?></td>
                        <td><?= $x->nama_kereta ?></td>

                    </tr>






                <?php } ?>
            </table>
            <br>
            <br>
            <br><br>


            <br><br>


        </div>
</body>

</html>