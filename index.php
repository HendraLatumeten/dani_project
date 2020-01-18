<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMP IT Permata Madani</title>
    <!-- Favicons -->
    <link href="img/favicon.ico" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
</head>

<?php
    include "koneksi.php";
        //fungsi kode otomatis
        function kdauto($tabel, $inisial){
        $struktur   = mysql_query("SELECT * FROM tb_pendaftaran");
        $field      = mysql_field_name($struktur,0);
        $panjang    = mysql_field_len($struktur,0);
        $qry  = mysql_query("SELECT max(".$field.") FROM "."tb_pendaftaran");
        $row  = mysql_fetch_array($qry);
        if ($row[0]=="") {
        $angka=0;
        }
        else {
        $angka= substr($row[0], strlen($inisial));
        }
        $angka++;
        $angka      =strval($angka);
        $tmp  ="";
        for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
        $tmp=$tmp."0";
        }
        return $inisial.$tmp.$angka;
        }
    $tampilPeg=mysql_query("SELECT * FROM tb_pendaftaran ORDER BY no_pendaftaran");


 ?>
<body>

    <br>
    <br>
    <!--- Include the above in your HEAD tag ---------->

    <div class="container">
        <form method="post" class="form-horizontal" >
            <p align="center"><img  src='images/logo.png' alt='' width='150px' ></p>
            
            <h1 class="text-center">Pendaftaran Calon Siswa SMP IT Permata Madani </h1>
            <br>
             <div class="form-group">
               
                <div class="col-sm-9">
                    <input type="hidden" name="nodaft" class="form-control" readonly value="<?php echo kdauto("tb_pendaftaran","KDFTR-"); ?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">NISN*</label>
                <div class="col-sm-9">
                    <input type="number" name="nisn" placeholder="Masukan NISN" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Lengkap*</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" placeholder="Masukan Nama Lengkap" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Alamat*</label>
                <div class="col-sm-9">
                    <input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Jenis Kelamin*</label>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" value="P" required>Perempuan
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" value="L">Laki-Laki
                            </label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">TTL</label>
                <div class="col-sm-9">
                    <input type="text" name="ttl" placeholder="Jakarta,29 juni 1997" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Asal Sekolah* </label>
                <div class="col-sm-9">
                    <input type="text" name="asal_sekolah" placeholder="Masukin Alamat Asal Sekolah"
                        class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Alamat Asal Sekolah* </label>
                <div class="col-sm-9">
                    <input type="text" name="alamat_asl_sekolah" placeholder="Masukin Alamat Asal Sekolah "
                        class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Orang Tua* </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_orang_tua" placeholder="Masukin Orang Tua " class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Wali* </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_wali" placeholder="Masukin Nama Wali " class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Agama</label>
                <div class="col-sm-9">
                    <select name="agama" class="form-control" required>
                        <option>--Pilih--</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="katolik">Katolik</option>
                        <option value="hindu">Hindu</option>
                        <option value="buddha">Buddha</option>
                        <option value="konghucu">Konghucu</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">No. Telepon* </label>
                <div class="col-sm-9">
                    <input type="number" name="no_tlp" placeholder="Masukin Nomor Telepon " class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Foto Ijazah/Surat Keterangan Lulus </label>
                <div class="col-sm-9">
                 <input type="file" name="foto" class="form-control" >
                </div>
            </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Foto 3x4 Latar Merah </label>
                <div class="col-sm-9">
                    <input type="file" name="foto1"  class="form-control">
                </div>
            </div>
       


            <button  name="submit" class="btn btn-primary btn-block">Daftar</button>
        </form> <!-- /form -->
    </div> <!-- ./container -->
    <br>
    <br>
    <?php
function acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
//cara memanggilnya
$hasil_1= acak(5);
$hasil_2= acak(7);
$kd= "KD".$hasil_1;
// echo $kd;
?>

    <?php

            if (isset($_POST["submit"])){
              $no_daft = $_POST["nodaft"];
              $nisn = $_POST["nisn"];
              $nama = $_POST["nama"];
              $alamat = $_POST["alamat"];
              $jenis_kelamin = $_POST["jenis_kelamin"];
              $ttl = $_POST["ttl"];
              $asal_sekolah = $_POST["asal_sekolah"];
              $alamat_asl_sekolah = $_POST["alamat_asl_sekolah"];
              $nama_orang_tua = $_POST["nama_orang_tua"];
              $nama_wali = $_POST["nama_wali"];
              $agama = $_POST["agama"];
              $no_tlp = $_POST["no_tlp"];
              $date = date("d/m/Y");

        

              // foto
           $file = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            move_uploaded_file($lokasi, "/foto_ijazah/".$file);
            

                //cek apakah email sudah digunakan
                $koneksi= new mysqli("localhost","root","","db_sekolahan"); 
                $ambil = $koneksi->query("SELECT * FROM tb_pendaftaran
                WHERE nisn='$nisn'");
              $yangcocok = $ambil->num_rows;
              if ($yangcocok==1) {
                echo "<script>alert('pendaftaran gagal, nisn sudah digunakan');</script>";
                echo "<script>location='index.php'</script>";
              }else {
            



              $koneksi->query("INSERT INTO tb_pendaftaran
                  (no_pendaftaran,nisn,nama)
                  VALUES('$kd','$nisn','$nama') ");



            $koneksi->query("INSERT INTO tb_detail_pendaftaran
                  (no_pendaftaran,NISN,alamat,jenis_kelamin,TTL,asal_sekolah,almt_asl_sklh,nama_org_tua,nama_wali,agama,no_tlp,foto_ijazah,foto,tgl_daftar)
                  VALUES('$kd','$nisn','$alamat','$jenis_kelamin','$ttl','$asal_sekolah','$alamat_asl_sekolah','$nama_orang_tua','$nama_wali','$agama','$no_tlp','$file','$foto','$date') ");

                echo "<script>alert('pendaftaran sukses, silahkan login');</script>";
                echo "<script>location='data_daftar.php?&kd=$kd'</script>";
              
              }
            }
            ?>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


</body>

</html>
