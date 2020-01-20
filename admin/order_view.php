<form method="POST">
	<div>
		<table class="table table-bordered">
			<thead>
			<h1><caption><b>Daftar Pesanan</b></caption></h1>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Supplier</th>
				<th>Harga Produk</th>
				<th width="100px">Jumlah</th>
				<th>Total Harga</th>
				<th width="150px">Aksi</th>
			</tr>
		</thead>
		<tbody>
		 <?php 
		    $nomor=1;
		    $totalharga=0;
		    if (isset($_SESSION['order'])){
			    foreach ($_SESSION["order"] as $key => $jumlah):
				$ambil = $koneksi->query("SELECT * FROM produk_supplier JOIN detail_produk_supplier ON produk_supplier.id_produk_supplier=detail_produk_supplier.id_produk_supplier JOIN supplier ON produk_supplier.id_supplier=supplier.id_supplier WHERE detail_produk_supplier.id_produk_supplier='$key'");
				$panggil = $ambil->fetch_assoc();
				$total = $panggil['harga_produk']*$jumlah;
				$id_s = $panggil['id_supplier'];
				?>

			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $panggil['nama_produk']; ?></td>
				<td><?php echo $panggil['nama_supplier']; ?></td>
				<td>Rp. <?php echo number_format($panggil['harga_produk']); ?></td>
				<td><input type="number" class="form-control" min="1" name="jumlah" value="<?php echo number_format($jumlah); ?>" required></td>
				<td>Rp. <?php echo number_format($total); ?></td>
				<td><b><a href="order_cart.php?act=plus&amp;id_produk_supplier=<?php echo $key; ?>&amp;ref=index.php?halaman=order_produk" class="btn btn-xs btn-primary" style="width:25px; height:25px">+</a></b>
				 | <a href="order_cart.php?act=min&amp;id_produk_supplier=<?php echo $key; ?>&amp;ref=index.php?halaman=order_produk" class="btn btn-xs btn-warning" style="width:25px; height:25px">-</a> | <a href="order_cart.php?act=del&amp;id_produk_supplier=<?php echo $key; ?>&amp;ref=index.php?halaman=order_produk" class="btn btn-xs btn-danger" style="width:50px; height:25px">Hapus</a></td>
			</tr>
				<?php $nomor++; ?>  
				<?php $totalharga+=$total; ?>
			<?php endforeach ?>
			<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<b>
					<td colspan="5"><b>Total</b></td>
					<td><b>Rp. <?php echo number_format($totalharga); ?></b></td>
					</b>
				</tr>
			</tfoot>
		</table>
	</div>
	<button class="btn btn-primary" name="proses">Pesan</button>
</form>
