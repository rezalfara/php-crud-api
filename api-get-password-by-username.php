<?php
include 'koneksi.php';

// Ambil ID dari URL
$username = $_GET['username'];

// Query SQL untuk mengambil data berdasarkan ID
$sql = "SELECT password FROM admin WHERE username = $username;";

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
