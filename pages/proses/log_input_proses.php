<?php
include'../../koneksi.php';
$idlog=$_POST['idlog'];
$nama_log=$_POST['nama_log'];
$tanggal_log=$_POST['tanggal_log'];
$desc_log=$_POST['desc_log'];
	
	$sql = 
	"INSERT INTO logbook
		VALUES('$idlog','$nama_log','$tanggal_log','$desc_log')";
	$query = mysqli_query($db, $sql);

	header("location:../../logbook.php");
?>