<h2 class="text-center">Verifikasi Data Pendaftaran </h2>

<table id="tabel1" class="display table table-bordered" width="100%" >
	<thead>
		<tr>
			<th  width="10px" title="urutkan berdasarkan nomor">NO</th>
			<th width="10px" title="urutkan berdasarkan nama">Kode Pendaftaran</th>
            <th width="10px" title="urutkan berdasarkan nama">Status</th>
	
			<th width="10px">Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_pendaftaran WHERE status  ORDER BY status = 1  "); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['no_pendaftaran']; ?></td>
            <td>
                       <?php
                 if ($pecah['status'] == 1 ){
                     echo '<div class="badge badge-dark">';
                     echo "Data Belum Terverifikasi</div>"; 
                }elseif($pecah['status'] == 2 ){
                     echo '<div class="badge badge-primary">';
                     echo "Data Terverifikasi</div>"; 
                }
                ?>
            </td>


			


			
			<td>
				
<!-- 				<a href="index.php?halaman=hapus_data_pedaftaran&id=<?php echo $pecah['no_pendaftaran']; ?>"   onclick="return confirm('yakin ingin untuk Verifikasi data ini?')"><span class="btn btn-primary">Verifikasi</span></a> -->
				<!-- <a href="index.php?halaman=hapus_data_penjual&id=<?php echo $pecah['id_penjual']; ?>"   onclick="return confirm('yakin ingin hapus data?')"><span class="btn btn-primary">Terima</span></a> -->
			  	<a href="index.php?halaman=detail_verifikasi&id=<?php echo $pecah['no_pendaftaran']; ?>" type="hidden" ><span class='btn btn-primary'>Verifikasi</span></a> 
             
                <?php 
                $no =  $pecah['no_pendaftaran'];
                 ?>
                <?php 
                    if ($pecah['status'] == 1 ){
                     // echo "<a href='index.php?halaman=detail_verifikasi&id= echo $pecah['no_pendaftaran'];' type='hidden' ><span class='btn btn-primary'>Verifikasi</span></a>";

                }elseif($pecah['status'] == 2 ){
            
                }
                 ?>
              
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
                "search":         "Kode Pendaftaran:",
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