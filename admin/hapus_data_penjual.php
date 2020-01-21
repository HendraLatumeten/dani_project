<?php

	$ambil = $koneksi->query("SELECT * FROM tb_pendaftaran WHERE no_pendaftaran='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

	$koneksi->query("DELETE FROM tb_pendaftaran WHERE no_pendaftaran='$_GET[id]'");

	echo "<script>alert('data pendaftaran terhapus');</script>";
	echo "<script>location='index.php?halaman=data_penjual'</script>";

?>