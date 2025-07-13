<?php
include 'auth/db.php';

// Ambil semua data booking
$query = "SELECT b.*, p.foto_paket, p.tipe 
          FROM tb_booking b
          LEFT JOIN paket_wedding p ON b.id_paket = p.id_paket
          ORDER BY b.id_booking DESC";

$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lihat Vendor - Nuansa Decoration</title>
  <link rel="stylesheet" href="asset/riwayat-booking.css"/>
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
<section class="vendor-section">
  <h2>Riwayat Booking</h2>

  <div class="vendor-list">
    <?php if ($result->num_rows > 0) : ?>
      <?php while($row = $result->fetch_assoc()) : ?>
        <div class="vendor-card">
          <?php if (!empty($row['foto'])) : ?>
            <img src="asset/<?= htmlspecialchars($row['foto']) ?>" alt="<?= htmlspecialchars($row['tipe']) ?>">
          <?php endif; ?>
          <h3><?= htmlspecialchars($row['nama_pemesan']) ?></h3>
          <p><strong>No. HP:</strong> <?= htmlspecialchars($row['no_hp']) ?></p>
          <p><strong>Tanggal Acara:</strong> <?= htmlspecialchars($row['tanggal_acara']) ?></p>
          <p><strong>Tipe Acara:</strong> <?= htmlspecialchars($row['tipe']) ?></p>
          <p><strong>Paket Dekorasi:</strong> <?= $row['id_paket'] ? htmlspecialchars($row['tipe']) : '-' ?></p>
          <p><strong>Catatan:</strong> <?= htmlspecialchars($row['catatan']) ?></p>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <p>Tidak ada data booking.</p>
    <?php endif; ?>
  </div>
</section>

</body>
</html>