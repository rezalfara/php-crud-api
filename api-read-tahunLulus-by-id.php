<?php
include 'koneksi.php';

// Ambil ID dari URL
$tlId = $_GET['id_tahun_lulus'];

// Query SQL untuk mengambil data berdasarkan ID
$sql = "SELECT * FROM tahun_lulus WHERE id_tahun_lulus = $tlId;";

$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    // Mengembalikan data dalam format JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    // Jika data tidak ditemukan
    echo "Data tidak ditemukan";
}

$koneksi->close();
?>
