<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query(

$conn,

"SELECT * FROM berita
WHERE id='$id'"

);

$d = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>
    <?= $d['judul']; ?>
  </title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="mini-page detail-page">
  <img
  src="uploads/<?=
  $d['gambar'];
  ?>"
  class="detail-image">

  <div class="detail-content">
    <div class="detail-date">
      <?= date(
      'd M Y',
      strtotime($d['tanggal'])
      ); ?>
    </div>

    <h1>
      <?= $d['judul']; ?>
    </h1>

    <p>
      <?= nl2br($d['isi']); ?>
    </p>

  </div>
</div>

</body>
</html>