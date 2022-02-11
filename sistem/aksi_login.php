<?php
session_start();
include_once 'koneksi.php';

if (isset($_POST['login'])) {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $kode_akses = mysqli_real_escape_string($koneksi, $_POST['kode_akses']);
    $data_nim = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE nim='$nim'");
    if (mysqli_num_rows($data_nim) < 2) {
        if (mysqli_num_rows($data_nim) === 1) {
            $data_akses = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE nim='$nim' AND kode_akses = '$kode_akses'");
            $r = mysqli_fetch_array($data_akses);
            $id = $r['id'];
            $nim = $r['nim'];
            $nama_mhs = $r['nama_mhs'];
            $prodi = $r['prodi'];
            $semester = $r['semester'];
            $status = $r['status'];
            $kode_akses = $r['kode_akses'];
            $level = $r['level'];
            if (mysqli_num_rows($data_akses) === 1) {
                $_SESSION["id"] = $id;
                $_SESSION["login"] = true;
                $_SESSION['nim'] = $nim;
                $_SESSION['nama_mhs'] = $nama_mhs;
                $_SESSION['prodi'] = $prodi;
                $_SESSION['semester'] = $semester;
                $_SESSION['status'] = $status;
                $_SESSION['kode_akses'] = $kode_akses;
                $_SESSION['level'] = $level;
                $_SESSION['pilihan1'] = "";
                $_SESSION['pilihan2'] = "";
                $_SESSION['pilihan3'] = "";
                $_SESSION['pilihan4'] = "";
                
                header('location:index.php');
            } else {
                echo "<script>alert('Password tidak benar')
                window.location='login.php'</script>";
            }
        } else {
            echo "<script>alert('NIM tidak ditemukan')
                window.location='login.php'</script>";
        }
    }else{
        echo "<script>alert('NIM lebih dari satu')
                window.location='login.php'</script>";
    }
}
