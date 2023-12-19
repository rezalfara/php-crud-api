<?php

include 'koneksi.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data sent in the request
    $id_berita = $_POST['id_berita'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_posting = $_POST['tgl_posting'];
    $foto = base64_decode($_POST['foto']);

    // Check if all required fields are provided
    if (!empty($judul) || !empty($deskripsi) || !empty($tgl_posting) || !empty($foto)) {
        // Check if the alumni with the given NPM exists
        $query_check = "SELECT * FROM berita WHERE id_berita = '" . $id_berita . "'";
        $result_check = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result_check) > 0) {

            // Simpan gambar ke server (disesuaikan dengan lokasi penyimpanan gambar Anda)
            $fotoName = $id_berita . '-' . uniqid() . '.jpg'; // Misalnya, nama file sesuai dengan NPM
            $uploadPath = 'imgBerita/' . $fotoName;
            file_put_contents($uploadPath, $foto);

            // Update the berita data
            $update_berita = "UPDATE berita
                                SET judul = '$judul',
                                    deskripsi = '$deskripsi',
                                    tgl_posting = '$tgl_posting',
                                    foto = '$fotoName'
                                WHERE id_berita = '$id_berita'";

            $msql_update = mysqli_query($koneksi, $update_berita);

            if ($msql_update) {
                echo "sukses";
            } else {
                echo "Failed to update data";
            }
        } else {
            echo "ID not found. You can't update data for a non-existing berita.";
        }
    } else {
        echo "All fields must be provided.";
    }
} else {
    echo "Invalid request method. Use POST for updates.";
}
?>
