<?php
switch($_GET[act]){
	//Tampil Kategori
	default:
	echo"<h2>List Produk</h2>
		<input type=button value='Tambah Produk Baru' onClick=location.href='?mod=product&act=addproduct'>
		<table class='TableCart'>
			<tr><th>no</th><th>Nama Produk</th><th>Harga</th><th>aksi</th></tr>";
		$sql = mysql_query("SELECT * FROM product ORDER BY id DESC");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){
			echo"<tr><td>$no</td>
					<td>$r[product_name]</td>
					<td>$r[price]</td>
					<td><a href=?mod=product&act=editproduct&id=$r[id]>Edit</a>
						<a href=aksi.php?mod=product&act=hapus&id=$r[id]>Hapus</a>
					</td></tr>";
			$no++;
		}
		echo "</table>";
		break;
	//Form Add Product
	case "addproduct":
		echo"<h2>Add Product</h2>
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=product&act=input>
				<table class='TableCart'>
					<tr><td>Nama Barang</td>
						<td><input type=text name=product_name></td>
					</tr>
					<tr><td>Kategori</td><td><select name=cat>";
		$query = mysql_query("SELECT * FROM category");
			while ($t = mysql_fetch_array($query)){
				echo "<option value=$t[id]>$t[category]</option>";
				}
			echo"</select></td><td><a href=?mod=category>Add Category?</a></td>
				</tr>
				<tr><td>Harga</td><td><input type=text name=price></td></tr>
				<tr><td>Deskripsi</td><td><textarea name=deskripsi style='width: 277px; height: 67px;'></textarea></td></tr>
				<tr><td>Gambar</td><td><input type=file name='fgambar' size=40></td>
				<tr><td colspan=2>
						<input type=submit name=submit value=Simpan>
						<input type=button value=Batal onClick=self.history.back()>
					</td>
				</tr>
				</table></form>";
		break;
	//Form Edit Product
	case"editproduct":
		$edit = mysql_query("SELECT * FROM product WHERE id='$_GET[id]'");
		$d = mysql_fetch_array($edit);
	
		echo"<h2>Edit Product</h2>
			<form method=POST enctype='multipart/form-data' action='aksi.php?mod=product&act=update'>
				<input type=hidden name=id value=$d[id]>
				<table class='TableCart'>
					<tr><td>Nama Barang</td>
						<td><input onfocus=this.value='' type=text name='product_name' value='$d[product_name]'></td>
					</tr>
					<tr><td>Kategori</td><td><select name=cat>";
		$query = mysql_query("SELECT * FROM category");
			while ($t = mysql_fetch_array($query)){
				echo "<option value=$t[id]>$t[category]</option>";
				}
			echo"</select>*Pilih lagi kategorinya :)</td><td><a href=?mod=category>Add Category?</a></td>
				</tr>
				<tr><td>Harga</td><td><input onfocus=this.value='' value='$d[price]' type=text name=price></td></tr>
				<tr><td>Deskripsi</td><td><textarea name=deskripsi style='width: 277px; height: 67px;'>$d[deskripsi]</textarea></td></tr>
				<tr><td></td><td><img width=100 src='../foto/$d[link_image]' /></td></tr>
				<tr><td>Gambar</td><td><input type=file id=fgambar name=fgambar size=40></td>
				<tr><td colspan=2>
						<input type=submit name=submit value=Simpan>
						<input type=button value=Batal onClick=self.history.back()>
					</td>
				</tr>
				</table></form>";
		break;
}
?>