<html>

<head>
    <title>Beli Tiket</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body class="bg-primary">

    <div class="p-5 container bg-white">
        <div>

        </div>

        <div>

            <form action="<?= base_url(); ?>customer/proses_tiket" method="POST">

                <table cellpadding="4">
                    <tr>
                        <td>Nama Penumpang</td>
                        <td>:</td>
                        <td><input type="text" class="form-control "></td>
                    </tr>
                    <tr>
                        <td>No Identitas</td>
                        <td>:</td>
                        <td><input type="text" class="form-control "></td>
                    </tr>
                </table>
                <br>
                <h3>Pilih Tempat Duduk</h3>
                <br>
                <p>
                    Gerbong
                    <select name="gerbong" id="gerbong">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    No. Kursi <input size="2" disabled type="text">
                </p>
                <div id="pilihKursi">

                    <?php
                    //var_dump($data);
                    for ($i = 0; $i < count($data); $i++) {
                    ?>
                        <div style="width:70%" class="row text-center">

                            <div class="m-1 p-1 col-lg-1 bg-primary text-white">

                                <?= $data[$i]->no_kursi ?>

                            </div>


                            <div class="m-1 p-1 col-lg-1 bg-primary text-white">

                                <?= $data[$i + 20]->no_kursi ?>

                            </div>

                            <div class="col-1"></div>


                            <div class="m-1 p-1 col-lg-1 bg-primary text-white">

                                <?= $data[$i + 40]->no_kursi ?>

                            </div>


                            <div class="m-1 p-1 col-lg-1 bg-primary text-white">

                                <?= $data[$i + 60]->no_kursi ?>

                            </div>

                        </div>






                    <?php
                    } ?>


                </div>
                <br>

                <button type="submit" class="btn btn-primary">Pesan Tiket</button>



            </form>
        </div>
    </div>

    <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-3.5.1.js"></script>

</body>

</html>