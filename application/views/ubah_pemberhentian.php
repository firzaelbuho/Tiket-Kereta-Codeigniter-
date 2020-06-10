<html>

<head>
    <title>Ubah Pemberhentian</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <br> <br>

    <div class="container">

        <br>
        <div class="container">

            <hr>

            <br><br><br>
            <h3>Ubah Pemberhentian</h3>

            <form method="POST" action="<?php echo base_url(); ?>admin/proses_ubah_pemberhentian/">



                <br>
                <p>Ubah kereta</p>
                <select name="kereta" id="">
                    <?php foreach ($kereta as $x) { ?>

                        <option value="<?= $x->id_kereta ?>"><?= $x->nama_kereta ?></option>

                    <?php } ?>
                </select>
                <br>
                <br>
                <p>Ubah Stasiun</p>
                <select name="stasiun" id="">
                    <?php foreach ($stasiun as $x) { ?>

                        <option value="<?= $x->no_stasiun ?>"><?= $x->nama_stasiun ?></option>

                    <?php } ?>

                </select>
                <br><br>
                <p>Waktu</p>
                <input type="time" name="waktu" value="<?= $pemberhentian[0]->waktu ?>">
                <br><br>
                <br><br>
                <input hidden type="number" name="id_pemberhentian" value="<?= $pemberhentian[0]->id_pemberhentian ?>">

                <br><br>


                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>




            <br><br>


        </div>
</body>

</html>