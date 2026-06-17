<?php 
include 'koneksi.php'; 

// Ambil semua data foto dari tabel galeri, urutkan dari yang terbaru
$ambil_galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informasi - SDN 145 Maluku Tengah</title>
  <link rel="stylesheet" href="style.css">
   <style>
    #chat-icon {
      display: none !important;
    }
  </style>
</head>
<body>

<?php include 'header.php'; ?>

<section class="mini-page">

  <h2>Galeri Sekolah</h2>

  <div class="gallery">

    <?php
    $hitung = 0;
    while($g = mysqli_fetch_array($ambil_galeri)){
      $hitung++;
      // Foto ke-4 dan seterusnya akan diberi class 'hidden' sesuai logika awal Anda
      $class_hidden = ($hitung > 3) ? 'hidden' : '';
    ?>
      <div class="gallery-item <?= $class_hidden; ?>">
        <img src="uploads/<?= $g['gambar']; ?>" alt="<?= $g['judul']; ?>">
        <p><?= $g['judul']; ?></p>
      </div>
    <?php } ?>

    <?php if(mysqli_num_rows($ambil_galeri) == 0){ ?>
      <p style="text-align: center; grid-column: 1 / -1; color: gray;">Belum ada foto galeri.</p>
    <?php } ?>

  </div>

  <?php if(mysqli_num_rows($ambil_galeri) > 3){ ?>
  <div style="text-align:center; margin-top:30px;">
    <button class="lihat-btn" id="btn-toggle-gallery">
      Lihat Semua Foto
    </button>
  </div>
  <?php } ?>

</section>

<?php include 'footer.php'; ?>

<script>
  document.getElementById('btn-toggle-gallery').addEventListener('click', function() {
    const hiddenItems = document.querySelectorAll('.gallery-item.hidden');
    if (hiddenItems.length > 0) {
      hiddenItems.forEach(item => {
        item.classList.remove('hidden');
      });
      this.textContent = 'Sembunyikan Foto';
    } else {
      // Mengembalikan class hidden jika ingin disembunyikan kembali
      const allItems = document.querySelectorAll('.gallery-item');
      allItems.forEach((item, index) => {
        if(index >= 3) {
          item.classList.add('hidden');
        }
      });
      this.textContent = 'Lihat Semua Foto';
    }
  });
</script>

</body>
</html>