<?php

include 'koneksi.php';

$nim = $_GET['nim'];

mysqli_query($koneksi, "DELETE FROM tbl_pemilih WHERE nim='$nim'");

header("location:input_data_pemilih.php");
