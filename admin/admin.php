<?php
include "../inc/koneksi.php";
include "../inc/tanggal.php";
error_reporting(0);
session_start();
if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])){
  echo "<link href='css/style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<html>
<head>
<title>:: Toko Online ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="nicedit/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function(){
		nicEditors.allTextAreas(({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']})) });
</script>
</head>
<body>
		<div class="wrap">
			<div class="header">
				<div class="LeftOne">
					<a href="index.php">
					</a>
				</div>
				<div class="RightOne">
					<div class="cart">
						<span class="KetCart">Administrator</span>
					</div>
				</div>
			</div>
			<br class="clearfloat" />
	<div class="BigCOntent">
		<div class="LeftContent">
			<div id="navigation">
			  <ul class="top-level">
				<li><a href=?mod=home>Home</a></li>
				<li><a href="?mod=product">Produk</a></li>
				<li><a href="?mod=category">Kategori</a></li>
				<li><a href="?mod=report">Report</a></li>
				<li><a href=logout.php>Logout</a></li>
			  </ul>
			</div>
		</div>
		<div class="RightContent">
			<?php 
				if ($_GET[mod]=='home'){
				  echo "<h1 class='Judul'>Selamat Datang</h1>
						  Anda Telah masuk ke halaman administrator silahkan gunakan menu yang tersedia :)</p>";
				}

				//Add Kategori
				elseif ($_GET[mod]=='category'){
					include "modul/mod_kategori.php";
					}
				//Add Product
				elseif ($_GET[mod]=='product'){
					include "modul/mod_produk.php";
					}
				//Report
				elseif ($_GET[mod]=='report'){
					include "modul/report.php";
					}
			?>
		</div>
	</div>
				<br class="clearfloat" />
			<div class="footer">
				<p align="center">&copy; <?php echo date('Y') ?> Membuat Sistem Shopping Cart | PHP dan MySQL Developed by <a href="http://www.hitamcoklat.com/">hitamcoklat</a></p>
			</div>
		</div>
	</body>
</html>
<?php
}
?>
