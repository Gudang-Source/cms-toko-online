<?php
session_start();

$image_path = "../../../logo/zal_marking2.png";
$font_path = "RIZAL.TTF";
$font_size = 14;       // in pixcels
//$water_mark_text_1 = "9";
$water_mark_text_2 = "TerasKreasi";

function watermark_image($oldimage_name){
    global $image_path;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;    
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -10; 
    $pos_y = $height - $w_height - 10;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $oldimage_name, 100);
    imagedestroy($im);
	return true;
}

//fungsi thumb logo
function thumb_logo($nama_file){
//identitas file asli  
  $im_src = imagecreatefrompng($nama_file);
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 150;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagepng($im,"logo.png");
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

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

// Hapus gallery
if ($module=='galerifoto' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gbr_gallery FROM gallery WHERE id_gallery='$_GET[id]'"));
  if ($data['gbr_gallery']!=''){
     mysqli_query($koneksi,"DELETE FROM gallery WHERE id_gallery='$_GET[id]'");
     unlink("../../../img_galeri/$_GET[namafile]");   
     unlink("../../../img_galeri/kecil_$_GET[namafile]");   
  }
  else{
     mysqli_query($koneksi,"DELETE FROM gallery WHERE id_gallery='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');


  mysqli_query($koneksi,"DELETE FROM gallery WHERE id_gallery='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}



// Hapus terpilih
elseif($module=='galerifoto' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gbr_gallery FROM gallery WHERE id_gallery=$num"));
  if ($data['gbr_gallery']!=''){
     unlink("../../../img_galeri/$data[gbr_gallery]");   
     unlink("../../../img_galeri/kecil_$data[gbr_gallery]");  
} 
mysqli_query($koneksi,"DELETE FROM gallery WHERE id_gallery=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}


// Input gallery
elseif ($module=='galerifoto' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $produk_seo      = seo_title($_POST[nama_produk]);

  // Apabila ada gbr_gallery yang diupload
  if (!empty($lokasi_file)){
   // UploadGalProd($nama_file_unik);
	UploadGalProd($nama_file_unik,'../../../img_galeri/',300,120);
	watermark_image('../../../img_galeri/'.$nama_file_unik);

   mysqli_query($koneksi,"INSERT INTO gallery(nama_produk,
                                    produk_seo,
                                    id_produk,
									username,
                                    gbr_gallery) 
                            VALUES('$_POST[nama_produk]',
                                   '$produk_seo',
                                   '$_POST[produk]',
								   '$_SESSION[namauser]',
                                   '$nama_file_unik')");
								   
								   
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  else{
     mysqli_query($koneksi,"INSERT INTO gallery(nama_produk,
                                    produk_seo,
                                    id_produk,
									username) 
                            VALUES('$_POST[nama_produk]',
                                   '$produk_seo',
                                   '$_POST[produk]', 
								   '$_SESSION[namauser]')");
								   
								   
								   
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
}

// Update gallery
elseif ($module=='galerifoto' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $produk_seo      = seo_title($_POST[nama_produk]);

  // Apabila gbr_gallery tidak diganti
  if (empty($lokasi_file)){
     mysqli_query($koneksi,"UPDATE gallery SET nama_produk  = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_produk = '$_POST[produk]'
                             WHERE id_gallery   = '$_POST[id]'");
							 
   header('location:../../media.php?module='.$module.'&msg=update');
  }
  else{    
    //UploadGalProd($nama_file_unik);
	// Penambahan fitur unlink utk menghapus file yg lama biar gak ngebek-ngebeki server ^_^
	$data_gbr_gallery= mysqli_query($koneksi,"SELECT gbr_gallery FROM gallery WHERE id_gallery='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gbr_gallery);
	@unlink('../../../img_galeri/'.$r['gbr_gallery']);
	@unlink('../../../img_galeri/'.'kecil_'.$r['gbr_gallery']);
    UploadGalProd($nama_file_unik,'../../../img_galeri/',300,120);
	watermark_image('../../../img_galeri/'.$nama_file_unik);
	
	 mysqli_query($koneksi,"UPDATE gallery SET nama_produk  = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_produk = '$_POST[produk]',
                                   gbr_gallery      = '$nama_file_unik'   
                             WHERE id_gallery   = '$_POST[id]'");
							 
							 
							 
   header('location:../../media.php?module='.$module.'&msg=update');
	}
    
  }

}
?>
