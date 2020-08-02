<?php
include "../config/koneksi.php";
$linkfrom = $_GET[lf];
function antiinjection($data){
  $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter_sql;
}

$username = antiinjection($_POST[username]);
$pass     = antiinjection(md5($_POST[password]));

	
$login=mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
   
  $_SESSION[namauser]     = $r[id_kustomer];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[level];
  
  $sid = session_id();
  mysqli_query($koneksi,"UPDATE kustomer SET id_session='$sid' WHERE id_kustomer='$username'");
  if ($linkfrom=='selesaibelanja'){
	//echo"<script>document.location.href='../selesai-belanja.html';</script>";
	header('location:../selesai-belanja.html');
  }
  elseif ($linkfrom=='daftarnlogin'){
	//echo"<script>document.location.href='../index.php';</script>";
	header('location:../index.php');
  }
  else{
	header('location:media.php?module=home');
  }
}
else{
    echo"<script>alert('". $_POST[username] ." | ". $username ." Login gagal.Username atau password anda tidak benar. Atau akun anda sedang diblokir.')</script>";
	echo"<script>document.location.href='javascript:history.go(-1)';</script>";
	/**
	echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
	echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
	**/
}
?>
