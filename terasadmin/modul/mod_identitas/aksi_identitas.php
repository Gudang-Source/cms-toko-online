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

// Update identitas
if ($module=='identitas' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadFavicon($nama_file);
    mysqli_query($koneksi,"UPDATE identitas SET nama_website   = '$_POST[nama_website]',
	                                         email   = '$_POST[email]',
	                                       url       = '$_POST[url]',
										  facebook   = '$_POST[facebook]',
										  twitter   = '$_POST[twitter]',
										   rekening  = '$_POST[rekening]',
                                              alamat = '$_POST[alamat]',									   
								      no_telp        = '$_POST[no_telp]',  
								      jam_kerja        = '$_POST[jam_kerja]', 
								      hari_kerja        = '$_POST[hari_kerja]',  
                                      meta_deskripsi = '$_POST[meta_deskripsi]',
                                      meta_keyword   = '$_POST[meta_keyword]',
                                      favicon        = '$nama_file'    
                                WHERE id_identitas   = '$_POST[id]'");
  }
  else{
    mysqli_query($koneksi,"UPDATE identitas SET nama_website   = '$_POST[nama_website]',
	                                   email   = '$_POST[email]',
	                                        url       = '$_POST[url]',
										  facebook   = '$_POST[facebook]',
										  twitter   = '$_POST[twitter]',
										   rekening  = '$_POST[rekening]',
                                              alamat = '$_POST[alamat]',									   
								      no_telp        = '$_POST[no_telp]',  
								      jam_kerja        = '$_POST[jam_kerja]', 
								      hari_kerja        = '$_POST[hari_kerja]',  
                                      meta_deskripsi = '$_POST[meta_deskripsi]',
                                      meta_keyword   = '$_POST[meta_keyword]'
                                WHERE id_identitas   = '$_POST[id]'");
  }
   header('location:../../media.php?module='.$module.'&msg=update');
}
}
?>
