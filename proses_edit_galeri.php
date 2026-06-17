<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
  header("location:login.php");
  exit();
}

$id     = $_POST['id'];
$judul  = $_POST['judul'];
$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];

if($gambar != "") {
    $cari = mysqli_query($conn, "SELECT gambar FROM galeri WHERE id='$id'");
    $data = mysqli_fetch_array($cari);
    $gambar_lama = $data['gambar'];

    if(file_exists("uploads/" . $gambar_lama)){
        unlink("uploads/" . $gambar_lama);
    }
    move_uploaded_file($tmp, "uploads/" . $gambar);
    $query = mysqli_query($conn, "UPDATE galeri SET judul='$judul', gambar='$gambar' WHERE id='$id'");

} else {
    $query = mysqli_query($conn, "UPDATE galeri SET judul='$judul' WHERE id='$id'");
}

if($query){
    header("location:kelola_galeri.php");
    exit();
} else {
    echo "<script>alert('Gagal memperbarui galeri!'); window.history.back();</script>";
    exit();
}
?>