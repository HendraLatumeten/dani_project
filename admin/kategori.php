<?php 
include 'conn.php';
?>
<h2 class="text-center">Data Kategori</h2>

<table id="tabel1" class="display table table-bordered">
	<thead>
		<tr>
			<th title="urutkan berdasarkan nomor">NO</th>
			<th title="urutkan berdasarkan nomor">Id Kategori</th>
			<th title="urutkan berdasarkan nama">Kategori</th>
			<th><center>Aksi</center></th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil =$koneksi->query ("SELECT * FROM kategori where id_kategori "); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['id_kategori']; ?></td>
			<td><?php echo $pecah['kategori']; ?></td>
	
			<td><center>
				<a href="index.php?halaman=hapus_kategori&id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-sm btn-danger" title="Hapus"  onclick="return confirm('yakin ingin hapus data?')">Hapus</a>
			</center>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

	</tbody>
</table>

<a href="index.php?halaman=tambah_kategori" title="Tambah data kategori" class="btn btn-primary">Tambah Kategori</a>

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