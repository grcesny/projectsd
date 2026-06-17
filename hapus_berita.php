<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query(

$conn,
"SELECT * FROM berita
WHERE id='$id'"
);

$d = mysqli_fetch_array($data);
unlink(
"uploads/" . $d['gambar']
);

mysqli_query(
$conn,
"DELETE FROM berita
WHERE id='$id'"
);

header("location:kelola_berita.php");

?>