<?php 
	$ambil = $koneksi->query("SELECT * FROM tb_detail_pendaftaran JOIN tb_pendaftaran ON tb_detail_pendaftaran.no_pendaftaran=tb_pendaftaran.no_pendaftaran WHERE tb_pendaftaran.no_pendaftaran='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
?>
<br>
<div><h3>Data Calon Siswa 	<?php
				 if ($pecah['ket'] ==1 ){
					 echo '<div class="badge badge-dark">';
					 echo "Data Lengkap</div>"; 
				}else if ($pecah['ket']==0 ){
					 echo '<div class="badge badge-primary">';
					 echo "Data Anda Belum Lengkap</div>"; 
				}
				?></h3>

	<table class="table">
		<tr>
			<td>NISN</td>
			<td>:</td>
			<td><?php echo $pecah['NISN'] ?></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td>:</td>
			<td><?php echo $pecah['nama'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $pecah['alamat'] ?></td>
		</tr>
			<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><?php echo $pecah['jenis_kelamin'] ?></td>
		</tr>
		<tr>
			<td>TTL</td>
			<td>:</td>
			<td><?php echo $pecah['TTL'] ?></td>
		</tr>
		<tr>
			<td>Asal Sekolah</td>
			<td>:</td>
			<td><?php echo $pecah['asal_sekolah'] ?></td>
		</tr>
		<tr>
			<td>Alamat Sekolah</td>
			<td>:</td>
			<td><?php echo $pecah['almt_asl_sklh'] ?></td>
		</tr>
		<tr>
			<td>Nama Orang Tua</td>
			<td>:</td>
			<td><?php echo $pecah['nama_org_tua'] ?></td>
		</tr>
		<tr>
			<td>Nama_Wali</td>
			<td>:</td>
			<td><?php echo $pecah['nama_wali'] ?></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>:</td>
			<td><?php echo $pecah['agama'] ?></td>
		</tr>
		<tr>
			<td>No Tlp</td>
			<td>:</td>
			<td><?php echo $pecah['no_tlp'] ?></td>
		</tr>
		<tr>
			<td>Tgl Daftar</td>
			<td>:</td>
			<td><?php echo $pecah['tgl_daftar'] ?></td>
		</tr>
	</table>
</div>
