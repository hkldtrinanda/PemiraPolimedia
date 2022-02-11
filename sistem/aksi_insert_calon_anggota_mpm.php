<?php
session_start();

include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $ttl = mysqli_real_escape_string($koneksi, $_POST['ttl']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $semester = mysqli_real_escape_string($koneksi, $_POST['semester']);
    $no_urut = mysqli_real_escape_string($koneksi, $_POST['no_urut']);
    $agenda_kerja_unggulan = mysqli_real_escape_string($koneksi, $_POST['agenda_kerja_unggulan']);

    $ekstensi_diperbolehkan = array('png', 'jpg', 'JPG');
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran <= 2000000) {
            move_uploaded_file($file_tmp, 'foto/anggota_mpm/' . $foto);
        }
    }

    mysqli_query($koneksi, "INSERT INTO calon_anggota_mpm(id, foto, nama, nim, ttl, jenis_kelamin, prodi, semester, no_urut, agenda_kerja_unggulan)
    VALUES ('', '$foto', '$nama','$nim','$ttl','$jenis_kelamin','$prodi', '$semester', '$no_urut', '$agenda_kerja_unggulan')");

    echo "<script>window.alert('Berhasil')
    window.location='input_data_calon2.php'</script>";
}
