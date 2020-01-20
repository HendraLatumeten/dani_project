<h2 class="text-center">Data Customer</h2>

<table id="tabel1" class="display table table-bordered" width="1500px" >
	<thead>
		<tr>
			<th title="urutkan berdasarkan nomor">NO</th>
			<th width="80px" title="urutkan berdasarkan nama">ID customer</th>
			<th title="urutkan berdasarkan nama">Nama</th>
			<th title="urutkan berdasarkan email">Email</th>
			<th title="urutkan berdasarkan alamat">Alamat</th>
			<th title="urutkan berdasarkan nomor telpon">No Telp</th>
			<th title="urutkan berdasarkan pekerjaan">Pekerjaan</th>
			<th width="40px">Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM customer"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['id_customer']; ?></td>
			<td><?php echo $pecah['nama_customer']; ?></td>
			<td><?php echo $pecah['email_customer']; ?></td>
			<td><?php echo $pecah['alamat_customer']; ?></td>
			<td><?php echo $pecah['tlp_customer']; ?></td>
			<td><?php echo $pecah['pekerjaan']; ?></td>
			<td>
				<a href="index.php?halaman=detail_customer&id=<?php echo $pecah['id_customer']; ?>" >Detail</a>
				<a href="index.php?halaman=hapus_customer&id=<?php echo $pecah['id_customer']; ?>" onclick="return confirm('yakin ingin hapus data?')">Hapus</a>
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