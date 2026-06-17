<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$pesan = $_POST['pesan'];

mysqli_query(
$conn,
"INSERT INTO saran(
nama,
pesan
)

VALUES(
'$nama',
'$pesan'
)"

);

header("location:index.php");

?>