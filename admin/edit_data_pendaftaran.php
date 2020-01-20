<?php 
	$ambil = $koneksi->query("SELECT * FROM tb_detail_pendaftaran JOIN tb_pendaftaran ON tb_detail_pendaftaran.no_pendaftaran=tb_pendaftaran.no_pendaftaran WHERE tb_pendaftaran.no_pendaftaran='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
?>

<h2 class="text-center">Ubah Data Pendaftaran</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama_toko" value="<?php echo $pecah['nama'] ?>">
	</div>
	<div>
		<label>Alamat</label>
		<textarea class="form-control" name="alamat" rows="10"><?php echo $pecah['alamat'] ?></textarea>
	</div>
	<div>
		<label>Email</label>
		<input class="form-control" type="email" name="email" value="<?php echo $pecah['email'] ?>">
	</div>
	<div>
		<label>No Telp</label>
		<input class="form-control" type="number_format" name="no_tlp" value="<?php echo $pecah['no_tlp'] ?>">
	</div>
	<br>
	<button class="btn btn-primary" name="simpan">Simpan Perubahan</button>
</form>
<?php
	if (isset($_POST['simpan'])) {
		
		$koneksi->query("UPDATE penjual SET nama_toko='$_POST[nama_toko]',email='$_POST[email]',no_tlp='$_POST[no_tlp]',alamat='$_POST[alamat]' WHERE id_penjual='$_GET[id]'");

		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_penjual'>";
		echo "<div class='alert alert-info'>Data Berhasil Di Ubah</div>";
	}
?>