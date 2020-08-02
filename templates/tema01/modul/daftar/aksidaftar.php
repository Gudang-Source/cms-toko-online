<?php
session_start();
include "../../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
$usr=base64_decode($_GET[usr]);
$sidnow=session_id();

// Input user
if ($module=='aksidaftar' AND $act=='daftarkustomer'){
  $pass=md5($_POST[password]);
    //cek apakah username sudah digunakan
  $cek = mysqli_query($koneksi,"SELECT * FROM kustomer WHERE id_kustomer = '$_POST[username]'");
  $tampil = mysqli_num_rows($cek);
  
  if ($tampil > 0){
      
	echo"<script>alert('username sudah ada yang menggunakan! gunakan username lain.')</script>";
	echo"<script>document.location.href='javascript:history.go(-1)'</script>";
  }
  else{
      
  $sql=mysqli_query($koneksi,"INSERT INTO kustomer(id_kustomer,
                                 password,
                                 nama_lengkap,
								 alamat,
								 kode_pos,
								 propinsi,
								 kota,
                                 email, 
                                 no_telp,
								 level,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
								'$_POST[alamat]',
								'$_POST[kode_pos]',
								'$_POST[propinsi]',
								'$_POST[kota]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
								'kustomer',
                                '$sidnow')");
	  if (!$sql){
			echo"Pendaftaran kustomer gagal<br/>";
			echo("Error description: " . mysqli_error($koneksi));
			echo"<a href=javascript:history.go(-1)>kembali</a>";
			
	  }
	  else{
  header('location:../../media.php?module='.$module.'&msg=insert');
	  }
  }
}

?>