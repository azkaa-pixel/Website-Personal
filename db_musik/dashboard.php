<?php 
include 'koneksi.php';
session_start();
if(!isset($_SESSION['username'])){ header("location:index.php"); exit(); }

$user_login = $_SESSION['username'];
$u_query = mysqli_query($conn, "SELECT ID_USER FROM USER WHERE USERNAME='$user_login'");
$u_data = mysqli_fetch_array($u_query);
$id_user = $u_data['ID_USER'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pink Music - Dashboard</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #FFF5F7; margin: 0; color: #333; }
        .navbar { background: white; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 15px rgba(208, 23, 96, 0.05); }
        .container { padding: 30px 50px; max-width: 1000px; margin: auto; }
        .btn-pink { background: #D01760; color: white; border: none; padding: 10px 20px; border-radius: 12px; cursor: pointer; font-weight: bold; transition: 0.3s; }
        .btn-pink:hover { background: #A0124A; transform: translateY(-2px); }
        
        /* Song Card - Tanpa Border Kaku */
        .song-card { background: white; padding: 15px 25px; border-radius: 20px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 10px rgba(0,0,0,0.02); }
        .song-info b { font-size: 17px; color: #333; }
        .song-info span { color: #D01760; font-size: 14px; font-weight: 500; }
        
        /* Playlist Grid */
        .playlist-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 20px; margin-top: 20px; }
        .playlist-item { background: white; padding: 25px; border-radius: 25px; text-align: center; cursor: pointer; transition: 0.3s; box-shadow: 0 5px 15px rgba(0,0,0,0.03); }
        .playlist-item:hover { background: #FFEBF2; transform: translateY(-5px); }
        
        .player-bar { position: fixed; bottom: 0; width: 100%; background: white; padding: 20px; text-align: center; border-top: 3px solid #D01760; font-weight: bold; color: #D01760; }
        input[type="text"] { padding: 12px; border-radius: 12px; border: 1.5px solid #FFEBF2; outline: none; width: 250px; }
        input[type="text"]:focus { border-color: #D01760; }
    </style>
</head>
<body>

<div class="navbar">
    <h2 style="color: #D01760; margin: 0;">🎵 Pink Music</h2>
    <span style="font-size: 14px;">Halo, <b><?php echo $user_login; ?></b> | <a href="logout.php" style="color: #D01760; text-decoration: none;">Logout</a></span>
</div>

<div class="container">
    <h3 style="color: #D01760;">Daftar Lagu Galau</h3>
    <?php 
    $lagu = mysqli_query($conn, "SELECT * FROM LAGU ORDER BY JUDUL ASC");
    while($l = mysqli_fetch_array($lagu)){
    ?>
    <div class="song-card">
        <div class="song-info">
            <b><?php echo $l['JUDUL']; ?></b><br>
            <span><?php echo $l['PENYANYI']; ?></span>
        </div>
        <div>
            <button class="btn-pink" onclick="tambahKePlaylist('<?php echo $l['ID_LAGU']; ?>')" style="background:none; color:#D01760; border:1.5px solid #D01760; margin-right:8px;">+ Playlist</button>
            <button class="btn-pink" onclick="play('<?php echo $l['JUDUL']; ?>', '<?php echo $l['PENYANYI']; ?>')">▶ Putar</button>
        </div>
    </div>
    <?php } ?>

    <h3 style="color: #D01760; margin-top: 40px;">Playlist Saya</h3>
    <div style="background: white; padding: 25px; border-radius: 30px; margin-top: 15px;">
        <form action="proses_playlist.php" method="POST" style="margin-bottom: 20px;">
            <input type="text" name="nama_playlist" placeholder="Nama playlist baru..." required>
            <button type="submit" name="buat_playlist" class="btn-pink">Simpan</button>
        </form>

        <div class="playlist-grid">
            <?php 
            $pl_query = mysqli_query($conn, "SELECT * FROM PLAYLIST WHERE ID_USER='$id_user'");
            while($pl = mysqli_fetch_array($pl_query)){
            ?>
            <div class="playlist-item" onclick="location.href='lihat_playlist.php?id=<?php echo $pl['ID_PLAYLIST']; ?>'">
                <div style="font-size: 40px; margin-bottom: 10px;">📂</div>
                <b style="color: #D01760;"><?php echo $pl['NAMA_PLAYLIST']; ?></b><br>
                <small style="color: #999;">ID: <?php echo $pl['ID_PLAYLIST']; ?></small>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="player-bar" id="player">Pilih lagu untuk menemani galau...</div>

<script>
    function play(judul, artis) { 
        document.getElementById('player').innerHTML = "Sedang Memutar: " + judul + " - " + artis; 
    }
    function tambahKePlaylist(idLagu) {
        let idPl = prompt("Masukkan ID Playlist (lihat di bawah folder):");
        if(idPl) { window.location.href = "proses_tambah_lagu.php?id_lagu=" + idLagu + "&id_playlist=" + idPl; }
    }
</script>

</body>
</html>