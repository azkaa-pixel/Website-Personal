<?php
include 'koneksi.php';
session_start();

if (isset($_POST['buat_playlist'])) {
    $nama = $_POST['nama_playlist'];
    $username = $_SESSION['username'];

    // Ambil ID_USER dulu berdasarkan session username
    $user_query = mysqli_query($conn, "SELECT ID_USER FROM USER WHERE USERNAME='$username'");
    $user_data = mysqli_fetch_array($user_query);
    $id_user = $user_data['ID_USER'];

    // Simpan ke tabel PLAYLIST
    $query = mysqli_query($conn, "INSERT INTO PLAYLIST (NAMA_PLAYLIST, ID_USER) VALUES ('$nama', '$id_user')");

    if ($query) {
        header("location:dashboard.php#playlist");
    } else {
        echo "<script>alert('Gagal membuat playlist'); window.location='dashboard.php';</script>";
    }
}
?>