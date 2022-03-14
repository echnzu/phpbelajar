<?php
session_start();
require 'koneksi.php';
//kalau session gak ada , lempar ke index

$sqljur= "SELECT * FROM jurusan";
$jur =mysqli_query($conn, $sqljur);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data</title>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
div.container {
  padding : 1px;
  position: relative; right : 10px;

}
</style>
<body>
<nav class="navbar navbar-dark bg-primary">

  <a class="navbar-brand" href="#">DATA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</nav>
<a href="home.php" class="btn btn-sm btn-outline-secondary" type="button">Back</a>

<div class="container">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" name="name" class="form-control" placeholder="Masukan Nama">
        </div>

        <div class="form-group">
          <label for="address">Alamat</label>
          <input type="text" name="address" class="form-control" placeholder="Masukan Alamat">
        </div>

        <div class="form-group">
          <label for="hp">Nomer HP</label>
          <input type="text" name="hp" class="form-control" placeholder="Masukan Nomer Handphone"> 
        </div>

        <div class="form-group">
          <label for="jurusan">Kejuruan</label>
          <select name="jurusan" id="jurusan" class="form-control">
            <!-- <option value="1">Pemrogaram Web</option>
            <option value="2">Desain Grafis</option>
            <option value="3">Administrasi</option>
            <option value="4">Multimedia</option>
            <option value="">Menjahit</option> -->
          <?php
          //  looping option  here 
           while($r= mysqli_fetch_assoc($jur)): ?> 
            <option value="<?= $r['id']; ?>"><?= $r['jurusan.name']; ?></option> 
          <?php endwhile; ?>

          </select>
          <!-- <input type="text" name="kejuruan" class="form-control" placeholder="Masukan Kejuruan"> -->
        </div>

        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                </div>
          </div>

        <button type="submit" name="submit" class="btn btn-primary">
        <i class="bi bi-plus-square"></i>&nbsp;  
        Submit</button>
      </form>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
</body>
</html>

<?php

    if(isset($_POST['submit'])){
        $name =htmlspecialchars($_POST['name']);
        $address =htmlspecialchars($_POST['address']);
        $hp =htmlspecialchars($_POST['hp']);
        $jurusan =htmlspecialchars($_POST['jurusan']);

        $file = $_FILES['file'];
        //var_dump($file);
        //die;
        move_uploaded_file($file['tmp_name'],'dump/'.$file['name']);
     
    //   Koneksi database

    require 'koneksi.php';
      // $host ='localhost';
      // $username = 'root';
      // $password = '';
      // $db = 'blk';

      // $conn =mysqli_connect($host,$username,$password,$db);

// Proses tambah data
      $insert = $conn = mysqli_query($conn, "INSERT INTO siswa VALUES (NULL,'$name','$address','$hp','$jurusan');");

      if ($insert) {
        echo "<script> Swal.fire(
          'Berhasil!',
          'Data anda telah tersimpan!',
          'success'
        )</script>";
      } else {
         echo "<script>Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',})
          </script>";
      };
    };
?>

<script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        })
    </script>