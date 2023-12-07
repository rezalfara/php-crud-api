<?php

include 'koneksi.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data sent in the request
    $id_admin = $_POST['id_admin'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $foto = base64_decode($_POST['foto']);

    // Check if all required fields are provided
    if (!empty($username) || !empty($nama) || !empty($alamat) || !empty($foto)) {
        // Check if the alumni with the given NPM exists
        $query_check = "SELECT * FROM admin WHERE id_admin = '" . $id_admin . "'";
        $result_check = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result_check) > 0) {

            // Simpan gambar ke server (disesuaikan dengan lokasi penyimpanan gambar Anda)
            $fotoName = $id_admin . '-' . uniqid() . '.jpg'; // Misalnya, nama file sesuai dengan NPM
            $uploadPath = 'imgAdmin/' . $fotoName;
            file_put_contents($uploadPath, $foto);

            // Update the alumni data
            $update_admin = "UPDATE admin
                                SET username = '$username',
                                    nama = '$nama',
                                    alamat = '$alamat',
                                    foto = '$fotoName'
                                WHERE id_admin = '$id_admin'";

            $msql_update = mysqli_query($koneksi, $update_admin);

            if ($msql_update) {
                echo "sukses";
            } else {
                echo "Failed to update data";
            }
        } else {
            echo "ID not found. You can't update data for a non-existing admin.";
        }
    } else {
        echo "All fields must be provided.";
    }
} else {
    echo "Invalid request method. Use POST for updates.";
}
?>
