<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
  header("location:login.php");
  exit();
}

$data = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Galeri</title>
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
    <a href="index.php" target="_blank" class="btn-lihat-web">Lihat Website</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="admin-content">
    <h1>Kelola Galeri Foto</h1>

    <div style="margin-bottom: 20px;">
        <a href="tambah_galeri.php" style="background: #0b7a31; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px;">
           ➕ Tambah Foto Baru
        </a>
    </div>

    <table class="table-berita">
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Judul Foto</th>
        <th>Aksi</th>
      </tr>

      <?php
      $no = 1;
      while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?= $no++; ?></td>
        <td>
          <img src="uploads/<?= $d['gambar']; ?>" width="100" style="border-radius: 5px;">
        </td>
        <td><?= $d['judul']; ?></td>
        <td>
            <a href="edit_galeri.php?id=<?= $d['id']; ?>" style="background: #3498db; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; font-size: 13px; font-weight: bold; margin-right: 5px;">
                Edit
            </a>
            <a href="hapus_galeri.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus foto ini?')" style="background: #d9534f; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; font-size: 13px; font-weight: bold;">
                Hapus
            </a>
        </td>
      </tr>
      <?php } ?>
    </table>

  </div>
</div>

</body>
</html>