<?php
include 'koneksi.php';
$id_lagu = $_GET['id_lagu'];
$id_playlist = $_GET['id_playlist'];

// Memasukkan data ke tabel DETAIL_PLAYLIST
$sql = mysqli_query($conn, "INSERT INTO DETAIL_PLAYLIST (ID_PLAYLIST, ID_LAGU) VALUES ('$id_playlist', '$id_lagu')");
if($sql) {
    echo "<script>alert('Lagu berhasil ditambahkan!'); window.location='dashboard.php';</script>";
} else {
    echo "<script>alert('Gagal! Cek kembali ID Playlistnya.'); window.location='dashboard.php';</script>";
}
?>