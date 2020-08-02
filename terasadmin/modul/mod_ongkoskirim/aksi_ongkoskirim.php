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

// Hapus Ongkos Kirim
if ($module=='ongkoskirim' AND $act=='hapus'){
  mysqli_query($koneksi,"DELETE FROM kota WHERE id_kota='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}


// Hapus Yang Terseleksi/////////////////////////////////////////////////////////////////////////
elseif($module=='ongkoskirim' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysqli_query($koneksi,"DELETE FROM kota WHERE id_kota=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}


// Input Ongkos Kirim
elseif ($module=='ongkoskirim' AND $act=='input'){
  mysqli_query($koneksi,"INSERT INTO kota(id_perusahaan,nama_kota,username,ongkos_kirim) VALUES('$_POST[perusahaan]','$_POST[nama_kota]',   '$_SESSION[namauser]','$_POST[ongkos_kirim]')");
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update Ongkos Kirim
elseif ($module=='ongkoskirim' AND $act=='update'){
  mysqli_query($koneksi,"UPDATE kota SET nama_kota = '$_POST[nama_kota]', ongkos_kirim='$_POST[ongkos_kirim]' WHERE id_kota = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
	}
    
  }

?>
