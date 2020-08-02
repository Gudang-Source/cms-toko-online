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
include "../../../config/fungsi_newsletter.php";

$module=$_GET[module];
$act=$_GET[act];
$id=$_POST[id];

// Hapus newsletter
if ($module=='newsletter' AND $act=='hapus'){
  mysqli_query($koneksi,"DELETE FROM newsletter WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}


// Hapus Terseleksi
elseif($module=='newsletter' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysqli_query($koneksi,"DELETE FROM newsletter WHERE id=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
}




// Input newsletter
elseif ($module=='newsletter' AND $act=='input'){
  mysqli_query($koneksi,"INSERT INTO newsletter(email,username) VALUES('$_POST[email]','$_SESSION[namauser]')");
  
  mysqli_query($koneksi,"INSERT INTO newsletter(nama,username) VALUES('$_POST[nama]','$_POST[username]')");
  
  
  
  
 if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		getNewsletter($id);
		 }
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update newsletter
elseif ($module=='newsletter' AND $act=='update'){
  mysqli_query($koneksi,"UPDATE newsletter SET email='$_POST[email]' WHERE id = '$id'");
  
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		echo getNewsletter($id);
		}
   header('location:../../media.php?module='.$module.'&msg=update');
}}
?>
