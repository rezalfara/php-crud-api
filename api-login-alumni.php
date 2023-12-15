<?php

include 'koneksi.php';

$npm = $_GET['npm'];
$password = $_GET['password'];

$cek = "SELECT * FROM alumni WHERE BINARY npm = '$npm' AND BINARY password = '$password'";
$msql = mysqli_query($koneksi, $cek);
$result = mysqli_num_rows($msql);

if (!empty($npm) && !empty($password)) {
    if ($result == 0) {
        echo "NPM atau Password Salah";
    }else{
        echo "Selamat Datang";
    }
}else {
    echo "Ada Data Yang Masih Kosong";
}

?>