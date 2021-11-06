<?php include "top.php"; ?>
			<div class="BigContent">
				<div class="LeftContent">
					<div id="navigation">
						<ul class="top-level">
						<?php 
							$kat = mysql_query("SELECT category, category.id from category join product on product.id_category=category.id group by category");
							while($list=mysql_fetch_array($kat)){
								echo"<li><a href='product.php?cat=$list[id]'>$list[category]</a></li>";
							}
						?>
						</ul>
					</div>
				</div>
				<div class="RightContent">
					<h2 class="Judul">Form Pemesanan</h2>
				<form action="input.php?input=inputform" method="post">
					<table>
						<tr>
							<td>Nama</td>
							<td><input class="form" type="text" name="name"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input class="form" type="text" name="email"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><textarea class="form" name="address" cols="40" rows="7"></textarea></td>
						</tr>
						<tr>
							<td>No HP</td>
							<td><input class="form" type="text" name="telp"></td>
						</tr>
						<tr>
							<td></td>
							<td><input name="submit" type="submit" value="order"> </td>
						</tr>
					</table>
				</form>
				</div>
<?php include "bottom.php"; ?>
	