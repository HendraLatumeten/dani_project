<h2 class="text-center">Tambah Jadwal</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Tanggal</label>
		<input type="date" class="form-control" name="tanggal" required="">
	</div>	
	<div class="form-grup">
		<label>Jam</label>
		<input type="time" class="form-control" name="jam" required="">
	</div>
	<div class="form-grup">
		<label>Ruangan</label>
		<select name="ruangan" class="form-control">
                        <option>--Pilih--</option>
                        <option value="Ruangan A">Ruangan A</option>
                        <option value="Ruangan B">Ruangan B</option>
                        <option value="Ruangan C">Ruangan C</option>
                        <option value="Ruangan D" >Ruangan D</option>
         </select>        
	</div>	
	<br>
	<button class="btn btn-primary" name="simpan">Simpan</button>
</form>
<?php
	if (isset($_POST['simpan'])) {
   		$tanggal = $_POST['tanggal'];
   		$jam = $_POST['jam'];
   		$ruangan = $_POST['ruangan'];

		$koneksi->query("INSERT tb_jdwl_ujian (id_jdwl_ujian,id_calon_siswa,tanggal
			,jam,ruangan) VALUES ('','$tanggal','$jam','$ruangan')");
			
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jadwal_ujian'>";
		echo "<div class='alert alert-info'>Data Berhasil Di Tambah</div>";
	}
?>