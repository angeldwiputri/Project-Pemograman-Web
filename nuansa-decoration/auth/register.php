<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['user'] = [
            'id' => $stmt->insert_id,
            'name' => $name,
            'email' => $email
        ];
        header("Location: login.php");
        exit;
    } else {
        $error = "Registrasi gagal: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - Nuansa Decoration</title>
  <link rel="stylesheet" href="../asset/register.css" />
</head>
<body>

<div class="auth-container">
  <h2>Register</h2>
  <form method="post" action="">
    <input type="text" name="username" placeholder="Username" required />
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Register</button>
  </form>
  <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>

</body>
</html>
