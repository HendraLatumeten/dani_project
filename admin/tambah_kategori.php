<h2 class="text-center">Form Tambah Kategori</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Kategori</label>
	 <td><input class="form-control" name="kategori" required=""></td>
	</div>
	<br>
	<button class="btn btn-primary" name="insert">Simpan </button>
</form>
<?php
	if (isset($_POST["insert"])) {

	$kategori = $_POST['kategori'];

	$sql = mysqli_query ($koneksi, "SELECT * FROM kategori WHERE kategori='$kategori'");
	$valid = $sql->num_rows;
	if ($valid==1)
	{
		echo "<script>alert ('Kategori sudah tersedia');</script>";
		echo "<script>location='index.php?halaman=kategori';</script>";
	}else{
		$sql = mysqli_query ($koneksi, "INSERT INTO kategori (kategori) VALUES ('$_POST[kategori]')"); 
		if ($koneksi);
		echo "<script>alert('Data kategori berhasil ditambahkan') </script>";
        echo "<script>location ='index.php?halaman=kategori';</script>";
}	
  
}	
?>