<?php
include 'koneksi.php';

if(isset($_POST['bsimpan'])) {
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_pemilih (nim, nama_mhs, prodi, semester, kode_akses, level)
										  VALUES ('$_POST[tnim]', 
										  		 '$_POST[tnama]', 
										  		 '$_POST[tprodi]', 
										  		 '$_POST[tsemester]'
										  		 '$_POST[tkode]'
										  		 '$_POST[tlevel]')
										 "); 
    
}
										
			if($simpan)
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
	}
?>