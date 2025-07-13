<?php
// koneksi database
$koneksi = new mysqli("localhost", "root", "", "nuansa_db");

// cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// ambil data paket
$query = "SELECT * FROM paket_wedding";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lihat Vendor - Nuansa Decoration</title>
  <link rel="stylesheet" href="asset/vendor.css"/>
</head>
<body>

<nav class="navbar">
  <div class="navbar-container">
    <div class="logo">Nuansa Decoration</div>
    <ul class="nav-links">
      <li><a href="index.php">Beranda</a></li>
      <li><a href="vendor.php" class="btn-primary">Paket Wedding</a></li>
      <li><a href="booking.php" class="btn-primary">Booking</a></li>
      <li><a href="riwayat-booking.php" class="btn-primary">Riwayat Booking</a></li>
      <li><a href="auth/logout.php" class="btn-primary logout">Logout</a></li>
    </ul>
  </div>
</nav>

<section class="paket-section">
  <h2>Daftar Paket Wedding</h2>
  <div class="paket-list">
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="paket-card">
          <img src="asset/images/<?= htmlspecialchars($row['foto_paket']) ?>" alt="<?= htmlspecialchars($row['tipe']) ?>">
          <h3><?= htmlspecialchars($row['tipe']) ?></h3>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>Tidak ada paket wedding tersedia.</p>
    <?php endif; ?>
  </div>
</section>
</body>
</html>
