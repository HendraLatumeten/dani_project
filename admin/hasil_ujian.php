<?php 	
include '../config/koneksi.php';
$user = '17';
	
$nama = '17';
$id_kategori= '1';
$jawab= mysqli_query($konek,"SELECT count(jawaban.jawaban) as jml FROM tbl_soal, jawaban WHERE jawaban.id_kategori =  $id_kategori AND jawaban.id_soal=tbl_soal.id_soal AND jawaban.jawaban=tbl_soal.jawaban_benar AND jawaban.id_user =$nama");
		while($b = mysqli_fetch_array($jawab))
		{
		//Hitung Pertanyaan Yang Di Jawab
		$terjawab=mysqli_query($konek,"SELECT * FROM jawaban WHERE id_kategori =  $id_kategori AND id_user =$nama");
		$t = mysqli_num_rows($terjawab);
		//Hitung Jumlah Jawaban Yang Salah
		$salah = $t - $b['jml'];
		$true =  $b['jml'];
		$a =  $true * 100;
		$Jumlah=$salah + $b['jml'];

		
		$c = $a / $Jumlah ;
		
		
		//Tampilkan Jumlah Jawaban Benar
		echo "<div class='form-group row'>
			  <div class='col-sm-1'></div>
			  <div class='col-sm-2'> <h2>Benar : $b[jml]</h2></div>";
		//Tampilkan Jumlah PErtanyaan Yang Salah Menjawab		
		echo "<div class='col-sm-2'> <h2>Salah: $salah</h2></div>";
		}	


		echo"</div>";
		echo "Skor:".round($c, 1);
	
	



 ?>