<?php

include 'koneksi.php';

$npm = $_POST['npm'];
$password = $_POST['password'];
$id_tahun_lulus = $_POST['id_tahun_lulus'];
$id_jurusan = $_POST['id_jurusan'];

$query_register = "SELECT * FROM alumni WHERE npm = '".$npm."'";

$msql = mysqli_query($koneksi, $query_register);

$result = mysqli_num_rows($msql);

if (!empty($npm) && !empty($password) && !empty($id_tahun_lulus && !empty($id_jurusan))) {
    if ($result == 0) {
        $regis = "INSERT INTO alumni (npm, password, id_tahun_lulus, id_jurusan) VALUES ('$npm', '$password', '$id_tahun_lulus', '$id_jurusan')";

        $msql_regis = mysqli_query($koneksi, $regis);

        echo "Daftar Berhasil";
    }else {
        echo "NPM Sudah Digunakan";
    }
}else {
    echo "Semua Data Harus Diisi Lengkap";
}

?>