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

$module=$_GET[module];
$act=$_GET[act];




// Input user
if ($module=='user' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $pass=md5($_POST[password]);
  
  // Apabila ada foto yang diupload
  if (!empty($lokasi_file)){
    UploadUser($nama_file_unik);
  mysqli_query($koneksi,"INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
								 foto,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
								'$nama_file_unik',
                                '$pass')");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysqli_query($koneksi,"INSERT INTO users_modul SET id_session='$pass',id_modul='$modul[$i]'");
  }
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  else{
  mysqli_query($koneksi,"INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
                                '$pass')");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysqli_query($koneksi,"INSERT INTO users_modul SET id_session='$pass',id_modul='$modul[$i]'");
  }
  header('location:../../media.php?module='.$module.'&msg=insert');
}
}

// Update user
elseif ($module=='user' AND $act=='update') {
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  // Apabila foto tidak diganti
  if($_POST[password]!=''){
  $pass=md5($_POST[password]);
  if (empty($lokasi_file)){
    mysqli_query($koneksi,"UPDATE users SET password        = '$pass',
								  nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  id_session     = '$_POST[id]'");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysqli_query($koneksi,"INSERT INTO users_modul SET id_session='$_POST[id]',id_modul='$modul[$i]'");
  }
   header('location:../../media.php?module='.$module.'&msg=update');
  }
  // Apabila password diubah
  else{
	$data_foto = mysqli_query($koneksi,"SELECT foto FROM users WHERE id_session='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_foto);
	@unlink('../../../img_user/'.$r['foto']);
	@unlink('../../../img_user/'.'small_'.$r['foto']);
    UploadUser($nama_file_unik ,'../../../img_user/');
    mysqli_query($koneksi,"UPDATE users SET password        = '$pass',
                                  nama_lengkap    = '$_POST[nama_lengkap]',
                                  email           = '$_POST[email]',  
                                  blokir          = '$_POST[blokir]', 
								  foto          = '$nama_file_unik', 
                                  no_telp         = '$_POST[no_telp]'  
                            WHERE id_session      = '$_POST[id]'");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysqli_query($koneksi,"INSERT INTO users_modul SET id_session='$_POST[id]',id_modul='$modul[$i]'");
  }
  }
  } else {
  if (empty($lokasi_file)){
  mysqli_query($koneksi,"UPDATE users SET   nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  id_session     = '$_POST[id]'");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysqli_query($koneksi,"INSERT INTO users_modul SET id_session='$_POST[id]',id_modul='$modul[$i]'");
  }
   header('location:../../media.php?module='.$module.'&msg=update');
  }
  // Apabila password diubah
  else{
	$data_foto = mysqli_query($koneksi,"SELECT foto FROM users WHERE id_session='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_foto);
	@unlink('../../../img_user/'.$r['foto']);
	@unlink('../../../img_user/'.'small_'.$r['foto']);
    UploadUser($nama_file_unik ,'../../../img_user/');
    mysqli_query($koneksi,"UPDATE users SET nama_lengkap    = '$_POST[nama_lengkap]',
                                  email           = '$_POST[email]',  
                                  blokir          = '$_POST[blokir]', 
								  foto          = '$nama_file_unik', 
                                  no_telp         = '$_POST[no_telp]'  
                            WHERE id_session      = '$_POST[id]'");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysqli_query($koneksi,"INSERT INTO users_modul SET id_session='$_POST[id]',id_modul='$modul[$i]'");
  }
  }
  }
   header('location:../../media.php?module='.$module.'&msg=update');
}


 //hapus module
elseif($module=='user' AND $act=='hapusmodule'){
$id=abs((int)$_GET['id']);
mysqli_query($koneksi,"DELETE FROM users_modul WHERE id_umod=$id");
header('location:../../media.php?module='.$module.'&act=edituser&id='.$_GET[sessid]);
}

}
?>