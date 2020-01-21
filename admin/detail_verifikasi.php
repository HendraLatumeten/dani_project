<?php 
	$ambil = $koneksi->query("SELECT * FROM tb_pendaftaran WHERE no_pendaftaran='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
?>

<h2 class="text-center">Verifikasi Data</h2>
<table class="table">
	<tr>
			<td><b>USERNAME:<?php echo $pecah['nama'] ?></b></td>
			
			
		</tr>
		<tr>
			<td><b>PASSWORD:<?php echo $pecah['NISN'] ?></b></td>
			
			
		</tr>
		
	
		
	</table>
	<hr>
<form method="POST" enctype="multipart/form-data">
	<div class="form-grup">
		<tr>
			
			<td><input type="hidden" disabled class="form-control" name="nama_toko" value="<?php echo $pecah['nama'] ?>"></td>
		</tr>
		
	</div>
	<div>
		
		<td><input type="hidden" disabled class="form-control" name="nama_toko" value="<?php echo $pecah['NISN'] ?>"></td>
	
	</div>
	<div>
		<label>RUANGAN</label>
		<select class="form-control">
			<option>--PILIH--</option>
			<option>RUANGAN A</option>
			<option>RUANGAN B</option>
			<option>RUANGAN C</option>
			
		</select>
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