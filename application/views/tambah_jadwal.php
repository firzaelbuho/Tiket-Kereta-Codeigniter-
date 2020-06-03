<html>

<head>
    <title>Tambah Jadwal</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <br> <br>

    <div class="container">

        <br>
        <div class="">

            <hr>

            <br><br><br>
            <h3>Tambah Jadwal</h3>
            <br> <br>
            <form method="POST" action="<?php echo base_url(); ?>admin/proses_tambah/">
                <p>Pilih Kereta</p>

                <select name="id_kereta" id="">
                    <?php foreach ($jadwal as $x) { ?>

                        <option value="<?= $x->id_kereta ?>"><?= $x->nama_kereta . '  ( Tujuan -> ' . $x->tujuan . ' )'  ?></option>

                    <?php } ?>

                </select>
                <br> <br>
                <p>Tanggal keberangkatan</p>
                <input type="date" name="tanggal">
                <br><br>
                <button type="submit" class="btn btn-primary">Tambah</button>

            </form>




            <br><br>


        </div>
</body>

</html>