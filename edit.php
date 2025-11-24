<?php
include('conn.php');

$id = isset($_GET['id']) ? $_GET['id'] : null; // ambil id dari URL
$message = "";

if (!$id) {
    echo "<div class='alert alert-danger text-center'>ID catatan tidak ditemukan!</div>";
    exit;
}

// Ambil data catatan dari Firebase
$noteRef = $database->getReference('notes/' . $id);
$note = $noteRef->getValue();

if (!$note) {
    echo "<div class='alert alert-danger text-center'>Catatan tidak ditemukan!</div>";
    exit;
}

// Update catatan jika form disubmit
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $updateData = [
        'title' => $title,
        'content' => $content
    ];

    $noteRef->update($updateData);

    $message = "<div class='alert alert-success text-center'>✅ Catatan berhasil diperbarui!</div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enote - Edit Catatan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-lg p-4" style="max-width: 600px; margin: auto; border-radius: 15px;">
    <h3 class="text-center mb-4 text-primary">Edit Catatan</h3>

    <?php if($message) echo $message; ?>

    <form method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($note['title']); ?>" required>
      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Isi Catatan</label>
        <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($note['content']); ?></textarea>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
        <a href="index.php" class="btn btn-secondary">⬅ Kembali</a>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
