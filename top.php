<?php
	include "inc/koneksi.php";
	error_reporting(0);
	session_start();
	?>
<html>
	<head>
		<title>Toko Online</title>
		<link rel="StyleSheet" href="css/style.css" type="text/css" />
		<link rel="StyleSheet" href="css/reset.css" type="text/css" />
	</head>
	
	<body>
		<div class="wrap">
			<div class="header">
				<div class="LeftOne">
					<a href="index.php"><img width="150px" src="images/toko-online.png" /></a>
				</div>
				<div class="RightOne">
					<div class="cart">
						<?php include "cart2.php"; ?>
					</div>
					<br class="clearfloat" />
					<a class="tocart" href="cart.php">Keranjang</a>
				</div>
			</div>
			<br class="clearfloat" />