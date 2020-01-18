<html>
<head>
  <title>Cetak Hasil Test Siswa</title>
</head>
<body>
 
  <center>
 
    <h2>Cetak Hasil Test Siswa</h2>
 
 
    <?php 
    include 'koneksi.php';
    ?>
 
    <table border="1">
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jawaban Benar</th>
        <th>Jawaban Salah</th>
      </tr>
      <?php 
      $no = 1;
      $sql = mysqli_query($koneksi,"select * from skor");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nama_lengkap']; ?></td>
        <td><?php echo $data['jawaban_benar']; ?></td>
        <td><?php echo $data['jawaban_salah']; ?></td>
      </tr>
      <?php 
      }
      ?>
    </table>
 
    <br/>
 
    <a href="cetak.php" target="_blank">CETAK</a>
 
 
  </center>
</body>
</html>