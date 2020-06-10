<html>

<head>
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <br><br><br>
    <div class="container centere">

        <div class="row centered">
            <div class="col-5 bg-primary m-1">

                <a style="font-size: 28px;" class="text-decoration-none btn text-light" href="<?php echo base_url('admin/jadwal'); ?>">Jadwal</a>

            </div>

            <div class="col-5 bg-primary m-1">

                <a style="font-size: 28px;" class="text-decoration-none btn text-light" href="<?php echo base_url('admin/kereta'); ?>">Kereta</a>

            </div>



        </div>
        <div class="row centered">
            <div class="col-5 bg-primary m-1">

                <a style="font-size: 28px;" class="text-decoration-none btn text-light" href="<?php echo base_url('admin/pemberhentian'); ?>">Pemberhentian</a>

            </div>

            <div class="col-5 bg-primary m-1">

                <a style="font-size: 28px;" class="text-decoration-none btn text-light" href="<?php echo base_url('admin/Laporan'); ?>">Laporan</a>

            </div>



        </div>


    </div>




</body>

</html>