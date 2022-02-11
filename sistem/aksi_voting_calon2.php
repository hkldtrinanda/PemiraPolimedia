<?php
session_start();

include 'koneksi.php';

if (isset($_POST['voting'])) {
    $_SESSION['pilihan2'] = $_POST['pilihan2'];

    header("location:voting_calon3.php");
    exit;
}
