<?php
include "../koneksi.php";
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

$username = $_POST['username']);
$NISN     = $_POST['NISN'])s;

// pastikan username dan password adalah berupa huruf atau angka.

$login=mysqli_query($konek,"SELECT * FROM tb_pendaftaran WHERE nama='$username' AND NISN='$NISN'");

  header('location:media.php?module=home');



?>
