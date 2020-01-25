<?php 
	$ambil = $koneksi->query("SELECT * FROM tb_pendaftaran WHERE no_pendaftaran='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
	
?>
<?php
    include "../koneksi.php";
        //fungsi kode otomatis

        function kdauto($tabel, $inisial){
        $struktur   = mysql_query("SELECT * FROM tb_calon_siswa");
        $field      = mysql_field_name($struktur,0);
        $panjang    = mysql_field_len($struktur,0);
        $qry  = mysql_query("SELECT max(".$field.") FROM "."tb_calon_siswa");
        $row  = mysql_fetch_array($qry);
        if ($row[0]=="") {
        $angka=0;
        }
        else {
        $angka= substr($row[0], strlen($inisial));
        }
        $angka++;
        $angka      =strval($angka);
        $tmp  ="";
        for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
        $tmp=$tmp."0";
        }
        return $inisial.$tmp.$angka;
        }
    $tampilPeg=mysql_query("SELECT * FROM tb_calon_siswa ORDER BY no_ujian");

$a= date("Y");
 ?>

<h2 class="text-center">Verifikasi Data</h2>
<table class="table">
		<tr>
			
			<td><b>NO UJIAN:<?php echo kdauto("tb_calon_siswa","",$a); ?></td>

		</tr>
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
			<td>NO UJIAN</td>
			<td><input type="text"  class="form-control" name="no" value="<?php echo kdauto("tb_calon_siswa",""); ?>"></td>
		</tr>
		
	</div>
	<div class="form-grup">
		<tr>
			<td>NAMA</td>
			<td><input type="text"  class="form-control" name="nama" value="<?php echo $pecah['nama'] ?>"></td>
		</tr>
		
	</div>

	<div class="form-grup">
		<tr>
			<td>NO DAF</td>
			<td><input type="text"  class="form-control" name="no_pendaftaran" value="<?php echo $pecah['no_pendaftaran'] ?>"></td>
		</tr>
		
	</div>
	<div>
		<td>NISN</td>
		<td><input type="text"  class="form-control" name="nisn" value="<?php echo $pecah['NISN'] ?>"></td>
	

	<div class="form-grup">
		<label>Kategori</label>
		<select class="form-control" name="jdwl_ujian" required="">
			<option value="" selected>- Pilih Ruangan -</option>
            <?php
			$ambil = $koneksi->query("SELECT * FROM tb_jdwl_ujian ORDER BY ruangan ");
			while ($pecah=$ambil->fetch_assoc()){
			?>
			<option value="<?php echo $pecah['id_jdwl_ujian']; ?>"><?php echo $pecah['ruangan']; ?></option>
			<?php
			}
			?>
        </select>
	</div>

	
	<br>

	<button class="btn btn-primary"  name="simpan">Simpan Perubahan</button>
</form>
<?php
	if (isset($_POST['simpan'])) {
		
		$kd = $_POST['no_pendaftaran'];
   		$jdwl = $_POST['jdwl_ujian'];
   		$nisn = $_POST['nisn'];
   		$nama = $_POST['nama'];
   	

<<<<<<< HEAD
        $koneksi->query("INSERT INTO tb_users SET id_session='', username='$nama', NISN='$nisn',nama_lengkap='$nama', kd_pendaftaran='$kd',id_jdwl_ujian='$jdwl',no_ujian='$_POST[no_ujian]',status='siswa', id_user=''");

		
			
		$koneksi->query("UPDATE tb_pendaftaran SET status='2' WHERE no_pendaftaran='$kd'");
=======
        $koneksi->query("INSERT INTO tb_calon_siswa SET id_calon_siswa='' ,no_pendaftaran='$np',id_jdwl_ujian='$jdwl',no_ujian='$_POST[no]',NISN='$nisn',nama='$nama',status='2'");

		$koneksi->query("UPDATE tb_pendaftaran SET status='2' WHERE no_pendaftaran='$np'");
>>>>>>> refs/remotes/origin/master



		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=Verifikasi_data'>";
		echo "<div class='alert alert-info'>Data Berhasil Di Ubah</div>";
	}
?>