<html>

<head>
    <title>Penjadwalan</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>


<body>
    <br> <br>

    <div class="container">
        <a href="<?php echo base_url(); ?>admin" class="btn btn-primary"> <?= '<' ?> </a>
        <br>
        <div class="">
            <h3>Jadwal Keberangkatan Kereta</h3> <br>
            <a href="<?php echo base_url(); ?>admin/tambah_jadwal/" class="btn btn-primary">Tambah Jadwal</a>
            <br><br>
            <table style="font-size:14px" class="table-bordered text-center" width="100%">
                <thead class="text-center p-2 text-light bg-primary">
                    <td>Tanggal</td>
                    <td>Nama Kereta</td>
                    <td>Rute</td>
                    <td>Tarif</td>
                    <td>Ketersediaan</td>

                    <td>Aksi</td>
                </thead>
                <?php foreach ($jadwal as $x) { ?>
                    <tr>
                        <td><?= $x->tanggal ?></td>
                        <td><?= $x->nama_kereta ?></td>
                        <td><?= $x->berangkat . " - " . $x->tujuan ?></td>
                        <td><?= $x->tarif ?></td>
                        <td><?= $x->tersedia . " / " . $x->kapasitas ?></td>

                        <td class="p-2">
                            <a href="<?php echo base_url(); ?>admin/detil_penumpang/<?= $x->id_jadwal; ?>" class="btn text-light text-decoration-none bg-primary">Lihat Detil</a>
                            <a href="<?php echo base_url(); ?>admin/ubah_jadwal/<?= $x->id_jadwal; ?>" class="btn text-light text-decoration-none bg-warning">Ubah</a>
                            <a href="<?php echo base_url(); ?>admin/hapus_jadwal/<?= $x->id_jadwal; ?>" class="confirmation btn text-light text-decoration-none bg-danger">Hapus</a> </td>
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