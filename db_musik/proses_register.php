<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Memasukkan data ke tabel USER sesuai ERD
$query = mysqli_query($conn, "INSERT INTO `USER` (USERNAME, PASSWORD) VALUES ('$username', '$password')");

if($query){
    echo "<script>alert('Registrasi Berhasil! Selamat datang di aplikasi musik.'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal Registrasi, coba username lain.'); window.location='register.php';</script>";
}
?>