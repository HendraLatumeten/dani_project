<?php ob_start(); ?>
<html>
<head>
  <title>Cetak PDF</title>
    
  
</head>
<body>
     <p align="center"><img  src='images/logo.png' alt='' width='150px' ></p>
<h4 style="text-align: center;"><u>Data Pendaftaran Calon Siswa</u></h4>


<?php
// Load file koneksi.php

$host = "localhost"; // Nama hostnya
$user = "root"; // Username
$pass = ""; // Password (Isi jika menggunakan password)
$connect = mysqli_connect($host, $user, $pass, "db_sekolahan"); // Koneksi ke MySQL


 
$query = "SELECT * FROM tb_pendaftaran WHERE no_pendaftaran='$_GET[id]'"; // Tampilkan semua data gambar
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
$data = mysqli_fetch_array($sql);
$tanggal = "20-Februari-2020";
        echo "<h4>NO PENDAFTARAN:</h4>".$data['no_pendaftaran']."<br>";
        echo "<h4>NISN:</h4>".$data['NISN']."<br>";
        echo "<h4>NAMA:</h4>".$data['nama']."<br>";
        echo "<h4>Batas Waktu Verifikasi Data :</h4>".$tanggal."<br>";
       
 
?>

<hr>

    <p class="card-text"><b>PERHATIAN!</b> Kode Verifikasi Di Tunjukan Kepada Pihak Administrasi Sekolah untuk Melengkapi data Calon Siswa dan Memproses Data Anda Sebagai Peserta Ujian.
 </p>

      <p class="card-text-red"><b>*NOTE:</b> Sertakan Ijazah/Surat Keterangan Lulus dan Foto 3X4 Latar Merah. </p>


</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Siswa.pdf', 'D');
?>