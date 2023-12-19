<?php
include 'koneksi.php';

// Periksa apakah metode permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil ID alumni yang akan dihapus dari parameter POST
    $beritaId = $_POST['beritaId'];

    // Query SQL untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM berita WHERE id_berita = $beritaId";

    if ($koneksi->query($sql) === TRUE) {
        // Data berhasil dihapus
        echo json_encode(array('message' => 'Data berhasil dihapus'));
    } else {
        // Kesalahan saat menghapus data
        echo json_encode(array('message' => 'Gagal menghapus data: ' . $koneksi->error));
    }
} else {
    // Jika metode permintaan bukan POST
    echo json_encode(array('message' => 'Metode permintaan tidak valid'));
}

$koneksi->close();
?>
