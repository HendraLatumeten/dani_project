<h2>Selamat Datang Admin</h2>
<br><br>

<table id="tabel1" class="display table table-bordered">
	<thead>
		<tr>
			<th title="urutkan berdasarkan nomor">No</th>
			<th title="urutkan berdasarkan nomor">Id Admin</th>
			<th title="urutkan berdasarkan nomor">Nama</th>
			<th title="urutkan berdasarkan nama">Email</th>
			
			<th><center>Aksi</center></th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_admin"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['id_admin']; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			
			<td><center>
			<a href="index.php?halaman=ubah_admin&id=<?php echo $pecah['id_admin']; ?>" >Edit</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

	</tbody>
</table>

