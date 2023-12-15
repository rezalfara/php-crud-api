<?php

include 'koneksi.php';

$username = $_GET['username'];
$password = $_GET['password'];

$cek = "SELECT * FROM admin WHERE BINARY username = '$username' AND BINARY password = '$password'";
$msql = mysqli_query($koneksi, $cek);
$result = mysqli_num_rows($msql);

if (!empty($username) && !empty($password)) {
    if ($result == 0) {
        echo "Username atau Password Salah";
    }else{
        echo "Selamat Datang";
    }
}else {
    echo "Ada Data Yang Masih Kosong";
}

?>