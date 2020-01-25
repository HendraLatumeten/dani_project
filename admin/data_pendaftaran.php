<h2 class="text-center">Data Pendaftaran Calon Siswa</h2>

<table id="tabel1" class="display table table-bordered" width="100%" >
	<thead>
		<tr>
			<th  width="10px" title="urutkan berdasarkan nomor">No</th>
			<th width="10px" title="urutkan berdasarkan nama">Kode Pendaftaran</th>
			<th   width="10px" title="urutkan berdasarkan username">NISN</th>
			<th   width="10px" title="urutkan berdasarkan username">Nama</th>
			<th   width="10px" title="urutkan berdasarkan username">Ket</th>
			<th width="10px">Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_pendaftaran JOIN tb_detail_pendaftaran ON tb_pendaftaran.no_pendaftaran=tb_detail_pendaftaran.no_pendaftaran ORDER BY foto_ijazah = null DESC"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['no_pendaftaran']; ?></td>
			<td><?php echo $pecah['NISN']; ?></td>
			<td><?php echo $pecah['nama']; ?></td>

			<td>
				<?php
				 if ($pecah['foto_ijazah'] ==1 && $pecah['foto'] ==1 ){
					 echo '<div class="badge badge-dark">';
					 echo "Data Lengkap</div>"; 
				}else if ($pecah['foto_ijazah'] ==1 || $pecah['foto'] ==1 ){
					 echo '<div class="badge badge-primary">';
					 echo "Data Belum Lengkap</div>"; 
				}else if ($pecah['foto_ijazah'] ==0 && $pecah['foto'] ==0 ){
					 echo '<div class="badge badge-primary">';
					 echo "Harap Lengkapi Data</div>"; 
				}
				?>
				</td> 
				


			
			<td>
				<a href="index.php?halaman=detail_data_pendaftaran&id=<?php echo $pecah['no_pendaftaran']; ?>" >|Detail|</a>
				<a href="index.php?halaman=edit_data_pendaftaran&id=<?php echo $pecah['no_pendaftaran']; ?>" >Edit|</a>
				<a href="index.php?halaman=hapus_data_pedaftaran&id=<?php echo $pecah['no_pendaftaran']; ?>"   onclick="return confirm('yakin ingin hapus data?')">Hapus|</a>
				<!-- <a href="index.php?halaman=hapus_data_penjual&id=<?php echo $pecah['id_penjual']; ?>"   onclick="return confirm('yakin ingin hapus data?')"><span class="btn btn-primary">Terima</span></a> -->
				
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