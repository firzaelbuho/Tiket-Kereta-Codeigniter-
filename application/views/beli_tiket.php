<html>

<head>
    <title>Beli Tiket</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary">


    <?php

    // var_dump($data);
    function tampil_kursi($id, $data)
    { ?>
        <div class="col-1">
            <?php
            if ($data[$id]->status == 'kosong') { ?>

                <input name="kursi" type="radio" value="<?= $data[$id]->id_kursi ?>">
            <?php } else {
            ?>

                <input name="kursi" disabled type="radio" value="<?= $data[$id]->no_kursi ?>">
            <?php

            }
            echo $data[$id]->no_kursi;

            ?>

        </div>



    <?php }
    ?>

    <div class="p-5 container bg-white">
        <div>

        </div>

        <div>

            <form action="<?= base_url(); ?>customer/proses_tiket" method="POST">

                <table cellpadding="4">
                    <tr>
                        <td>Nama Penumpang</td>
                        <td>:</td>
                        <td><input name="nama" type="text" class="form-control "></td>
                    </tr>
                    <tr>
                        <td>No Identitas</td>
                        <td>:</td>
                        <td><input name="id" type="text" class="form-control "></td>
                    </tr>
                </table>
                <br>
                <h3>Pilih Tempat Duduk</h3>
                <br>
                <p>

                    <select name="gerbong" id="gerbong">
                        <?php for ($i = 1; $i <= 8; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>

                    </select>
                    <p> Kursi</p>

                    <p>Pilih gerbong</p>
                    <br>
                    <div class="row">
                        <?php
                        for ($i = 1; $i <= 8; $i++) { ?>

                            <div class="btn-primary px-3 text-white bg-primary mx-1" id="<?= 'g' . $i ?>" class="col-1">
                                <?= $i ?>
                            </div>

                            </a>

                        <?php } ?>
                    </div>
                    <br>
                    <?php

                    for ($x = 0; $x < 8; $x++) {
                        $id = 'gerbong' . ($x + 1) ?>
                        <div id="<?= $id ?>" class="mabar">
                            <p>Gerbong <?= $x + 1 ?></p>
                            <?php
                            for ($i = $x * 80; $i < $x * 80 + 20; $i++) { ?>
                                <br>

                                <div class="row">
                                    <?php
                                    tampil_kursi($i, $data);
                                    tampil_kursi($i + 20, $data);
                                    tampil_kursi($i + 40, $data);
                                    tampil_kursi($i + 60, $data);
                                    ?>
                                </div>
                                <br>


                            <?php  }
                            ?>
                        </div>
                    <?php
                    } ?>

                    <br>









                    <button type="submit" class="btn btn-primary">Pesan Tiket</button>



            </form>
        </div>
    </div>

    <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/tiket.js"></script>

</body>

</html>