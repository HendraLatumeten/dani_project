<h2 class="text-center">Data Hasil Ujian</h2>

<table id="tabel1" class="display table table-bordered" width="100%" >
	<thead>
		<tr>
			<th  width="10px" title="urutkan berdasarkan nomor">No</th>
			<th width="10px" title="urutkan berdasarkan nama">No Ujian</th>
			<th   width="10px" title="urutkan berdasarkan username">Nama</th>
			<th   width="10px" title="urutkan berdasarkan username">Ket</th>
			<th width="10px">Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_hasil_ujian JOIN tb_users ON tb_hasil_ujian.id_user=tb_users.id_user ORDER BY id_hasil_ujian "); ?>

	<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['no_ujian']; ?></td>
			<td><?php echo $pecah['nama_lengkap']; ?></td>
			<td>
				<?php
		if($pecah['skor'] >= 60) {
		    echo '<div class="badge badge-danger">';
		    echo "Lulus";  
		    echo"</div>";
		  }elseif ($pecah['skor'] <= 60) {
			echo '<div class="badge badge-warning">';
		    echo "Anda Diyatakan:Tidak Lulus";  
		    echo"</div>";
		 
		   
		}
				?>
				</td> 
				


			
			<td>
				<a href="index.php?halaman=detail_data_pendaftaran&id=<?php echo $pecah['id_hasil_ujian']; ?>" >|Detail|</a>
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