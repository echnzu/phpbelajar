<?php
session_start();
require 'koneksi.php';

$id = $_GET['id'];

$sql ="DELETE FROM siswa WHERE id=$id";
mysqli_query($conn, $sql);
?>

<script>alert('selamat! anda berhasil menghapus data')
window.location.href='home.php';

</script>