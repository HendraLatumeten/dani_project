<?php

	$ambil =$koneksi->query ("SELECT * FROM customer where id_customer='$_GET[id]' "); 
	$pecah = $ambil->fetch_assoc();

	$koneksi->query("DELETE FROM customer WHERE id_customer='$_GET[id]'");

	echo "<script>alert('data customer terhapus');</script>";
	echo "<script>location='index.php?halaman=customer'</script>";

?>