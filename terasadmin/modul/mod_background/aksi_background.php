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
$dir="img_background/";
$upload="../../../".$dir.$_FILES['gambar']['name'];
$gambar=$dir.$_FILES['gambar']['name'];


//pengecekan apakah tabel masih kosong atau tidak

$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM background"));
if($cek<=0){
mysqli_query($koneksi,"INSERT INTO background SET gambar='$gambar' ")or die(mysqli_error());
} 

else {
$b=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM background"));
unlink("../../../$b[gambar]");
mysqli_query($koneksi,"UPDATE background SET gambar='$gambar' ")or die(mysqli_error());
}
//upload gambar
move_uploaded_file($_FILES['gambar']['tmp_name'],$upload);
header('location:../../media.php?module=background');
}
?>











