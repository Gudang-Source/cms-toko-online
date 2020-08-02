<?php
include "../../../config/authentication_users.php";
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
$usr=base64_decode($_GET[usr]);
$sidnow=session_id();

// Input user
if ($module=='kustomer' AND $act=='input'){
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
			echo"<a href=javascript:history.go(-1)>kembali</a>";
	  }
	  else{
  header('location:../../media.php?module='.$module.'&msg=insert');
	  }
  }
}

//delete user
else if ($module=='kustomer' AND $act=='delete'){
  mysqli_query($koneksi,"DELETE FROM kustomer WHERE id_kustomer = '$usr' AND id_session = '$_GET[sid]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}

//delete terpilih
elseif($module=='kustomer' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
  mysqli_query($koneksi,"DELETE FROM kustomer WHERE id_kustomer = '$usr' AND id_session = '$_GET[sid]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}


// Update user
else if ($module=='kustomer' AND $act=='update'){
  if (empty($_POST[password])) {
    mysqli_query($koneksi,"UPDATE kustomer SET nama_lengkap   = '$_POST[nama_lengkap]',
								  alamat		 = '$_POST[alamat]',
                                  kode_pos		 = '$_POST[kode_pos]',
								  propinsi		 = '$_POST[propinsi]',
								  kota		 	 = '$_POST[kota]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]' 
								  
                           WHERE  id_kustomer = '$usr' AND id_session = '$_GET[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysqli_query($koneksi,"UPDATE kustomer SET password       = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
								 alamat		     = '$_POST[alamat]',
                                 kode_pos		 = '$_POST[kode_pos]',
								 propinsi		 = '$_POST[propinsi]',
								 kota		 	 = '$_POST[kota]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_telp         = '$_POST[no_telp]'  
                           WHERE id_kustomer = '$usr' AND id_session = '$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=update');
}

?>