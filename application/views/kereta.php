<html>

<head>
    <title>Kereta</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>


<body>
    <br> <br>

    <div class="container">
        <a href="<?php echo base_url(); ?>admin" class="btn btn-primary"> <?= '<' ?> </a>

        <br>
        <div class="">
            <h3>Daftar Kereta</h3> <br>
            <a href="<?php echo base_url(); ?>admin/tambah_kereta/" class="btn btn-primary">Tambah Kerets</a>
            <br><br>
            <table style="font-size:14px" class="table-bordered text-center" width="100%">
                <thead class="text-center p-2 text-light bg-primary">

                    <td>Nama Kereta</td>
                    <td>Kelas</td>
                    <td>Berangkat</td>
                    <td>Tujuan</td>
                    <td>Tarif Normal</td>

                    <td>Aksi</td>
                </thead>
                <?php foreach ($kereta as $x) { ?>
                    <tr>

                        <td><?= $x->nama_kereta ?></td>
                        <td><?= $x->kelas ?></td>
                        <td><?= $x->berangkat ?></td>
                        <td><?= $x->tujuan ?></td>
                        <td><?= $x->tarif_normal ?></td>

                        <td class="p-2">

                            <a href="<?php echo base_url(); ?>admin/ubah_kereta/<?= $x->id_kereta; ?>" class="btn text-light text-decoration-none bg-warning">Ubah</a>
                            <a href="<?php echo base_url(); ?>admin/hapus_kereta/<?= $x->id_kereta; ?>" class="confirmation btn text-light text-decoration-none bg-danger">Hapus</a> </td>
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