<?php 
$ambil1 = $koneksi->query("SELECT*FROM order_produk JOIN supplier ON order_produk.id_supplier=supplier.id_supplier JOIN admin ON order_produk.id_admin=admin.id_admin JOIN detail_order_produk ON order_produk.id_order=detail_order_produk.id_order WHERE order_produk.id_order='$_GET[id]'");
$detail = $ambil1->fetch_assoc();
$id_pro = $detail['id_produk_supplier'];

$i = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_pro'");
$ii = $i->fetch_assoc();

?>
<table class="table">
	<tr>
		<td>Nomor Faktur </td>
		<td> :</td>
		<td>ORDER<?php echo $detail['id_order'] ?></td>
	</tr>
	<tr>
		<td>Tanggal Faktur </td>
		<td> :</td>
		<td><?php echo $detail['tanggal_order'] ?></td>
	</tr>
	<tr>
		<td>Nama Supplier </td>
		<td> :</td>
		<td><?php echo $detail['nama_supplier'] ?></td>
	</tr>
	<tr>
		<td>Alamat Supplier </td>
		<td> :</td>
		<td><?php echo $detail['alamat_supplier'] ?></td>
	</tr>
	<tr>
		<td>Admin </td>
		<td> :</td>
		<td><?php echo $detail['fullname']; ?></td>
	</tr>
	<?php 
	if ($detail['status_order']=="On The Way") {
		$adaresi=$detail['resi'];
		echo"<tr>
				<td>Resi </td>
				<td> :</td>
				<td>$adaresi</td>
			 </tr>";
	} elseif ($detail['status_order']=="Finish") {
		$adaresi=$detail['resi'];
		echo"<tr>
				<td>Resi </td>
				<td> :</td>
				<td>$adaresi</td>
			 </tr>";
	}; ?>
</table>
<br>

<form method="POST">
<table class="table table-bordered">
	<caption class="text-center">Detail order</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Brand</th>
			<th>Kategori</th>
			<th>Jumlah Produk</th>
			<th>Harga Beli</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>

	<?php 
		$nomor=1;
		$jumlah=0; 
	?>

	<?php
	$ambil = $koneksi->query("SELECT * FROM detail_order_produk JOIN produk ON detail_order_produk.id_produk_supplier=produk.id_produk WHERE detail_order_produk.id_order='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

	?>

	<?php 
		$ambil1=$koneksi->query("SELECT * FROM detail_order_produk JOIN detail_produk_supplier ON detail_order_produk.id_produk_supplier=detail_produk_supplier.id_produk_supplier JOIN produk_supplier ON detail_order_produk.id_produk_supplier=produk_supplier.id_produk_supplier JOIN brand on detail_produk_supplier.id_brand=brand.id_brand JOIN kategori ON detail_produk_supplier.id_kategori=kategori.id_kategori WHERE detail_order_produk.id_order='$_GET[id]'");
		while ($pecah1=$ambil1->fetch_assoc()) {
		$jumlah=$jumlah+($pecah1['jumlah']*$pecah1['harga_produk']);
	?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah1['nama_produk']; ?></td>
			<td><?php echo $pecah1['nama_brand']?></td>
			<td><?php echo $pecah1['kategori']?></td>
			<td><?php echo $pecah1['jumlah']; ?></td>
			<td>Rp. <?php echo number_format($pecah1['harga_produk']); ?></td>
			<td>Rp. <?php echo number_format($pecah1['jumlah']*$pecah1['harga_produk']); ?></td>
		</tr>
	<?php $nomor++; ?>
	<?php } ?>
		<tr>
			<td colspan="6"><h5><b>TOTAL</b></h5></td>
			<td><b>Rp. <?php echo number_format($jumlah); ?></b></td>
		</tr>
	</tbody>
</table>

<?php
if ($detail['status_order']=="On The Way") {
	echo "<input type='submit' name='process' class='btn btn-primary' value='Barang Sudah di Terima'>";

} ?>

</form>

<?php 

if (isset($_POST['process'])) {

	$tambahstok = $pecah['stok_produk']+$pecah['jumlah'];
	$id_produk = $pecah['id_produk'];

	$upload = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
	$valid = $upload->num_rows;
	if ($valid==1) 
	{
		$koneksi->query("UPDATE produk SET stok_produk = '$tambahstok' WHERE id_produk='$id_produk'");
 		$koneksi->query("UPDATE order_produk SET status_order = 'Finish' WHERE id_order='$_GET[id]'");
		echo "<script>alert('Pembelian Sukses');</script>";
		echo "<script>location='index.php?halaman=riwayat_order';</script>";
	}else{

		$ambil=$koneksi->query("SELECT * FROM detail_order_produk JOIN detail_produk_supplier ON detail_order_produk.id_produk_supplier=detail_produk_supplier.id_produk_supplier JOIN produk_supplier ON detail_order_produk.id_produk_supplier=produk_supplier.id_produk_supplier JOIN brand on detail_produk_supplier.id_brand=brand.id_brand JOIN kategori ON detail_produk_supplier.id_kategori=kategori.id_kategori WHERE detail_order_produk.id_order='$_GET[id]'");
		while ($pecah=$ambil->fetch_assoc()){

		$id_produk = $pecah['id_produk_supplier'];
		$nama_produk = $pecah['nama_produk'];
		$id_brand = $pecah['id_brand'];
		$id_kategori = $pecah['id_kategori'];
		$harga_produk = $pecah['harga_produk'];
		$stok_produk = $pecah['jumlah'];
		$deskripsi_produk = $pecah['deskripsi_produk'];
		$foto_produk = $pecah['foto_produk'];
		$harga_jual_produk = $harga_produk+($harga_produk*15/100);


		$koneksi->query("INSERT INTO produk (id_produk,nama_produk,id_brand,id_kategori,harga_produk,stok_produk,deskripsi_produk,foto_produk) VALUES('$id_produk','$nama_produk','$id_brand','$id_kategori','$harga_jual_produk','$stok_produk','$deskripsi_produk','$foto_produk') ");

		$koneksi->query("UPDATE order_produk SET status_order = 'Finish' WHERE id_order='$_GET[id]'");
		echo "<script>alert('Pembelian Sukses');</script>";
		echo "<script>location='index.php?halaman=riwayat_order';</script>";
	}
}

} ?>