<?php 
include 'koneksi.php';
$id_pl = $_GET['id'];
$p = mysqli_fetch_array(mysqli_query($conn, "SELECT NAMA_PLAYLIST FROM PLAYLIST WHERE ID_PLAYLIST='$id_pl'"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Isi Playlist</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #FFF5F7; padding: 40px; }
        .card { background: white; padding: 40px; border-radius: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); max-width: 600px; margin: auto; }
        h2 { color: #D01760; }
        .item { padding: 15px; border-bottom: 1px solid #FFEBF2; display: flex; justify-content: space-between; align-items: center; }
        .back-link { color: #D01760; text-decoration: none; font-weight: bold; display: inline-block; margin-bottom: 20px; }
        .play-small { background: #D01760; color: white; border: none; padding: 5px 15px; border-radius: 8px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="card">
        <a href="dashboard.php" class="back-link">← Kembali ke Dashboard</a>
        <h2>Playlist: <?php echo $p['NAMA_PLAYLIST']; ?></h2>
        
        <?php 
        // Join Tabel LAGU dan DETAIL_PLAYLIST
        $lagu = mysqli_query($conn, "SELECT LAGU.JUDUL, LAGU.PENYANYI FROM DETAIL_PLAYLIST 
                                    JOIN LAGU ON DETAIL_PLAYLIST.ID_LAGU = LAGU.ID_LAGU 
                                    WHERE DETAIL_PLAYLIST.ID_PLAYLIST = '$id_pl'");
        
        if(mysqli_num_rows($lagu) == 0) echo "<p style='color:#aaa;'>Playlist ini masih kosong.</p>";
        
        while($l = mysqli_fetch_array($lagu)){
        ?>
            <div class="item">
                <div>
                    <b><?php echo $l['JUDUL']; ?></b><br>
                    <small><?php echo $l['PENYANYI']; ?></small>
                </div>
                <button class="play-small" onclick="alert('Memutar lagu: <?php echo $l['JUDUL']; ?>')">▶</button>
            </div>
        <?php } ?>
    </div>
</body>
</html>