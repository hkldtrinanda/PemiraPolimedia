<?php
include 'koneksi.php';

// mengambil data pemilih yang passwordnya masih belum diregenerate
$data_pemilih = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi NOT IN ('DIVISI IT')");

// menghitung data pemiilih
$jumlah_pemilih = mysqli_num_rows($data_pemilih);

// mengambil dan mengubah data pemilih
while ($d = mysqli_fetch_array($data_pemilih)) {
    $id = $d['id'];
    $kode_akses = generatorRandomString(8);
    mysqli_query($koneksi, "UPDATE tbl_pemilih SET kode_akses='$kode_akses' WHERE id='$id'");
}

function generatorRandomString($length = 8){
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)))), 1, $length);
}
?>