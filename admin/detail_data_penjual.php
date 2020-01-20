<?php 
	$ambil = $koneksi->query("SELECT * FROM penjual WHERE id_penjual='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
?>
<br>
<div>Data Penjual
	<table class="table">
		<tr>
			<td>Nama Toko</td>
			<td>:</td>
			<td><?php echo $pecah['nama_toko'] ?></td>
		</tr>
		<tr>
			<td>Nama Penjual</td>
			<td>:</td>
			<td><?php echo $pecah['username'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo $pecah['email'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $pecah['alamat'] ?></td>
		</tr>
		<tr>
			<td>Nomor Telpon</td>
			<td>:</td>
			<td><?php echo $pecah['no_tlp'] ?></td>
		<tr>
		</tr>	
			<td>Nomor Rekening</td>
			<td>:</td>
			<td><?php echo $pecah['norek_atasnama'] ?></td>
		</tr>
	</table>
</div>
