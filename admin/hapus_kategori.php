<?php

	$ambil =$koneksi->query ("SELECT * FROM kategori where id_kategori='$_GET[id]' "); 
	$pecah = $ambil->fetch_assoc();

	$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

	echo "<script>alert('data kategori terhapus');</script>";
	echo "<script>location='index.php?halaman=kategori'</script>";

?>