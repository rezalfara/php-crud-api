<?php

include 'koneksi.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tgl_posting = $_POST['tgl_posting'];
$foto = base64_decode($_POST['foto']);

$query_create = "SELECT * FROM berita WHERE judul = '".$judul."'";

$msql = mysqli_query($koneksi, $query_create);

$result = mysqli_num_rows($msql);

if (!empty($judul) && !empty($deskripsi) && !empty($tgl_posting) && !empty($foto)) {
    if ($result == 0) {

        // Simpan gambar ke server (disesuaikan dengan lokasi penyimpanan gambar Anda)
        $fotoName = $judul . '.jpg'; // Misalnya, nama file sesuai dengan NPM
        $uploadPath = 'imgBerita/' . $fotoName;
        file_put_contents($uploadPath, $foto);

        $create_berita = "INSERT INTO berita (judul, deskripsi, tgl_posting, foto) 
                    VALUES ('$judul', '$deskripsi', '$tgl_posting', '$fotoName')";

        $msql_create = mysqli_query($koneksi, $create_berita);

        echo "Tambah Data Berhasil";
    }else {
        echo "Berita telah terdaftar";
    }
}else {
    echo "Semua Data Harus Diisi Lengkap";
}

?>





//<?php
//include 'koneksi.php';

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //  $data = json_decode(file_get_contents("php://input"), true);
//
  //  $npm = $data['npm'];
    //$nama = $data['nama'];
//    $tempat_lahir = $data['tempat_lahir'];
  //  $tgl_lahir = $data['tgl_lahir'];
    //$email = $data['email'];
    //$no_hp = $data['no_hp'];
    //$alamat = $data['alamat'];
    // $foto = $data['foto'];
    // $id_tahun_lulus = $data['id_tahun_lulus'];
    // $id_jurusan = $data['id_jurusan'];

    // $query_create = "INSERT INTO alumni (npm, nama, tempat_lahir, tgl_lahir, email, no_hp, alamat, foto, id_tahun_lulus, id_jurusan) 
//                     VALUES ('$npm', '$nama', '$tempat_lahir', '$tgl_lahir', '$email', '$no_hp', '$alamat', '$foto', '$id_tahun_lulus', '$id_jurusan')";

//     $result = mysqli_query($koneksi, $query_create);

//     if ($result) {
//         echo json_encode(array("message" => "Data alumni berhasil ditambahkan"));
//     } else {
//         echo json_encode(array("message" => "Gagal menambahkan data alumni"));
//     }
// } else {
//     echo json_encode(array("message" => "Metode permintaan tidak valid"));
// }
