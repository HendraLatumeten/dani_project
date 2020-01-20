<?php 
	$jsArray = "var data = new Array();\n"; 

	$ambil = $koneksi->query("SELECT * FROM produk JOIN brand ON produk.id_brand=brand.id_brand JOIN supplier ON supplier.id_brand=brand.id_brand ORDER BY id_produk ");

	$ambilfaktur = $koneksi->query("SELECT * FROM `order_produk` ORDER BY `order_produk`.`id_order` ASC");

	$nofaktur = 1+$ambilfaktur->num_rows;

?>

<h2 class="text-center">Form Order Produk</h2>
<br>
<form method="POST">
	<div>
		<table class="table">
			<caption>Header</caption>
			<tr>
				<td width="250px">No Faktur</td>
				<td>
					<?php
					echo "ORDER",$nofaktur; ?>
				</td>
			</tr>
			<tr>
				<td width="250px">Nama Produk</td>
				<td>
				<select class="form-control" name="id_produk" id="produk" required="" onchange="changeValue(this.value)" >
					<option value="" selected>- Pilih Produk -</option>
						<?php
						while ($pecah=$ambil->fetch_assoc()){
						?>
						<option value="<?php echo $pecah["id_produk"]?>"> <?php echo $pecah["nama_produk"]?> </option>
		                <?php $jsArray .= "data['" . $pecah['id_produk'] . "'] = {id_supplier:'" .addslashes($pecah['nama_supplier']) . "',harga_produk:'" .addslashes($pecah['harga_produk']). "'};\n"; } ?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Supplier </td>
				<td>			
				<input type="text" name="supplier" id="supplier" class="form-control" readonly="" value="">
				</td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" name="harga_produk" id="harga_produk"class="form-control" readonly="" value="">
				</td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="number" name="jumlah" class="form-control" min="1">
				</td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><?php echo date('Y-m-d'); ?></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
	</div>
	<script type="text/javascript">
    <?php echo $jsArray; ?>
    function changeValue(id_produk) {
      document.getElementById("supplier").value = data[id_produk].id_supplier;
      document.getElementById("harga_produk").value = data[id_produk].harga_produk;
    };
    </script>
	<br>
</form>

<form method="POST">
	<div>
		<table class="table table-bordered">
			<caption>Detail</caption>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Nama Supplier</th>
				<th>Harga Produk</th>
				<th>Jumlah</th>
				<th>Total Harga</th>
			</tr>
			<?php 
			if (isset($_POST["tambah"]))
                {

                	$id_produk = $_POST["id_produk"];
					$nama_supplier = $_POST["supplier"];
					$harga_produk = $_POST["harga_produk"];
					$jumlah = $_POST["jumlah"];

                	$panggil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                	$arrayproduk = $panggil->fetch_assoc();
                	$nama_produk = $arrayproduk["nama_produk"];

                	$call = $koneksi->query("SELECT * FROM supplier WHERE nama_supplier='$nama_supplier'");
                	$arraysupplier = $call->fetch_assoc();
                	$id_supplier = $arraysupplier["id_supplier"];

                	
					$total = $harga_produk*$jumlah;

                    $_SESSION["order"][$id_produk] = $jumlah;
                    $_SESSION["supplier"][$id_supplier]= $nama_supplier;
                    
                    echo "<script>alert('Produk Berhasil Ditambahkan ');</script>";
                }
                ?>
			<?php $nomor=1; ?>
			<?php 
				if(isset($_POST['tambah'])) {
					if ($_POST["id_produk"]=="") {
						echo "<script>alert('harap isi produk');</script>";
					} elseif ($_POST["jumlah"]=="") {
						echo "<script>alert('harap isi jumlah');</script>";
					} else {

					echo "<tr>
					<td>$nomor</td>
					<td>$nama_produk</td>
					<td>$nama_supplier</td>
					<td>$harga_produk</td>
					<td>$jumlah</td>
					<td>$total</td>";
				}
			}
			?>
			<?php $nomor++; ?>
		</table>
	</div>
	<button class="btn btn-primary" name="proses">Pesan</button>
</form>

<?php 

if (isset($_POST["proses"]))
{	
	$tanggal = date('Y-m-d');
	$jumlah = $_POST['jumlah'];
	$id_admin = $_SESSION['admin']['id_admin'];
	$supplier = $_SESSION["supplier"][$id_supplier];
	$total_order = $pecah['harga_produk']*$jumlah;
	$status = "Created";

		$koneksi->query("INSERT INTO order_produk (id_order,tgl_order,id_supplier,id_admin,status_order) VALUES ('$nofaktur','$tanggal','$supplier','$id_admin','$status') ");

		$koneksi->query("INSERT INTO detail_order_produk (id_order,id_produk,jumlah_order,total_order) VALUES ('$nofaktur','$id_produk','$jumlah','$total_order') ");

		unset($_SESSION["order"]);
		unset($_SESSION["supplier"]);

		echo "<script>alert('Order Sukses');</script>";
		echo "<script>location='index.php?halaman=pembelian';</script>";
	
}
?>

<pre><?php print_r($_SESSION['order'])?></pre>
<pre><?php print_r($_SESSION['admin'])?></pre>
<pre><?php print_r($_SESSION['supplier'])?></pre>