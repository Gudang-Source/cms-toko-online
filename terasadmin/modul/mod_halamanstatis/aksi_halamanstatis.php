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
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus halamanstatis
if ($module=='halamanstatis' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM halamanstatis WHERE id_halaman='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($koneksi,"DELETE FROM halamanstatis WHERE id_halaman='$_GET[id]'");
     unlink("../../../img_statis/$_GET[namafile]");   
     unlink("../../../img_statis/small_$_GET[namafile]");   
  }
  else{
     mysqli_query($koneksi,"DELETE FROM halamanstatis WHERE id_halaman='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');
}








// Hapus halaman terpilih
elseif($module=='halamanstatis' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM halamanstatis WHERE id_halaman=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_statis/$data[gambar]");   
     unlink("../../../img_statis/small_$data[gambar]");   
} 
mysqli_query($koneksi,"DELETE FROM halamanstatis WHERE id_halaman=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}



// Input halamanstatis
elseif ($module=='halamanstatis' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $judul_seo      = seo_title($_POST[judul]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
UploadStatis($nama_file_unik ,'../../../img_statis/');
   mysqli_query($koneksi,"INSERT INTO halamanstatis(judul,
	                                       judul_seo,
										   isi_halaman,
										   tgl_posting,
										   gambar,
										   username,
										     dibaca,
										      jam,
											  hari) 
									VALUES('$_POST[judul]',
										   '$judul_seo', 
										   '$_POST[isi_halaman]',
										   '$tgl_sekarang',
										   '$nama_file_unik',
										   '$_SESSION[namauser]',
										   0, 
										     '$jam_sekarang',
										    '$hari_ini')");
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  else{
   mysqli_query($koneksi,"INSERT INTO halamanstatis(judul,
	                                       judul_seo,
										   isi_halaman,
										   tgl_posting,
										   username,
										     dibaca,
										      jam,
											  hari) 
									VALUES('$_POST[judul]',
										   '$judul_seo', 
										   '$_POST[isi_halaman]',
										   '$tgl_sekarang',
										   '$_SESSION[namauser]',
										   0, 
										     '$jam_sekarang',
										    '$hari_ini')");
									    
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
}
// Update halamanstatis
elseif ($module=='halamanstatis' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo      = seo_title($_POST[judul]);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi,"UPDATE halamanstatis SET judul        = '$_POST[judul]',
                                        judul_seo    = '$judul_seo',
                                        isi_halaman  = '$_POST[isi_halaman]'  
                                  WHERE id_halaman   = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
  else{
   $data_gambar = mysqli_query($koneksi,"SELECT gambar FROM halamanstatis WHERE id_halaman='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../img_statis/'.$r['gambar']);
	@unlink('../../../img_statis/'.'small_'.$r['gambar']);
    UploadStatis($nama_file_unik ,'../../../img_statis/');
    mysqli_query($koneksi,"UPDATE halamanstatis SET judul        = '$_POST[judul]',
                                          judul_seo    = '$judul_seo',
                                          isi_halaman  = '$_POST[isi_halaman]',
                                          gambar       = '$nama_file_unik'   
                                    WHERE id_halaman   = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
}
}
?>