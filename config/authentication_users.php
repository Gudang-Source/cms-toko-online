<?php
//authentication user
include"koneksi.php";
session_start();
$login=mysqli_query($koneksi,"SELECT COUNT(*) AS cek FROM users  WHERE username='$_SESSION[namauser]' AND password='$_SESSION[passuser]' AND level='$_SESSION[leveluser]'");
$hasil=mysqli_fetch_array($login);

if ($hasil[cek] == 0){ 
  //echo "<link href='style.css' rel='stylesheet' type='text/css'><center>Untuk mengakses modul, Anda harus login <br>";
  //echo"<script>alert('Akses tidak ditolak.')</script>";
  //echo"<script>document.location.href='index.php';</script>";
  //print("<html><head><meta http-equiv='refresh' content='0;url=index.php'></head><body></body></html>");
  echo"<meta http-equiv='refresh' content='0;url=../index.php'>";
  exit;
}
?>