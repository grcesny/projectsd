<?php
include 'koneksi.php';
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$namaGambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
move_uploaded_file(
  $tmp,
  "uploads/" . $namaGambar
);

mysqli_query(
$conn,
"INSERT INTO berita(
judul,
isi,
gambar
)

VALUES(
'$judul',
'$isi',
'$namaGambar'
)"

);

header("location:tambah_berita.php");

?>