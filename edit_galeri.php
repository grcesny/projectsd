<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
  header("location:login.php");
  exit();
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM galeri WHERE id='$id'");
$d = mysqli_fetch_array($query);

if(!$d){
    echo "<script>alert('Data tidak ditemukan!'); window.location='kelola_galeri.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Galeri - Admin Panel</title>
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
    <h1>Edit Foto Galeri</h1>

    <div style="margin-bottom: 20px;">
        <a href="kelola_galeri.php" style="background: #015c3b; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px; display: inline-block;">
           ⬅️ Kembali ke Kelola Galeri
        </a>
    </div>

    <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02); max-width: 600px;">
      
      <form action="proses_edit_galeri.php" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px;">
        
        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <label style="font-weight: bold; color: #333;">Judul / Keterangan Foto</label>
        <input type="text" name="judul" value="<?= $d['judul']; ?>" required style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px;">
        
        <label style="font-weight: bold; color: #333;">Gambar Saat Ini</label>
        <div style="margin-bottom: 5px;">
            <img src="uploads/<?= $d['gambar']; ?>" width="150" style="border-radius: 8px; border: 1px solid #ddd; display: block;">
            <span style="font-size: 12px; color: #777;">File: <?= $d['gambar']; ?></span>
        </div>

        <label style="font-weight: bold; color: #333;">Ganti Gambar Baru <span style="font-weight: normal; color: #999; font-size: 13px;">(Kosongkan jika tidak ingin diubah)</span></label>
        <input type="file" name="gambar" style="padding: 5px 0;">
        
        <button type="submit" style="background: #0b7a31; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 15px; margin-top: 10px;">
          Simpan Perubahan
        </button>
        
      </form>
      
    </div>
  </div>
</div>

</body>
</html>