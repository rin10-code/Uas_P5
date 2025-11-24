<?php
include('conn.php');

$message = "";

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $newNote = [
        'title' => $title,
        'content' => $content
    ];

    $postRef = $database->getReference('notes')->push($newNote);

    if ($postRef) {
        $message = "<div class='alert alert-success text-center'>✅ Catatan berhasil disimpan!</div>";
    } else {
        $message = "<div class='alert alert-danger text-center'>❌ Gagal menyimpan catatan.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enote - Tambah Catatan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-lg p-4" style="max-width: 600px; margin: auto; border-radius: 15px;">
    
    <h3 class="text-center mb-4 text-primary">Tambah Catatan</h3>

    <!-- Pesan sukses atau error -->
    <?php 
      if (!empty($message)) { 
        echo $message; 
      } 
    ?>

    <form action="" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Judul Catatan</label>
        <input type="text" name="title" id="title" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Isi Catatan</label>
        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
      </div>

      <button type="submit" name="submit" class="btn btn-primary w-100">
        Simpan Catatan
      </button>
    </form>

    <div class="text-center mt-3">
      <a href="index.php" class="btn btn-outline-secondary w-100">Kembali ke Daftar Catatan</a>
    </div>

  </div>
</div>

</body>
</html>
