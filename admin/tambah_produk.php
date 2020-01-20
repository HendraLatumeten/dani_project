<h2 class="text-center">Form Tambah Produk</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="nama" required="">
	</div>
	<div class="form-grup">
		<label>Kategori</label>
		<select class="form-control" name="kategori" required="">
			<option value="" selected>- Pilih Kategori -</option>
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
		<select class="form-control" name="brand" required="">
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
		<input type="number" class="form-control" name="harga_produk" required="">
	</div>
	<div class="form-grup" class="deskripsi">
		<label>Deskripsi Produk</label>
		<textarea class="form-control" name="deskripsi" rows="10" required=""></textarea>
	</div>
	<div class="form-grup">
		<label>Foto Produk</label>
		<input type="file" name="foto" class="form-control" required="">
	</div>
	<br>
	<button class="btn btn-primary" name="simpan">Simpan</button>
</form>
<?php
	if (isset($_POST['simpan'])) {
		if ($_POST[kategori]==1) {
			echo "<script>alert('harap isi kategori');</script>";
		} elseif ($_POST[brand]==1) {
			echo "<script>alert('harap isi brand');</script>";
		} elseif ($_POST[nama]=="") {
			echo "<script>alert('harap isi nama');</script>";
		} elseif ($_POST[harga_produk]=="") {
			echo "<script>alert('harap isi harga beli produk');</script>";
		} else {
			$nama = $_FILES['foto']['name'];
			$lokasi = $_FILES['foto']['tmp_name'];
			$harga_jual_produk = $_POST[harga_produk]+($_POST[harga_produk]*15/100);
			move_uploaded_file($lokasi, "../foto_produk/".$nama);
			
			$koneksi->query("INSERT INTO produk (id_porduk,nama_produk,id_brand,id_kategori,harga_produk,stok_produk,deskripsi_produk,foto_produk) VALUES (NULL,'$_POST[nama]','$_POST[brand]','$_POST[kategori]','$_POST[harga_produk]','0','$_POST[deskripsi]','$nama')");

			echo "<script>alert('Data Berhasil Ditambahkan');</script>";
			echo "<script>location='index.php?halaman=produk';</script>";
		}
	}
?>