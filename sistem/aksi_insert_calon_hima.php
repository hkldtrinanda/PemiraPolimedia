<?php
session_start();

include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_ketua = mysqli_real_escape_string($koneksi, $_POST['nama_ketua']);
    $nim_ketua = mysqli_real_escape_string($koneksi, $_POST['nim_ketua']);
    $ttl_ketua = mysqli_real_escape_string($koneksi, $_POST['ttl_ketua']);
    $jenis_kelamin_ketua = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin_ketua']);
    $semester_ketua = mysqli_real_escape_string($koneksi, $_POST['semester_ketua']);

    $nama_wakil_1 = mysqli_real_escape_string($koneksi, $_POST['nama_wakil_1']);
    $nim_wakil_1 = mysqli_real_escape_string($koneksi, $_POST['nim_wakil_1']);
    $ttl_wakil_1 = mysqli_real_escape_string($koneksi, $_POST['ttl_wakil_1']);
    $jenis_kelamin_wakil_1 = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin_wakil_1']);
    $semester_wakil_1 = mysqli_real_escape_string($koneksi, $_POST['semester_wakil_1']);

    $nama_wakil_2 = mysqli_real_escape_string($koneksi, $_POST['nama_wakil_2']);
    $nim_wakil_2 = mysqli_real_escape_string($koneksi, $_POST['nim_wakil_2']);
    $ttl_wakil_2 = mysqli_real_escape_string($koneksi, $_POST['ttl_wakil_2']);
    $jenis_kelamin_wakil_2 = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin_wakil_2']);
    $semester_wakil_2 = mysqli_real_escape_string($koneksi, $_POST['semester_wakil_2']);

    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $no_urut = mysqli_real_escape_string($koneksi, $_POST['no_urut']);
    $visi_dan_misi = mysqli_real_escape_string($koneksi, $_POST['visi_dan_misi']);

    if ($_POST['prodi'] == 'Teknik Grafika' || $_POST['prodi'] == 'Teknik Kemasan' || $_POST['prodi'] == 'Teknik Perbaikan Mesin') {
        $jurusan = 'Teknik';
    } else if ($_POST['prodi'] == 'Penerbitan' || $_POST['prodi'] == 'Penyiaran' || $_POST['prodi'] == 'Periklanan' || $_POST['prodi'] == 'Fotografi') {
        $jurusan = 'Penerbitan';
    } else if ($_POST['prodi'] == 'Desain Grafis' || $_POST['prodi'] == 'Desain Mode' || $_POST['prodi'] == 'Teknologi Rekayasa Multimedia' || $_POST['prodi'] == 'Animasi' || $_POST['prodi'] == 'Teknologi Permainan') {
        $jurusan = 'Desain Grafis';
    } else if ($_POST['prodi'] == 'Perhotelan' || $_POST['prodi'] == 'Seni Kuliner') {
        $jurusan = 'Pariwisata';
    } else if ($_POST['prodi'] == 'Film dan Televisi') {
        $jurusan = 'Seni';
    }

    $ekstensi_diperbolehkan = array('png', 'jpg', 'JPG');
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran <= 2000000) {
            move_uploaded_file($file_tmp, 'foto/hima/' . $foto);
        }
    }

    mysqli_query($koneksi, "INSERT INTO calon_hima(id, foto, nama_ketua, nim_ketua, ttl_ketua, jenis_kelamin_ketua, semester_ketua, nama_wakil_1, nim_wakil_1, ttl_wakil_1, jenis_kelamin_wakil_1, semester_wakil_1, nama_wakil_2, nim_wakil_2, ttl_wakil_2, jenis_kelamin_wakil_2, semester_wakil_2, prodi, jurusan, no_urut, visi_dan_misi)
    VALUES ('', '$foto', '$nama_ketua','$nim_ketua','$ttl_ketua','$jenis_kelamin_ketua','$semester_ketua','$nama_wakil_1','$nim_wakil_1','$ttl_wakil_1','$jenis_kelamin_wakil_1','$semester_wakil_1','$nama_wakil_2','$nim_wakil_2','$ttl_wakil_2','$jenis_kelamin_wakil_2','$semester_wakil_2','$prodi', '$jurusan', '$no_urut', '$visi_dan_misi')");

    echo "<script>window.alert('Berhasil')
    window.location='input_data_calon4.php'</script>";
}
