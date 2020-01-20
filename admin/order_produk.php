<h2 class="text-center">Daftar Produk Supplier</h2>

<table id="tabel1" class="display table table-bordered">
	<thead>
		<tr>
			<th width="50px" title="urutkan berdasarkan nomor">NO</th>
			<th width="70px" title="urutkan berdasarkan nomor">Id Produk</th>
			<th title="urutkan berdasarkan nama">Nama Produk</th>
			<th title="urutkan berdasarkan nama supplier">Supplier</th>
			<th  title="urutkan berdasarkan harga">Harga</th>
			<th width="100px"><center>Aksi</center></th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk_supplier JOIN supplier ON produk_supplier.id_supplier=supplier.id_supplier JOIN detail_produk_supplier ON detail_produk_supplier.id_produk_supplier=produk_supplier.id_produk_supplier ORDER BY produk_supplier.id_produk_supplier DESC "); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['id_produk_supplier']; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['nama_supplier']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']) ;?></td>
			<td><center>
				<a href="index.php?halaman=detail_produk_supplier&id=<?php echo $pecah['id_produk_supplier']; ?>" class="btn btn-sm btn-primary" title="Lihat" >Detail</a>
			</center>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

	</tbody>
</table>


<script type="text/javascript">
    $(document).ready(function(){
     $("#tabel1").DataTable({
            "language": {
                "decimal":        "",
                "emptyTable":     "Tidak ada data yang tersedia di tabel",
                "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ baris",
                "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 baris",
                "infoFiltered":   "(difilter dari _MAX_ total baris)",
                "infoPostFix":    "",
                "thousands":      ".",
                "lengthMenu":     "Menampilkan _MENU_ baris",
                "loadingRecords": "memuat...",
                "processing":     "Sedang di proses...",
                "search":         "Pencarian:",
                "zeroRecords":    "Arsip tidak ditemukan",
                "paginate": {
                    "first":      "Pertama",
                    "last":       "Terakhir",
                    "next":       "lanjut",
                    "previous":   "kembali"
                },
                "aria": {
                    "sortAscending":  ": aktifkan urutan kolom ascending",
                    "sortDescending": ": aktifkan urutan kolom descending"
                }
            }
         });                       

    });
</script>
<br>

<?php
include 'order_view.php';
 ?>



 <?php 

if (isset($_POST["proses"]))

{	
	$tanggal = date('Y-m-d');
	$id_admin = $_SESSION['admin']['id_admin'];
	$status = "Created";

			foreach ($_SESSION["order"] as $key => $jumlah){

				$ambil = $koneksi->query("SELECT * FROM detail_produk_supplier JOIN  brand ON detail_produk_supplier.id_brand=brand.id_brand WHERE id_produk_supplier='$key'");
				$panggil = $ambil->fetch_assoc();

				$nama = $panggil['nama_produk'];
				$harga = $panggil['harga_produk'];
				$subharga = $panggil['harga_produk']*$jumlah;

				$supp = $koneksi->query("SELECT * FROM produk_supplier JOIN supplier ON produk_supplier.id_supplier=supplier.id_supplier WHERE id_produk_supplier='$key'");
				$s = $supp->fetch_assoc();

				$id_supplier = $s['id_supplier'];

				$koneksi->query("INSERT INTO order_produk (tanggal_order,id_supplier,id_admin,status_order) VALUES ('$tanggal','$id_supplier','$id_admin','$status')");
			
			$nofaktur = $koneksi->insert_id;

				$koneksi->query("INSERT INTO detail_order_produk (id_order,id_produk_supplier,jumlah,total) VALUES ('$nofaktur','$key','$jumlah','$subharga')");
			}
		unset($_SESSION["order"]);

		echo "<script>alert('Order Sukses');</script>";
		echo "<script>location='index.php?halaman=riwayat_order';</script>";
	
}
?>
