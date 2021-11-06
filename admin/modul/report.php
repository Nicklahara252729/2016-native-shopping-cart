<?php
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM order_product, product WHERE order_product.id_product=product.id");
	?>
	<h1 class="Judul">Laporan</h1>
<table class="TableCart">
	<tr><th>No</th>
		<th>Nama Produk</th>
		<th>Nama Pemesan</th>
		<th>Alamat Pemesan</th>
		<th>Telepon</th>
		<th>Jumlah</th>
		<th>Status</th>
	</tr>
<?php
	$no = 1;
	while ($r=mysql_fetch_array($sql)){
		echo"<tr><td>$no</td>
				<td>$r[product_name]</td>
				<td>$r[name]</td>
				<td>$r[address]</td>
				<td>$r[phone]</td>
				<td>$r[jumlah]</td>
				<td>$r[status]</td>
			 </tr>";
	$no++;
	} ?>
	</table>