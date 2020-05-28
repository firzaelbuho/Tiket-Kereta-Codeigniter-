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
                <div id="pilihKursi">

                </div>
                <br>

                <button type="submit" class="btn btn-primary">Pesan Tiket</button>



            </form>
        </div>
    </div>

</body>

</html>