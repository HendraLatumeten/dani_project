<?php 
	$ambil = $koneksi->query("SELECT * FROM customer WHERE id_customer='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
?>
<br>
<div>Data Customer
	<table class="table">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $pecah['nama_customer'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo $pecah['email_customer'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $pecah['alamat_customer'] ?></td>
		</tr>
		<tr>
			<td>Nomor Telpon</td>
			<td>:</td>
			<td><?php echo $pecah['tlp_customer'] ?></td>
		</tr>
	</table>
</div>
