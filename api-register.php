<?php

include 'koneksi.php';

$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$foto = base64_decode($_POST['foto']);

$query_register = "SELECT * FROM admin WHERE username = '".$username."'";

$msql = mysqli_query($koneksi, $query_register);

$result = mysqli_num_rows($msql);

if (!empty($username) && !empty($nama) && !empty($password) && !empty($alamat) && !empty($foto) ) {
    if ($result == 0) {
        // Simpan gambar ke server (disesuaikan dengan lokasi penyimpanan gambar Anda)
        $fotoName = $username . '.jpg'; // Misalnya, nama file sesuai dengan NPM
        $uploadPath = 'imgAdmin/' . $fotoName;
        file_put_contents($uploadPath, $foto);

        $regis = "INSERT INTO admin (username, nama, password, alamat, foto) VALUES ('$username', '$nama', '$password', '$alamat', '$fotoName')";

        $msql_regis = mysqli_query($koneksi, $regis);

        echo "Daftar Berhasil";
    }else {
        echo "Username Sudah Digunakan";
    }
}else {
    echo "Semua Data Harus Diisi Lengkap";
}

?>