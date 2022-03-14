<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>window.location.href='index.php'</script>";
}

require 'koneksi.php';

$sql = "SELECT * FROM siswa";
$siswa = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/848e0a4bf4.js" crossorigin="anonymous"></script>
    <title>Home</title>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
  
  <hr>
  <div class="container tampilan">
    <h1 class="text-uppercase text-center fw-bold" >Data Siswa</h1>
    <form action="" method="POST">

      <!-- // index sesuai nama kolom tabel -->
      <table class="table table-striped" id="tabel">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No HP</th>
          <th>Kejuruan</th>
          <th>Action</th>
        </tr>
        </thead>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($siswa)) {
          $i++ ?>
          <tbody>
           <tr>
            <td><?= $i ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['address']; ?></td>
            <td><?= $row['hp'];  ?></td>
            <td><?= $row['jurusan_id'];  ?></td>
            <td><img width="80px" class="img-fluid" src="dump/<?= $row['gambar']; ?>"></td>
            <td>
              <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary">
              <i class="fa-solid fa-pen-to-square"></i></a> 
              <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-primary">
              <i class="fa-solid fa-trash-can"></i></a>
            </td>
           </tr>
          </tbody>
        <?php } ?>
      </table>

    </form>
  </div>
    <h3>Selamat, anda berhasil login</h3>
    <a href="tambah.php" class="btn btn-primary">tambah data</a>
    <a href="logout.php">Logout</a>

</div>
</body>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
</html>
<script>
$(document).ready(function() {
  $('#tabel').DataTable();
} );
</script>