<?php

include 'koneksi.php';

$npm = $_POST['npm'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$foto = base64_decode($_POST['foto']);
$id_tahun_lulus = $_POST['id_tahun_lulus'];
$id_jurusan = $_POST['id_jurusan'];

$query_register = "SELECT * FROM alumni WHERE npm = '".$npm."'";

$msql = mysqli_query($koneksi, $query_register);

$result = mysqli_num_rows($msql);

if (!empty($npm) && !empty($nama) && !empty($password) && !empty($foto) && !empty($id_tahun_lulus) && !empty($id_jurusan)) {
    if ($result == 0) {
        // Simpan gambar ke server (disesuaikan dengan lokasi penyimpanan gambar Anda)
        $fotoName = $npm . '.jpg'; // Misalnya, nama file sesuai dengan NPM
        $uploadPath = 'img/' . $fotoName;
        file_put_contents($uploadPath, $foto);

        $regis = "INSERT INTO alumni (npm, nama, password, foto, id_tahun_lulus, id_jurusan) VALUES ('$npm', '$nama', '$password', '$fotoName', '$id_tahun_lulus', '$id_jurusan')";

        $msql_regis = mysqli_query($koneksi, $regis);

        echo "Daftar Berhasil";
    }else {
        echo "NPM Sudah Digunakan";
    }
}else {
    echo "Semua Data Harus Diisi Lengkap";
}

?>