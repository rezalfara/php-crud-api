<?php

include 'koneksi.php';

$npm = $_GET['npm'];
$password = $_GET['password'];

$cek = "SELECT * FROM alumni WHERE npm = '$npm' AND password = '$password'";
$msql = mysqli_query($koneksi, $cek);
$result = mysqli_num_rows($msql);

if (!empty($npm) && !empty($password)) {
    if ($result == 0) {
        echo "0";
    }else{
        echo "Selamat Datang";
    }
}else {
    echo "Ada Data Yang Masih Kosong";
}

?>