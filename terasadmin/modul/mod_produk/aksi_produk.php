<?php
session_start();

$image_path = "../../../logo/zal_marking2.png";
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
     $pos_x = $width - $w_width -5; 
    $pos_y = $height - $w_height - 5;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $oldimage_name, 100);
    imagedestroy($im);
	return true;
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
include "../../../config/fungsi_newsletter.php";



$module=$_GET[module];
$act=$_GET[act];

// Hapus produk
if ($module=='produk' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM produk WHERE id_produk='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$_GET[id]'");
     unlink("../../../img_produk/$_GET[namafile]");   
     unlink("../../../img_produk/small_$_GET[namafile]");   
  }
  else{
     mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');


  mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}



// Hapus terpilih //////////////////////////////////////////////////////
elseif($module=='produk' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM produk WHERE id_produk=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_produk/$data[gambar]");   
     unlink("../../../img_produk/small_$data[gambar]");  
} 
mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}


// Input produk
elseif ($module=='produk' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $produk_seo      = seo_title($_POST[nama_produk]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
   // UploadImage($nama_file_unik);
	UploadImage($nama_file_unik,'../../../img_produk/',300,120);
     watermark_image('../../../img_produk/'.$nama_file_unik);

    mysqli_query($koneksi,"INSERT INTO produk(nama_produk,
	                                username,
                                    produk_seo,
                                    id_kategori,
                                    berat,
								    headline,
                                    harga,
									diskon,
                                    stok,
                                    deskripsi,
                                    tgl_masuk,
                                    gambar) 
                            VALUES('$_POST[nama_produk]',
							       '$_SESSION[namauser]',
                                   '$produk_seo',
                                   '$_POST[kategori]',
                                   '$_POST[berat]',
								   '$_POST[headline]',
                                   '$_POST[harga]',
								   '$_POST[diskon]',
                                   '$_POST[stok]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang',
                                   '$nama_file_unik')");								   
 if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		echo getNewsletter($id);
		 }
  header('location:../../media.php?module='.$module.'&msg=insert');
 
  }
  else{
    mysqli_query($koneksi,"INSERT INTO produk(nama_produk,
	                                username,
                                    produk_seo,
                                    id_kategori,
                                    berat,
								    headline,
                                    harga,
									diskon
                                    stok,
                                    deskripsi,
                                    tgl_posting) 
                            VALUES('$_POST[nama_produk]',
							       '$_SESSION[namauser]',
                                   '$produk_seo',
                                   '$_POST[kategori]',
                                   '$_POST[berat]',  
                                   '$_POST[headline]',
                                   '$_POST[harga]',
								   '$_POST[diskon]',
                                   '$_POST[stok]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang')");
								   
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		echo getNewsletter($id);
		}
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
}

// Update produk
elseif ($module=='produk' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $produk_seo      = seo_title($_POST[nama_produk]);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
  
     mysqli_query($koneksi,"UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   berat       = '$_POST[berat]',
								   headline    = '$_POST[headline]',
                                   harga       = '$_POST[harga]',
								   diskon      = '$_POST[diskon]',
                                   stok        = '$_POST[stok]',
                                   deskripsi   = '$_POST[deskripsi]'
                             WHERE id_produk   = '$_POST[id]'");
							 
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=$_POST['id'];
		echo getNewsletter($id);
	}
  header('location:../../media.php?module='.$module.'&msg=update');

  }
  else{    
	$data_gambar = mysqli_query($koneksi,"SELECT gambar FROM produk WHERE id_produk='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../img_produk/'.$r['gambar']);
	@unlink('../../../img_produk/'.'small_'.$r['gambar']);
    UploadImage($nama_file_unik,'../../../img_produk/',300,120);
	watermark_image('../../../img_produk/'.$nama_file_unik);
	  
	mysqli_query($koneksi,"UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   berat       = '$_POST[berat]',
								   headline    = '$_POST[headline]',
                                   harga       = '$_POST[harga]',
                                   diskon      = '$_POST[diskon]',
								   stok        = '$_POST[stok]',
                                   deskripsi   = '$_POST[deskripsi]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_produk   = '$_POST[id]'");
							 
							 
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=$_POST['id'];
		echo ($id);
	}
  header('location:../../media.php?module='.$module.'&msg=update');
	}
    
  }
  }

?>
