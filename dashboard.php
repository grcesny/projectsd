<?php
session_start();

if($_SESSION['status'] != "login"){
  header("location:login.php");
  exit(); // Menghentikan eksekusi script selanjutnya
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  
  <link rel="stylesheet" href="admin.css">
</head>

<body>

<div class="admin-container">

  <!-- SIDEBAR -->
  <div class="sidebar">

    <h2>Admin Panel</h2>

    <a href="dashboard.php" class="active">
      Dashboard
    </a>

    <a href="tambah_berita.php">
      Tambah Berita
    </a>

    <a href="kelola_berita.php">
      Kelola Berita
      </a>

    <a href="kelola_saran.php">
      Kelola Saran
      </a>

    <a href="kelola_galeri.php">
      Galeri
    </a>

    <a href="index.php" target="_blank" class="btn-lihat-web">
      Lihat Website
    </a>

    <a href="logout.php">
      Logout
    </a>

  </div>

  <!-- CONTENT -->
  <div class="admin-content">

    <h1>
      Selamat Datang Admin 😎🔥
    </h1>

    <div class="admin-cards">
      
      <a href="kelola_berita.php" style="text-decoration: none; color: inherit;">
        <div class="admin-card">
          <h3>Berita</h3>
          <p>Kelola berita sekolah</p>
        </div>
      </a>

      <a href="kelola_galeri.php" style="text-decoration: none; color: inherit;">
        <div class="admin-card">
          <h3>Galeri</h3>
          <p>Upload foto kegiatan</p>
        </div>
      </a>

      <a href="kelola_saran.php" style="text-decoration: none; color: inherit;">
        <div class="admin-card">
          <h3>Saran</h3>
          <p>Lihat masukan pengunjung</p>
        </div>
      </a>
    </div>

  </div>

</div>

</body>
</html>