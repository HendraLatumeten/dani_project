<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

$username = $_POST['username'];
$nisn     = $_POST['NISN'];

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($nisn)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
$login=mysqli_query($konek,"SELECT * FROM tb_users WHERE username='$username' AND NISN='$nisn'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";
  $_SESSION['id_user']      = $r['id_user'];
  $_SESSION['namauser']     = $r['username'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['kategori']     = $r['id_user'];
  $_SESSION['nisn']     = $r['NISN'];
  $_SESSION['leveluser']    = $r['status'];
  
  // session timeout
  $_SESSION[login] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysqli_query($konek,"UPDATE tb_users SET id_session='$sid_baru' WHERE username='$username'");
  header('location:media.php?module=home');
}
else{
    echo "<script>alert('USERNAME DAN NISN ANDA SALAH, SILAHKAN LOGIN KEMBALI');</script>";
     echo "<script>location='index.php'</script>";
}
}
?>
