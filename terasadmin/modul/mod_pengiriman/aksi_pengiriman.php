<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 echo "<link href='../../css/zalstyle.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../../favicon.png' />
  
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  <img src='../../img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  </section>
  <section id='error-text'>
  <p><a class='button' href='../../index.php'> <b>LOGIN DI SINI</b> </a></p>
  </section>
  </div>";}
  
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$folderimg="../../../images/logo_perusahaan/"; // Tempat upload file gambar

// Hapus Perusahaan Pengiriman
if ($module=="$module" AND $act=='hapus'){
      mysqli_query($koneksi,"DELETE FROM shop_pengiriman WHERE id_perusahaan='$_GET[id]'");
      $sub=mysqli_query($koneksi,"SELECT * FROM kota where id_perusahaan='$_GET[id]'");
        while (mysqli_fetch_array($sub)){
                mysqli_query($koneksi,"DELETE FROM kota WHERE id_perusahaan='$_GET[id]'");	      
      }
      
  header('location:../../media.php?module='.$module.'&msg=delete');
}



// Hapus Yang Terseleksi/////////////////////////////////////////////////////////////////////////
elseif($module=='jasapengiriman' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysqli_query($koneksi,"DELETE FROM shop_pengiriman WHERE id_perusahaan=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}




// Input Perusahaan Pengiriman
elseif ($module=="$module" AND $act=='input'){
  
  mysqli_query($koneksi,"INSERT INTO shop_pengiriman(nama_perusahaan, username) 
                            VALUES('$_POST[nama_perusahaan]', '$_SESSION[namauser]')");      
 
  header('location:../../media.php?module='.$module);
}

// Update Perusahaan Pengiriman
elseif ($module=="$module" AND $act=='update'){
  mysqli_query($koneksi,"UPDATE shop_pengiriman SET nama_perusahaan = '$_POST[nama_perusahaan]' WHERE id_perusahaan = '$_POST[id]'");
  
  header('location:../../media.php?module='.$module);
}

}
?>
