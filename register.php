<?php
include('koneksi.php');
$message = "";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if($stmt->execute()){
        $message = "<div class='alert alert-success'>✅ Akun berhasil dibuat!</div>";
    } else {
        $message = "<div class='alert alert-danger'>❌ Gagal membuat akun. Username mungkin sudah ada.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Akun</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow-lg p-4" style="max-width:400px; margin:auto; border-radius:15px;">
    <h3 class="text-center mb-4 text-primary">Register Akun</h3>
    <?= $message ?>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="d-grid gap-2">
        <button type="submit" name="register" class="btn btn-success">Daftar</button>
        <a href="login.php" class="btn btn-secondary">⬅ Login</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>