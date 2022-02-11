<?php
session_start();

include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_ketua = mysqli_real_escape_string($koneksi, $_POST['nama_ketua']);
    $nim_ketua = mysqli_real_escape_string($koneksi, $_POST['nim_ketua']);
    $ttl_ketua = mysqli_real_escape_string($koneksi, $_POST['ttl_ketua']);
    $jenis_kelamin_ketua = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin_ketua']);
    $prodi_ketua = mysqli_real_escape_string($koneksi, $_POST['prodi_ketua']);
    $semester_ketua = mysqli_real_escape_string($koneksi, $_POST['semester_ketua']);

    $nama_wakil = mysqli_real_escape_string($koneksi, $_POST['nama_wakil']);
    $nim_wakil = mysqli_real_escape_string($koneksi, $_POST['nim_wakil']);
    $ttl_wakil = mysqli_real_escape_string($koneksi, $_POST['ttl_wakil']);
    $jenis_kelamin_wakil = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin_wakil']);
    $prodi_wakil = mysqli_real_escape_string($koneksi, $_POST['prodi_wakil']);
    $semester_wakil = mysqli_real_escape_string($koneksi, $_POST['semester_wakil']);

    $no_urut = mysqli_real_escape_string($koneksi, $_POST['no_urut']);
    $visi_dan_misi = mysqli_real_escape_string($koneksi, $_POST['visi_dan_misi']);

    $ekstensi_diperbolehkan = array('png', 'jpg', 'JPG');
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran <= 2000000) {
            move_uploaded_file($file_tmp, 'foto/bem/' . $foto);
        }
    }

    mysqli_query($koneksi, "INSERT INTO calon_bem(id, foto, nama_ketua, nim_ketua, ttl_ketua, jenis_kelamin_ketua, prodi_ketua, semester_ketua, nama_wakil, nim_wakil, ttl_wakil, jenis_kelamin_wakil, prodi_wakil, semester_wakil, no_urut, visi_dan_misi)
    VALUES ('','$foto', '$nama_ketua', '$nim_ketua', '$ttl_ketua', '$jenis_kelamin_ketua', '$prodi_ketua', '$semester_ketua', '$nama_wakil', '$nim_wakil', '$ttl_wakil', '$jenis_kelamin_wakil', '$prodi_wakil', '$semester_wakil', '$no_urut', '$visi_dan_misi')");

    echo "<script>window.alert('Berhasil')
    window.location='input_data_calon3.php'</script>";
}
