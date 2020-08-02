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

// Hapus header
if ($module=='header' AND $act=='hapus'){
  mysqli_query($koneksi,"DELETE FROM header WHERE id_header='$_GET[id]'");
       unlink("../../../img_header/$_GET[namafile]");   
  header('location:../../media.php?module='.$module.'&msg=delete');
}



// Hapus terpilih
elseif($module=='header' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM header WHERE id_header=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_header/$data[gambar]");   
} 
mysqli_query($koneksi,"DELETE FROM header WHERE id_header=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}



// Input header
elseif ($module=='header' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadHeader($nama_file);
    mysqli_query($koneksi,"INSERT INTO header(judul,
		                          id_kategori,
									  username,
                                    tgl_posting,
                           keterangan_gambar,
                                    gambar) 
                            VALUES('$_POST[judul]',
							     '$_POST[kategori]',
								   '$_SESSION[namauser]',
                                   '$tgl_sekarang',
								    '$_POST[keterangan_gambar]',
                                   '$nama_file')");
  }
  else{
    mysqli_query($koneksi,"INSERT INTO header(judul,
	                                 id_kategori,
                                    tgl_posting,
									username) 
                            VALUES('$_POST[judul]',
						        '$_POST[kategori]',
                                   '$tgl_sekarang',
								    '$_SESSION[namauser]')");
  }
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update header
elseif ($module=='header' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi,"UPDATE header SET  id_kategori = '$_POST[kategori]',
						 keterangan_gambar  = '$_POST[keterangan_gambar]',
	                           judul     = '$_POST[judul]'
                             WHERE id_header = '$_POST[id]'");
  }
  else{
  
	$data_gambar= mysqli_query($koneksi,"SELECT gambar FROM header WHERE id_header='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../img_header/'.$r['gambar']);
    UploadHeader($nama_file,'../../../header/',300,120);
	
    mysqli_query($koneksi,"UPDATE header SET judul     = '$_POST[judul]',
	                             id_kategori = '$_POST[kategori]',
						 keterangan_gambar  = '$_POST[keterangan_gambar]',
                                   gambar    = '$nama_file'   
                             WHERE id_header = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=update');
	}
    
  }

?>