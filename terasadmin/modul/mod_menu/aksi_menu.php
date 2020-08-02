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
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus menu
if ($module=='menu' AND $act=='hapus'){
  mysqli_query($koneksi,"DELETE FROM menu WHERE  id_menu='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}


// Hapus Terseleksi
elseif($module=='menu' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysqli_query($koneksi,"DELETE FROM menu WHERE id_menu=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
}




// Input menu
elseif ($module=='menu' AND $act=='input'){
    mysqli_query($koneksi,"INSERT INTO menu(id_parent,
	                                username,
                                    nama_menu,
                                    link)
                            VALUES('$_POST[id_parent]',
							       '$_SESSION[namauser]',
                                   '$_POST[nama_menu]',
                                   '$_POST[link]')");
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update menu
elseif ($module=='menu' AND $act=='update'){
    mysqli_query($koneksi,"UPDATE menu SET id_parent  = '$_POST[id_parent]',
                                   nama_menu = '$_POST[nama_menu]',
                                   link  = '$_POST[link]',
								   aktif = '$_POST[aktif]'
                             WHERE id_menu   = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
}
}
?>