<?php
include 'koneksi.php';
$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM saran
WHERE id='$id'"
);

header("location:kelola_saran.php");

?>