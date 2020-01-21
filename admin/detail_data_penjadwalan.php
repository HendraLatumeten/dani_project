<?php 
	$ambil = $koneksi->query("SELECT * FROM tb_jdwl_ujian WHERE id_jdwl_ujian='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
?>
<br>
<h3 class="text-center">Detail Jadwal Ujian</h3>

	<table class="table">
		<!-- <tr>
			<td>No</td>
			<td>:</td>
			<td><?php echo $pecah['No'] ?></td>
		</tr> -->
		<tr>
			<td>ID Jadwal</td>
			<td>:</td>
			<td><?php echo $pecah['id_jdwl_ujian'] ?></td>
		</tr>
		<tr>
			<td>ID Calon Siswa</td>
			<td>:</td>
			<td><?php echo $pecah['id_calon_siswa'] ?></td>
		</tr>
			<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php echo $pecah['tanggal'] ?></td>
		</tr>
		<tr>
			<td>Jam</td>
			<td>:</td>
			<td><?php echo $pecah['jam'] ?></td>
		</tr>
		<tr>
			<td>Ruangan</td>
			<td>:</td>
			<td><?php echo $pecah['ruangan'] ?></td>
		</tr>
<!-- 		<tr>
			<td>Aksi</td>
			<!-- <td>:</td>
			<td><?php echo $pecah['almt_asl_sklh'] ?></td> -->
		</tr> -->
	</table>
</div>
