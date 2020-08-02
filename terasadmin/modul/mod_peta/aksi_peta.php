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

// Update peta
if ($module=='peta' AND $act=='update'){
    mysqli_query($koneksi,"UPDATE peta SET               width  = '$_POST[width]',
	                                         height   = '$_POST[height]',
	                                       latitude   = '$_POST[latitude]',
										  longtitude  = '$_POST[longtitude]'
                                      WHERE id_peta   = '$_POST[id]'");
  }
  
   header('location:../../media.php?module='.$module.'&msg=update');
}

?>
