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

// Input templates
if ($module=='templates' AND $act=='input'){
  mysqli_query($koneksi,"INSERT INTO templates(judul,username,pembuat,folder) VALUES('$_POST[judul]', '$_SESSION[namauser]','$_POST[pembuat]','$_POST[folder]')");
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update templates
elseif ($module=='templates' AND $act=='update'){
  mysqli_query($koneksi,"UPDATE templates SET judul  = '$_POST[judul]',
                                    pembuat= '$_POST[pembuat]',
                                    folder = '$_POST[folder]'
                              WHERE id_templates = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
}

// Aktifkan templates
elseif ($module=='templates' AND $act=='aktifkan'){
  $query1=mysqli_query($koneksi,"UPDATE templates SET aktif='Ya' WHERE id_templates='$_GET[id]'");
  $query2=mysqli_query($koneksi,"UPDATE templates SET aktif='Tidak' WHERE id_templates!='$_GET[id]'");
   header('location:../../media.php?module='.$module.'&msg=aktif');
}
}
?>
