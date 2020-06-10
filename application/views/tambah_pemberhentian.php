<html>

<head>
    <title>Tambah Pemberhentian</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <br> <br>

    <div class="container">

        <br>
        <div class="container">

            <hr>

            <br><br><br>
            <h3>Tambah Peemberhentian</h3>

            <form method="POST" action="<?php echo base_url(); ?>admin/proses_tambah_pemberhentian/">



                <br>

                <p>Pilih kereta</p>
                <select name="kereta" id="">
                    <?php foreach ($kereta as $x) { ?>

                        <option value="<?= $x->id_kereta ?>"><?= $x->nama_kereta ?></option>

                    <?php } ?>
                </select>
                <br>
                <br>
                <p>Pilih Stasiun</p>
                <select name="stasiun" id="">
                    <?php foreach ($stasiun as $x) { ?>

                        <option value="<?= $x->no_stasiun ?>"><?= $x->nama_stasiun ?></option>

                    <?php } ?>

                </select>
                <br><br>
                <p>Waktu</p>
                <input type="time" name="waktu">
                <br><br>


                <button type="submit" class="btn btn-primary">Tambah</button>

            </form>




            <br><br>


        </div>
</body>

</html>