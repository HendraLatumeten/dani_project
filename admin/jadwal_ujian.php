<h2 class="text-center">Jadwal Ujian </h2>

<table id="tabel1" class="display table table-bordered" width="100%" >
	<thead>
		<tr>
			<th  width="10px" title="urutkan berdasarkan nomor">NO</th>
			<th width="10px" title="urutkan berdasarkan nama">ID JADWAL</th>

            <th width="10px" title="urutkan berdasarkan nama">TANGGAL</th>

            <th width="10px" title="urutkan berdasarkan waktu">JAM</th>

            <th width="10px" title="urutkan berdasarkan nama">RUANGAN</th>
	
			<th width="10px">Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_jdwl_ujian  "); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['id_jdwl_ujian']; ?></td>
            <td><?php echo $pecah['tanggal']; ?></td>
            <td><?php echo $pecah['jam']; ?></td>
            <td><?php echo $pecah['ruangan']; ?></td>
			<td>
				
				<a href="index.php?halaman=detail_data_penjadwalan&id=<?php echo $pecah['id_jdwl_ujian']; ?>" >Detail</a>
                <a href="index.php?halaman=edit_data_penjadwalan&id=<?php echo $pecah['id_jdwl_ujian']; ?>" >Edit</a>
                <a href="index.php?halaman=hapus_data_penjadwalan&id=<?php echo $pecah['id_jdwl_ujian']; ?>"   onclick="return confirm('yakin ingin hapus data?')">Hapus</a>
				
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

<a href="index.php?halaman=tambah_jadwal" title="Tambah Jadwal" class="btn btn-primary">Tambah Jadwal</a>

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
                "search":         "Cari Kode Pendaftaran:",
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