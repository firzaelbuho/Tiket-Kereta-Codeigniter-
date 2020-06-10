<html>

<head>
    <title>Tambah Kereta</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <br> <br>

    <div class="container">

        <br>
        <div class="container">

            <hr>

            <br><br><br>
            <h3>Tambah Kereta</h3>

            <form method="POST" action="<?php echo base_url(); ?>admin/proses_tambah_kereta/">



                <br>
                <p>Nama Kereta</p>
                <input type="text" name="nama_kereta">
                <br><br>
                <p>Kelas</p>
                <select name="kelas" id="">
                    <option value="EKONOMI">Ekonomi</option>
                    <option value="EKSEKUTIF">Eksekutif</option>
                    <option value="BISNIS">Bisnis</option>
                </select>
                <br>
                <br>
                <p>Stasiun keberangkatan</p>
                <select name="berangkat" id="">
                    <?php foreach ($kereta as $x) { ?>

                        <option value="<?= $x->no_stasiun ?>"><?= $x->nama_stasiun ?></option>

                    <?php } ?>

                </select>
                <br><br>
                <p>Stasiun Tujuan</p>
                <select name="tujuan" id="">
                    <?php foreach ($kereta as $x) { ?>

                        <option value="<?= $x->no_stasiun ?>"><?= $x->nama_stasiun ?></option>

                    <?php } ?>

                </select>
                <br><br>
                <p>Tarif</p>
                <input type="number" name="tarif">
                <br><br>


                <button type="submit" class="btn btn-primary">Tambah</button>

            </form>




            <br><br>


        </div>
</body>

</html>