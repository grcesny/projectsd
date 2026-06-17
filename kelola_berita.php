<?php
session_start();
include 'koneksi.php';
$data = mysqli_query(
$conn,
"SELECT * FROM berita
ORDER BY id DESC"
);

?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Kelola Berita</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body style="padding-top:0;">

<div class="admin-container">
  <div class="sidebar">
    <h2>Admin Panel</h2>

    <a href="dashboard.php">
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

  <div class="admin-content">
    <h1>Kelola Berita</h1>
    <table class="table-berita">
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>

      <?php
      $no = 1;
      while($d = mysqli_fetch_array($data)){
      ?>

      <tr>
        <td><?= $no++; ?></td>
        <td>
          <img
          src="uploads/<?=
          $d['gambar'];
          ?>"
          width="100">
        </td>

        <td>
          <?= $d['judul']; ?>
        </td>

        <td>
          <?= date(
          'd M Y',
          strtotime($d['tanggal'])
          ); ?>
        </td>

        <td>
          <a
          href="edit_berita.php?id=<?=
          $d['id'];
          ?>"
          class="edit-btn">
            Edit
          </a>

          <a
          href="hapus_berita.php?id=<?=
          $d['id'];
          ?>"
          class="hapus-btn">
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