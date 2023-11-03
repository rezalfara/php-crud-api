<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query_read = "SELECT * FROM alumni";
    
    $result = mysqli_query($koneksi, $query_read);

    if (mysqli_num_rows($result) > 0) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode(array("message" => "Data alumni tidak ditemukan"));
    }
} else {
    echo json_encode(array("message" => "Metode permintaan tidak valid"));
}
?>



<!-- //include 'koneksi.php'; -->

<!-- $query_read = "SELECT * FROM alumni";
$result = mysqli_query($koneksi, $query_read);

if (mysqli_num_rows($result) > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(array("message" => "Data tidak ditemukan"));
}
?> -->
