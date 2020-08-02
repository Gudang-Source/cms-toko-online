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

// Hapus Bank
if ($module=='bank' AND $act=='hapus'){
	
	  $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM mod_bank WHERE id_bank='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($koneksi,"DELETE FROM mod_bank WHERE id_bank='$_GET[id]'");
     unlink("../../../img_bank/$_GET[namafile]");   
 }
  else{
     mysqli_query($koneksi,"DELETE FROM mod_bank WHERE id_bank='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');


  mysqli_query($koneksi,"DELETE FROM mod_bank WHERE id_bank='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}



// Hapus terpilih
elseif($module=='bank' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM bank WHERE id_bank=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_bank/$data[gambar]");   
} 
mysqli_query($koneksi,"DELETE FROM bank WHERE id_bank=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}






// Input bank
elseif ($module=='bank' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBank($nama_file);
    mysqli_query($koneksi,"INSERT INTO mod_bank(nama_bank,
	                                  username,
                                    no_rekening,
                                    pemilik,
                                    gambar) 
                            VALUES('$_POST[nama_bank]',
							 '$_SESSION[namauser]',
                                   '$_POST[no_rekening]',
                                   '$_POST[pemilik]',
                                   '$nama_file')");
								   
								   
								   
								   
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  else{
    mysqli_query($koneksi,"INSERT INTO mod_bank(nama_bank,
	                                  username,
                                    no_rekening,
                                    pemilik) 
                            VALUES($_POST[nama_bank]',
							  '$_SESSION[namauser]',
                                   '$_POST[no_rekening]',
                                   '$_POST[pemilik]')");
								   
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
}


// Update Bank
elseif ($module=='bank' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi,"UPDATE mod_bank SET nama_bank     = '$_POST[nama_bank]',
                                   no_rekening       = '$_POST[no_rekening]',
                                   pemilik       = '$_POST[pemilik]'                                   
                             WHERE id_bank = '$_POST[id]'");
  }
  else{
  
	$data_gambar = mysqli_query($koneksi,"SELECT gambar FROM mod_bank  WHERE id_bank='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../img_bank/'.$r['gambar']);
    UploadBank ($nama_file);
	
	
    mysqli_query($koneksi,"UPDATE mod_bank SET nama_bank     = '$_POST[nama_bank]',
                                   no_rekening       = '$_POST[no_rekening]',
                                   pemilik       = '$_POST[pemilik]',
                                   gambar       = '$nama_file'
                             WHERE id_bank = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=update');
	}
    
  }


?>
