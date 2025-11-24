<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: App/login.php");
    exit;
}
?>
<?php
include('conn.php');

$reference = $database->getReference('notes'); 
$snapshot = $reference->getValue();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-Note</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-9">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-primary">Daftar Catatan</h3>
            <div>
                <a href="add.php" class="btn btn-success">Tambah Catatan</a>
                <a href="App/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <?php
        if ($snapshot) {
            echo "<div class='list-group'>";
            foreach ($snapshot as $id => $note) {
                echo "<div class='list-group-item list-group-item-action mb-2'>
                        <div class='d-flex w-100 justify-content-between align-items-center'>
                            <h5 class='mb-1'>".$note['title']."</h5>
                            <div>
                                <a href='edit.php?id=$id' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id=$id' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus catatan ini?');\">Hapus</a>
                            </div>
                        </div>
                        <p class='mb-1'>".$note['content']."</p>
                    </div>";
            }
            echo "</div>";
        } else {
            echo "<div class='alert alert-info text-center'>Belum ada catatan.</div>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
