<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Tambah Berita</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>

<div class="mini-page">
  <h2>Tambah Berita</h2>
  <form
  action="proses_tambah_berita.php"
  method="POST"
  enctype="multipart/form-data">

    <input
    type="text"
    name="judul"
    placeholder="Judul berita"
    required>

    <textarea
    name="isi"
    placeholder="Isi berita"
    required>
    </textarea>

    <input
    type="file"
    name="gambar"
    required>

    <div class="aksi-form">
      <a href="dashboard.php" class="btn-kembali-bawah">Batal</a>
      <button type="submit" class="btn-simpan">Simpan Berita</button>
    </div>
  </form>

</div>

</body>
</html>