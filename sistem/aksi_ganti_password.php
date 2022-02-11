<?php
session_start();
include 'koneksi.php';

if (isset($_POST['ganti'])) {
    $nim = $_SESSION['nim'];
    $password_lama = $_SESSION['kode_akses'];
    $password_baru = $_POST['password_baru'];
    $konf_password = $_POST['konf_password'];

    //validasi input konfirm password
    if (($_POST['password_baru']) != ($_POST['konf_password'])) {
        echo
            "<script>alert('Ganti Password GAGAL! Password Baru dan Konfirm Password harus sama')
        document.location.href = 'ganti_password.php';</script>";
    } else {

        //update data
        mysqli_query($koneksi, "UPDATE tbl_pemilih SET kode_akses='$password_baru' WHERE nim='$nim'");
        echo "<script>alert('Ganti Password BERHASIL.')
        document.location.href = 'ganti_password.php';</script>";
    }
}
