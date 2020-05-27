<html>

<head>
    <title>Pilih Kereta</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary">

    <div class="p-5 container bg-white">



        <p>Pilih Kereta</p>

        <br><br>

        <?php
        foreach ($data as $u) {
        ?>
            <a href="<?php echo base_url(); ?>customer/pilih_kereta/<?= $u->id_kereta; ?>">
                <div class="text-white bg-primary p-3">
                    <br>
                    <h4> KA <?php echo $u->nama_kereta . " (" . $u->id_kereta . ")" ?></h4>

                    <br>
                    <h5><?= $u->kelas ?></h5>
                    <br>
                    <table cellpadding="5px" class="p-2 text-white text-center">
                        <tr>
                            <td><?= $u->berangkat . " (" . $u->kd_berangkat . ")" ?></td>
                            <td>--></td>
                            <td><?= $u->tujuan . " (" . $u->kd_tujuan . ")" ?></td>
                        </tr>

                        </tr>
                        <tr>
                            <td><?= $u->waktu_berangkat ?></td>
                            <td>--></td>
                            <td><?= $u->waktu_tujuan ?></td>
                        </tr>
                    </table>
                    <br>
                    <h5> Rp. <?php echo $u->tarif ?> </h5>
                    <br>

                    <br>
                </div>
            </a>

            <br>
        <?php } ?>



    </div>

</body>

</html>