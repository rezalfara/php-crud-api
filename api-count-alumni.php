<?php
// get_alumni_data.php

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query_read = "SELECT jr.nama_jurusan, COUNT(*) as alumni_count
FROM alumni a
JOIN jurusan jr ON a.id_jurusan = jr.id_jurusan
GROUP BY jr.nama_jurusan
";
    
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
