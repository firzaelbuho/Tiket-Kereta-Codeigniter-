<html>

<head>
    <title>Membuat login dengan codeigniter | www.malasngoding.com</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <h1>Login berhasil !</h1>
    <h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>

    <h1>CRUD</h1>
    <br>
    <ul>
        <li a href="<?php echo base_url('admin/create'); ?>">CREATE</li>
        <li a href="<?php echo base_url('admin/create'); ?>">CREATE</li>
        <li a href="<?php echo base_url('admin/create'); ?>">CREATE</li>
        <li a href="<?php echo base_url('admin/create'); ?>">CREATE</li>
    </ul>

    <a href="<?php echo base_url('login/logout'); ?>">Logout</a>
</body>

</html>