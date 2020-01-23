<?php 
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","db_sekolahan");


if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda Harus Login ! ');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="datatabel/media/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="datatabel/media/css/jquery.dataTables.min.css">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-image="assets/img/sidebar-4.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    ADMINISTRATOR
                </a>
            </div>

            <ul class="nav">
                <!-- <li <?php if (!isset($_GET['halaman'])) {
                    echo "class='active'";
                } ?> >
                    <a href="index.php">
                        <i class="pe-7s-users"></i>
                        <p>Data Admin</p>
                    </a>
                </li> -->
                <li <?php if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="data_pendaftaran") {
                        echo "class='active'";
                    }
                } ?>>
                    <a href="index.php?halaman=data_pendaftaran">
                        <i class="pe-7s-users"></i>
                        <p>Data Pendaftaran</p>
                    </a>
                </li>
                 <li <?php if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="Verifikasi_data") {
                        echo "class='active'";
                    }
                } ?>>
                    <a href="index.php?halaman=Verifikasi_data">
                        <i class="pe-7s-note2"></i>
                        <p>Verifikasi Data</p>
                    </a>
                </li>
                   <li <?php if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="jadwal_ujian") {
                        echo "class='active'";
                    }
                } ?>>
                    <a href="index.php?halaman=jadwal_ujian">
                        <i class="pe-7s-news-paper"></i>
                        <p>Jadwal Ujian</p>
                    </a>
                </li>
                  <li <?php if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="jadwal_ujian") {
                        echo "class='active'";
                    }
                } ?>>
                    <a href="index.php?halaman=hasil_ujian">
                        <i class="pe-7s-note"></i>
                        <p>Hasil Ujian</p>
                    </a>
                </li>
                <!-- <li <?php if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="kategori") {
                        echo "class='active'";
                    }
                } ?>>
                    <a href="index.php?halaman=kategori">
                        <i class="pe-7s-note2"></i>
                        <p>Data Kategori</p>
                    </a>
                </li>
                <li <?php if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="pembelian") {
                        echo "class='active'";
                    }
                } ?>>
                    <a href="index.php?halaman=pembelian">
                        <i class="pe-7s-news-paper"></i>
                        <p>Laporan Penjualan</p>
                    </a>
                </li>
                <li <?php if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="riwayat_order") {
                        echo "class='active'";
                    }
                } ?>>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="index.php?halaman=logout">
                        <i class="pe-7s-power"></i>
                        <p>Log out</p>
                    </a>
                </li> -->
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php?halaman=logout">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
    


        <div class="content">
            <div class="container-fluid">
                <?php 
                   if (isset($_GET['halaman']))
                    {
                        if ($_GET['halaman']=="data_pendaftaran")
                        {
                            include 'data_pendaftaran.php';
                        }
                        elseif ($_GET['halaman']=="detail_data_pendaftaran")
                        {
                            include 'detail_data_pendaftaran.php';
                        }
                        elseif ($_GET['halaman']=="edit_data_pendaftaran")
                        {
                            include 'edit_data_pendaftaran.php';
                        }
                        elseif ($_GET['halaman']=="hapus_data_pedaftaran")
                        {
                            include 'hapus_data_pendaftaran.php';
                        }
                          elseif ($_GET['halaman']=="Verifikasi_data")
                        {
                            include 'verifikasi_data.php';
                        }
                          elseif ($_GET['halaman']=="jadwal_ujian")
                        {
                            include 'jadwal_ujian.php';
                        }
                         elseif ($_GET['halaman']=="detail_verifikasi")
                        {
                            include 'detail_verifikasi.php';
                        }
                        elseif ($_GET['halaman']=="detail_data_penjadwalan")
                        {
                            include 'detail_data_penjadwalan.php';
                        }
                         elseif ($_GET['halaman']=="edit_data_penjadwalan")
                        {
                            include 'edit_data_penjadwalan.php';
                        }
                         elseif ($_GET['halaman']=="hapus_data_penjadwalan")
                        {
                            include 'hapus_data_penjadwalan.php';
                        }
                        elseif ($_GET['halaman']=="tambah_jadwal")
                        {
                            include 'tambah_jadwal.php';
                        }
                        elseif ($_GET['halaman']=="logout")
                        {
                            include 'logout.php';
                        }
                        
                    }
                    else 
                    {
                        include 'home.php';
                    }

                ?>
            </div>
        </div>

    </div>
</div>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

    <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="datatabel/media/js/jquery.dataTables.min.js"></script>

</html>
