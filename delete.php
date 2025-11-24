<?php
include('conn.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "<div class='alert alert-danger text-center'>ID catatan tidak ditemukan!</div>";
    exit;
}

$noteRef = $database->getReference('notes/' . $id);
$note = $noteRef->getValue();

if (!$note) {
    echo "<div class='alert alert-danger text-center'>Catatan tidak ditemukan!</div>";
    exit;
}

// Hapus catatan
$noteRef->remove();

echo "<div class='alert alert-success text-center'>✅ Catatan berhasil dihapus!</div>";
echo "<div class='text-center mt-3'><a href='index.php' class='btn btn-secondary'>⬅ Kembali</a></div>";
