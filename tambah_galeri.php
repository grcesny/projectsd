<?php
session_start();

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
  header("location:login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Galeri - Admin Panel</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body style="padding-top:0;">

<div class="admin-container">

<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="tambah_berita.php">Tambah Berita</a>
    <a href="kelola_berita.php">Kelola Berita</a>
    <a href="kelola_saran.php">Kelola Saran</a>
    <a href="kelola_galeri.php" class="active">Galeri</a>
    <a href="logout.php">Logout</a>
</div>

<div class="admin-content">
    <div style="margin-bottom: 20px;">
    <a href="kelola_galeri.php" style="background: #015c3b; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px; display: inline-block;">
       📂 Lihat & Kelola Daftar Galeri
    </a>
</div>

<div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02); max-width: 600px;">
      <form action="proses_galeri.php" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px;">
        
        <label style="font-weight: bold; color: #333;">Judul / Keterangan Foto</label>
        <input type="text" name="judul" placeholder="Masukkan judul foto..." required style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px;">
        
        <label style="font-weight: bold; color: #333;">Pilih Berkas Gambar</label>
        <input type="file" name="gambar" required style="padding: 5px 0;">
        
        <button type="submit" style="background: #0b7a31; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 15px; margin-top: 10px;">
          Upload Foto
        </button>
        
      </form>
      
    </div>

  </div>

</div>

</body>
</html>