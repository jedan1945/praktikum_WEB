<?php
session_start(); // 🔹 Wajib di awal (lihat teori di Session.pdf)

if (isset($_SESSION['username'])) {
  header("Location: dashboard.php"); // jika sudah login
  exit;
}

// 🔹 Tangani form login dengan method POST (lihat Superglobal.pdf)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // 🔹 Contoh data user pakai Array Asosiatif (lihat Array Assosiatif.pdf)
  $user = [
    "username" => "admin",
    "password" => "12345"
  ];

  // 🔹 Cek username & password
  if ($username === $user['username'] && $password === $user['password']) {
    $_SESSION['username'] = $username; // simpan di session
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Username atau password salah!";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Portal Berita Gundam</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Login Portal Berita Gundam</h2>

  <?php if (!empty($error)) : ?>
    <p style="color:red;"><?php echo $error; ?></p>
  <?php endif; ?>

  <form method="POST" action="">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
  </form>
</body>
</html>
