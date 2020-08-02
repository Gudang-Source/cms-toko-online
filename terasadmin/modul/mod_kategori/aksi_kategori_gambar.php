<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus kategoriproduk
if ($module=='kategoriproduk' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM kategori WHERE id_kategori='$_GET[id]'"));
  if ($data[gambar]!=''){
     mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
     unlink("../../../kategori/$_GET[namafile]");   
     unlink("../../../kategori/small_$_GET[namafile]");   
  }
  else{
     mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}

// Input kategori
elseif ($module=='kategori' AND $act=='input'){
    $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $kategori_seo      = seo_title($_POST[nama_kategori]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadKategori($nama_file_unik);
  
 mysqli_query($koneksi,"INSERT INTO kategori(nama_kategori,
                                           kategori_seo,
                                           gambar) 
									VALUES('$_POST[nama_kategori]',
										   '$kategori_seo',
										   '$nama_file_unik')");
  header('location:../../media.php?module='.$module);
  }
  else{
   mysqli_query($koneksi,"INSERT INTO kategori(nama_kategori,
                                           isi_kategori,
                                           kategori_seo) 
									VALUES('$_POST[nama_kategori]',
										   '$kategori_seo'')");
  header('location:../../media.php?module='.$module);
  }
}
// Update kategoriproduk
elseif ($module=='kategoriproduk' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $kategori_seo      = seo_title($_POST[nama_kategori]);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi,"UPDATE kategoriSET nama_kategori = '$_POST[nama_kategori]',
                                              kategori_seo = '$kategori_seo' 
                                         WHERE id_kategori = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    $data_gambar = mysqli_query($koneksi,"SELECT gambar FROM kategori WHERE id_kategori='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../kategori/'.$r['gambar']);
	@unlink('../../../kategori/'.'small_'.$r['gambar']);
    UploadKategori($nama_file_unik ,'../../../kategori/');
   mysqli_query($koneksi,"UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]',
										   isi_kategori = '$_POST[isi_kategori]',
                                           gambar       = '$nama_file_unik'    
                                     WHERE id_kategori  = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
  }
}
//}   aslinya ada } disini tapi ko error ya

?>
