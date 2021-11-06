<?php
switch($_GET[act]){
	//Tampil Kategori
	default:
	echo"<h1 class='Judul'>List Category</h1>
		<input type=button value=Tambah kategori onclick=location.href='?mod=category&act=addkategori'>
		<table class='TableCart'>
		<tr><th>no</th><th>nama kategori</th><th>aksi</th></tr>"; 
	$sql = mysql_query("SELECT * FROM category ORDER BY id DESC");
	$no = 1;
	while ($r=mysql_fetch_array($sql)){
		echo"<tr><td>$no</td>
			<td>$r[category]</td>
			<td><a href=?mod=category&act=editkategori&id=$r[id]>Edit</a>
				<a href=aksi.php?mod=category&act=hapus&id=$r[id]>Hapus</a>
			</td>
			</tr>";
		$no++;
	}
	echo "</table>";
	break;
	
	//Form Add Kategori
	case "addkategori":
		echo"<h2>Tambah Kategori</h2>
			<form method=POST action=aksi.php?mod=category&act=input>
			<table>
				<tr><td>Nama Kategori</td>
					<td>:<input type=text name=nama_kategori></td>
				</tr>
				<tr>
					<td colspan=2>
						<input type=submit name=submit value=Simpan>
						<input type=button value=Batal onClick=self.history.back()>
					</td>
				</tr>
			</table></form>";
	break;
	
	//Form Edit Category
	case"editkategori":
	$edit = mysql_query("SELECT * FROM category WHERE id='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	
	echo"<h2>Edit Kategori</h2>
		<form method=POST action=aksi.php?mod=category&act=update>
			<input type=hidden name=id value=$r[id]>
			<table>
				<tr><td>Nama Kategori</td>
					<td>: <input type=text name=nama_kategori value='$r[category]'></td>
				</tr>
				<tr><td colspan=2><input type=submit value=Update>
								  <input type=button value=Batal onClick=self.history.back()></td>
				</tr>
			</table>
		</form>";
	break;
}
?>