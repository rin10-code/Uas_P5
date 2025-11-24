<?php
session_start();
include('koneksi.php');
$message = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['username'] = $user['username'];
        header("Location: ../index.php"); // arahkan ke halaman utama catatan
        exit;
    } else {
        $message = "<div class='alert alert-danger'>❌ Username atau password salah.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Akun</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow-lg p-4" style="max-width:400px; margin:auto; border-radius:15px;">
    <h3 class="text-center mb-4 text-primary">Login Akun</h3>
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
        <button type="submit" name="login" class="btn btn-success">Login</button>
        <a href="register.php" class="btn btn-secondary">Daftar Akun Baru</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>