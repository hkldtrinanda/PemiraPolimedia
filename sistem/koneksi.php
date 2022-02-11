<?php 

$koneksi = mysqli_connect("localhost","pemirap1","admin","pemirap1_evoting_polimedia");

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}
