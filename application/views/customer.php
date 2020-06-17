<html>

<head>
    <title>Selamat Datang Customer</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary text-white">
    <a href="<?php echo base_url('login/logout'); ?>">Logout</a>
    <div class=" text-center container bg-white text-dark p-5 center justify-content-center">
        <br>
        <h3>Halaman Pelanggan</h3>



        <br><br>
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
                <a class=" m-2 btn btn-primary text-white text-decoration-none" href="<?= base_url('customer/pesan') ?>">Pesan Tiket</>




                    <a class="btn btn-primary text-white text-decoration-none" href="<?= base_url('customer/tiket_saya') ?>">Tiket Saya</a>

            </div>
        </div>



        <br>
        <br>
    </div>

</body>

</html>