<?php
include 'koneksi.php';

// Ambil ID dari URL
$jurusanId = $_GET['id_jurusan'];

// Query SQL untuk mengambil data berdasarkan ID
$sql = "SELECT * FROM jurusan WHERE id_jurusan = $jurusanId;";

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
