<?php
//Authentication
include "../../../config/authentication_kustomer.php";

session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

$usr=base64_decode($_GET[usr]);
$sidnow=session_id();

//delete user
if ($module=='profil' AND $act=='delete'){
  mysqli_query($koneksi,"DELETE FROM kustomer WHERE id_kustomer = '$usr' AND id_session = '$_GET[sid]'");
  
  if ($_SESSION[leveluser] == 'admin'){
  header('location:../../media.php?module='.$module.'&msg=delete');
  }
  else{
	session_start();
	session_destroy();
  header('location:../../media.php?module='.$module.'&msg=delete');
  }
}

// Update user
else if ($module=='profil' AND $act=='update'){
  if (empty($_POST[password])) {
	$query="UPDATE kustomer SET nama_lengkap   = '$_POST[nama_lengkap]',
								  alamat		 = '$_POST[alamat]',
                                  kode_pos		 = '$_POST[kode_pos]',
								  propinsi		 = '$_POST[propinsi]',";
	if($_POST[kota]=='lainnya'){
		$query=$query."			  kota		 	 = '$_POST[kotalain]',";
	}
	else{
		$query=$query."			  kota		 	 = '$_POST[kota]',";
	}
	
	$query=$query."				  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'
								  
                           WHERE  id_kustomer = '$usr' AND id_session = '$_GET[id]'";
	$sql=mysqli_query($query);					   
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    $query="UPDATE kustomer SET password 		 = '$pass',
								  nama_lengkap   = '$_POST[nama_lengkap]',
								  alamat		 = '$_POST[alamat]',
                                  kode_pos		 = '$_POST[kode_pos]',
								  propinsi		 = '$_POST[propinsi]',";
	if($_POST[kota]=='lainnya'){
		$query=$query."			  kota		 	 = '$_POST[kotalain]',";
	}
	else{
		$query=$query."			  kota		 	 = '$_POST[kota]',";
	}
	
	$query=$query."				  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'
								  
                           WHERE  id_kustomer = '$usr' AND id_session = '$_GET[id]'";
	$sql=mysqli_query($query);
  }
	if (!$sql){
		echo"Rubah data kustomer gagal<br/>";
		echo"<a href=javascript:history.go(-1)>kembali</a>";
	  }
	else{
  header('location:../../media.php?module='.$module.'&msg=update');
	}
}


?>
