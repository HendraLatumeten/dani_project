<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['nisn'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
   $user = $_SESSION[kategori];
   $kategori= '1';  
   $daftar=mysqli_query($konek,"SELECT * FROM kategori WHERE id_kategori = $kategori ORDER BY id_kategori");
   $d=mysqli_fetch_array($daftar);
   echo "<div class='page-header'>
        <h3>Selamat Mengerjakan <b>$_SESSION[namalengkap]</b></h3>
		<p>Jawab Pertanyaan Berikut Dengan Memilih Jawaban Dari Soal Berikut</p>
      	</div>";

	//Langkah 1: Tentukan batas,cek halaman & posisi data
	$batas   = 1;
	$halaman = $_GET['halaman'];
	if(empty($halaman)){
		$posisi=0;
		$halaman=1;
		}
		else{
		$posisi = ($halaman-1) * $batas;
		}
		
	$results = mysqli_query($konek,"SELECT * FROM tbl_soal WHERE id_kategori = $kategori ORDER BY id_soal ASC LIMIT $posisi, $batas");
	$no=$posisi+1; // Agar angka (penomoran) mengikuti paging
	while($r = mysqli_fetch_array($results))
	{
	//Awal Navigasi TAB
	echo"<ul class='nav nav-tabs' role='tablist'>
	  <li class='nav-item'>
		<a class='nav-link active' data-toggle='tab' href='#home' role='tab'>Pertanyaan</a>
	  </li>
	  <li class='nav-item'>
		<a class='nav-link' data-toggle='tab' href='#profile' role='tab'>Jawaban</a>
	  </li>
	  </ul>
	  <div class='tab-content'>";
	//Tampilkan Soal Isi Dari Test		
	$aksi="modul/mod_daftar_test/aksi_test.php";
	$cek=mysqli_query($konek,"SELECT * FROM jawaban WHERE id_soal=$r[id_soal] AND id_user = $user");
 	$ketemu = mysqli_num_rows($cek);
  	if ($ketemu > 0){ //Tampilkan Soal Ketika Sudah Di Isi Untuk Memperbaiki Jawaban

		  //Tab Unutk Pertanyaan
			echo"<div class='tab-pane active' id='home' role='tabpanel'>
		  	<form method=POST enctype='multipart/form-data' action='$aksi?module=test&act=update'>
			<input type=hidden name=id_soal value=$r[id_soal]>
		 	<input type=hidden name=id_kategori value=$d[id_kategori]>
		 	<input type=hidden name=id_user value=$user>
			<input type=hidden name=halaman value=$halaman>
			</br><legend>$no.  $r[pertanyaan]</legend>";
			$tampil=mysqli_query($konek,"SELECT * FROM jawaban WHERE id_soal=$r[id_soal] AND id_user = $user");
			$j   = mysqli_fetch_array($tampil);
			if ($j['jawaban']=='A'){ 
			echo"<ul><h4><input type=radio name='jawaban' value='A' checked> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h4></ul>";
			}
			else if  ($j['jawaban']=='B'){ 
			echo"<ul><h4><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B' checked> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h4></ul>";
			}
			else if  ($j['jawaban']=='C'){ 
			echo"<ul><h4><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C' checked> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h4></ul>";
			 }
			else if  ($j['jawaban']=='D'){ 
			echo"<ul><h4><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D' checked> D. $r[pilihan_d]</h4></ul>";
			}
			else { 
			echo"<ul><h4><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h4></ul>";
			}
				
            	echo "
			 </li>

			 <td colspan=2><button type='submit' class='btn btn-info'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span> Simpan</button></form>";
			 
          

			$no++;
			
			echo "</ul>";
			}
			else //Tampilkan Soal Ketika Belum Di Isi
			{
			//Tampilan Halaman Paging
			echo "<div class='tab-pane active' id='home' role='tabpanel'>
			 <form method=POST enctype='multipart/form-data' action='$aksi?module=test&act=input'>
			 <input type=hidden name=id_soal value=$r[id_soal]>
			 <input type=hidden name=id_kategori value=$d[id_kategori]>
			 <input type=hidden name=id_user value=$user>
			 <input type=hidden name=halaman value=$halaman>
			</br><legend>$no.  $r[pertanyaan]</legend>";
			$tampil=mysqli_query($konek,"SELECT * FROM jawaban WHERE id_soal=$r[id_soal] AND id_user = $user");
			$j   = mysqli_fetch_array($tampil);
			if ($j['jawaban']=='A'){ 
			echo"<ul><h4><input type=radio name='jawaban' value='A' checked> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h4></ul>";
			}
			else if  ($j['jawaban']=='B'){ 
			echo"<ul><h4><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B' checked> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h4></ul>";
			}
			else if  ($j['jawaban']=='C'){ 
			echo"<ul><h4><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C' checked> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h4></ul>";
			 }
			else if  ($j['jawaban']=='D'){ 
			echo"<ul><h4><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D' checked> D. $r[pilihan_d]</h4></ul>";
			}
			else { 
			echo"<ul><h4><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h4></ul>
			<ul><h4><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h4></ul>";
			
			}
	            	echo "
			 </li>

			 <td colspan=2><button type='submit' class='btn btn-info'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span> Simpan</button></form>";
			 
            

			 
			
			
			$no++;
			
			echo "</ul>";
			}
			echo "<p>&nbsp;</p>";
		
			$tampil2="select * from tbl_soal WHERE id_kategori =  $kategori";
			$hasil2=mysqli_query($konek,$tampil2);
			$jmldata=mysqli_num_rows($hasil2);
			$jmlhalaman=ceil($jmldata/$batas);
			//link ke halaman sebelumnya (previous)
			if($halaman > 1)
			{
			$previous=$halaman-1;
				echo "<a href=$_SERVER[PHP_SELF]?module=test&id_kategori=$kategori&halaman=$previous><button  class='btn btn-success'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span> Previous</button></a>";
			}
	
			//Toombol Next
			if($halaman < $jmlhalaman)
			{
				$next=$halaman+1;
				echo " | <a HREF=$_SERVER[PHP_SELF]?module=test&id_kategori=$kategori&halaman=$next><button class='btn btn-success'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span> Next</button></a> ";
			}
		  echo "</div></br></br>"; 
		 echo "<div class='tab-pane' id='profile' role='tabpanel'>
		  <table class='table table-bordered'><thead class='thead-inverse'>
		 <tr>
          <th>No</th>
		  <th>Pertanyaan</th>
		  <th>Jawaban</th>
		  </tr></thead><tbody>";
			$hasil= mysqli_query($konek,"SELECT * FROM tbl_soal, jawaban WHERE jawaban.id_soal=tbl_soal.id_soal AND tbl_soal.id_kategori =  $kategori AND jawaban.id_user=$user ORDER BY tbl_soal.id_soal ASC");
			$no=1; // Agar angka (penomoran) mengikuti paging
			while($h = mysqli_fetch_array($hasil))
			{	echo "<tr><td>$no</td>
					<td>$h[pertanyaan]</td>
					<td>$h[jawaban]</td></tr>";
			  $no++;			  
			  }
			 echo"</tbody></table></div>";
			}

			
				if($halaman > $jmlhalaman){
				echo "<div class='row'>
        <div class='col-md-10'>
		<b>Test Sudah Selesai Dilaksanakan, Terima Kasih</b>";
				 echo "<div class='tab-pane' id='profile' role='tabpanel'>
		  <table class='table table-bordered'><thead class='thead-inverse'>
		 <tr>
          <th>No</th>
		  <th>Pertanyaan</th>
		  <th>Jawaban</th>
		  </tr></thead><tbody>";


$nama = $_SESSION[kategori];
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
		echo "<h3>Skor Anda: "."&nbsp".round($c, 1),"</h3>";

		if ($c >= 60) {
		
		    echo '<div class="badge badge-primary">';
		    echo "<h3>Lulus</h3>";  
		    echo"</div>";
		}elseif ($c <= 60) {
			echo '<div class="badge badge-danger">';
		    echo "<h3>Tidak Lulus</h3>";  
		    echo"</div>";
		    echo "<br>";
		}
	
	


 
		} 
		 echo"</div>";
	 echo"</div>";
    echo "<br>";
    }

?>

