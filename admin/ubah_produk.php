<?php 
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
?>

<h2 class="text-center">Form Ubah Produk</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="nama_produk" value="<?php echo $pecah['nama_produk'] ?>">
	</div>
	<div class="form-grup">
		<label>Kategori</label>
		<select class="form-control" name="kategori_produk" value="<?php echo $pecah['id_kategori'] ?>">
			<option value="" >- Pilih Kategori -</option>
            <?php
			$ambil = $koneksi->query("SELECT * FROM kategori ORDER BY id_kategori ");
			while ($pecah=$ambil->fetch_assoc()){
			?>
			<option value="<?php echo $pecah['id_kategori']; ?>"><?php echo $pecah['kategori']; ?></option>
			<?php
			}
			?>
		</select>
	</div>
	<div class="form-grup">
		<label>Brand</label>
		<select class="form-control" name="brand_produk" required="" value="<?php echo $pecah['brand_produk'] ?>">
			<option value="" selected>- Pilih Brand -</option>
            <?php
			$ambil = $koneksi->query("SELECT * FROM brand ORDER BY id_brand ");
			while ($pecah=$ambil->fetch_assoc()){
			?>
			<option value="<?php echo $pecah['id_brand']; ?>"><?php echo $pecah['nama_brand']; ?></option>
			<?php
			}
			?>
        </select>
	</div>
	<div class="form-grup">
		<label>Harga Beli (Rp)</label>
		<input type="number" class="form-control" name="harga_produk" value="<?php echo $pecah['harga_produk'] ?>">
	</div>
	<div class="form-grup">
		<br>
		<img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="100">
	</div>
	<div>
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-grup" class="deskripsi">
		<label>Deskripsi Produk</label>
		<textarea class="form-control" name="deskripsi_produk" rows="10">
			<?php echo $pecah['deskripsi_produk'] ?>
		</textarea>
	</div>
	<br>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php
	if (isset($_POST['ubah'])) {
		$namafoto = $_FILES['foto']['name'];
		$deskripsi = $_POST['deskripsi_produk'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		$harga_jual_produk = $_POST[harga_beli]+($_POST[harga_beli]*20/100);
		
		if (!empty($lokasifoto)) {

			move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");
		
			$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama_produk]',kategori_produk='$_POST[kategori_produk]',brand_produk='$_POST[brand_produk]',harga_produk='$_POST[harga_produk]',foto_produk='$namafoto',deskripsi_produk='$deskripsi' WHERE id_produk='$_GET[id]'");
			
		} else {

			$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama_produk]',kategori_produk='$_POST[kategori_produk]',brand_produk='$_POST[brand_produk]',harga_produk='$_POST[harga_produk]',deskripsi_produk='$_POST[deskripsi_produk]' WHERE id_produk='$_GET[id]'");
		}

		echo "<script>alert('Produk Telah Diperbarui');</script>";
		echo "<script>location='index.php?halaman=produk';</script>";
	}
?>