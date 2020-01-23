<?php 
	$ambil = $koneksi->query("SELECT * FROM tb_jdwl_ujian WHERE id_jdwl_ujian='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();


	$koneksi->query("DELETE FROM tb_jdwl_ujian WHERE id_jdwl_ujian='$_GET[id]'");
	$koneksi->query("DELETE FROM tb_jdwl_ujian WHERE id_jdwl_ujian='$_GET[id]'");

	echo "<script>alert('data penjadwalan terhapus');</script>";
	echo "<script>location='index.php?halaman=jadwal_ujian'</script>";

?>