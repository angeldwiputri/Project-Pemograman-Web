<?php
include ('auth/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_pemesan'];
    $no_hp = $_POST['no_hp'];
    $tanggal_acara = $_POST['tanggal_acara'];
    $tipe = $_POST['tipe'];
    $id_paket = !empty($_POST['id_paket']) ? $_POST['id_paket'] : null;
    $catatan = $_POST['catatan'];

    $stmt = $conn->prepare("INSERT INTO tb_booking (nama_pemesan, no_hp, tanggal_acara, tipe, id_paket, catatan) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $nama, $no_hp, $tanggal_acara, $tipe, $id_paket, $catatan);

    if ($stmt->execute()) {
        echo "<script>alert('Booking berhasil!'); window.location.href='booking.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lihat Vendor - Nuansa Decoration</title>
  <link rel="stylesheet" href="asset/booking.css"/>
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
  <h2>Form Booking Vendor</h2>
  <form class="vendor-form" action="booking.php" method="post">
    <div>
      <label for="nama_pemesan">Nama Pemesan</label>
      <input type="text" name="nama_pemesan" id="nama_pemesan" required>
    </div>
    <div>
      <label for="no_hp">No. HP</label>
      <input type="text" name="no_hp" id="no_hp" required>
    </div>
    <div>
      <label for="tanggal_acara">Tanggal Acara</label>
      <input type="date" name="tanggal_acara" id="tanggal_acara" required>
    </div>
    <div>
      <label for="tipe">Tipe Acara</label>
      <select name="tipe" id="tipe" required>
        <option value="">Pilih Tipe</option>
        <option value="Intimate Wedding">Intimate Wedding</option>
        <option value="Akad">Akad</option>
        <option value="Resepsi">Resepsi</option>
      </select>
    </div>
    <div>
      <label for="id_paket">Paket Dekorasi</label>
      <select name="id_paket" id="id_paket">
        <option value="">Pilih Paket</option>
        <?php
        $paket = $conn->query("SELECT * FROM paket_wedding");
        if ($paket->num_rows > 0) {
            while ($row = $paket->fetch_assoc()) {
                echo "<option value='{$row['id_paket']}'>{$row['tipe']} - {$row['foto']}</option>";
            }
        }
        ?>
      </select>
    </div>
    <div style="grid-column: span 2;">
      <label for="catatan">Catatan</label>
      <textarea name="catatan" id="catatan"></textarea>
    </div>
    <button type="submit">Simpan Booking</button>
  </form>
</section>

</body>
</html>