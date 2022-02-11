<?php
session_start();

include 'koneksi.php';

if (isset($_POST['voting'])) {
    $_SESSION['pilihan3'] = $_POST['pilihan3'];
    
    if ($_SESSION['prodi'] == 'Film dan Televisi'){
        $id = $_SESSION['id'];
        $status = $_SESSION['status'];
        $pilihan1 = $_SESSION['pilihan1'] ;
        $pilihan2 = $_SESSION['pilihan2'] ;
        $pilihan3 = $_SESSION['pilihan3'] ;
        
        $waktu = date('Y-m-d H:i:s');
    
    
        mysqli_query($koneksi, "UPDATE tbl_pemilih SET 
                                        pilihan1='$pilihan1', 
                                        pilihan2='$pilihan2', 
                                        pilihan3='$pilihan3', 
                                        waktu_voting='$waktu',
                                        status='Sudah memilih'
                                        WHERE id='$id'");
    
        $_SESSION['status'] = 'Sudah memilih';
        
        echo "<script>window.alert('Voting Berhasil')
        window.location='index.php'</script>";
    }
    header("location:voting_calon4.php");
    exit;
}
