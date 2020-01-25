  <?php
include "config/koneksi.php";
  // Tampil Menu Utama Khusus Untuk Level User Admin.

  

//Tampilkan Data Hasil Test 
$id_kategori='1';
$detail=mysqli_query($konek,"SELECT * FROM tabel_soal, jawaban, users WHERE jawaban.id_user=users.id_user   ORDER BY jawaban.id_soal");		
	echo "<table class='table table-bordered'><thead class='thead-inverse'>
		 <tr>
          <th>No</th>
		  <th>Pertanyaan</th>
		  <th>Jawaban Peserta</th>
		  <th>Jawaban Benar</th></tr>
		  </thead><tbody>";
	$no=1;
    while($d=mysqli_fetch_array($detail)){		
    echo "<tr>
	   		 <td width='25'>$no </td>
             <td width='550'>$d[pertanyaan]</td>
             <td>$d[jawaban]</td>
			<td>$d[jawaban_benar]</td></tr>";
    $no++;
    }
    echo "</table>";


//Hitung Jumlah Jawaban Benar
$user = $_SESSION['kategori'];
		//Cari Kategori Pelajaran Dari User INi
		$kategori=mysqli_query($konek,"SELECT * FROM kategori WHERE id_user = $user");
		$k    = mysqli_fetch_array($kategori);
		$id_kategori = $k[id_kategori];
$nama = $_GET['id_user'];
$jawab= mysqli_query($konek,"SELECT count(jawaban.jawaban) as jml FROM tabel_soal, jawaban WHERE jawaban.id_kategori =  $id_kategori AND jawaban.id_soal=tabel_soal.id_soal AND jawaban.jawaban=tabel_soal.jawaban_benar AND jawaban.id_user =$nama");
		while($b = mysqli_fetch_array($jawab))
		{
		//Hitung Pertanyaan Yang Di Jawab
		$terjawab=mysqli_query($konek,"SELECT * FROM jawaban WHERE id_kategori =  $id_kategori AND id_user =$nama");
		$t = mysqli_num_rows($terjawab);
		//Hitung Jumlah Jawaban Yang Salah
		$salah = $t - $b['jml'];
		//Tampilkan Jumlah Jawaban Benar
		echo "<div class='form-group row'>
			  <div class='col-sm-1'></div>
			  <div class='col-sm-2'> <h2>Benar : $b[jml]</h2></div>";
		//Tampilkan Jumlah PErtanyaan Yang Salah Menjawab		
		echo "<div class='col-sm-2'> <h2>Salah: $salah</h2></div>";
		}	
		echo"</div>";

?>
  