<html>

<head>
    <title>Selamat Datang Customer</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary text-white">
    <a href="<?php echo base_url('login/logout'); ?>">Logout</a>
    <div class="container bg-white text-dark p-5 center justify-content-center">
        <br>
        <h3>Login berhasil !</h3>
        <h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>

        <br><br>
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
                <div class="bg-primary p-2 center">
                    <a class="text-white text-decoration-none" href="<?= base_url('customer/pesan') ?>">Pesan Tiket</a>
                </div>
                <br>
                <div class="bg-primary p-2">
                    <a class="text-white text-decoration-none" href="">Batalkan Tiket</a>
                </div>
                <br>
                <div class="bg-primary p-2">
                    <a class="text-white text-decoration-none" href="">Pesan Tiket</a>
                </div>
            </div>
        </div>



        <br>
        <br>
    </div>

</body>

</html>