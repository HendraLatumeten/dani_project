<?php
include "koneksi.php";
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.

$login=mysqli_query($konek,"SELECT * FROM tb_pendaftaran WHERE nama='$username' AND NISN='$pass'");

  header('location:media.php?module=home');



?>
