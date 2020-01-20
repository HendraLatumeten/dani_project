<?php 
	$ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
?>

<h2 class="text-center">Form Ubah Data Admin</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Username</label>
		<input type="text" class="form-control" name="username" value="<?php echo $pecah['username'] ?>">
	</div>
	<div class="form-grup">
	<label>Password</label>
		<input type="text" class="form-control" name="password" value="<?php echo $pecah['password'] ?>">
	</div>
	<div class="form-grup">
	<label>Nama Admin</label>
		<input type="text" class="form-control" name="fullname" value="<?php echo $pecah['fullname'] ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php
	if (isset($_POST['ubah'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];

		{

			$koneksi->query("UPDATE admin SET username='$_POST[username]',password='$_POST[password]',fullname='$_POST[fullname]' WHERE id_admin='$_GET[id]'");
		}

		echo "<script>alert('Table Admin Telah Diperbarui');</script>";
		echo "<script>location='index.php'</script>";
	}
?>