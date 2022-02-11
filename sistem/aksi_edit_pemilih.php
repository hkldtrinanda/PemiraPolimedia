<?php
include 'koneksi.php';

if($_GET['act'] == 'updateuser'){
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $prodi = $_POST['prodi'];
    $kode_akses = $_POST['kode_akses'];

    $queryupdate = mysqli_query($koneksi, "UPDATE tbl_pemilih SET id='$id' , nim='$nim' , nama_mhs='$nama_mhs' , prodi='$prodi' , kode_akses='$kode_akses' WHERE id='$id'" );

    if ($queryupdate) {
        header("location:input_data_pemilih.php?pesan=berhasil");    
    }
    else{
        echo "ERROR, data gagal diedit". mysqli_error($koneksi);
    }
}
elseif($_GET['act'] == 'tambahuser'){
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $prodi = $_POST['prodi'];
    $kode_akses = $_POST['kode_akses'];

    $querytambah = mysqli_query($koneksi, "INSERT INTO tbl_pemilih VALUES('$nim' , '$nama_mhs' , '$prodi' , '$kode_akses')");

    if ($querytambah) {
        header("location:input_data_pemilih.php?pesan=berhasil");    
    }
    else{
        echo "ERROR, data gagal diedit". mysqli_error($koneksi);
    }
}
?>