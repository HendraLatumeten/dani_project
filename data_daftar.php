<<<<<<< HEAD
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMP IT Permata Madani</title>
    <!-- Favicons -->
    <link href="img/favicon.ico" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
</head>

<?php
    // include "koneksi.php";


$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_sekolahan";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
    echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}

    
    $ambil = $koneksi->query("SELECT * FROM tb_pendaftaran  WHERE no_pendaftaran='$_GET[kd]'");
    $pecah = $ambil->fetch_assoc();
   
 ?>
<body>

    <br>
    <br>
    <!--- Include the above in your HEAD tag ---------->

    <div class="container">
     
            <p align="center"><img  src='images/logo.png' alt='' width='150px' ></p>
            
            <div class="card text-center">
  <div class="card-header">
   <h1>Selamat <?php echo $pecah['nama'] ?> Pendaftaran Anda Berhasil!</h1> 
  </div>
  <div class="card-body">
    <p class="card-text"><b>SIMPAN</b> Kode Verifikasi anda: <b><?php echo $pecah['no_pendaftaran'] ?></b></p>
    <p class="card-text"><b>PERHATIAN!</b> Kode Verifikasi Di Tunjukan Pada Pihak Administrasi Sekolah untuk Melengkapi data Calon Siswa dan Memproses Data Anda Sebegai Peserta Ujian.
 </p>

      <p class="card-text-red"><b>*NOTE:</b> Sertakan Ijazah/Surat Keterangan Lulus dan Foto 3X4 Latar Merah. </p>
   
  </div>
  <div class="card-footer text-muted">
    
  </div>
   <a href="login.php" class="btn btn-primary" align="center">Download Data</a> 
</div>
            
            
    </div> <!-- ./container -->

    <br>
    <br>
  



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


</body>

</html>
=======
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMP IT Permata Madani</title>
    <!-- Favicons -->
    <link href="img/favicon.ico" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
</head>

<?php
    // include "koneksi.php";


$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_sekolahan";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
    echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}

    
    $ambil = $koneksi->query("SELECT * FROM tb_pendaftaran  WHERE no_pendaftaran='$_GET[kd]'");
    $pecah = $ambil->fetch_assoc();
   
 ?>
<body>

    <br>
    <br>
    <!--- Include the above in your HEAD tag ---------->

    <div class="container">
     
            <p align="center"><img  src='images/logo.png' alt='' width='150px' ></p>
            
            <div class="card text-center">
  <div class="card-header">
   <h1>Selamat <?php echo $pecah['nama'] ?> Pendaftaran Anda Berhasil!</h1> 
  </div>
  <div class="card-body">
    <p class="card-text"><b>SIMPAN</b> Kode Verifikasi anda: <b><?php echo $pecah['no_pendaftaran'] ?></b></p>
    <p class="card-text"><b>PERHATIAN!</b> Kode Verifikasi Di Tunjukan Pada Pihak Administrasi Sekolah untuk Melengkapi data Calon Siswa dan Memproses Data Anda Sebegai Peserta Ujian. </p>
   
  </div>
  <div class="card-footer text-muted">
    
  </div>
   <a href="login.php" class="btn btn-primary" align="center">Download Data</a> 
</div>
            
            
    </div> <!-- ./container -->

    <br>
    <br>
  



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


</body>

</html>
>>>>>>> 12a2cf396416602894a9c569c1ffd3a9cacd58ab
