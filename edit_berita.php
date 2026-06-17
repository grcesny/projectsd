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
    <title>Edit Berita</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="mini-page">
        <h2>Edit Berita</h2>
        <form
        action="proses_edit_berita.php"
        method="POST"
        enctype="multipart/form-data">
        <input
        type="hidden"
        name="id"
        value="<?= $d['id']; ?>">
        <input
        type="text"
        name="judul"
        value="<?= $d['judul']; ?>"
        required>
        <textarea
        name="isi"
        required><?= $d['isi']; ?>
        </textarea>
        <p>
        Gambar lama:
        </p>
        <img
        src="uploads/<?= $d['gambar']; ?>"
        width="200">
        
        <br><br>
        <input
        type="file"
        name="gambar">

        <button type="submit">
        Update Berita
        </button>
        </form>
    </div>

</body>
</html>