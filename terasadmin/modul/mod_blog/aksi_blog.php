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




$module=$_GET['module'];
$act=$_GET['act'];

// Hapus blog
if ($module=='blog' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM blog WHERE id_blog='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($koneksi,"DELETE FROM blog WHERE id_blog='$_GET[id]'");
     unlink("../../../img_blog/$_GET[namafile]");   
     unlink("../../../img_blog/small_$_GET[namafile]");   
  }
  else{
     mysqli_query($koneksi,"DELETE FROM blog WHERE id_blog='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');
}




// Hapus terpilih
elseif($module=='blog' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM blog WHERE id_blog=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_blog/$data[gambar]");   
     unlink("../../../img_blog/small_$data[gambar]");  
} 
mysqli_query($koneksi,"DELETE FROM blog WHERE id_blog=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}





// Input blog
elseif ($module=='blog' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  if (!empty($_POST['tag_seo'])){
    $tag_seo = $_POST['tag_seo'];
    $tag=implode(',',$tag_seo);
  }
  $judul_seo      = seo_title($_POST['judul']);



  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=blog)</script>";
    }
    else{
    Uploadblog($nama_file_unik);
    watermark_image('../../../img_blog/'.$nama_file_unik);

   mysqli_query($koneksi,"INSERT INTO blog(   judul,
                                      sub_judul,
									    youtube,
                                    judul_seo,
                                    id_kategoriblog,
                                    headline,
									    dibaca,
                                    username,
                                    isi_blog,
									keterangan_gambar,
                                    jam,
                                    tanggal,
                                    hari,
                                    tag, 
                                    gambar) 
                            VALUES('$_POST[judul]',
							  '$_POST[sub_judul]',
							  '$_POST[youtube]',
                                   '$judul_seo',
                                   '$_POST[kategoriblog]',
                                   '$_POST[headline]', 
								   '$_POST[dibaca]', 
                                   '$_SESSION[namauser]',
                                   '$_POST[isi_blog]',
								    '$_POST[keterangan_gambar]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
                                   '$tag',
                                   '$nama_file_unik')");
 if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		getNewsletter($id);
		 }
  header('location:../../media.php?module='.$module.'&msg=insert');
 }
  }
  else{
    mysqli_query($koneksi,"INSERT INTO blog(  judul,
                                      sub_judul,
									      youtube,
                                    judul_seo,
                                    id_kategoriblog,
                                    headline,
									    dibaca,
                                    username,
                                    isi_blog,
                                    jam,
                                    tanggal,
                                    tag, 
                                    hari) 
                            VALUES('$_POST[judul]',
								  '$_POST[sub_judul]',
								  '$_POST[youtube]',
                                   '$judul_seo',
                                   '$_POST[kategoriblog]',
                                   '$_POST[headline]', 

								   '$_POST[dibaca]', 
                                   '$_SESSION[namauser]',
                                   '$_POST[isi_blog]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$tag',
                                   '$hari_ini')");
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		getNewsletter($id);
		}
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  $jml=count($tag_seo);
  for($i=0;$i<$jml;$i++){
    mysqli_query($koneksi,"UPDATE tag SET count=count+1 WHERE tag_seo='$tag_seo[$i]'");
  }
}

// Update blog
elseif ($module=='blog' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  if (!empty($_POST['tag_seo'])){
    $tag_seo = $_POST['tag_seo'];
    $tag=implode(',',$tag_seo);
  }

  $judul_seo = seo_title($_POST['judul']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi,"UPDATE blog SET judul       = '$_POST[judul]',
	                          sub_judul       = '$_POST[sub_judul]',
							   youtube      = '$_POST[youtube]',
                                   judul_seo   = '$judul_seo', 
                                   id_kategoriblog= '$_POST[kategoriblog]',
                                   headline    = '$_POST[headline]',
                                   tag         = '$tag',
                                   isi_blog  = '$_POST[isi_blog]',
						 keterangan_gambar  = '$_POST[keterangan_gambar]'  
                             WHERE id_blog   = '$_POST[id]'");
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		echo getNewsletter($id);
		}
  header('location:../../media.php?module='.$module.'&msg=update');
    }
    else{
	
	
    $data_gambar = mysqli_query($koneksi,"SELECT gambar FROM blog WHERE id_blog='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../img_blog/'.$r['gambar']);
	@unlink('../../../img_blog/'.'small_'.$r['gambar']);
    Uploadblog($nama_file_unik,'../../../img_blog/',300,120);
	watermark_image('../../../img_blog/'.$nama_file_unik);

	
    mysqli_query($koneksi,"UPDATE blog SET judul       = '$_POST[judul]',
	                        sub_judul       = '$_POST[sub_judul]',
							  youtube      = '$_POST[youtube]',
                                   judul_seo   = '$judul_seo', 
                                   id_kategoriblog = '$_POST[kategoriblog]',
                               headline    = '$_POST[headline]',
                                   tag         = '$tag',
                                   isi_blog  = '$_POST[isi_blog]',
										  keterangan_gambar  = '$_POST[keterangan_gambar]',   
                                   gambar      = '$nama_file_unik'     
                             WHERE id_blog   = '$_POST[id]'");
if(isset($_POST['kirimnewsletter']) && $_POST['kirimnewsletter']=='ya'){
		$id=mysqli_insert_id();
		echo getNewsletter($id);
		}
   header('location:../../media.php?module='.$module.'&msg=update');
   }
  }
}
?>
