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

$module=$_GET[module];
$act=$_GET[act];

// Hapus banner
if ($module=='banner' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM banner WHERE id_banner='$_GET[id]'"));
  if ($data['gambar']!=''){
  mysqli_query($koneksi,"DELETE FROM banner WHERE id_banner='$_GET[id]'");
     unlink("../../../img_banner/$_GET[namafile]");   
  }
  else{
  mysqli_query($koneksi,"DELETE FROM banner WHERE id_banner='$_GET[id]'");  
  }
  header('location:../../media.php?module='.$module.'&msg=delete');
}


// Hapus terpilih
elseif($module=='banner' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM banner WHERE id_banner=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_banner/$data[gambar]");   
} 
mysqli_query($koneksi,"DELETE FROM banner WHERE id_banner=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}



// Input banner
elseif ($module=='banner' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploadbanner ($nama_file);
    mysqli_query($koneksi,"INSERT INTO banner(judul,
	                               username,
                                    url,
										aktif,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
							  '$_SESSION[namauser]',
                                   '$_POST[url]',
								   '$_POST[aktif]', 
                                   '$tgl_sekarang',
                                   '$nama_file')");
  }
  else{
    mysqli_query($koneksi,"INSERT INTO banner(judul,
	                                   username,
                                    tgl_posting,
									aktif,
                                    url) 
                            VALUES('$_POST[judul]',
							  '$_SESSION[namauser]',
                                   '$tgl_sekarang',
								    '$_POST[aktif]',
                                   '$_POST[url]')");
  }
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update banner
elseif ($module=='banner' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi,"UPDATE banner SET judul     = '$_POST[judul]',
	                                   aktif     = '$_POST[aktif]',
                                   url       = '$_POST[url]'
                             WHERE id_banner = '$_POST[id]'");
  }
  
  else{
    
	$data_gambar = mysqli_query($koneksi,"SELECT gambar FROM banner WHERE id_banner='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../img_banner/'.$r['gambar']);
	@unlink('../../../img_banner/'.'small_'.$r['gambar']);
	Uploadbanner ($nama_file);
	
    mysqli_query($koneksi,"UPDATE banner SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
								      aktif       = '$_POST[aktif]',
                                   gambar    = '$nama_file'   
                             WHERE id_banner = '$_POST[id]'");
  }
   header('location:../../media.php?module='.$module.'&msg=update');
}
}
?>
