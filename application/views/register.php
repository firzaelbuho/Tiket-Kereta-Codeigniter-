<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Register</title>

	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">









</head>

<body class="bg-primary">




	<h1 class="text-center ">Selamat Datang</h1>
	<br><br>
	<div class="center container">
		<div class="row">

			<div class="col-lg-4"></div>

			<div class="col-lg-4 center" style="background-color:white">

				<br><br>
				<form action="login.php" method="POST" class="align-center bg-white">


					<input type="text" class="form-control" name="username" placeholder="username">
					<br>
					<input type="password" class="form-control" name="password" placeholder="password">

					<br> <br>
					<button type="submit" class="btn btn-primary form-control">Login</button>
					<br> <br>

					<a href="#">Forget password</a> <a href="<?= base_url('welcome') ?>">Login</a>
					<br><br>

				</form>

			</div>
		</div>
	</div>


</body>

</html>