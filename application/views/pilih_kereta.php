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
        var_dump($data);
        foreach ($data as $u) {
        ?>
            <a href="<?php echo base_url(); ?>customer/pilih_kereta/<?= $u->id_kereta; ?>">
                <div class="text-white bg-primary p-3">
                    <br>
                    <h4> KA <?php echo $u->nama_kereta . " (" . $u->kelas . ")" ?></h4>

                    <br>
                    <h5><?= $u->kelas ?></h5>
                    <br>
                    <table class="text-white text-center">
                        <tr>
                            <td>
                                <?= $u->stasiun_berangkat . " (" . $u->kd_stasiun_berangkat . ")" ?>
                            </td>
                            <td class="p-2">
                                -->
                            </td>
                            <td>
                                <?= $u->stasiun_tujuan . " (" . $u->kd_stasiun_tujuan . ")" ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $u->waktu_berangkat . " WIB" ?>
                            </td>
                            <td class="p-2">
                                -->
                            </td>
                            <td>
                                <?= $u->waktu_tujuan . " WIB" ?>
                            </td>
                        </tr>

                    </table>


                    <br>
                    <p><?= $u->tanggal ?></p>
                    <br>


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