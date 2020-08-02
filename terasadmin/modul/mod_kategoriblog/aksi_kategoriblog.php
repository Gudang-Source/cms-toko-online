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
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus kategoriblog
if ($module=='kategoriblog' AND $act=='hapus'){
  mysqli_query($koneksi,"DELETE FROM kategoriblog WHERE id_kategoriblog='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}


// Hapus Terseleksi
elseif($module=='kategoriblog' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysqli_query($koneksi,"DELETE FROM kategoriblog WHERE id_kategoriblog=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
}

// Input kategoriblog
elseif ($module=='kategoriblog' AND $act=='input'){
  $kategoriblog_seo = seo_title($_POST['nama_kategoriblog']);
  
  mysqli_query($koneksi,"INSERT INTO kategoriblog
  (nama_kategoriblog,
  username,
  kategoriblog_seo) 
  
  VALUES(
  '$_POST[nama_kategoriblog]',
  '$_SESSION[namauser]',
  '$kategoriblog_seo')");
   
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update kategoriblog
elseif ($module=='kategoriblog' AND $act=='update'){
  $kategoriblog_seo = seo_title($_POST['nama_kategoriblog']);
  mysqli_query($koneksi,"UPDATE kategoriblog SET nama_kategoriblog='$_POST[nama_kategoriblog]', kategoriblog_seo='$kategoriblog_seo' 
               WHERE id_kategoriblog = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
}
}
?>