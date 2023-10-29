<?php

include 'koneksi.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data sent in the request
    $id_alumni = $_POST['id_alumni'];
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $foto = $_POST['foto'];
    $id_tahun_lulus = $_POST['id_tahun_lulus'];
    $id_jurusan = $_POST['id_jurusan'];

    // Check if all required fields are provided
    if (!empty($npm) && !empty($nama) && !empty($tempat_lahir) && !empty($tgl_lahir) && !empty($jk) && !empty($email) && !empty($no_hp) && !empty($alamat) && !empty($foto) && !empty($id_tahun_lulus) && !empty($id_jurusan)) {
        // Check if the alumni with the given NPM exists
        $query_check = "SELECT * FROM alumni WHERE id_alumni = '" . $id_alumni . "'";
        $result_check = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result_check) > 0) {
            // Update the alumni data
            $update_alumni = "UPDATE alumni AS a
                                JOIN tahun_lulus AS t ON a.id_tahun_lulus = t.id_tahun_lulus
                                JOIN jurusan AS j ON a.id_jurusan = j.id_jurusan
                                SET a.npm = '$npm',
                                    a.nama = '$nama',
                                    a.tempat_lahir = '$tempat_lahir',
                                    a.tgl_lahir = '$tgl_lahir',
                                    a.jk = '$jk',
                                    a.email = '$email',
                                    a.no_hp = '$no_hp',
                                    a.alamat = '$alamat',
                                    a.foto = '$foto',
                                    a.id_tahun_lulus = '$id_tahun_lulus',
                                    a.id_jurusan = '$id_jurusan'
                                WHERE a.id_alumni = '$id_alumni';";

            $msql_update = mysqli_query($koneksi, $update_alumni);

            if ($msql_update) {
                echo "sukses";
            } else {
                echo "Failed to update data";
            }
        } else {
            echo "ID not found. You can't update data for a non-existing alumni.";
        }
    } else {
        echo "All fields must be provided.";
    }
} else {
    echo "Invalid request method. Use POST for updates.";
}
?>
