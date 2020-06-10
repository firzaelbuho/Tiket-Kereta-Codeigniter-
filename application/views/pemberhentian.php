<html>

<head>
    <title>Pemberhentian</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>


<body>
    <br> <br>

    <div class="container">

        <br>
        <div class="">
            <h3>Daftar Pemberhentian</h3> <br>
            <a href="<?php echo base_url(); ?>admin/tambah_pemberhentian/" class="btn btn-primary">Tambah Pemberhentian</a>
            <br><br>
            <table style="font-size:14px" class="table-bordered text-center" width="100%">
                <thead class="text-center p-2 text-light bg-primary">

                    <td>ID</td>
                    <td>Kereta</td>
                    <td>Stasiun</td>
                    <td>Waktu</td>


                    <td>Aksi</td>
                </thead>
                <?php foreach ($data as $x) { ?>
                    <tr>

                        <td><?= $x->id_pemberhentian ?></td>
                        <td><?= $x->nama_kereta ?></td>
                        <td><?= $x->nama_stasiun ?></td>
                        <td><?= $x->waktu ?></td>


                        <td class="p-2">

                            <a href="<?php echo base_url(); ?>admin/ubah_pemberhentian/<?= $x->id_pemberhentian; ?>" class="btn text-light text-decoration-none bg-warning">Ubah</a>
                            <a href="<?php echo base_url(); ?>admin/hapus_pemberhentian/<?= $x->id_pemberhentian; ?>" class="confirmation btn text-light text-decoration-none bg-danger">Hapus</a> </td>
                    </tr> <?php } ?>
            </table> <br><br>


        </div>

        <script>
            var elems = document.getElementsByClassName('confirmation');
            var confirmIt = function(e) {
                if (!confirm('Apakah anda ingin menghapus?')) e.preventDefault();
            };
            for (var i = 0, l = elems.length; i < l; i++) {
                elems[i].addEventListener('click', confirmIt, false);
            }
        </script>
</body>

</html>