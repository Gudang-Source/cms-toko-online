<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 
  echo "
  <link href='../../css/stylesheet.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../favicon.png' />";

  echo "
  <body class='special-page'>
  <div id='container'>
  
  <section id='error-number'>
  <center><div class='gembok'><img src='../../img/lock.png'></div></center>
  <h1>AKSES ILEGAL</h1>
  <p class='maaf'>Untuk mengakses modul, Anda harus login dahulu!</p><br/>
  </section>
  
  <section id='error-text'>
  <p><a class='tombol' href=../../index.php><b>LOGIN DISINI</b></a></p>
  </section>
  </div>";}




else{
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
$id=$_POST[id];

// Hapus YM
if ($module=='ym' AND $act=='hapus'){
  mysqli_query($koneksi,"DELETE FROM mod_ym WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}


// Hapus Terseleksi
elseif($module=='ym' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysqli_query($koneksi,"DELETE FROM mod_ym WHERE id=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
}




// Input YM
elseif ($module=='ym' AND $act=='input'){
  mysqli_query($koneksi,"INSERT INTO mod_ym(nama,username) VALUES('$_POST[nama]','$_POST[username]')");
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update YM
elseif ($module=='ym' AND $act=='update'){
  mysqli_query($koneksi,"UPDATE mod_ym SET nama='$_POST[nama]',username='$_POST[username]' WHERE id = '$id'");
   header('location:../../media.php?module='.$module.'&msg=update');
}}
?>