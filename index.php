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
					<h1 class="Judul">Produk terbaru</h1>
					<?php
						$sql = mysql_query("SELECT * FROM product ORDER BY id DESC") or die ("Query gagal dengan error: ".mysql_error());
						while($data=mysql_fetch_array($sql)){ ?>
						
					<div class="produk">
						<a href="product.php?id=<?php echo $data['id']; ?>">
							<img title="<?php echo $data['product_name']; ?>" class="FotoProduk" src="foto/<?php echo $data['image']; ?>" height="110px" />
						</a>
						<br class="clearfloat" />
						<div class="KotakKet">
						<a class="pesanprod" href="input.php?input=add&id=<?php echo $data['id']; ?>">Pesan</a>
						<a class="detprod" href="product.php?id=<?php echo $data['id']; ?>">Detail</a>
						</div>
					</div>
					<?php } ?>
				</div>
<?php include "bottom.php"; ?>
	