<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Cek data di tabel USER
$query = mysqli_query($conn, "SELECT * FROM `USER` WHERE USERNAME='$username' AND PASSWORD='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    // Jika berhasil, pindah ke dashboard
    header("location:dashboard.php");
} else {
    // Jika gagal, balik ke login dengan pesan error
    header("location:index.php?pesan=gagal");
}
?>