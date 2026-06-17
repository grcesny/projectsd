<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
  header("location:login.php");
  exit();
}

$id = $_GET['id'];

$cari = mysqli_query($conn, "SELECT gambar FROM galeri WHERE id='$id'");
$data = mysqli_fetch_array($cari);
$nama_gambar = $data['gambar'];

if(file_exists("uploads/" . $nama_gambar)){
    unlink("uploads/" . $nama_gambar);
}

$hapus = mysqli_query($conn, "DELETE FROM galeri WHERE id='$id'");

if($hapus){
    echo "<script>alert('Foto galeri berhasil dihapus!'); window.location='kelola_galeri.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='kelola_galeri.php';</script>";
}
?>