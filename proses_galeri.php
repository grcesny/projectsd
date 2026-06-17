<?php

include 'koneksi.php';

$judul = $_POST['judul'];

$gambar = $_FILES['gambar']['name'];

$tmp = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp,"uploads/" . $gambar);

mysqli_query(
$conn,
"INSERT INTO galeri(
judul,
gambar
)

VALUES(

'$judul',
'$gambar'

)"

);

header("location:tambah_galeri.php");

?>