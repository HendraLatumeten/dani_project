<?php 
	$ambil = $koneksi->query("SELECT * FROM tb_jdwl_ujian WHERE id_jdwl_ujian='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
?>

<h2 class="text-center">Edit Jadwal Ujian</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-grup">
		<label>ID Jadwal</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['id_jdwl_ujian'] ?>">
	</div>
	<!-- <div>
		<label>ID Calon Siswa</label>
		<textarea class="form-control" name="alamat" rows="10"><?php echo $pecah['id_calon_siswa'] ?></textarea>
	</div> -->
	<div>
		<label>Tanggal</label>
		<input class="form-control" type="date" name="tanggal" value="<?php echo $pecah['tanggal'] ?>">
	</div>
	<div>
		<label>Jam</label>
		<input class="form-control" type="number_format" name="jam" value="<?php echo $pecah['jam'] ?>">
	</div>
	<div class="form-grup">
		<label>Ruangan</label>
		<!-- <input type="text" class="form-control" name="agama" value="<?php echo $pecah['agama'] ?>"> -->
		<select name="ruangan" class="form-control" required>
                        <option>--Pilih--</option>
                        <option value="Ruangan A" <?php if($pecah['ruangan'] == 'Ruangan A'){ echo 'selected'; } ?>>Ruangan A</option>
                        <option value="Ruangan B" <?php if($pecah['ruangan'] == 'Ruangan B'){ echo 'selected'; } ?>>Ruangan B</option>
                        <option value="Ruangan C" <?php if($pecah['ruangan'] == 'Ruangan C'){ echo 'selected'; } ?>>Ruangan C</option>
                        <option value="Ruangan D" <?php if($pecah['ruangan'] == 'Ruangan D'){ echo 'selected'; } ?>>Ruangan D</option>
                    </select>
	</div>
	<br>
	<button class="btn btn-primary" name="simpan">Simpan Perubahan</button>
</form>
<?php
	if (isset($_POST['simpan'])) {
		
		$koneksi->query("UPDATE tb_jdwl_ujian SET tanggal='$_POST[tanggal]',jam='$_POST[jam]',ruangan='$_POST[ruangan]' WHERE id_jdwl_ujian='$_GET[id]'");

		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jadwal_ujian'>";
		echo "<div class='alert alert-info'>Data Berhasil Di Ubah</div>";
	}
?>