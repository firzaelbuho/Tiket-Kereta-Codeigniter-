<html>

<head>
    <title>Pesan Kereta</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary">

    <?php
    //echo $this->session->userdata("nama"); 
    ?>

    <a href="<?php echo base_url('login/logout'); ?>">Logout</a>
    <br><br>

    <div class="container bg-white p-4">
        <br>
        <p>Pesan Tiket</p>

        <form action="<?php echo base_url('customer/cek_kereta'); ?>" method="POST">

            <p>Berangkat</p>
            <select class="form-control" name="berangkat">
                <?php
                foreach ($stasiun as $u) {
                ?>
                    <option value="<?php echo $u->no_stasiun ?>"><?php echo $u->nama_stasiun ?></option>
                <?php } ?>
            </select>
            <br>
            <p>Tujuan</p>
            <select class="form-control" name="tujuan">
                <?php
                foreach ($stasiun as $u) {
                ?>
                    <option value="<?php echo $u->no_stasiun ?>"><?php echo $u->nama_stasiun ?></option>
                <?php } ?>
            </select>
            <br>

            <p>Tanggal Keberangkatan</p>
            <input name="tanggal" type="date" class="form-control">
            <br>

            <br>

            <button class="form-control btn btn-primary" type="submit">Cari</button>
            <br>
            <br>

        </form>
    </div>


</body>

</html>