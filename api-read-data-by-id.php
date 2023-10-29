<?php
include 'koneksi.php';

// Ambil ID dari URL
$alumniId = $_GET['id_alumni'];

// Query SQL untuk mengambil data berdasarkan ID
$sql = "SELECT * FROM alumni WHERE id_alumni = $alumniId;";

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
