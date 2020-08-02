<?php
//authentication kustomer
include"koneksi.php";
session_start();
//cek kustomer
$cek=mysqli_query("SELECT COUNT(*) AS cek FROM kustomer WHERE id_kustomer='$_SESSION[namauser]' AND password='$_SESSION[passuser]' AND level='$_SESSION[leveluser]'");
$ada=mysqli_fetch_array($cek);

if ($ada[cek] == 0){ 
	echo"<script>alert('Silahkan Login terlebih dahulu.')</script>";
	//echo"<script>document.location.href='index.php'</script>";
	//print("<html><head><meta http-equiv='refresh' content='0;url=index.php'></head><body></body></html>");
	echo"<meta http-equiv='refresh' content='0;url=index.php'>";
	exit;
}

?>