<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<section class="hero">

  <div class="hero-overlay"></div>

  <div class="hero-content">

    <p class="hero-subtitle">
      Selamat Datang di
    </p>

    <h1>
      SDN 145 MALUKU TENGAH
    </h1>

    <p class="hero-text">
      Sekolah unggul, berprestasi,
      dan berkarakter.
    </p>


  </div>

</section>

<section class="profile-modern">

  <div class="profile-left">

    <div class="profile-icon">🏫</div>

    <div>
      <h2>Profil Sekolah</h2>

      <p>
        SDN 145 Maluku Tengah merupakan sekolah yang berdiri sejak tahun 1986
        dengan komitmen menciptakan siswa yang berprestasi dan berkarakter.
      </p>

     <a href="profile.php" class="btn-profile">Selengkapnya →</a>
    </div>

  </div>

  <div class="profile-right">
    <img src="gambar.jpg">
  </div>

</section>

<section class="berita-section">

  <h2>Berita Sekolah</h2>

  <div class="card-container">

    <?php

include 'koneksi.php';

$data = mysqli_query(

$conn,

"SELECT * FROM berita
ORDER BY id DESC"

);

while($d = mysqli_fetch_array($data)){

?>

<a
href="detail_berita.php?id=<?=
$d['id'];
?>"

class="card-modern">

  <img src="uploads/<?=
  $d['gambar'];
  ?>">

  <div class="card-body">

    <div class="card-date">

      <?= date(
      'd M Y',
      strtotime($d['tanggal'])
      ); ?>

    </div>

    <h3>

      <?= $d['judul']; ?>

    </h3>

    <p>

      <?= substr(
      $d['isi'],
      0,
      120
      ); ?>

    </p>

  </div>

</a>

<?php } ?>

</div>
</section>


<?php include 'footer.php'; ?>

<div id="chatbox">

  <div class="chat-header" onclick="toggleChat()" style="cursor:pointer;">💬 Chat Sekolah</div>

  <div id="messages"></div>

<div class="quick-buttons">
  <button onclick="quickChat('Bagaimana cara daftar PPDB?')">📚 PPDB</button>
  <button onclick="quickChat('Jadwal sekolah bagaimana?')">⏰ Jadwal</button>
  <button onclick="quickChat('Apa saja ekstrakurikuler di sekolah?')">🎯 Ekskul</button>
</div>
  
  <div class="chat-input">
    <input type="text" id="user-input" placeholder="Tanya sesuatu...">
    <button onclick="sendMessage()">Kirim</button>
  </div>

</div>

<script>
function toggleChat() {
  var chat = document.getElementById("chatbox");
  chat.classList.toggle("active");
}
</script>

<script src="script.js"></script>

</body>
</html>