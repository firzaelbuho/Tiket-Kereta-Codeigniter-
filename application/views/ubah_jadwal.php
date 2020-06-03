<html>

<head>
    <title>Ubah Jadwal</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <br> <br>

    <div class="container">

        <br>
        <div class="">

            <hr>

            <br><br><br>
            <h3>Ubah Jadwal</h3>
            <br> <br>
            <form method="POST" action="<?php echo base_url(); ?>admin/proses_ubah/">
                <p>Tanggal keberangkatan</p>
                <input type="date" name="tanggal" value="<?= $jadwal[0]->tanggal ?>">
                <br><br>
                <p>Tarif</p>
                Rp. <input type="number" name="tarif" value="<?= $jadwal[0]->tarif ?>">
                <br><br>
                <input hidden type="number" name="id_jadwal" value="<?= $jadwal[0]->id_jadwal ?>">
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>




            <br><br>


        </div>
</body>

</html>