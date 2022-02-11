<?php
session_start();

include 'koneksi.php';

if (isset($_POST['voting'])) {
    $_SESSION['pilihan1'] = $_POST['pilihan1'];

    header("location:voting_calon2.php");
    exit;
}
