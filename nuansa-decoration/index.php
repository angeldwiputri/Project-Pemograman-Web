<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuansa Decoration</title>
    <link rel="stylesheet" href="asset/index.css" />
</head>
<body>

<nav class="navbar">
    <div class="navbar-container">
        <div class="logo">Nuansa Decoration</div>
        <ul class="nav-links">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="auth/login.php">Paket Wedding</a></li>
            <li><a href="auth/login.php">Booking</a></li>
            <li><a href="auth/login.php">Login</a></li>
        </ul>
    </div>
</nav>

<!-- HERO -->
<section id="hero">
  <div class="custom-carousel">
  <div class="slide active">
    <img src="asset/images/gambar1.jpg" alt="Slider 1" />
  </div>
  <div class="slide">
    <img src="asset/images/gambar2.jpg" alt="Slider 2" />
  </div>
  <div class="slide">
    <img src="asset/images/gambar3.jpg" alt="Slider 3" />
  </div>

  <div class="caption">
    <h1>Nuansa Decoration</h1>
    <p>Kami Tidak Sekadar Mendekorasi Ruang. Kami Menciptakan Kenangan.</p>
    <a href="auth/login.php" class="btn-primary">Lihat Koleksi Kami</a>
  </div>

  <button class="prev">&#10094;</button>
  <button class="next">&#10095;</button>
</div>

</section>

<!-- KENAPA KAMI -->
<section class="features">
  <h2>Kenapa Nuansa Decoration?</h2>
  <div class="feature-cards">
    <div class="feature-box">
      <img src="asset/images/kenapa1.jpeg" alt="Dekorasi Elegan">
      <h3>Karya Kami Bercerita</h3>
      <p>Kami memadukan warna, cahaya, dan detail untuk bercerita tentang siapa dirimu — dan apa yang ingin kamu rayakan.</p>
    </div>
    <div class="feature-box">
      <img src="asset/images/kenapa4.jpeg" alt="Dekorasi Eksklusif">
      <h3>Elegan. Eksklusif. Personal.</h3>
      <p>Setiap dekorasi adalah karya seni satu-satunya. Tidak pernah sama persis. Karena setiap klien adalah istimewa.</p>
    </div>
    <div class="feature-box">
      <img src="asset/images/kenapa3.jpeg" alt="Harga Jelas">
      <h3>Harga Jelas, Tanpa Drama</h3>
      <p>Tidak ada biaya tersembunyi. Kami percaya keindahan harus bisa dinikmati semua orang.</p>
    </div>
  </div>
</section>

<section class="gallery">
  <h2>Galeri Karya Kami</h2>
  <div class="gallery-grid">
    <img src="asset/images/karya1.jpeg" alt="Dekorasi 1">
    <img src="asset/images/karya2.jpeg" alt="Dekorasi 2">
    <img src="asset/images/karya4.jpeg" alt="Dekorasi 3">
  </div>
</section>

<!-- TESTIMONI -->
<section class="testimonials">
  <h2>Apa Kata Mereka?</h2>
  <div class="testimonial-list">
    <div class="testimonial-box">
      <p>“Gue nangis pas masuk venue. Gak nyangka mereka bisa bikin seindah itu. Semua orang bilang, ‘Acara gue paling mewah tahun ini.’”</p>
      <span>- Maya, Batam</span>
    </div>
    <div class="testimonial-box">
      <p>“Warna, cahaya, detail. Semua pas banget sama karakter gue dan pasangan. Gak cuma indah — ada ‘feel’-nya.”</p>
      <span>- Ferry, Medan</span>
    </div>
    <div class="testimonial-box">
      <p>“Orang tua gue bangga banget. Katanya ini kayak wedding sultan. Padahal budget gue pas-pasan.”</p>
      <span>- Rina, Pekanbaru</span>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="cta-content">
        <h3>Acara Biasa Membosankan.</h3>
        <p>Bersama Kami — Menjadi Kisah Yang Diceritakan.</p>
        <a href="auth/register.php" class="btn-primary">Booking Sekarang</a>
    </div>
</section>

<footer>
    <p>&copy; 2025 Nuansa Decoration</p>
</footer>

<script>
document.addEventListener("DOMContentLoaded", () => {
  let slides = document.querySelectorAll(".custom-carousel .slide");
  let current = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index);
    });
  }

  document.querySelector(".custom-carousel .next").addEventListener("click", () => {
    current = (current + 1) % slides.length;
    showSlide(current);
  });

  document.querySelector(".custom-carousel .prev").addEventListener("click", () => {
    current = (current - 1 + slides.length) % slides.length;
    showSlide(current);
  });

  setInterval(() => {
    current = (current + 1) % slides.length;
    showSlide(current);
  }, 5000);
});
</script>

</body>
</html>
