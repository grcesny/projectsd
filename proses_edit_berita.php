<?php
include 'koneksi.php';
$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

// cek upload gambar 
if($_FILES['gambar']['name'] != ''){
  $gambar = $_FILES['gambar']['name'];
  $tmp = $_FILES['gambar']['tmp_name'];
  move_uploaded_file(
    $tmp,
    "uploads/" . $gambar
  );

  mysqli_query(

  $conn,
  "UPDATE berita SET
  judul='$judul',
  isi='$isi',
  gambar='$gambar'
  WHERE id='$id'"
  );

}else{
  mysqli_query(
  $conn,
  "UPDATE berita SET
  judul='$judul',
  isi='$isi'
  WHERE id='$id'"
  );
}

header("location:kelola_berita.php");

?>