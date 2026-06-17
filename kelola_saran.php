<?php
include 'koneksi.php';
$data = mysqli_query(
$conn,
"SELECT * FROM saran
ORDER BY id DESC"
);

?>
<body>

<link rel="stylesheet" href="admin.css">

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

  <!-- CONTENT -->
  <div class="admin-content">

    <h1>Data Saran</h1>

    <table class="table-berita">

      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Pesan</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>

      <?php
      $no = 1;
      while($d = mysqli_fetch_array($data)){
      ?>

      <tr>
        <td><?= $no++; ?></td>
        <td><?= $d['nama']; ?></td>
        <td><?= $d['pesan']; ?></td>
        <td><?= $d['tanggal']; ?></td>
        <td>

        <a
        href="hapus_saran.php?id=<?= $d['id']; ?>"
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