<?php 
	$ambil = $koneksi->query("SELECT * FROM tb_detail_pendaftaran JOIN tb_pendaftaran ON tb_detail_pendaftaran.no_pendaftaran=tb_pendaftaran.no_pendaftaran WHERE tb_pendaftaran.no_pendaftaran='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
?>

<h2 class="text-center">Ubah Data Pendaftaran</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-grup">
		<label>NISN</label>
		<input type="text" class="form-control" name="NISN" value="<?php echo $pecah['NISN'] ?>">
	</div>
	<div class="form-grup">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama'] ?>">
	</div>
	<div>
		<label>Alamat</label>
		<textarea class="form-control" name="alamat" rows="10"><?php echo $pecah['alamat'] ?></textarea>
	</div>
	<br>
	<div class="form-group">
        <label >Jenis Kelamin</label><br>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4">
                            <label class="radio-inline">
                               
                                <input type="radio" name="jenis_kelamin" value="L" <?php if($pecah['jenis_kelamin']=='L') echo 'checked'?> >Laki-Laki
	
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                               <input type="radio" name="jenis_kelamin" value="P" <?php if($pecah['jenis_kelamin']=='P') echo 'checked'?> >Perempuan
                            </label>
                        </div>
                    </div>
                </div>
            </div>
      
       
    <br>
	<div class="form-grup">
		<label>TTL</label>
		<input type="text" class="form-control" name="TTL" value="<?php echo $pecah['TTL'] ?>">
	</div>
	<div class="form-grup">
		<label>Asal Sekolah</label>
		<input type="text" class="form-control" name="asal_sekolah" value="<?php echo $pecah['asal_sekolah'] ?>">
	</div>
	<div class="form-grup">
		<label>Alamat Sekolah</label>
		<input type="text" class="form-control" name="alamat_asl_sklh" value="<?php echo $pecah['almt_asl_sklh'] ?>">
	</div>
	<div class="form-grup">
		<label>Nama Orang Tua</label>
		<input type="text" class="form-control" name="nama_org_tua" value="<?php echo $pecah['nama_org_tua'] ?>">
	</div>
	<div class="form-grup">
		<label>Nama Wali</label>
		<input type="text" class="form-control" name="nama_wali" value="<?php echo $pecah['nama_wali'] ?>">
	</div>
	<div class="form-grup">
		<label>Agama</label>
		<!-- <input type="text" class="form-control" name="agama" value="<?php echo $pecah['agama'] ?>"> -->
		<select name="agama" class="form-control" required>
                        <option>--Pilih--</option>
                        <option value="islam" <?php if($pecah['agama'] == 'islam'){ echo 'selected'; } ?>>Islam</option>
                        <option value="kristen" <?php if($pecah['agama'] == 'kristen'){ echo 'selected'; } ?>>Kristen</option>
                        <option value="katolik" <?php if($pecah['agama'] == 'katolik'){ echo 'selected'; } ?>>Katolik</option>
                        <option value="hindu" <?php if($pecah['agama'] == 'hindu'){ echo 'selected'; } ?>>Hindu</option>
                        <option value="buddha" <?php if($pecah['agama'] == 'buddha'){ echo 'selected'; } ?>>Buddha</option>
                        <option value="konghucu" <?php if($pecah['agama'] == 'konghucu'){ echo 'selected'; } ?>>Konghucu</option>
                    </select>
	</div>

	<div>
		<label>No.Telp</label>
		<input class="form-control" type="number_format" name="no_tlp" value="<?php echo $pecah['no_tlp'] ?>">
	</div>
	<hr>
	<div>
		<label>Dokument Pelengkap:</label><br>
			<input type="checkbox" name="foto_ijazah" value="1"  <?php if($pecah['foto_ijazah'] == '1'){ echo 'checked'; } ?>>Ijazah<br>
			<input type="checkbox" name="foto" value="1" <?php if($pecah['foto'] == '1'){ echo 'checked'; } ?>>Foto 3X4 Latar Merah<br>
	</div>
	
	
	<br>
	<button class="btn btn-primary" name="simpan">Simpan Perubahan</button>
</form>
<?php
	if (isset($_POST['simpan'])) {
		
		$koneksi->query("UPDATE tb_detail_pendaftaran SET NISN='$_POST[NISN]',alamat='$_POST[alamat]',jenis_kelamin='$_POST[jenis_kelamin]',TTL='$_POST[TTL]',asal_sekolah='$_POST[asal_sekolah]',almt_asl_sklh='$_POST[alamat_asl_sklh]',nama_org_tua='$_POST[nama_org_tua]',nama_wali='$_POST[nama_wali]',agama='$_POST[agama]',no_tlp='$_POST[no_tlp]',foto_ijazah='$_POST[foto_ijazah]',foto='$_POST[foto]',ket='1' WHERE no_pendaftaran='$_GET[id]'");

		$koneksi->query("UPDATE tb_pendaftaran SET NISN='$_POST[NISN]', nama='$_POST[nama]',status='$_POST[foto_ijazah]' WHERE no_pendaftaran='$_GET[id]'");
		echo "<script>alert('Data Berhasil Diubah!');</script>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_pendaftaran'>";
		
	}
?>